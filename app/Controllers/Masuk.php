<?php

namespace App\Controllers;

use App\Models\Masuk_model;

class Masuk extends BaseController
{
    protected $masuk_m;
    public function __construct()
    {
        $this->masuk_m = new Masuk_model();
    }
    public function index()
    {
        $data = [
            'judul' => 'TBM Macatongsir | Masuk',
            'validasi' => \Config\Services::validation()
        ];
        return view('masuk/masuk', $data);
    }
    public function simpan_masuk()
    {
        if (!$this->validate('masukPengguna')) {
            return redirect()->to('/masuk')->withInput();
        }

        $password = htmlspecialchars(trim($this->request->getVar('password')));
        $email = htmlspecialchars(trim($this->request->getVar('email')));

        $pengguna = $this->masuk_m->where(['email' => $email])->first();
        if ($pengguna) {
            if ($pengguna['is_active'] != 0) {
                if (password_verify($password, $pengguna['password'])) {
                    $data = [
                        'id' => $pengguna['id'],
                        'email' => $pengguna['email'],
                        'role' => $pengguna['role'],
                    ];
                    session()->set($data);
                    if ($pengguna['role'] == 1) {
                        return redirect()->to('/admin');
                    } elseif ($pengguna['role'] == 2) {
                        return redirect()->to('/');
                    }
                } else {
                    session()->setFlashdata('pesan', 'password atau email salah');
                    return redirect()->to('/masuk');
                }
            } else {
                session()->setFlashdata('pesan', 'email belum diaktivasi');
                return redirect()->to('/masuk');
            }
        } else {
            session()->setFlashdata('pesan', $email . ' belum terdaftar');
            return redirect()->to('/masuk');
        }
    }
    public function registrasi()
    {
        $data = [
            'judul' => 'TBM Macatongsir | Registrasi Member',
            'validasi' => \Config\Services::validation()
        ];
        return view('masuk/registrasi', $data);
    }
    public function simpan_registrasi()
    {
        if (!$this->validate('registrasiPengguna')) {
            return redirect()->to('/masuk/registrasi')->withInput();
        }
        $nama_lengkap = htmlspecialchars(trim($this->request->getVar('nama_lengkap')));
        $data = [
            'nama_lengkap' => $nama_lengkap,
            'email' => htmlspecialchars(trim($this->request->getVar('email'))),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => 2,
            'is_active' => 0,
            'status_pengajuan_member' => 1,
            'status_ketersediaan_buku' => 0,
        ];
        $token = base64_encode(random_bytes(32));
        $pengguna_token = [
            'email' => $this->request->getVar('email'),
            'token' => $token,
            'created_at' => time()
        ];
        $this->masuk_m->insertPengguna($data);
        $this->masuk_m->insertToken($pengguna_token);

        $this->_sendEmail($token, 'aktivasi');
        session()->setFlashdata('pesan', 'Akun berhasil dibuat. Silahkan Aktivasi terlebih dahulu!');
        return redirect()->to('/masuk');
    }
    private function _sendEmail($token, $type)
    {
        $email = \Config\Services::email();

        $email->setFrom('macatongsir.id@gmail.com', 'Satu Pustaka');
        $email->setTo($this->request->getVar('email'));
        if ($type == 'aktivasi') {
            $data = [
                'token' => $token,
                'email' => $this->request->getVar('email')
            ];
            $email->setSubject('[Macatongsir] Aktivasi Email');
            $email->setMessage(view('template_email/emailTemp', $data));
            // $email->setMessage('Klik link yang tersedia untuk aktivasi email <br> <a href="' . base_url() . '/masuk/verifikasi?email=' . $this->request->getVar('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
        } elseif ($type == 'lupaPassword') {
            $data = [
                'token' => $token,
                'email' => $this->request->getVar('email')
            ];
            $email->setSubject('[Macatongsir] Reset Password');
            $email->setMessage(view('template_email/lupaPasswordTemp', $data));
        }

        if ($email->send()) {
            return true;
        } else {
            echo $email->printDebugger();
        }
    }
    public function verifikasi()
    {
        $email = $this->request->getGet('email');
        $token = $this->request->getGet('token');
        $pengguna = $this->masuk_m->where(['email' => $email])->first();

        if ($pengguna) {
            $tokenPengguna = $this->masuk_m->ambilToken($token);
            if ($tokenPengguna) {
                if (time() - $tokenPengguna['created_at'] < (60 * 15)) {
                    $this->masuk_m->ubahAktivasi($email);
                    $this->masuk_m->hapusToken($email);
                    session()->setFlashdata('pesan', 'Email berhasil diaktivasi');
                    return redirect()->to('/masuk');
                } else {
                    $this->masuk_m->delete(['email' => $email]);
                    $this->masuk_m->hapusToken($email);
                    session()->setFlashdata('pesan', 'Aktivasi telah kadaluarsa');
                    return redirect()->to('/masuk');
                }
            } else {
                session()->setFlashdata('pesan', 'Token tidak ditemukan');
                return redirect()->to('/masuk');
            }
        } else {
            session()->setFlashdata('pesan', 'Email tidak ditemukan');
            return redirect()->to('/masuk');
        }
    }
    public function resetpassword()
    {
        $email = $this->request->getGet('email');
        $token = $this->request->getGet('token');
        $pengguna = $this->masuk_m->where(['email' => $email])->first();

        if ($pengguna) {
            $tokenPengguna = $this->masuk_m->ambilToken($token);
            if ($tokenPengguna) {
                if (time() - $tokenPengguna['created_at'] < (60 * 15)) {
                    session()->set('reset_pass', $email);
                    $this->passwordbaru();
                } else {
                    $this->masuk_m->delete(['email' => $email]);
                    $this->masuk_m->hapusToken($email);
                    session()->setFlashdata('pesan', 'Reset Password telah kadaluarsa');
                    return redirect()->to('/masuk');
                }
            } else {
                session()->setFlashdata('pesan', 'Token tidak ditemukan');
                return redirect()->to('/masuk');
            }
        } else {
            session()->setFlashdata('pesan', 'Email tidak ditemukan');
            return redirect()->to('/masuk');
        }
    }
    public function passwordbaru()
    {
        if (!session()->get('reset_pass')) {
            return redirect()->to('/masuk');
        }
        $data = [
            'judul' => 'TBM Macatongsir | Reset Password',
            'validasi' => \Config\Services::validation()
        ];
        echo view('masuk/password-baru', $data);
    }
    public function simpan_password_baru()
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required|matches[rpassword]|min_length[6]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                    'min_length' => 'password harus lebih dari 6',
                    'matches' => 'password tidak sama'
                ]
            ],
            'rpassword' => [
                'rules' => 'required|matches[password]|min_length[6]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                    'min_length' => 'password harus lebih dari 6',
                    'matches' => 'password tidak sama'
                ]
            ],
        ])) {
            return redirect()->to('/masuk/passwordbaru')->withInput();
        }
        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $email = session()->get('reset_pass');
        $this->masuk_m->resetPassword($email, $password);
        $this->masuk_m->hapusToken($email);
        session()->remove('reset_pass');
        session()->setFlashdata('pesan', 'Reset password berhasil diubah');
        return redirect()->to('/masuk');
    }
    public function lupa_password()
    {
        $data = [
            'judul' => 'TBM Macatongsir | Lupa Password',
            'validasi' => \Config\Services::validation()
        ];
        return view('masuk/lupa-password', $data);
    }
    public function simpan_lupa_password()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'valid_email' => 'Email tidak valid'
                ]
            ],
        ])) {
            return redirect()->to('/masuk/lupa-password')->withInput();
        }
        $email = $this->request->getVar('email');
        $pengguna = $this->masuk_m->where(['email' => $email, 'is_active' => 1])->first();
        if ($pengguna) {
            $cekToken = $this->masuk_m->cekToken($email);
            if (!$cekToken) {
                $token = base64_encode(random_bytes(32));
                $pengguna_token = [
                    'email' => $this->request->getVar('email'),
                    'token' => $token,
                    'created_at' => time()
                ];
                $this->masuk_m->insertToken($pengguna_token);
                $this->_sendEmail($token, 'lupaPassword');
                session()->setFlashdata('pesan', 'Reset password berhasil dikirim ke email anda');
                return redirect()->to('/masuk/lupa-password');
            } else {
                session()->setFlashdata('pesan', 'Reset password sudah dikirim lewat email anda, harap periksa!');
                return redirect()->to('/masuk/lupa-password');
            }
        } else {
            session()->setFlashdata('pesan', 'Email tidak ditemukan atau belum diverifikasi');
            return redirect()->to('/masuk/lupa-password');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
