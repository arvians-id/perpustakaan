<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $registrasiPengguna = [
		'nama_lengkap' => [
			'rules' => 'required|alpha_space',
			'errors' => [
				'required' => 'Nama tidak boleh kosong',
				'alpha_space' => 'Nama tidak boleh mengandung selain alfabet',
			]
		],
		'email' => [
			'rules' => 'required|is_unique[tb_pengguna.email]|valid_email',
			'errors' => [
				'required' => 'Email tidak boleh kosong',
				'is_unique' => 'Email sudah terdaftar',
				'valid_email' => 'Email tidak valid'
			]
		],
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
	];
	public $masukPengguna = [
		'email' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Email tidak boleh kosong',
			]
		],
		'password' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Password tidak boleh kosong',
			]
		],
	];

	public $edit_profil = [
		'nama_lengkap' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama tidak boleh kosong'
			]
		],
		'tanggal_lahir' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Tanggal_lahir tidak boleh kosong'
			]
		],
		'no_hp' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'No Handphone tidak boleh kosong'
			]
		],
		'photo' => [
			'rules'	=> 'max_size[photo, 1024]|is_image[photo]|mime_in[photo,image/png,image/jpg,image/jpeg]',
			'errors' => [
				'max_size' => 'Photo Max 1MB',
				'is_image' => 'Yang anda upload bukan photo',
				'mime_in' => 'Yang anda upload bukan photo',
			]
		],
	];

	public $ubah_password = [
		'cpassword' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Password tidak boleh kosong',
			]
		],
		'npassword' => [
			'rules' => 'required|matches[rpassword]|min_length[6]',
			'errors' => [
				'required' => 'Password tidak boleh kosong',
				'min_length' => 'password harus lebih dari 6',
				'matches' => 'password tidak sama'
			]
		],
		'rpassword' => [
			'rules' => 'required|matches[npassword]|min_length[6]',
			'errors' => [
				'required' => 'Password tidak boleh kosong',
				'min_length' => 'password harus lebih dari 6 huruf',
				'matches' => 'password tidak sama'
			]
		],
	];

	public $pengajuan_member = [
		'nama_lengkap' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama tidak boleh kosong',
			]
		],
		'email' => [
			'rules' => 'required|valid_email',
			'errors' => [
				'required' => 'Email tidak boleh kosong',
				'valid_email' => 'Email tidak valid'
			]
		],
		'no_hp' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'No Handphone tidak boleh kosong'
			]
		],
		'provinsi' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Provinsi tidak boleh kosong'
			]
		],
		'kota' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Kota tidak boleh kosong'
			]
		],
		'kecamatan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Kecamatan tidak boleh kosong'
			]
		],
		'alamat' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Alamat tidak boleh kosong'
			]
		],
		'pesan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Pesan tidak boleh kosong'
			]
		],
		'photo_ktp_kartu_pelajar' => [
			'rules'	=> 'uploaded[photo_ktp_kartu_pelajar]|max_size[photo_ktp_kartu_pelajar, 1024]|is_image[photo_ktp_kartu_pelajar]|mime_in[photo_ktp_kartu_pelajar,image/png,image/jpg,image/jpeg]',
			'errors' => [
				'uploaded' => 'photo tanda pengenal tidak boleh kosong',
				'max_size' => 'Photo Max 1MB',
				'is_image' => 'Yang anda upload bukan photo',
				'mime_in' => 'Yang anda upload bukan photo',
			]
		],
	];
	public $buat_kegiatan = [
		'judul' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Judul tidak boleh kosong',
			]
		],
		'mentor' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Pementor tidak boleh kosong',
			]
		],
		'kuota' => [
			'rules' => 'numeric|permit_empty',
			'errors' => [
				'numeric' => 'Kolom hanya boleh di isi angka',
			]
		],
		'biaya' => [
			'rules' => 'numeric|permit_empty',
			'errors' => [
				'numeric' => 'Kolom hanya boleh di isi angka',
			]
		],
		'tempat' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Tempat kegiatan tidak boleh kosong',
			]
		],
		'no_hp_pementor' => [
			'rules' => 'required|numeric|max_length[12]',
			'errors' => [
				'required' => 'No Hp Pementor tidak boleh kosong',
				'numeric' => 'Kolom hanya boleh di isi angka',
				'max_length' => 'No Hp tidak boleh lebih dari 12'
			]
		],
		'kegiatan_dimulai' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Jadwal Kegiatan tidak boleh kosong',
			]
		],
		'kegiatan_selesai' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Jadwal Kegiatan tidak boleh kosong',
			]
		],
		'isi' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Isi Kegiatan tidak boleh kosong',
			]
		],
		'photo' => [
			'rules'	=> 'max_size[photo, 1024]|is_image[photo]|mime_in[photo,image/png,image/jpg,image/jpeg]',
			'errors' => [
				'max_size' => 'Photo Max 1MB',
				'is_image' => 'Yang anda upload bukan photo',
				'mime_in' => 'Yang anda upload bukan photo',
			]
		],
	];
	public $artikel = [
		'judul' => [
			'rules' => 'required|is_unique[tb_artikel.judul]',
			'errors' => [
				'required' => 'Judul tidak boleh kosong',
				'is_unique' => 'Juduk sudah ada'
			]
		],
		'isi' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Isi Kegiatan tidak boleh kosong',
			]
		],
		'kategori' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Kategori Kegiatan tidak boleh kosong',
			]
		],
		'photo' => [
			'rules'    => 'uploaded[photo]|max_size[photo, 1024]|is_image[photo]|mime_in[photo,image/png,image/jpg,image/jpeg]',
			'errors' => [
				'uploaded' => 'photo cover tidak boleh kosong',
				'max_size' => 'Photo Max 1MB',
				'is_image' => 'Yang anda upload bukan photo',
				'mime_in' => 'Yang anda upload bukan photo',
			]
		],
	];
	public $formulir_kegiatan = [
		'nama_peserta' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama Peserta tidak boleh kosong',
			]
		],
		'email_peserta' => [
			'rules' => 'required|valid_email',
			'errors' => [
				'required' => 'Email Peserta tidak boleh kosong',
				'valid_email' => 'Email tidak valid'
			]
		],
		'no_hp_peserta' => [
			'rules' => 'required|numeric|max_length[12]|min_length[10]',
			'errors' => [
				'required' => 'No Handphone Peserta tidak boleh kosong',
				'numeric' => 'No handphone hanya berupa angka',
				'min_length' => 'Jumlah no handphone tidak sesuai',
				'max_length' => 'Jumlah no handphone tidak sesuai',
			]
		],
	];
	public $donasi = [
		'nama' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama Donatur tidak boleh kosong',
			]
		],
		'email' => [
			'rules' => 'required|valid_email',
			'errors' => [
				'required' => 'Email Donatur tidak boleh kosong',
				'valid_email' => 'Email tidak valid'
			]
		],
		'no_hp' => [
			'rules' => 'required|numeric|max_length[12]|min_length[10]',
			'errors' => [
				'required' => 'No Handphone Donatur tidak boleh kosong',
				'numeric' => 'No handphone hanya berupa angka',
				'min_length' => 'Jumlah no handphone tidak sesuai',
				'max_length' => 'Jumlah no handphone tidak sesuai',
			]
		],
		'alamat' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Alamat Donatur tidak boleh kosong',
			]
		],
		'donasi' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Donasi tidak boleh kosong',
			]
		],
		'keterangan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Keterangan Donasi tidak boleh kosong',
			]
		],
	];
	public $buku_macatongsir = [
		'kode_buku' => [
			'rules' => 'required|is_unique[tb_buku_macatongsir.kode_buku]',
			'errors' => [
				'required' => 'Kode buku tidak boleh kosong',
				'is_unique' => 'Kode buku sudah ada'
			]
		],
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
			'rules'	=> 'uploaded[photo]|max_size[photo, 1024]|is_image[photo]|mime_in[photo,image/png,image/jpg,image/jpeg]',
			'errors' => [
				'uploaded' => 'Photo cover buku tidak boleh kosong',
				'max_size' => 'Photo Max 1MB',
				'is_image' => 'Yang anda upload bukan photo',
				'mime_in' => 'Yang anda upload bukan photo',
			]
		],
		'kategori' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Kategori buku tidak boleh kosong',
			]
		],
	];
}
