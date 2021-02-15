<?php

namespace App\Controllers;

use App\Models\Home_model;
use App\Models\Masuk_model;
use App\Models\Tabel_kegiatan;
use App\Models\Tabel_buku;

class Home extends BaseController
{
	protected $home_m, $masuk_m, $kegiatan_m, $buku_m;
	public function __construct()
	{
		$this->home_m = new Home_model();
		$this->masuk_m = new Masuk_model();
		$this->kegiatan_m = new Tabel_kegiatan();
		$this->buku_m = new Tabel_buku();
	}
	public function index()
	{
		$keywords = str_replace(' ', '+', $this->request->getVar('keywords'));
		$kategori = str_replace(' ', '+', $this->request->getVar('kategori'));
		if ($keywords) {
			$buku = $this->home_m->apiBuku($keywords);
		} elseif ($kategori) {
			$buku = $this->home_m->apiBuku($kategori);
		} else {
			$buku = $this->home_m->apiLimitBuku(20);
		}
		$data = [
			'judul' => 'TBM Macatongsir | Halaman Utama',
			'pengguna'  => $this->masuk_m->auth_pengguna(),
			'buku' => $buku,
			'bookmark' => $this->home_m->ambilBookmark()->get()->getResultArray(),
			'jumlah_bookmark' => $this->home_m->ambilBookmark()->countAllResults(),
			'buku_macatongsir' => $this->buku_m->orderBy('id', 'desc')->findAll(6),
			'kategori_buku' => $this->home_m->ambilBukuKategori()->get()->getResultArray(),
			'apiCovid' => $this->home_m->apiCovid()
		];
		return view('home/homePages/halaman_utama', $data);
	}
	public function buku($id)
	{
		$buku = $this->home_m->apiDetailBuku($id);
		$data = [
			'judul'     => ucwords($buku->title),
			'pengguna'  => $this->masuk_m->auth_pengguna(),
			'bookmark' => $this->home_m->ambilBookmark()->get()->getResultArray(),
			'jumlah_bookmark' => $this->home_m->ambilBookmark()->countAllResults(),
			'apiDetailBuku'   => $buku,
			'favorit_buku' => $this->buku_m->orderBy('status', 'desc')->findAll(6),
			'kategori_buku' => $this->home_m->ambilBukuKategori()->get()->getResultArray(),
			'apiCovid' => $this->home_m->apiCovid()
		];
		return view('home/homePages/halaman_detailBuku', $data);
	}
	public function panduan_peminjaman()
	{
		$data = [
			'judul'     => 'TBM Macatongsir | Panduan Peminjaman',
			'pengguna'  => $this->masuk_m->auth_pengguna(),
			'bookmark' => $this->home_m->ambilBookmark()->get()->getResultArray(),
			'jumlah_bookmark' => $this->home_m->ambilBookmark()->countAllResults(),
			'apiYoutube' => $this->home_m->apiYoutube(),
			'apiVideoYoutube' => $this->home_m->apiVideoYoutube(),
			'apiCovid' => $this->home_m->apiCovid()
		];
		return view('home/homePages/halaman_panduanPeminjaman', $data);
	}
	public function artikel($slug = null)
	{
		if ($slug != null) {
			$artikelTidakDitemukan = $this->home_m->where('slug', $slug)->find();
			if (empty($artikelTidakDitemukan)) {
				session()->setFlashdata('danger', 'artikel tidak ditemukan');
				return redirect()->to('/home/artikel');
			}
			$data = [
				'judul'     => ucwords(str_replace('-', ' ', $slug)),
				'pengguna'  => $this->masuk_m->auth_pengguna(),
				'bookmark' => $this->home_m->ambilBookmark()->get()->getResultArray(),
				'jumlah_bookmark' => $this->home_m->ambilBookmark()->countAllResults(),
				'artikel'   => $this->home_m->where('slug', $slug)->first(),
				'semuaArtikel' => $this->home_m->limit(3)->where('slug !=', $slug)->find(),
				'artikel_lainnya' => $this->home_m->artikelLainnya(4),
				'kategori'  => $this->home_m->ambilKategori(),
				'apiCovid' => $this->home_m->apiCovid()
			];
			return view('home/homePages/halaman_detailArtikel', $data);
		}
		$data = [
			'judul'     => 'TBM Macatongsir | Artikel',
			'pengguna'  => $this->masuk_m->auth_pengguna(),
			'bookmark' => $this->home_m->ambilBookmark()->get()->getResultArray(),
			'jumlah_bookmark' => $this->home_m->ambilBookmark()->countAllResults(),
			'artikel'   => $this->home_m->orderBy('id', 'DESC')->paginate(12, 'artikel'),
			'limit_artikel' => $this->home_m->limit(4)->find(),
			'pager' => $this->home_m->pager,
			'kategori'  => $this->home_m->ambilKategori(),
			'apiCovid' => $this->home_m->apiCovid()
		];
		return view('home/homePages/halaman_artikel', $data);
	}
	public function kategori($kategori)
	{
		$data = [
			'judul'     => 'TBM Macatongsir | Kategori' . $kategori,
			'pengguna'  => $this->masuk_m->auth_pengguna(),
			'bookmark' => $this->home_m->ambilBookmark()->get()->getResultArray(),
			'jumlah_bookmark' => $this->home_m->ambilBookmark()->countAllResults(),
			'artikel'   => $this->home_m->where('kategori', $kategori)->paginate(12, 'artikel'),
			'jumlah_artikel'   => $this->home_m->where('kategori', $kategori)->countAllResults(),
			'pager' => $this->home_m->pager,
			'jenis_kategori' => $kategori,
			'kategori'  => $this->home_m->ambilKategori(),
			'apiCovid' => $this->home_m->apiCovid()
		];
		return view('home/homePages/halaman_kategoriArtikel', $data);
	}
	public function kegiatan($kode_kegiatan = null)
	{
		if ($kode_kegiatan != null) {
			$kodeTidakDitemukan = $this->kegiatan_m->where('kode_kegiatan', $kode_kegiatan)->find();
			if (empty($kodeTidakDitemukan)) {
				session()->setFlashdata('danger', 'kegiatan tidak ditemukan');
				return redirect()->to('/home/kegiatan');
			}
			if ($this->kegiatan_m->where('kegiatan_selesai <', date('Y-m-d'))->where('kode_kegiatan', $kode_kegiatan)->first()) {
				$status = 'Ditutup';
			} elseif ($this->kegiatan_m->where('kegiatan_dimulai >', date('Y-m-d'))->where('kode_kegiatan', $kode_kegiatan)->first()) {
				$status = 'Daftar Sekarang';
			} elseif ($this->kegiatan_m->where('kegiatan_dimulai <=', date('Y-m-d'))->where('kegiatan_selesai >=', date('Y-m-d'))->where('kode_kegiatan', $kode_kegiatan)->first()) {
				$status = 'Daftar Sekarang';
			}
			$cekFormulir = $this->kegiatan_m->ambilFormulirKegiatan($kode_kegiatan)->get()->getResultArray();
			$detKegiatan = $this->kegiatan_m->where('kode_kegiatan', $kode_kegiatan)->first();
			$data = [
				'judul'     => ucwords($detKegiatan['judul']),
				'pengguna'  => $this->masuk_m->auth_pengguna(),
				'bookmark' => $this->home_m->ambilBookmark()->get()->getResultArray(),
				'jumlah_bookmark' => $this->home_m->ambilBookmark()->countAllResults(),
				'kegiatan'	=> $detKegiatan,
				'validasi'	=> \Config\Services::validation(),
				'status' => $status,
				'cek_formulir' => $cekFormulir,
				'apiCovid' => $this->home_m->apiCovid()

			];
			return view('home/homePages/halaman_detailKegiatan', $data);
		}
		$data = [
			'judul'     => 'TBM Macatongsir | Kegiatan Macatongsir',
			'pengguna'  => $this->masuk_m->auth_pengguna(),
			'bookmark' => $this->home_m->ambilBookmark()->get()->getResultArray(),
			'jumlah_bookmark' => $this->home_m->ambilBookmark()->countAllResults(),
			'jml_keg_berlalu' => $this->kegiatan_m->where('kegiatan_selesai <', date('Y-m-d'))->countAllResults(),
			'jml_keg_mendatang' => $this->kegiatan_m->where('kegiatan_dimulai >', date('Y-m-d'))->countAllResults(),
			'jml_keg_aktif' => $this->kegiatan_m->where('kegiatan_dimulai <=', date('Y-m-d'))->where('kegiatan_selesai >=', date('Y-m-d'))->countAllResults(),
			'kegiatan_aktif_1' => $this->kegiatan_m->where('kegiatan_dimulai <=', date('Y-m-d'))->where('kegiatan_selesai >=', date('Y-m-d'))->first(),
			'kegiatan_aktif' => $this->kegiatan_m->where('kegiatan_dimulai <=', date('Y-m-d'))->where('kegiatan_selesai >=', date('Y-m-d'))->paginate(5, 'kegiatan_aktif'),
			'kegiatan_berlalu' => $this->kegiatan_m->where('kegiatan_selesai <', date('Y-m-d'))->orderBy('kegiatan_selesai', 'desc')->paginate(5, 'kegiatan_berlalu'),
			'pager' => $this->kegiatan_m->pager,
			'kegiatan_mendatang' => $this->kegiatan_m->where('kegiatan_dimulai >', date('Y-m-d'))->orderBy('kegiatan_dimulai', 'asc')->paginate(5, 'kegiatan_mendatang'),
			'pagers' => $this->kegiatan_m->pager,
			'apiCovid' => $this->home_m->apiCovid()
		];
		return view('home/homePages/halaman_kegiatan', $data);
	}
	public function daftar_buku($kode_buku = null)
	{
		$keywords = $this->request->getVar('keywords');
		$kategori = $this->request->getVar('kategori');
		if ($keywords) {
			$buku = $this->buku_m->bukuMacatongsir($keywords);
		} elseif ($kategori) {
			$buku = $this->buku_m->cariKategori($kategori);
		} else {
			$buku = $this->buku_m;
		}
		if ($kode_buku != null) {
			$this->buku_m->viewerBuku($kode_buku);
			$buku = $buku->bukuMacatongsir(null, $kode_buku)->get()->getRowArray();
			$data = [
				'judul' => ucwords($buku['judul']),
				'pengguna'  => $this->masuk_m->auth_pengguna(),
				'bookmark' => $this->home_m->ambilBookmark()->get()->getResultArray(),
				'jumlah_bookmark' => $this->home_m->ambilBookmark()->countAllResults(),
				'buku_macatongsir' => $buku,
				'favorit_buku' => $this->buku_m->orderBy('status', 'desc')->findAll(6),
				'kategori_buku' => $this->home_m->ambilBukuKategori()->get()->getResultArray(),
				'apiCovid' => $this->home_m->apiCovid()

			];
			if (empty($data['buku_macatongsir'])) {
				throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku dengan kode ' . $kode_buku . ' Tidak Ditemukan');
			}
			return view('/home/homePages/halaman_detailBukuMacatongsir', $data);
		}
		$data = [
			'judul' => 'TBM Macatongsir | Daftar Buku Macatongsir',
			'pengguna'  => $this->masuk_m->auth_pengguna(),
			'bookmark' => $this->home_m->ambilBookmark()->get()->getResultArray(),
			'jumlah_bookmark' => $this->home_m->ambilBookmark()->countAllResults(),
			'buku_macatongsir' => $buku->paginate(4, 'buku_macatongsir'),
			'favorit_buku' => $this->buku_m->orderBy('status', 'desc')->findAll(6),
			'kategori_buku' => $this->home_m->ambilBukuKategori()->get()->getResultArray(),
			'pager' => $buku->pager,
			'apiCovid' => $this->home_m->apiCovid()
		];
		return view('/home/homePages/halaman_daftarBuku', $data);
	}
	public function macatongsir($tahun = null, $bulan = null)
	{
		if ($tahun != null) {
			$donasi = $this->home_m->ambilDonasi(2, $tahun, null)->get()->getResultArray();
			$donasiJumlah = $this->home_m->ambilDonasi(2, $tahun, null)->countAllResults();
			if ($bulan != null) {
				$donasi = $this->home_m->ambilDonasi(2, $tahun, $bulan)->get()->getResultArray();
				$donasiJumlah = $this->home_m->ambilDonasi(2, $tahun, $bulan)->countAllResults();
			}
		} else {
			$donasi = $this->home_m->ambilDonasi(2)->get()->getResultArray();
			$donasiJumlah = $this->home_m->ambilDonasi(2)->countAllResults();
		}
		$data = [
			'judul' => 'TBM Macatongsir | Profil Macatongsir',
			'pengguna'  => $this->masuk_m->auth_pengguna(),
			'bookmark' => $this->home_m->ambilBookmark()->get()->getResultArray(),
			'jumlah_bookmark' => $this->home_m->ambilBookmark()->countAllResults(),
			'jumlah_donasi' => $donasiJumlah,
			'donasi' => $donasi,
			'tahun' => $tahun,
			'bulan' => $bulan,
			'apiCovid' => $this->home_m->apiCovid()
		];
		return view('/home/homePages/halaman_macatongsir', $data);
	}
	public function faq()
	{
		$data = [
			'judul'     => 'TBM Macatongsir | FAQ',
			'pengguna'  => $this->masuk_m->auth_pengguna(),
			'bookmark' => $this->home_m->ambilBookmark()->get()->getResultArray(),
			'jumlah_bookmark' => $this->home_m->ambilBookmark()->countAllResults(),
			'apiCovid' => $this->home_m->apiCovid()
		];
		return view('home/homePages/halaman_faq', $data);
	}
	public function download()
	{
		$data = [
			'judul'     => 'TBM Macatongsir | Panduan Pengguna Macatongsir',
			'pengguna'  => $this->masuk_m->auth_pengguna(),
			'bookmark' => $this->home_m->ambilBookmark()->get()->getResultArray(),
			'jumlah_bookmark' => $this->home_m->ambilBookmark()->countAllResults(),
			'apiCovid' => $this->home_m->apiCovid()
		];
		return view('home/homePages/download_pdf', $data);
	}
}
