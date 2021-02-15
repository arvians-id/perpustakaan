<?php

namespace App\Models;

use CodeIgniter\Model;

class Tabel_buku extends Model
{
    protected $table = 'tb_buku_macatongsir';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_buku', 'judul', 'isbn_issn', 'bahasa', 'deskripsi', 'author', 'status', 'photo', 'kategori', 'created_at', 'updated_at'];

    public function bukuMacatongsir($cari_buku = null, $kode_buku = null)
    {
        $builder = $this->table('tb_buku_macatongsir');
        if ($cari_buku != null) {
            $builder->like('kode_buku', $cari_buku);
            $builder->orLike('judul', $cari_buku);
            $builder->orLike('isbn_issn', $cari_buku);
            $builder->orLike('author', $cari_buku);
            $builder->orLike('deskripsi', $cari_buku);
            $builder->orLike('kategori', $cari_buku);
        } elseif ($kode_buku != null) {
            $builder->where('kode_buku', $kode_buku);
        }
        return $builder;
    }
    public function viewerBuku($kode_buku)
    {
        $pengguna = $this->db->table('tb_buku_macatongsir');

        $pengguna->set('status', 'status+1', FALSE);
        $pengguna->where('kode_buku', $kode_buku);
        $pengguna->update();
    }
    // Baru
    public function cariKategori($cari_buku = null)
    {
        $builder = $this->table('tb_buku_macatongsir');
        $builder->like('kategori', $cari_buku);
        $builder->orLike('judul', $cari_buku);
        $builder->orLike('isbn_issn', $cari_buku);
        $builder->orLike('author', $cari_buku);
        $builder->orLike('deskripsi', $cari_buku);
        $builder->orLike('kategori', $cari_buku);
        return $builder;
    }
}
