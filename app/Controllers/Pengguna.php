<?php

namespace App\Controllers;

use App\Models\Masuk_model;
use App\Models\Pengguna_model;
use App\Models\Tabel_buku;
use App\Models\Tabel_kegiatan;

class Pengguna extends BaseController
{
    protected $pengguna_m, $masuk_m, $kegiatan_m, $buku_m;
    public function __construct()
    {
        $this->pengguna_m = new Pengguna_model();
        $this->masuk_m = new Masuk_model();
        $this->kegiatan_m = new Tabel_kegiatan();
        $this->buku_m = new Tabel_buku();
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        foreach ($this->pengguna_m->apiCovid() as $api) {
            $dataApiCovid = $api;
        }
        $id = session()->get('id');
        $data = [
            'judul' => 'TBM Macatongsir | Pengguna',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'pengajuan_ditolak' => $this->pengguna_m->pesan_ditolak($id),
            'bookmark' => $this->pengguna_m->ambilBookmark()->get()->getResultArray(),
            'jumlah_bookmark' => $this->pengguna_m->ambilBookmark()->countAllResults(),
            'apiCovid' => $dataApiCovid,
        ];
        if (session()->get('email')) {
            if (session()->get('role') == 2) {
                return view('pengguna/penggunaPages/halaman_pengguna', $data);
            } else {
                return redirect()->to('/');
            }
        }
    }
    public function ubah_password()
    {
        foreach ($this->pengguna_m->apiCovid() as $api) {
            $dataApiCovid = $api;
        }
        $data = [
            'judul' => 'TBM Macatongsir | Ubah Password',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'bookmark' => $this->pengguna_m->ambilBookmark()->get()->getResultArray(),
            'jumlah_bookmark' => $this->pengguna_m->ambilBookmark()->countAllResults(),
            'validasi'  => \Config\Services::validation(),
            'apiCovid' => $dataApiCovid,
        ];
        return view('pengguna/penggunaPages/halaman_ubahPassword', $data);
    }
    public function simpan_ubah_password()
    {
        if (!$this->validate('ubah_password')) {
            return redirect()->to('/pengguna/ubah-password')->withInput();
        }
        $id = session()->get('id');
        $password_database = $this->masuk_m->find($id);
        $password_lama = $this->request->getVar('cpassword');
        $password_baru = $this->request->getVar('npassword');
        if (password_verify($password_lama, $password_database['password'])) {
            if ($password_baru != $password_lama) {
                $data = [
                    'password' => password_hash($password_baru, PASSWORD_DEFAULT)
                ];
                $this->pengguna_m->ubahPengguna($id, $data);
                session()->setFlashdata('alerts', 'Password berhasil diubah');
                return redirect()->to('/pengguna/ubah-password');
            } else {
                session()->setFlashdata('danger', 'Password harus berbeda');
                return redirect()->to('/pengguna/ubah-password');
            }
        } else {
            session()->setFlashdata('danger', 'Password awal salah');
            return redirect()->to('/pengguna/ubah-password');
        }
    }
    public function peminjaman_buku()
    {
        foreach ($this->pengguna_m->apiCovid() as $api) {
            $dataApiCovid = $api;
        }
        $id = session()->get('id');
        $data = [
            'judul' => 'TBM Macatongsir | Peminjaman Buku',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'data_pengajuan' => $this->pengguna_m->ambilDataPengajuanRow($id),
            'pengajuan_ditolak' => $this->pengguna_m->pesan_ditolak($id),
            'bookmark' => $this->pengguna_m->ambilBookmark()->get()->getResultArray(),
            'satuBarisBookmark' => $this->pengguna_m->ambilBookmark()->get()->getRowArray(),
            'jumlah_bookmark' => $this->pengguna_m->ambilBookmark()->countAllResults(),
            'satuBarisPinjaman' => $this->pengguna_m->ambilSatuBarisPinjaman($id),
            'validation' => \Config\Services::validation(),

            'bd' => $this->pengguna_m->ambilBookmarkStatus(0)->countAllResults(),
            't' => $this->pengguna_m->ambilBookmarkStatus(1)->countAllResults(),
            'tt' => $this->pengguna_m->ambilBookmarkStatus(2)->countAllResults(),

            'member_menunggu'    => $this->pengguna_m->ambilDataStatus(3, $id, 4)->where('b.tanggal_dibawa >', date('Y-m-d'))->get()->getRowArray(),
            'member_meminjam'    => $this->pengguna_m->ambilDataStatus(3, $id, 4)->where('b.tanggal_dibawa <=', date('Y-m-d'))->where('b.tanggal_dikembalikan >', date('Y-m-d'))->get()->getRowArray(),
            'member_telat'    => $this->pengguna_m->ambilDataStatus(3, $id, 4)->where('b.tanggal_dikembalikan <=', date('Y-m-d'))->get()->getRowArray(),

            'riwayat_bookmark' => $this->pengguna_m->ambilRiwayat()->get()->getResultArray(),
            'cekStatus' => $this->pengguna_m->ambilTutupPeminjaman()->get()->getRowArray(),
            'apiCovid' => $dataApiCovid,
        ];
        if (session()->get('email')) {
            if (session()->get('role') == 2) {
                if ($data['pengguna']['status_ketersediaan_buku'] != 4) {
                    if ($data['pengguna']['status_pengajuan_member'] == 1 || $data['pengguna']['status_pengajuan_member'] == 2) {
                        return view('pengguna/penggunaPages/halaman_peminjamanBuku', $data);
                    } else {
                        return view('pengguna/AlurPengajuan/halaman_peminjamanBuku', $data);
                    }
                } else {
                    return view('pengguna/AlurPengajuan/halaman_invPeminjamanBuku', $data);
                }
            } else {
                return redirect()->to('/');
            }
        }
    }
    public function simpan_pengajuan()
    {
        if (!$this->validate('pengajuan_member')) {
            return redirect()->to('/pengguna/peminjaman-buku')->withInput();
        }
        $id = session()->get('id');
        $photoKtpKartuPelajar = $this->request->getFile('photo_ktp_kartu_pelajar');

        $photo_ktp_kp = $photoKtpKartuPelajar->getRandomName();
        $photoKtpKartuPelajar->move('assets/img-pengajuan/', $photo_ktp_kp);

        $pesanPengajuan = $this->pengguna_m->pesan_ditolak($id);
        if ($pesanPengajuan) {
            $this->pengguna_m->hapusPesanDitolak($id);
        }
        $data = [
            'user_id' => session()->get('id'),
            'nama_lengkap' => htmlspecialchars(trim($this->request->getVar('nama_lengkap'))),
            'email' => htmlspecialchars(trim($this->request->getVar('email'))),
            'no_hp' => htmlspecialchars(trim($this->request->getVar('no_hp'))),
            'provinsi' => htmlspecialchars(trim($this->request->getVar('provinsi'))),
            'kota' => htmlspecialchars(trim($this->request->getVar('kota'))),
            'kecamatan' => htmlspecialchars(trim($this->request->getVar('kecamatan'))),
            'kelurahan' => htmlspecialchars(trim($this->request->getVar('kelurahan'))),
            'alamat' => htmlspecialchars(trim($this->request->getVar('alamat'))),
            'status' => htmlspecialchars(trim($this->request->getVar('status'))),
            'pesan' => htmlspecialchars(trim($this->request->getVar('pesan'))),
            'photo_ktp_kartu_pelajar' => $photo_ktp_kp,
        ];
        $this->pengguna_m->save($data);

        $statusPengguna = ['status_pengajuan_member' => 2];
        $this->pengguna_m->status_pengguna($id, $statusPengguna);
        session()->setFlashdata('alerts', 'Pengajuan Berhasil Dikirim');
        return redirect()->to('/pengguna/peminjaman-buku');
    }
    public function simpan_pinjam_sekarang()
    {
        $id = session()->get('id');
        $ubahStatusBook = [
            'status' => 1,
        ];
        $this->pengguna_m->ubahStatusBuku($id, $ubahStatusBook);
        session()->setFlashdata('alerts', 'Pengajuan Anda Berhasil Dikirimkan');
        return redirect()->to('/pengguna/peminjaman-buku');
    }
    public function batalkan_pinjam_sekarang()
    {
        $id = session()->get('id');
        $menunggu = $this->pengguna_m->ambilDataStatus(3, $id, 4)->where('b.tanggal_dibawa >', date('Y-m-d'))->get()->getRowArray();
        if ($menunggu) {
            $ubahStatus = [
                'status_ketersediaan_buku' => 0,
            ];
            $this->pengguna_m->hapusPinjaman($id);
            $this->pengguna_m->ubahStatusPeminjaman($id, $ubahStatus);
            session()->setFlashdata('alerts', 'Pengajuan Berhasil Dibatalkan');
            return redirect()->to('/pengguna/peminjaman-buku');
        } else {
            session()->setFlashdata('danger', 'Sedang dalam peminjaman');
            return redirect()->to('/pengguna/peminjaman-buku');
        }
    }
    public function batalkan_periksa_ketersediaan()
    {
        $id = session()->get('id');
        $pengguna = $this->masuk_m->auth_pengguna();
        if ($pengguna['status_ketersediaan_buku'] == 1) {
            $ubahStatus = [
                'status_ketersediaan_buku' => 0,
            ];
            $this->pengguna_m->ubahStatusPeminjaman($id, $ubahStatus);
            session()->setFlashdata('alerts', 'Pengajuan Berhasil Dibatalkan');
            return redirect()->to('/pengguna/peminjaman-buku');
        } else {
            session()->setFlashdata('danger', 'Sedang dalam peminjaman');
            return redirect()->to('/pengguna/peminjaman-buku');
        }
    }
    public function ubah_profil()
    {
        foreach ($this->pengguna_m->apiCovid() as $api) {
            $dataApiCovid = $api;
        }
        $data = [
            'judul'     => 'TBM Macatongsir | Ubah Profil Anda',
            'bookmark' => $this->pengguna_m->ambilBookmark()->get()->getResultArray(),
            'jumlah_bookmark' => $this->pengguna_m->ambilBookmark()->countAllResults(),
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'validasi'  => \Config\Services::validation(),
            'apiCovid' => $dataApiCovid,
        ];
        return view('pengguna/penggunaPages/halaman_ubahProfil', $data);
    }
    // (submit form) edit profil
    public function simpan_ubah_profil()
    {
        if (!$this->validate('edit_profil')) {
            return redirect()->to('/pengguna/ubah-profil')->withInput();
        }
        $data_1 = [
            'nama_lengkap' => htmlspecialchars(trim($this->request->getVar('nama_lengkap'))),
        ];
        $id = session()->get('id');
        $this->pengguna_m->editProfilPengguna_1($id, $data_1);

        $photoDatabase = $this->pengguna_m->ambilProfil($id);
        $photoBaru = $this->request->getFile('photo');

        if ($photoBaru->getError() == 4) {
            $photo = $photoDatabase['photo'];
        } else {
            if ($photoDatabase['photo'] != 'default.png') {
                unlink('assets/img-pengguna/' . $photoDatabase['photo']);
            }
            $photo = $photoBaru->getRandomName();
            $photoBaru->move('assets/img-pengguna/', $photo);
        }

        $data_2 = [
            'tanggal_lahir' => htmlspecialchars(trim($this->request->getVar('tanggal_lahir'))),
            'no_hp' => htmlspecialchars(trim($this->request->getVar('no_hp'))),
            'jenis_kelamin' => htmlspecialchars(trim($this->request->getVar('jenis_kelamin'))),
            'status' => htmlspecialchars(trim($this->request->getVar('status'))),
            'photo' => $photo
        ];
        $this->pengguna_m->editProfilPengguna_2($id, $data_2);
        session()->setFlashdata('alerts', 'Profil Berhasil Diubah');
        return redirect()->to('/pengguna');
    }
    public function simpan_bookmark($buku_id)
    {
        $id = session()->get('id');
        $data_pengajuan = $this->masuk_m->find($id);
        if ($data_pengajuan['status_pengajuan_member'] != 3) {
            session()->setFlashdata('danger', 'Anda belum menjadi member maca tongsir');
        } else {
            if ($data_pengajuan['status_ketersediaan_buku'] != 0 && $data_pengajuan['status_ketersediaan_buku'] != 3) {
                session()->setFlashdata('danger', 'Anda Sedang Mengajukan Peminjaman');
            } else {
                if ($this->pengguna_m->ambilBookmark()->countAllResults() == 3) {
                    session()->setFlashdata('danger', 'Maksimal Meminjam 3 Buku');
                } else {
                    $data = [
                        'user_id' => $id,
                        'buku_id' => $buku_id,
                        'judul'   => htmlspecialchars(trim($this->request->getVar('judul'))),
                        'isbn_issn' => htmlspecialchars(trim($this->request->getVar('isbn_issn'))),
                        'author'   => htmlspecialchars(trim($this->request->getVar('author'))),
                        'image'   => htmlspecialchars(trim($this->request->getVar('image'))),
                    ];
                    $this->pengguna_m->simpanBookmark($data);
                    session()->setFlashdata('alerts', 'Buku Berhasil Dimasukkan ke bookmark');
                }
            }
        }
        return redirect()->to('/');
    }
    public function simpan_bookmarks($buku_id)
    {
        $id = session()->get('id');
        $data_pengajuan = $this->masuk_m->find($id);
        $buku = $this->buku_m->bukuMacatongsir(null, $buku_id)->get()->getRowArray();
        if ($data_pengajuan['status_pengajuan_member'] != 3) {
            session()->setFlashdata('danger', 'Anda belum menjadi member maca tongsir');
        } else {
            if ($data_pengajuan['status_ketersediaan_buku'] != 0 && $data_pengajuan['status_ketersediaan_buku'] != 3) {
                session()->setFlashdata('danger', 'Anda Sedang Mengajukan Peminjaman');
            } else {
                if ($this->pengguna_m->ambilBookmark()->countAllResults() == 3) {
                    session()->setFlashdata('danger', 'Maksimal Meminjam 3 Buku');
                } else {
                    $data = [
                        'user_id' => $id,
                        'buku_id' => $buku['kode_buku'],
                        'judul'   => $buku['judul'],
                        'isbn_issn' => $buku['isbn_issn'],
                        'author'   => $buku['author'],
                        'image'   => $buku['photo'],
                    ];
                    $this->pengguna_m->simpanBookmark($data);
                    session()->setFlashdata('alerts', 'Buku Berhasil Dimasukkan ke bookmark');
                }
            }
        }
        return redirect()->to('/home/daftar-buku');
    }
    public function hapus_bookmark($buku_id)
    {
        $statusBuku = $this->pengguna_m->cekHapusBookmark($buku_id, session()->get('id'))->get()->getRowArray();
        $pengguna = $this->masuk_m->auth_pengguna();
        if ($statusBuku['status'] != 3 && $pengguna['status_ketersediaan_buku'] == 0) {
            $id = session()->get('id');
            $this->pengguna_m->hapusBookmark($buku_id, $id);
            session()->setFlashdata('alerts', 'Buku Berhasil Dihapus');
            return redirect()->to('/pengguna/peminjaman-buku');
        } else {
            session()->setFlashdata('danger', 'Buku Tidak Ditemukan');
            return redirect()->to('/pengguna/peminjaman-buku');
        }
    }
    public function simpan_periksa_ketersediaan()
    {
        $cekStatus = $this->pengguna_m->ambilTutupPeminjaman()->get()->getRowArray();
        if (!$cekStatus) {
            $id = session()->get('id');
            $bookmark = $this->pengguna_m->ambilBookmark()->get()->getRowArray();
            if (empty($bookmark)) {
                session()->setFlashdata('danger', 'Tidak ada buku yang ingin diperiksa');
                return redirect()->to('/pengguna/peminjaman-buku');
            }
            $ubahStatus = ['status_ketersediaan_buku' => 1];
            $this->pengguna_m->ubahStatusPeminjaman($id, $ubahStatus);
            session()->setFlashdata('alerts', 'Buku anda berhasil diajukan');
            return redirect()->to('/pengguna/peminjaman-buku');
        } else {
            session()->setFlashdata('danger', 'Peminjaman buku tidak tersedia');
            return redirect()->to('/pengguna/peminjaman-buku');
        }
    }
    public function simpan_form_kegiatan($kode_kegiatan)
    {
        $tutup = $this->kegiatan_m->where('kegiatan_selesai <', date('Y-m-d'))->where('kode_kegiatan', $kode_kegiatan)->first();
        $kodeTidakDitemukan = $this->kegiatan_m->where('kode_kegiatan', $kode_kegiatan)->find();
        if ($tutup || empty($kodeTidakDitemukan)) {
            session()->setFlashdata('danger', 'kegiatan tidak ditemukan');
            return redirect()->to('/home/kegiatan');
        }
        if (!$this->validate('formulir_kegiatan')) {
            session()->setFlashdata('danger', 'Terdapat kesalahan atau cek kembali formulir anda');
            return redirect()->to('/home/kegiatan/' . $kode_kegiatan)->withInput();
        } elseif ($this->kegiatan_m->ambilFormulirKegiatan()->countAllResults() == 3) {
            session()->setFlashdata('danger', 'Maksimal mengikuti kegiatan 3 kali');
            return redirect()->to('/home/kegiatan/' . $kode_kegiatan);
        }
        $ambilFormulir = $this->kegiatan_m->ambilFormulirKegiatan($kode_kegiatan)->get()->getResultArray();
        if ($ambilFormulir) {
            session()->setFlashdata('danger', 'Anda sudah mendaftar');
            return redirect()->to('/home/kegiatan/' . $kode_kegiatan);
        }
        $data = [
            'user_id' => session()->get('id'),
            'kode_kegiatan' => $kode_kegiatan,
            'nama_peserta' => htmlspecialchars(trim($this->request->getVar('nama_peserta'))),
            'email_peserta' => htmlspecialchars(trim($this->request->getVar('email_peserta'))),
            'no_hp_peserta' => htmlspecialchars(trim($this->request->getVar('no_hp_peserta'))),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ];
        $this->kegiatan_m->insertFormulirKegiatan($data);
        session()->setFlashdata('alerts', 'Formulir Berhasil Dikirim');
        return redirect()->to('/home/kegiatan/' . $kode_kegiatan);
    }
    public function batalkan_form_kegiatan($kode_kegiatan)
    {
        $tutup = $this->kegiatan_m->ambilFormulirUser(session()->get('id'));
        $kodeTidakDitemukan = $this->kegiatan_m->where('kode_kegiatan', $kode_kegiatan)->find();
        if ($tutup['kode_kegiatan'] != $kode_kegiatan || empty($kodeTidakDitemukan)) {
            session()->setFlashdata('danger', 'kegiatan tidak ditemukan');
            return redirect()->to('/home/kegiatan');
        }
        $this->kegiatan_m->batalkanFormulirKegiatan($kode_kegiatan);
        session()->setFlashdata('alerts', 'Formulir Berhasil Dibatalkan');
        return redirect()->to('/home/kegiatan/' . $kode_kegiatan);
    }
    public function kegiatan()
    {
        foreach ($this->pengguna_m->apiCovid() as $api) {
            $dataApiCovid = $api;
        }
        $data = [
            'judul' => 'TBM Macatongsir | Kegiatan Anda',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'bookmark' => $this->pengguna_m->ambilBookmark()->get()->getResultArray(),
            'jumlah_bookmark' => $this->pengguna_m->ambilBookmark()->countAllResults(),
            'kegiatan' => $this->kegiatan_m->ambilFormulirKegiatan()->get()->getResultArray(),
            'jml_kegiatan' => $this->kegiatan_m->ambilFormulirKegiatan()->countAllResults(),
            'apiCovid' => $dataApiCovid,
        ];
        return view('pengguna/penggunaPages/halaman_kegiatan', $data);
    }
    public function hapus_kegiatan($kode_kegiatan)
    {
        $tutup = $this->kegiatan_m->ambilFormulirUser(session()->get('id'));
        $kodeTidakDitemukan = $this->kegiatan_m->where('kode_kegiatan', $kode_kegiatan)->find();
        if ($tutup['kode_kegiatan'] != $kode_kegiatan || empty($kodeTidakDitemukan)) {
            session()->setFlashdata('danger', 'kegiatan tidak ditemukan');
            return redirect()->to('/pengguna/kegiatan');
        }
        $this->kegiatan_m->batalkanFormulirKegiatan($kode_kegiatan);
        session()->setFlashdata('alerts', 'Formulir Beerhasil Dihapus');
        return redirect()->to('/pengguna/kegiatan/');
    }
    public function donasi()
    {
        foreach ($this->pengguna_m->apiCovid() as $api) {
            $dataApiCovid = $api;
        }
        $data = [
            'judul' => 'TBM Macatongsir | Buat Donasi',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'bookmark' => $this->pengguna_m->ambilBookmark()->get()->getResultArray(),
            'jumlah_bookmark' => $this->pengguna_m->ambilBookmark()->countAllResults(),
            'validasi' => \Config\Services::validation(),
            'donasi' => $this->pengguna_m->ambilDonasi(1),
            'ucapan' => $this->pengguna_m->ambilDonasi(2),
            'apiCovid' => $dataApiCovid,
        ];
        return view('pengguna/penggunaPages/halaman_donasi', $data);
    }
    public function simpan_donasi()
    {
        if (!$this->validate('donasi')) {
            return redirect()->to('/pengguna/donasi')->withInput();
        }
        $data = [
            'user_id' => session()->get('id'),
            'nama' => htmlspecialchars(trim($this->request->getVar('nama'))),
            'email' => htmlspecialchars(trim($this->request->getVar('email'))),
            'no_hp' => htmlspecialchars(trim($this->request->getVar('no_hp'))),
            'alamat' => htmlspecialchars(trim($this->request->getVar('alamat'))),
            'donasi' => htmlspecialchars(trim($this->request->getVar('donasi'))),
            'keterangan' => htmlspecialchars(trim($this->request->getVar('keterangan'))),
            'status' => 1,
            'created_at' => date('Y-m-d h:i:s'),
        ];
        $this->pengguna_m->simpanDonasi($data);
        session()->setFlashdata('alerts', 'Formulir berhasil kirim');
        return redirect()->to('/pengguna/donasi/');
    }
}
