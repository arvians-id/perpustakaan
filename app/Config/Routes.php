<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Halaman Utama
$routes->get('/home', 'home::index');
$routes->get('/home/panduan-peminjaman', 'Home::panduan_peminjaman');
$routes->get('/home/panduan_peminjaman', 'App\Errors::show404');
$routes->get('/home/daftar-buku', 'Home::daftar_buku');
$routes->get('/home/daftar_buku', 'App\Errors::show404');
$routes->get('/home/daftar-buku/(:segment)', 'Home::daftar_buku/$1');
$routes->get('/home/daftar_buku/(:segment)', 'App\Errors::show404');

// Halaman Masuk/Registrasi
$routes->group('masuk', ['filter' => 'noauth'], function ($routes) {
	$routes->get('lupa-password', 'Masuk::lupa_password', ['filter' => 'noauth']);
	$routes->get('lupa_password', 'App\Errors::show404', ['filter' => 'noauth']);
	$routes->get('/', 'Masuk::index', ['filter' => 'noauth']);
	$routes->get('registrasi', 'Masuk::registrasi', ['filter' => 'noauth']);
});

// Halaman Pengguna
$routes->get('/pengguna/ubah_password', 'App\Errors::show404', ['filter' => 'auth']);
$routes->get('/pengguna/ubah_profil', 'App\Errors::show404', ['filter' => 'auth']);
$routes->get('/pengguna/peminjaman_buku', 'App\Errors::show404', ['filter' => 'auth']);
$routes->group('pengguna', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Pengguna::index', ['filter' => 'auth']);
	$routes->match(['get', 'put'], 'ubah-password', 'Pengguna::ubah_password', ['filter' => 'auth']);
	$routes->match(['get', 'put'], 'ubah-profil', 'Pengguna::ubah_profil', ['filter' => 'auth']);
	$routes->get('peminjaman-buku', 'Pengguna::peminjaman_buku', ['filter' => 'auth']);
	$routes->get('kegiatan', 'Pengguna::kegiatan', ['filter' => 'auth']);
	$routes->post('simpan_bookmark', 'Pengguna::simpan_bookmark', ['filter' => 'auth']);
	$routes->post('simpan_bookmark/(:any)', 'Pengguna::simpan_bookmark/$1', ['filter' => 'auth']);
	$routes->post('simpan_bookmarks', 'Pengguna::simpan_bookmarks', ['filter' => 'auth']);
	$routes->post('simpan_bookmarks/(:any)', 'Pengguna::simpan_bookmarks/$1', ['filter' => 'auth']);
	$routes->match(['get', 'delete'], 'hapus_bookmark', 'Pengguna::hapus_bookmark', ['filter' => 'auth']);
	$routes->match(['get', 'delete'], 'hapus_bookmark/(:any)', 'Pengguna::hapus_bookmark/$1', ['filter' => 'auth']);
	$routes->post('simpan_form_kegiatan', 'Pengguna::simpan_form_kegiatan', ['filter' => 'auth']);
	$routes->post('simpan_form_kegiatan/(:any)', 'Pengguna::simpan_form_kegiatan/$1', ['filter' => 'auth']);
	$routes->match(['get', 'delete'], 'batalkan_form_kegiatan', 'Pengguna::batalkan_form_kegiatan', ['filter' => 'auth']);
	$routes->match(['get', 'delete'], 'batalkan_form_kegiatan/(:any)', 'Pengguna::batalkan_form_kegiatan/$1', ['filter' => 'auth']);
	$routes->match(['get', 'delete'], 'hapus_kegiatan', 'Pengguna::hapus_kegiatan', ['filter' => 'auth']);
	$routes->match(['get', 'delete'], 'hapus_kegiatan/(:any)', 'Pengguna::hapus_kegiatan/$1', ['filter' => 'auth']);
	$routes->get('donasi', 'Pengguna::donasi', ['filter' => 'auth']);
	$routes->post('simpan_donasi', 'Pengguna::simpan_donasi', ['filter' => 'auth']);
});

// Halaman Admin
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Admin::index');
	$routes->get('daftar_member', 'Admin::daftar_member');
	$routes->get('buku_macatongsir', 'Admin::buku_macatongsir');
	$routes->get('buku_macatongsir/(:any)', 'Admin::buku_macatongsir/$1');
	$routes->get('buat_buku', 'Admin::buat_buku');
	$routes->post('simpan_buku', 'Admin::simpan_buku');
	$routes->get('ubah_bukuMacatongsir', 'Admin::ubah_bukuMacatongsir');
	$routes->get('ubah_bukuMacatongsir/(:any)', 'Admin::ubah_bukuMacatongsir/$1');
	$routes->match(['get', 'put'], 'simpan_ubah_bukuMacatongsir', 'Admin::simpan_ubah_bukuMacatongsir');
	$routes->match(['get', 'put'], 'simpan_ubah_bukuMacatongsir/(:any)', 'Admin::simpan_ubah_bukuMacatongsir/$1');
	$routes->match(['get', 'delete'], 'hapus_buku', 'Admin::hapus_buku');
	$routes->match(['get', 'delete'], 'hapus_buku/(:any)', 'Admin::hapus_buku/$1');
	$routes->get('donasi', 'Admin::donasi');
	$routes->match(['get', 'delete'], 'hapus_donatur', 'Admin::hapus_donatur');
	$routes->match(['get', 'delete'], 'hapus_donatur/(:any)', 'Admin::hapus_donatur/$1');
	$routes->get('modal_ubah_donatur', 'Admin::modal_ubah_donatur');
	$routes->match(['get', 'put'], 'simpan_ubah_donasi', 'Admin::simpan_ubah_donasi');
	$routes->match(['get', 'put'], 'simpan_ubah_donasi/(:any)', 'Admin::simpan_ubah_donasi/$1');
	$routes->get('modal_proses_donasi', 'Admin::modal_proses_donasi');
	$routes->match(['get', 'put'], 'simpan_donasi', 'Admin::simpan_donasi');
	$routes->match(['get', 'put'], 'simpan_donasi/(:num)', 'Admin::simpan_donasi/$1');
	$routes->get('buku', 'Admin::buku');
	$routes->get('buku/(:any)', 'Admin::buku/$1');
	$routes->get('dalam_proses_peminjaman', 'Admin::dalam_proses_peminjaman');
	$routes->get('detail_dalam_proses_peminjaman', 'Admin::detail_dalam_proses_peminjaman');
	$routes->get('detail_dalam_proses_peminjaman/(:any)', 'Admin::detail_dalam_proses_peminjaman/$1');
	$routes->match(['get', 'put'], 'peminjaman_selesai', 'Admin::peminjaman_selesai');
	$routes->match(['get', 'put'], 'peminjaman_selesai/(:any)', 'Admin::peminjaman_selesai/$1');
	$routes->match(['get', 'put'], 'batalkan_proses_peminjaman', 'Admin::batalkan_proses_peminjaman');
	$routes->match(['get', 'put'], 'batalkan_proses_peminjaman/(:any)', 'Admin::batalkan_proses_peminjaman/$1');
	$routes->get('detail_ketersediaan', 'Admin::detail_ketersediaan');
	$routes->get('detail_ketersediaan/(:any)', 'Admin::detail_ketersediaan/$1');
	$routes->get('modal_proses_peminjaman', 'Admin::modal_proses_peminjaman');
	$routes->match(['get', 'put', 'post'], 'simpan_peminjaman', 'Admin::simpan_peminjaman');
	$routes->match(['get', 'put', 'post'], 'simpan_peminjaman/(:any)', 'Admin::simpan_peminjaman/$1');
	$routes->match(['get', 'put'], 'simpan_ajukan_ulang', 'Admin::simpan_ajukan_ulang');
	$routes->match(['get', 'put'], 'simpan_ajukan_ulang/(:any)', 'Admin::simpan_ajukan_ulang/$1');
	$routes->match(['get', 'put'], 'simpan_tersedia', 'Admin::simpan_tersedia');
	$routes->match(['get', 'put'], 'simpan_tidak_tersedia', 'Admin::simpan_tersedia');
	$routes->get('riwayat_peminjaman', 'Admin::riwayat_peminjaman');
	$routes->get('riwayat_peminjaman/(:any)', 'Admin::riwayat_peminjaman/$1');
	$routes->get('daftar_admin', 'Admin::daftar_admin');
	$routes->get('profil', 'Admin::profil');
	$routes->match(['get', 'put'], 'edit_profil', 'Admin::edit_profil');
	$routes->match(['get', 'put'], 'ubah_password', 'Admin::ubah_password');
	$routes->get('daftar_member', 'Admin::daftar_member');
	$routes->match(['get', 'put'], 'simpan_ubah_level_admin', 'Admin::simpan_ubah_level_admin');
	$routes->match(['get', 'put'], 'simpan_ubah_level_admin/(:any)', 'Admin::simpan_ubah_level_admin/$1');
	$routes->match(['get', 'delete'], 'hapus_penggunaMember', 'Admin::hapus_penggunaMember');
	$routes->match(['get', 'delete'], 'hapus_penggunaMember/(:any)', 'Admin::hapus_penggunaMember/$1');
	$routes->get('modal_lihatDataVerif', 'Admin::modal_lihatDataVerif');
	$routes->match(['get', 'put', 'delete'], 'hapus_penggunaMemberVerif', 'Admin::hapus_penggunaMemberVerif');
	$routes->match(['get', 'put', 'delete'], 'hapus_penggunaMemberVerif/(:any)', 'Admin::hapus_penggunaMemberVerif/$1');
	$routes->get('pengajuan_member', 'Admin::pengajuan_member');
	$routes->get('modal_pengajuan', 'Admin::modal_pengajuan');
	$routes->get('modal_tolak_pengajuan', 'Admin::modal_tolak_pengajuan');
	$routes->match(['get', 'put', 'delete'], 'simpan_tolakPengajuan', 'Admin::simpan_tolakPengajuan');
	$routes->match(['get', 'put', 'delete'], 'simpan_tolakPengajuan/(:any)', 'Admin::simpan_tolakPengajuan/$1');
	$routes->match(['get', 'delete'], 'simpan_setujuPengajuan', 'Admin::simpan_setujuPengajuan');
	$routes->match(['get', 'delete'], 'simpan_setujuPengajuan/(:any)', 'Admin::simpan_setujuPengajuan/$1');
	$routes->post('buat_kategori', 'Admin::buat_kategori');
	$routes->match(['get', 'delete'], 'hapus_kategori', 'Admin::hapus_kategori');
	$routes->match(['get', 'delete'], 'hapus_kategori/(:any)', 'Admin::hapus_kategori/$1');
	$routes->get('buat_artikel', 'Admin::buat_artikel');
	$routes->get('upload_image_artikel', 'Admin::upload_image_artikel');
	$routes->get('delete_image_artikel', 'Admin::delete_image_artikel');
	$routes->post('simpan_artikel', 'Admin::simpan_artikel');
	$routes->get('artikel', 'Admin::artikel');
	$routes->get('artikel/(:any)', 'Admin::artikel/$1');
	$routes->get('ubah_artikel', 'Admin::ubah_artikel');
	$routes->get('ubah_artikel/(:any)', 'Admin::ubah_artikel/$1');
	$routes->match(['get', 'put'], 'simpan_ubah_artikel', 'Admin::simpan_ubah_artikel');
	$routes->match(['get', 'put'], 'simpan_ubah_artikel/(:any)', 'Admin::simpan_ubah_artikel/$1');
	$routes->match(['get', 'delete'], 'hapus_artikel', 'Admin::hapus_artikel');
	$routes->match(['get', 'delete'], 'hapus_artikel/(:any)', 'Admin::hapus_artikel/$1');
	$routes->get('kegiatan', 'Admin::kegiatan');
	$routes->get('kegiatan/(:any)', 'Admin::kegiatan/$1');
	$routes->match(['get', 'delete'], 'hapus_kegiatan', 'Admin::hapus_kegiatan');
	$routes->match(['get', 'delete'], 'hapus_kegiatan/(:any)', 'Admin::hapus_kegiatan/$1');
	$routes->get('buat_kegiatan', 'Admin::buat_kegiatan');
	$routes->post('simpan_kegiatan', 'Admin::simpan_kegiatan');
	$routes->get('ubah_kegiatan', 'Admin::ubah_kegiatan');
	$routes->get('ubah_kegiatan/(:any)', 'Admin::ubah_kegiatan/$1');
	$routes->match(['get', 'put'], 'simpan_ubah_kegiatan', 'Admin::simpan_ubah_kegiatan');
	$routes->match(['get', 'put'], 'simpan_ubah_kegiatan/(:any)', 'Admin::simpan_ubah_kegiatan/$1');
	$routes->get('konfigurasi_website', 'Admin::konfigurasi_website');
	$routes->get('konfigurasi_website/(:any)', 'Admin::konfigurasi_website/$1');
	$routes->get('simpan_tutup_peminjaman', 'Admin::simpan_tutup_peminjaman');
	$routes->get('buka_peminjaman', 'Admin::buka_peminjaman');
});


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
