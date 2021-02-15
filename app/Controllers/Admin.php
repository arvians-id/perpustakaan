<?php

namespace App\Controllers;

use App\Models\Masuk_model;
use App\Models\Admin_model;
use App\Models\Home_model;
use App\Models\Tabel_buku;
use App\Models\Tabel_kegiatan;

class Admin extends BaseController
{
    protected $masuk_m, $admin_m, $home_m, $kegiatan_m, $buku_m;
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->masuk_m = new Masuk_model();
        $this->admin_m = new Admin_model();
        $this->home_m = new Home_model();
        $this->kegiatan_m = new Tabel_kegiatan();
        $this->buku_m = new Tabel_buku();
    }
    // MENU DASHBOARD ==============================================================================================================================================
    // halaman utama
    public function index()
    {
        $data = [
            'judul'     => 'TBM Macatongsir | Home',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'jmlMember'  => $this->admin_m->ambilDataPengguna(2, null)->countAllResults(),
            'jmlBuku' => $this->buku_m->countAllResults(),
            'jmlPeminjaman' => $this->admin_m->ambilRiwayatPeminjaman()->countAllResults(),
            'jmlDonasi' => $this->admin_m->ambilDonasi(2)->countAllResults(),
        ];
        return view('admin/adminPages/halaman_awal', $data);
    }
    // MENU MANAGEMENT BUKU
    // Buat Buku Macatongsir
    // Daftar Buku Macatongsir
    public function buku_macatongsir($kode_buku = null)
    {
        if ($kode_buku != null) {
            $data = [
                'judul'     => 'TBM Macatongsir | Detail Buku Macatongsir',
                'pengguna'  => $this->masuk_m->auth_pengguna(),
                'buku_macatongsir' => $this->buku_m->bukuMacatongsir(null, $kode_buku)->get()->getRowArray()
            ];
            return view('admin/adminPages/halaman_detailBukuMacatongsir', $data);
        }
        $data = [
            'judul'     => 'TBM Macatongsir | Daftar Buku Macatongsir',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'buku_macatongsir' => $this->buku_m->findAll()
        ];
        return view('admin/adminPages/halaman_bukuMacatongsir', $data);
    }
    public function buat_buku()
    {
        $ambilKode = $this->admin_m->ambilKodeBuku();
        $nourut = substr($ambilKode['kode_buku'], 4, 4);
        $kode_kegiatan = $nourut + 1;
        $data = [
            'judul'     => 'TBM Macatongsir | Buat Buku Macatongsir',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'kategori_buku' => $this->admin_m->ambilKategoriBuku()->get()->getResultArray(),
            'validasi'  => \Config\Services::validation(),
            'kode_buku' => $kode_kegiatan
        ];
        return view('admin/adminPages/halaman_buatBuku', $data);
    }
    public function simpan_buku()
    {
        if (!$this->validate('buku_macatongsir')) {
            return redirect()->to('/admin/buat_buku')->withInput();
        }
        $photo = $this->request->getFile('photo');
        $namaPhoto = $photo->getRandomName();
        $photo->move('assets/img-buku', $namaPhoto);

        $data = [
            'kode_buku' => htmlspecialchars(trim($this->request->getVar('kode_buku'))),
            'judul' => htmlspecialchars(trim($this->request->getVar('judul'))),
            'isbn_issn' => htmlspecialchars(trim($this->request->getVar('isbn_issn'))),
            'bahasa' => htmlspecialchars(trim($this->request->getVar('bahasa'))),
            'deskripsi' => htmlspecialchars(trim($this->request->getVar('deskripsi'))),
            'author' => htmlspecialchars(trim($this->request->getVar('author'))),
            'status' => 0,
            'photo' => $namaPhoto,
            'kategori' => htmlspecialchars(trim($this->request->getVar('kategori'))),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ];
        $this->buku_m->save($data);
        session()->setFlashdata('alerts', 'Buku Berhasil Ditambahkan');
        return redirect()->to('/admin/buku_macatongsir');
    }
    public function ubah_bukuMacatongsir($kode_buku)
    {
        $data = [
            'judul'     => 'TBM Macatongsir | Ubah Buku Macatongsir',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'kategori_buku' => $this->admin_m->ambilKategoriBuku()->get()->getResultArray(),
            'validasi'  => \Config\Services::validation(),
            'buku_macatongsir' => $this->admin_m->bukuMacatongsir($kode_buku)->get()->getRowArray()
        ];
        return view('admin/adminPages/halaman_ubahBuku', $data);
    }
    public function simpan_ubah_bukuMacatongsir($kode_buku)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul buku tidak boleh kosong',
                ]
            ],
            'isbn_issn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ISSN/ISBN tidak boleh kosong',
                ]
            ],
            'bahasa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bahasa tidak boleh kosong',
                ]
            ],
            'author' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Author tidak boleh kosong',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi tidak boleh kosong',
                ]
            ],
            'photo' => [
                'rules'    => 'max_size[photo, 1024]|is_image[photo]|mime_in[photo,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Photo Max 1MB',
                    'is_image' => 'Yang anda upload bukan photo',
                    'mime_in' => 'Yang anda upload bukan photo',
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kategori tidak boleh kosong',
                ]
            ],
        ])) {
            return redirect()->to('/admin/ubah_bukuMacatongsir/' . $kode_buku)->withInput();
        }
        $photo = $this->request->getFile('photo');
        $cekDatabase = $this->admin_m->bukuMacatongsir($kode_buku)->get()->getRowArray();
        if ($photo->getError() == 4) {
            $photoBuku = $cekDatabase['photo'];
        } else {
            unlink('assets/img-buku/' . $cekDatabase['photo']);
            $photoBuku = $photo->getRandomName();
            $photo->move('assets/img-buku/', $photo);
        }

        $data = [
            'kode_buku' => $cekDatabase['kode_buku'],
            'judul' => htmlspecialchars(trim($this->request->getVar('judul'))),
            'isbn_issn' => htmlspecialchars(trim($this->request->getVar('isbn_issn'))),
            'bahasa' => htmlspecialchars(trim($this->request->getVar('bahasa'))),
            'deskripsi' => htmlspecialchars(trim($this->request->getVar('deskripsi'))),
            'author' => htmlspecialchars(trim($this->request->getVar('author'))),
            'status' => 0,
            'photo' => $photoBuku,
            'kategori' => htmlspecialchars(trim($this->request->getVar('kategori'))),
            'created_at' => $cekDatabase['created_at'],
            'updated_at' => date('Y-m-d h:i:s'),
        ];
        $this->admin_m->ubahBuku($kode_buku, $data);
        session()->setFlashdata('alerts', 'Buku Berhasil Diubah');
        return redirect()->to('/admin/buku_macatongsir');
    }
    public function hapus_buku($kode_buku)
    {
        $cekDatabase = $this->admin_m->bukuMacatongsir($kode_buku)->get()->getRowArray();
        unlink('assets/img-buku/' . $cekDatabase['photo']);
        $buku_id = $this->admin_m->cekBukuBookmark($kode_buku)->get()->getResultArray();
        if ($buku_id) {
            $this->admin_m->cekBukuBookmark($kode_buku)->delete();
        }
        $this->admin_m->hapusBuku($kode_buku);
        session()->setFlashdata('alerts', 'Buku Berhasil Dihapus');
        return redirect()->to('/admin/buku_macatongsir');
    }
    public function buat_kategori_buku()
    {
        $kategori = ['kategori' => htmlspecialchars(trim($this->request->getVar('kategori_baru')))];
        $this->admin_m->insertKategoriBuku($kategori);
        session()->setFlashdata('alerts', 'Kategori Berhasil Ditambahkan');
        return redirect()->to('/admin/buat_buku');
    }
    public function hapus_kategori_buku($id)
    {
        $this->admin_m->ambilKategoriBuku($id)->delete();
        session()->setFlashdata('alerts', 'Kategori Berhasil Dihapus');
        return redirect()->to('/admin/buat_buku');
    }
    // Daftar Orang Yang Ingin Donasi Buku
    public function donasi()
    {
        $data = [
            'judul'     => 'TBM Macatongsir | Donasi',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'donasi_proses' => $this->admin_m->ambilDonasi(1)->get()->getResultArray(),
            'donasi_verif' => $this->admin_m->ambilDonasi(2)->get()->getResultArray(),
            'validasi' => \Config\Services::validation()
        ];
        return view('admin/adminPages/halaman_donasi', $data);
    }
    public function hapus_donatur($id)
    {
        $photoDatabase = $this->admin_m->ambilDonasi(null, $id)->get()->getRowArray();
        if ($photoDatabase['photo_donatur']) {
            if ($photoDatabase['photo_donatur'] != 'anonim.png') {
                unlink('assets/img-donatur/' . $photoDatabase['photo_donatur']);
            }
        }
        $this->admin_m->hapusDonatur($id);
        session()->setFlashdata('alerts', 'Donatur Berhasil Dihapus');
        return redirect()->to('/admin/donasi');
    }
    public function modal_ubah_donatur()
    {
        $id = $this->request->getVar('id');
        $data = [
            'donasi' => $this->admin_m->ambilDonasi(2, $id)->get()->getRowArray(),
        ];
        $view = [
            'sukses' => view('admin/adminPages/modal/modal_ubahDonatur', $data),
            'donasi_verif' => $this->admin_m->ambilDonasi(2, $id)->get()->getRowArray(),
        ];
        echo json_encode($view);
    }
    public function simpan_ubah_donasi($id)
    {
        if (!$this->validate([
            'photo_donatur' => [
                'rules'  => 'max_size[photo_donatur, 1024]|is_image[photo_donatur]|mime_in[photo_donatur,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Photo Max 1MB',
                    'is_image' => 'Yang anda upload bukan photo',
                    'mime_in' => 'Yang anda upload bukan photo',
                ]
            ],
        ])) {
            session()->setFlashdata('danger', 'Terjadi kesalahan atau cek ulang formulir');
            return redirect()->to('/admin/donasi')->withInput();
        }
        $nama = $this->request->getVar('nama');
        $photoBaru = $this->request->getFile('photo_donatur');
        $cekDatabase = $this->admin_m->ambilDonasi(2, $id)->get()->getRowArray();
        if (empty($nama)) {
            $nama = 'Anonim';
        }
        if ($photoBaru->getError() == 4) {
            $photo = $cekDatabase['photo_donatur'];
        } else {
            if ($cekDatabase['photo_donatur'] != 'anonim.png') {
                unlink('assets/img-donatur/' . $cekDatabase['photo_donatur']);
            }
            $photo = $photoBaru->getRandomName();
            $photoBaru->move('assets/img-donatur/', $photo);
        }
        $data = [
            'nama' => $nama,
            'status' => 2,
            'tanggal_terima' => $cekDatabase['tanggal_terima'],
            'photo_donatur' => $photo,
        ];
        $this->admin_m->ubahStatusDonasi($id, $data);
        session()->setFlashdata('alerts', 'Data Donatur Berhasil Diubah');
        return redirect()->to('/admin/donasi');
    }
    public function modal_proses_donasi()
    {
        $id = $this->request->getVar('id');
        $data = [
            'donasi' => $this->admin_m->ambilDonasi(1, $id)->get()->getRowArray(),
        ];
        $view = [
            'sukses' => view('admin/adminPages/modal/modal_prosesDonasi', $data),
            'donasi_proses' => $this->admin_m->ambilDonasi(1, $id)->get()->getRowArray(),
        ];
        echo json_encode($view);
    }
    public function simpan_donasi($id)
    {
        if (!$this->validate([
            'photo_donatur' => [
                'rules'  => 'max_size[photo_donatur, 1024]|is_image[photo_donatur]|mime_in[photo_donatur,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Photo Max 1MB',
                    'is_image' => 'Yang anda upload bukan photo',
                    'mime_in' => 'Yang anda upload bukan photo',
                ]
            ],
            'tanggal_terima' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal terima donasi tidak boleh kosong',
                ]
            ],

        ])) {
            session()->setFlashdata('danger', 'Terjadi kesalahan atau cek ulang formulir');
            return redirect()->to('/admin/donasi')->withInput();
        }
        $nama = $this->request->getVar('nama');
        $photoBaru = $this->request->getFile('photo_donatur');
        if (empty($nama)) {
            $nama = 'Anonim';
        }
        if ($photoBaru->getError() == 4) {
            $photo = 'anonim.png';
        } else {
            $photo = $photoBaru->getRandomName();
            $photoBaru->move('assets/img-donatur/', $photo);
        }
        $data = [
            'nama' => $nama,
            'status' => 2,
            'tanggal_terima' => htmlspecialchars(trim($this->request->getVar('tanggal_terima'))),
            'photo_donatur' => $photo,
        ];
        $this->admin_m->ubahStatusDonasi($id, $data);
        session()->setFlashdata('alerts', 'Data Berhasil Diupload');
        return redirect()->to('/admin/donasi');
    }
    // halaman daftar semua buku
    public function buku($id = null)
    {
        if ($id != null) {
            $data = [
                'judul'     => 'TBM Macatongsir | Detail Buku',
                'pengguna'  => $this->masuk_m->auth_pengguna(),
                'apiDetailBuku'   => $this->admin_m->apiDetailBuku($id)
            ];
            return view('admin/adminPages/halaman_detailBuku', $data);
        }
        $data = [
            'judul'     => 'TBM Macatongsir | Daftar Buku',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'apiBuku'   => $this->admin_m->apiBuku()
        ];
        return view('admin/adminPages/halaman_daftarBuku', $data);
    }
    public function dalam_proses_peminjaman()
    {
        $data = [
            'judul'     => 'TBM Macatongsir | Pengajuan Peminjaman',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'member_pengajuan'    => $this->admin_m->ambilDataPengajuanPeminjaman(2, 3, 1),
            'member_menunggu'    => $this->admin_m->ambilDataStatus(2, 3, null, 4)->where('e.tanggal_dibawa >', date('Y-m-d'))->get()->getResultArray(),
            'member_meminjam'    => $this->admin_m->ambilDataStatus(2, 3, null, 4)->where('e.tanggal_dibawa <=', date('Y-m-d'))->where('e.tanggal_dikembalikan >', date('Y-m-d'))->get()->getResultArray(),
            'member_telat'    => $this->admin_m->ambilDataStatus(2, 3, null, 4)->where('e.tanggal_dikembalikan <=', date('Y-m-d'))->get()->getResultArray(),
        ];
        return view('admin/adminPages/halaman_dalamProsesPeminjaman', $data);
    }
    public function detail_dalam_proses_peminjaman($id)
    {
        $data = [
            'judul'     => 'TBM Macatongsir | Detail Peminjaman',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'pengguna_pengajuan' => $this->admin_m->ambilDataPengajuan($id),
            'member'    => $this->admin_m->ambilDataPenggunaSatuBaris($id),
            'buku'      => $this->admin_m->ambilBookmark($id)->get()->getResultArray(),
            'data_pinjam' => $this->admin_m->ambilSatuBarisPinjaman($id),
            'member_menunggu'    => $this->admin_m->ambilDataStatus(2, 3, $id, 4)->where('e.tanggal_dibawa >', date('Y-m-d'))->get()->getRowArray(),
            'member_meminjam'    => $this->admin_m->ambilDataStatus(2, 3, $id, 4)->where('e.tanggal_dibawa <=', date('Y-m-d'))->where('e.tanggal_dikembalikan >', date('Y-m-d'))->get()->getRowArray(),
            'member_telat'    => $this->admin_m->ambilDataStatus(2, 3, $id, 4)->where('e.tanggal_dikembalikan <=', date('Y-m-d'))->get()->getRowArray(),
        ];
        return view('admin/adminPages/halaman_detailProsesPeminjaman', $data);
    }
    public function peminjaman_selesai($id)
    {
        $ubahStatusPengguna = [
            'status_ketersediaan_buku' => 0
        ];
        $ubahStatusBuku = [
            'status' => 3,
            'created_at' => date('Y-m-d h:i:s')
        ];
        $this->admin_m->ubahStatusPeminjaman($id, $ubahStatusPengguna);
        $this->admin_m->ubahStatusBukuUser($id, $ubahStatusBuku);
        $this->admin_m->peminjaman($id);
        session()->setFlashdata('alerts', 'Peminjaman buku berhasil diselesaikan');
        return redirect()->to('/admin/dalam_proses_peminjaman');
    }
    public function batalkan_proses_peminjaman($id)
    {
        $statusPeminjaman = [
            'status_ketersediaan_buku' => 3,
        ];
        $this->admin_m->ubahStatusPeminjaman($id, $statusPeminjaman);
        $this->admin_m->peminjaman($id);
        session()->setFlashdata('alerts', 'Data Berhasil Dibatalkan');
        return redirect()->to('/admin/dalam_proses_peminjaman');
    }
    public function detail_ketersediaan($id)
    {
        $data = [
            'judul'     => 'TBM Macatongsir | Detail Ketersediaan Buku',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'member_pengajuan' => $this->admin_m->ambilDataPengajuan($id),
            'member'    => $this->admin_m->ambilDataPengajuanPeminjaman(2, 3, 1),
            'buku'      => $this->admin_m->ambilBookmark($id)->get()->getResultArray(),
            'jumlah_bookmark' => $this->admin_m->ambilBookmark($id)->countAllResults(),
        ];
        if ($this->admin_m->ambilDataPengajuanPeminjaman(2, 3, 1)) {
            return view('admin/adminPages/halaman_detailKetersediaan', $data);
        } else {
            return redirect()->to('/admin/dalam_proses_peminjaman');
        }
    }
    public function modal_proses_peminjaman()
    {
        $id = $this->request->getVar('id');
        $data = [
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'pengajuan' => $this->admin_m->ambilDataPengajuan($id)
        ];

        $view = [
            'sukses' => view('admin/adminPages/modal/modal_peminjaman', $data),
            'buku_dipinjam_tersedia' =>  $this->admin_m->ambilDataBukuPengajuanPeminjaman($id, 1)->get()->getResultArray(),
            'buku_dipinjam_tdk_tersedia' =>  $this->admin_m->ambilDataBukuPengajuanPeminjaman($id, 2)->get()->getResultArray(),
            'peminjam' => $this->admin_m->ambilDataPengajuan($id)
        ];
        echo json_encode($view);
    }
    public function simpan_peminjaman($id)
    {
        $cekTersedia = $this->admin_m->periksaKetersediaanSimpan(0);
        if ($cekTersedia) {
            session()->setFlashdata('danger', 'Data masih ada yang belum diperiksa');
            return redirect()->to('/admin/detail_ketersediaan/' . $id);
        }
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'user_id' => $id,
            'tanggal_input' => date('Y-m-d'),
            'tanggal_dibawa' => htmlspecialchars(trim($this->request->getVar('tanggal_dibawa'))),
            'tanggal_dikembalikan' => htmlspecialchars(trim($this->request->getVar('tanggal_dikembalikan')))
        ];
        $statusPeminjaman = [
            'status_ketersediaan_buku' => 4
        ];
        $this->admin_m->insertPeminjaman($data);
        $this->admin_m->ubahStatusPeminjaman($id, $statusPeminjaman);
        session()->setFlashdata('alerts', 'Data Berhasil Diproses');
        return redirect()->to('/admin/dalam_proses_peminjaman');
    }
    public function simpan_ajukan_ulang($id)
    {
        $cekTersedia = $this->admin_m->periksaKetersediaanSimpan(0);
        if ($cekTersedia) {
            session()->setFlashdata('danger', 'Data masih ada yang belum diperiksa');
            return redirect()->to('/admin/detail_ketersediaan/' . $id);
        }
        $statusPeminjaman = ['status_ketersediaan_buku' => 3];
        $this->admin_m->ubahStatusPeminjaman($id, $statusPeminjaman);
        session()->setFlashdata('alerts', 'Data Berhasil Diproses');
        return redirect()->to('/admin/dalam_proses_peminjaman');
    }
    public function simpan_tersedia($buku_id, $user_id, $id)
    {
        $ubahStatusBook = ['status' => 2];
        $this->admin_m->ubahStatusBuku($buku_id, $ubahStatusBook, $user_id, $id);
        return redirect()->to('/admin/detail_ketersediaan/' . $user_id);
    }
    public function simpan_tidak_tersedia($buku_id, $user_id, $id)
    {
        $ubahStatusBook = ['status' => 1];
        $this->admin_m->ubahStatusBuku($buku_id, $ubahStatusBook, $user_id, $id);
        return redirect()->to('/admin/detail_ketersediaan/' . $user_id);
    }
    public function riwayat_peminjaman($id = null)
    {
        if ($id != null) {
            $data = [
                'judul'     => 'TBM Macatongsir | Detail Riwayat Peminjaman',
                'pengguna'  => $this->masuk_m->auth_pengguna(),
                'riwayat_peminjaman' => $this->admin_m->ambilRiwayat($id)->get()->getResultArray(),
                'member' => $this->admin_m->ambilRiwayat($id)->get()->getRowArray(),
                'r_bulan_ini' => $this->admin_m->ambilTotalRiwayat($id)->where("DATE_FORMAT(created_at, '%m')", date('m'))->countAllResults(),
                'r_tahun_ini' => $this->admin_m->ambilTotalRiwayat($id)->where("DATE_FORMAT(created_at, '%Y')", date('Y'))->countAllResults(),
                'r_total' => $this->admin_m->ambilTotalRiwayat($id)->countAllResults(),
            ];
            return view('admin/adminPages/halaman_detailRiwayatPeminjaman', $data);
        }
        $data = [
            'judul'     => 'TBM Macatongsir | Daftar Riwayat Peminjaman',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'riwayat_peminjaman' => $this->admin_m->ambilRiwayat()->get()->getResultArray(),
        ];
        return view('admin/adminPages/halaman_riwayatPeminjaman', $data);
    }
    // MENU MANAGEMENT PENGGUNA ===================================================================================================================================
    // SUB MENU ADMIN ------------------------------------------------------------------------------------------------
    // daftar semua admin
    public function daftar_admin()
    {
        $data = [
            'judul'     => 'TBM Macatongsir | Daftar Admin',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'admin'     => $this->admin_m->ambilDataPengguna(1, null)->get()->getResultArray()
        ];
        return view('admin/adminPages/halaman_daftarAdmin', $data);
    }
    // SUB MENU PROFIL ADMIN ----------------------------------------------------------------------------------------
    // profil admin
    public function profil()
    {
        $data = [
            'judul'     => 'TBM Macatongsir | Profil Admin',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'validasi'  => \Config\Services::validation()
        ];
        return view('admin/adminPages/halaman_profilAdmin', $data);
    }
    // (submit form) edit profil
    public function edit_profil()
    {
        if (!$this->validate('edit_profil')) {
            return redirect()->to('/admin/profil')->withInput();
        }
        $data_1 = [
            'nama_lengkap' => htmlspecialchars(trim($this->request->getVar('nama_lengkap'))),
        ];
        $this->admin_m->editProfilAdmin_1(session()->get('id'), $data_1);

        $photoDatabase = $this->admin_m->ambilProfil(session()->get('id'));
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
        $this->admin_m->editProfilAdmin_2(session()->get('id'), $data_2);
        session()->setFlashdata('alerts', 'Data Berhasil Diubah');
        return redirect()->to('/admin/profil');
    }
    // (submit form) ubah password
    public function ubah_password()
    {
        if (!$this->validate('ubah_password')) {
            return redirect()->to('/admin/profil')->withInput();
        }
        $password_database = $this->masuk_m->find(session()->get('id'));
        $password_lama = $this->request->getVar('cpassword');
        $password_baru = $this->request->getVar('npassword');
        if (password_verify($password_lama, $password_database['password'])) {
            if ($password_baru != $password_lama) {
                $data = [
                    'password' => password_hash($password_baru, PASSWORD_DEFAULT)
                ];
                $this->admin_m->editProfilAdmin_1(session()->get('id'), $data);
                session()->setFlashdata('alerts', 'Password Berhasil Diubah');
                return redirect()->to('/admin/profil');
            } else {
                session()->setFlashdata('danger', 'Password harus berbeda');
                return redirect()->to('/admin/profil');
            }
        } else {
            session()->setFlashdata('danger', 'Password saat ini tidak sama');
            return redirect()->to('/admin/profil');
        }
    }
    // MENU PENGGUNA  =================================================================================================================================================
    // SUB MENU DAFTAR SEMUA MEMBER ----------------------------------------------------------------------------------
    // halaman daftar semua member
    public function daftar_member()
    {
        $data = [
            'judul'     => 'TBM Macatongsir | Daftar Member',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'member'    => $this->admin_m->ambilDataPengguna(2, null)->get()->getResultArray(),
            'member_verif' => $this->admin_m->ambilDataPengguna(2, 3)->get()->getResultArray()
        ];
        return view('admin/adminPages/halaman_daftarMember', $data);
    }
    // public function simpan_ubah_level_admin($id)
    // {
    //     $data = ['role' => 1];
    //     $this->admin_m->editProfilAdmin_1($id, $data);
    //     session()->setFlashdata('alerts', 'Pengguna berhasil diubah menjadi admin');
    //     return redirect()->to('/admin/daftar_admin');
    // }
    // (submit form) hapus pengguna member
    public function hapus_penggunaMember($id)
    {
        $pinjaman = $this->admin_m->ambilSatuBarisPinjaman($id);
        $bookmark = $this->admin_m->ambilBookmark($id);
        $pengajuan = $this->admin_m->ambilDataPengajuan($id);
        $kegiatan = $this->kegiatan_m->ambilFormulirUser($id);
        $profil = $this->admin_m->ambilProfil($id);
        if ($pinjaman && $bookmark && $pengajuan && $kegiatan && $profil) {
            if ($profil['photo'] != 'default.png') {
                unlink('assets/img-pengguna/' . $profil['photo']);
            }
            if ($pengajuan['photo_ktp_kartu_pelajar']) {
                unlink('assets/img-pengajuan/' . $pengajuan['photo_ktp_kartu_pelajar']);
            }
            $this->admin_m->hapusBookmark($id);
            $this->admin_m->peminjaman($id);
            $this->admin_m->hapusPengajuanDitolak($id);
            $this->kegiatan_m->hapusFormulirUser($id);
        }
        $this->admin_m->hapusPengguna($id);
        return redirect()->to('/admin/daftar_member');
    }
    // SUB MENU DAFTAR SEMUA MEMBER TERVERIFIKASI -------------------------------------------------------------------
    // (modal) lihat data member yang sudah menjadi member verifikasi
    public function modal_lihatDataVerif()
    {
        $id = $this->request->getVar('id');
        $data = [
            'judul'     => 'TBM Macatongsir | Pengajuan Member',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'pengajuan' => $this->admin_m->ambilDataPengajuan($id)
        ];

        $view = [
            'sukses' => view('admin/adminPages/modal/modal_dataMemberVerif', $data),
            'pengajuan_1' => $this->admin_m->ambilDataPengajuan($id)
        ];
        echo json_encode($view);
    }
    // (submit form) hapus pengguna member yang sudah menjadi terverifikasi dan ubah status menjadi 1
    public function hapus_penggunaMemberVerif($id)
    {
        $photoDatabase = $this->admin_m->ambilDataPengajuan($id);
        unlink('assets/img-pengajuan/' . $photoDatabase['photo_ktp_kartu_pelajar']);

        $pinjaman = $this->admin_m->ambilSatuBarisPinjaman($id);
        $bookmark = $this->admin_m->ambilBookmark($id);
        if ($pinjaman || $bookmark) {
            $this->admin_m->hapusBookmark($id);
            $this->admin_m->peminjaman($id);
        }
        $this->admin_m->hapusMemberVerif($id);

        $ubahStatus = ['status_pengajuan_member' => 1];
        $this->admin_m->ubahStatusPeminjaman($id, $ubahStatus);
        return redirect()->to('/admin/daftar_member');
    }
    // SUB MENU PENGAJUAN MEMBER TERVERIFIKASI -------------------------------------------------------------------
    // halaman daftar semua member yang ingin mengajukan menjadi member verifikasi
    public function pengajuan_member()
    {
        $id = $this->request->getVar('id_pengguna');
        $data = [
            'judul'     => 'TBM Macatongsir | Pengajuan Member',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'member'    => $this->admin_m->ambilDataMemberPengajuan(2)->get()->getResultArray(),
            'jumlah_proses' => $this->admin_m->ambilDataMemberPengajuan(2)->countAllResults(),
            'jumlah_terverifikasi' => $this->admin_m->ambilDataMemberPengajuan(3)->countAllResults(),
            'jumlah_ditolak' => $this->admin_m->ambilDataTolakPengajuan()->countAllResults(),
            'pengajuan' => $this->admin_m->ambilDataPengajuan($id)
        ];
        return view('admin/adminPages/halaman_pengajuanMember', $data);
    }
    // (modal) lihat data member yang mengajukan menjadi member verifikasi
    public function modal_pengajuan()
    {
        $id = $this->request->getVar('id');
        $data = [
            'judul'     => 'TBM Macatongsir | Pengajuan Member',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'pengajuan' => $this->admin_m->ambilDataPengajuan($id)
        ];

        $view = [
            'sukses' => view('admin/adminPages/modal/modal_pengajuanMember', $data),
            'pengajuan_1' => $this->admin_m->ambilDataPengajuan($id)
        ];
        echo json_encode($view);
    }
    // (modal) tolak member yang mengajukan menjadi member verifikasi
    public function modal_tolak_pengajuan()
    {
        $id = $this->request->getVar('id');
        $data = [
            'judul'     => 'TBM Macatongsir | Pengajuan Member',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'pengajuan' => $this->admin_m->ambilDataPengajuan($id)
        ];

        $view = [
            'sukses' => view('admin/adminPages/modal/modal_pengajuanTolak', $data),
            'pengajuan_1' => $this->admin_m->ambilDataPengajuan($id)
        ];
        echo json_encode($view);
    }
    // (submit form) tolak member yang mengajukan menjadi member verifikasi
    public function simpan_tolakPengajuan($id)
    {
        $data = [
            'user_id' => $id,
            'pesan'   => htmlspecialchars(trim($this->request->getVar('pesan')))
        ];
        $this->admin_m->simpanTolak($data);

        $ubahStatus = ['status_pengajuan_member' => 1];
        $this->admin_m->ubahStatusPeminjaman($id, $ubahStatus);

        $photoDatabase = $this->admin_m->ambilDataPengajuan($id);
        unlink('assets/img-pengajuan/' . $photoDatabase['photo_ktp_kartu_pelajar']);

        $this->admin_m->hapusPengajuanDitolak($id);
        session()->setFlashdata('alerts', 'Data Berhasil Ditanggapi');
        return redirect()->to('/admin/pengajuan_member');
    }
    // (submit form) setujui member yang ingin menjadi member terverifikasi
    public function simpan_setujuPengajuan($id)
    {
        $ubahStatus = ['status_pengajuan_member' => 3];
        $this->admin_m->ubahStatusPeminjaman($id, $ubahStatus);
        session()->setFlashdata('alerts', 'Data Berhasil Diverifikasi');
        return redirect()->to('/admin/pengajuan_member');
    }

    // MENU MANAGEMENT PELAYANAN =================================================================================================================================
    public function buat_kategori()
    {
        $kategori = ['kategori' => htmlspecialchars(trim($this->request->getVar('kategori_baru')))];
        $this->home_m->simpanKategori($kategori);
        session()->setFlashdata('alerts', 'Kategori Berhasil Ditambahkan');
        return redirect()->to('/admin/buat_artikel');
    }
    public function hapus_kategori($id)
    {
        $this->home_m->hapusKategori($id);
        session()->setFlashdata('alerts', 'Kategori Berhasil Dihapus');
        return redirect()->to('/admin/buat_artikel');
    }
    public function buat_artikel()
    {
        $data = [
            'judul'     => 'TBM Macatongsir | Buat Artikel',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'kategori'  => $this->home_m->ambilKategori(),
            'validasi'  => \Config\Services::validation()
        ];
        return view('admin/adminPages/halaman_buatArtikel', $data);
    }
    public function upload_image_artikel()
    {
        $photo = $this->request->getFile('image');
        $namaPhoto = $photo->getRandomName();
        $photo->move('assets/img-artikel/', $namaPhoto);
    }
    public function delete_image_artikel()
    {
        $photo = $this->request->getFile('image');
        $namaPhoto = str_replace(base_url(), '', $photo);
        if (unlink($namaPhoto)) {
            echo 'File Delete Successfully';
        }
    }
    public function simpan_artikel()
    {
        if (!$this->validate('artikel')) {
            return redirect()->to('/admin/buat_artikel')->withInput();
        }
        $photo = $this->request->getFile('photo');
        $namaPhoto = $photo->getRandomName();
        $photo->move('assets/img-artikel', $namaPhoto);

        $judul = htmlspecialchars(trim($this->request->getVar('judul')));
        $slugs = url_title($judul, '-', true);
        $data = [
            'slug' => $slugs,
            'judul' => $judul,
            'isi' => $this->request->getVar('isi'),
            'kategori' => htmlspecialchars(trim($this->request->getVar('kategori'))),
            'photo' => $namaPhoto,
            'status' => 0,
        ];
        $this->_sendEmail('buat_artikel', $judul, $namaPhoto);
        $this->home_m->save($data);
        session()->setFlashdata('alerts', 'Artikel Berhasil Ditambahkan');
        return redirect()->to('/admin/artikel');
    }
    public function artikel($id = null)
    {
        if ($id != null) {
            $data = [
                'judul'     => 'TBM Macatongsir | Detail Artikel',
                'pengguna'  => $this->masuk_m->auth_pengguna(),
                'artikel'   => $this->home_m->find($id)
            ];
            return view('admin/adminPages/halaman_detailArtikel', $data);
        }
        $data = [
            'judul'     => 'TBM Macatongsir | Daftar Artikel',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'artikel'   => $this->home_m->orderBy('id', 'DESC')->find()
        ];
        return view('admin/adminPages/halaman_artikel', $data);
    }
    public function ubah_artikel($id)
    {
        $data = [
            'judul'     => 'TBM Macatongsir | Ubah Artikel',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'artikel'   => $this->home_m->find($id),
            'kategori'  => $this->home_m->ambilKategori(),
            'validasi'  => \Config\Services::validation()
        ];
        return view('admin/adminPages/halaman_ubahArtikel', $data);
    }
    public function simpan_ubah_artikel($id)
    {
        if (!$this->validate([
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Kegiatan tidak boleh kosong',
                ]
            ],
            'judul' => [
                'rules' => "required|is_unique[tb_artikel.judul,id, $id]",
                'errors' => [
                    'required' => 'Judul tidak boleh kosong',
                    'is_unique' => 'Judul sudah ada'
                ]
            ],
            'photo' => [
                'rules'    => 'max_size[photo, 2024]|is_image[photo]|mime_in[photo,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Photo Max 2MB',
                    'is_image' => 'Yang anda upload bukan photo',
                    'mime_in' => 'Yang anda upload bukan photo',
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Kegiatan tidak boleh kosong',
                ]
            ],
        ])) {
            return redirect()->to('/admin/ubah_artikel/' . $id)->withInput();
        }
        $photoDatabase = $this->home_m->find($id);
        $photoBaru = $this->request->getFile('photo');

        if ($photoBaru->getError() == 4) {
            $photo = $photoDatabase['photo'];
        } else {
            unlink('assets/img-artikel/' . $photoDatabase['photo']);
            $photo = $photoBaru->getRandomName();
            $photoBaru->move('assets/img-artikel/', $photo);
        }
        $judul = htmlspecialchars(trim($this->request->getVar('judul')));
        $slugs = url_title($judul, '-', true);
        $data = [
            'id' => $id,
            'slug' => $slugs,
            'judul' => $judul,
            'isi' => $this->request->getVar('isi'),
            'kategori' => htmlspecialchars(trim($this->request->getVar('kategori'))),
            'photo' => $photo,
            'status' => 0,
        ];
        $this->home_m->save($data);
        session()->setFlashdata('alerts', 'Artikel Berhasil Diubah');
        return redirect()->to('/admin/artikel');
    }
    public function hapus_artikel($id)
    {
        $photoDatabase = $this->home_m->find($id);
        unlink('assets/img-artikel/' . $photoDatabase['photo']);

        $this->home_m->delete($id);
        session()->setFlashdata('alerts', 'Artikel Berhasil Dihapus');
        return redirect()->to('/admin/artikel');
    }
    // Menu Acara
    public function kegiatan($kode_kegiatan = null)
    {
        if ($kode_kegiatan != null) {
            $data = [
                'judul'     => 'TBM Macatongsir | Detail Artikel',
                'pengguna'  => $this->masuk_m->auth_pengguna(),
                'kegiatan'  => $this->kegiatan_m->where('kode_kegiatan', $kode_kegiatan)->first()
            ];
            return view('admin/adminPages/halaman_detailKegiatan', $data);
        }
        $data = [
            'judul'     => 'TBM Macatongsir | Daftar Artikel',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'kegiatan_aktif' => $this->kegiatan_m->where('kegiatan_dimulai <=', date('Y-m-d'))->where('kegiatan_selesai >=', date('Y-m-d'))->find(),
            'kegiatan_berlalu' => $this->kegiatan_m->where('kegiatan_selesai <', date('Y-m-d'))->orderBy('kegiatan_selesai', 'desc')->find(),
            'kegiatan_mendatang' => $this->kegiatan_m->where('kegiatan_dimulai >', date('Y-m-d'))->orderBy('kegiatan_dimulai', 'asc')->find(),
        ];
        return view('admin/adminPages/halaman_daftarKegiatan', $data);
    }
    public function hapus_kegiatan($kode_kegiatan)
    {
        $photoDatabase = $this->kegiatan_m->where('kode_kegiatan', $kode_kegiatan)->first();
        if ($photoDatabase['photo']) {
            unlink('assets/img-kegiatan/' . $photoDatabase['photo']);
        }
        if ($this->kegiatan_m->ambilFormulirKegiatan($kode_kegiatan)) {
            $this->kegiatan_m->hapusFormulir($kode_kegiatan);
        }
        $this->kegiatan_m->hapusKegiatan($kode_kegiatan);
        session()->setFlashdata('alerts', 'Kegiatan Berhasil Dihapus');
        return redirect()->to('/admin/kegiatan');
    }
    public function buat_kegiatan()
    {
        $ambilKode = $this->kegiatan_m->ambilKodeKegiatan();
        $nourut = substr($ambilKode['kode'], 4, 4);
        $kode_kegiatan = $nourut + 1;
        $data = [
            'judul'     => 'TBM Macatongsir | Buat Kegiatan',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'validasi'  => \Config\Services::validation(),
            'kode_kegiatan' => $kode_kegiatan
        ];
        return view('admin/adminPages/halaman_buatKegiatan', $data);
    }
    public function simpan_kegiatan()
    {
        if (!$this->validate('buat_kegiatan')) {
            return redirect()->to('/admin/buat_kegiatan')->withInput();
        }
        $photo = $this->request->getFile('photo');
        if ($photo->getError() == 4) {
            $namaPhoto = '';
        } else {
            $namaPhoto = $photo->getRandomName();
            $photo->move('assets/img-kegiatan', $namaPhoto);
        }
        $judul = htmlspecialchars(trim($this->request->getVar('judul')));
        $data = [
            'kode_kegiatan' => htmlspecialchars(trim($this->request->getVar('kode_kegiatan'))),
            'judul' => $judul,
            'mentor' => htmlspecialchars(trim($this->request->getVar('mentor'))),
            'kuota' => htmlspecialchars(trim($this->request->getVar('kuota'))),
            'biaya' => htmlspecialchars(trim($this->request->getVar('biaya'))),
            'tempat' => htmlspecialchars(trim($this->request->getVar('tempat'))),
            'no_hp_pementor' => htmlspecialchars(trim($this->request->getVar('no_hp_pementor'))),
            'kegiatan_dimulai' => htmlspecialchars(trim($this->request->getVar('kegiatan_dimulai'))),
            'kegiatan_selesai' => htmlspecialchars(trim($this->request->getVar('kegiatan_selesai'))),
            'isi' => $this->request->getVar('isi'),
            'photo' => $namaPhoto,
            'status' => 0,
        ];
        $this->_sendEmail('buat_kegiatan', $judul, $namaPhoto);
        $this->kegiatan_m->save($data);
        session()->setFlashdata('alerts', 'Kegiatan Berhasil Ditambahkan');
        return redirect()->to('/admin/kegiatan');
    }
    public function ubah_kegiatan($id)
    {
        $data = [
            'judul'     => 'TBM Macatongsir | Ubah Kegiatan',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
            'validasi'  => \Config\Services::validation(),
            'kegiatan'  => $this->kegiatan_m->find($id),
        ];
        return view('admin/adminPages/halaman_ubahKegiatan', $data);
    }
    public function simpan_ubah_kegiatan($id)
    {
        if (!$this->validate('buat_kegiatan')) {
            return redirect()->to('/admin/ubah_kegiatan/' . $id)->withInput();
        }
        $photoDatabase = $this->kegiatan_m->find($id);
        $photoBaru = $this->request->getFile('photo');

        if ($photoBaru->getError() == 4) {
            $namaPhoto = $photoDatabase['photo'];
        } else {
            if ($photoDatabase['photo']) {
                unlink('assets/img-kegiatan/' . $photoDatabase['photo']);
            }
            $namaPhoto = $photoBaru->getRandomName();
            $photoBaru->move('assets/img-kegiatan/', $namaPhoto);
        }
        $data = [
            'id' => $id,
            'judul' => htmlspecialchars(trim($this->request->getVar('judul'))),
            'mentor' => htmlspecialchars(trim($this->request->getVar('mentor'))),
            'kuota' => htmlspecialchars(trim($this->request->getVar('kuota'))),
            'biaya' => htmlspecialchars(trim($this->request->getVar('biaya'))),
            'tempat' => htmlspecialchars(trim($this->request->getVar('tempat'))),
            'no_hp_pementor' => htmlspecialchars(trim($this->request->getVar('no_hp_pementor'))),
            'kegiatan_dimulai' => htmlspecialchars(trim($this->request->getVar('kegiatan_dimulai'))),
            'kegiatan_selesai' => htmlspecialchars(trim($this->request->getVar('kegiatan_selesai'))),
            'isi' => $this->request->getVar('isi'),
            'photo' => $namaPhoto,
        ];
        $this->kegiatan_m->save($data);
        session()->setFlashdata('alerts', 'Kegiatan Berhasil Ditambahkan');
        return redirect()->to('/admin/kegiatan');
    }
    // Baru
    public function konfigurasi_website($setting = null)
    {
        if ($setting == 'peminjaman_buku') {
            $data = [
                'judul'     => 'TBM Macatongsir | Ubah Status Peminjaman',
                'pengguna'  => $this->masuk_m->auth_pengguna(),
                'validasi'  => \Config\Services::validation(),
                'cekStatus' => $this->admin_m->ambilTutupPeminjaman()->get()->getRowArray(),
            ];
            return view('admin/adminPages/halaman_ubahStatusPeminjaman', $data);
        }
        $data = [
            'judul'     => 'TBM Macatongsir | Konfigurasi Website',
            'pengguna'  => $this->masuk_m->auth_pengguna(),
        ];
        return view('admin/adminPages/halaman_konfigurasiWebsite', $data);
    }
    public function simpan_tutup_peminjaman()
    {
        $data = [
            'tanggal_selesai' => $this->request->getVar('tanggal_selesai'),
            'pesan' => $this->request->getVar('pesan'),
        ];
        $this->admin_m->insertTutupPeminjaman($data);
        session()->setFlashdata('alerts', 'Peminjaman berhasil ditutup');
        return redirect()->to('/admin/konfigurasi_website/peminjaman_buku');
    }
    public function buka_peminjaman()
    {
        $this->admin_m->ambilTutupPeminjaman()->emptyTable('tb_status_peminjaman');
        session()->setFlashdata('alerts', 'Peminjaman berhasil dibuka');
        return redirect()->to('/admin/konfigurasi_website/peminjaman_buku');
    }
    private function _sendEmail($type, $judul, $photo)
    {
        $semuaEmail = $this->masuk_m->where('role', 2)->where('is_active', 1)->findAll();
        foreach ($semuaEmail as $kirimEmail) {
            $email = \Config\Services::email();

            $email->setFrom('macatongsir.id@gmail.com', 'Satu Pustaka');
            $email->setTo($kirimEmail['email']);
            if ($type == 'buat_artikel') {
                $data = [
                    'judul' => $judul,
                    'photo' => $photo,
                    'type'  => $type
                ];
                $email->setSubject('[Macatongsir] Hai Pengguna Macatongsir Ada Artikel Terbaru Loh, Yuk Periksa - Artikel');
                $email->setMessage(view('template_email/sendEmail', $data));
            } elseif ($type == 'buat_kegiatan') {
                $data = [
                    'judul' => $judul,
                    'photo' => $photo,
                    'type'  => $type
                ];
                $email->setSubject('[Macatongsir] Hai Pengguna Macatongsir Ada Kegiatan Terbaru Loh, Yuk Ikut - Kegiatan');
                $email->setMessage(view('template_email/sendEmail', $data));
            }
            $email->send();
        }
    }
}
