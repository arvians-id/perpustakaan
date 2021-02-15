<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model
{
    // API =================================================================================================================================================
    public function apiBuku($keywords = null)
    {
        if ($keywords) {
            $client = \Config\Services::curlrequest();
            $response = $client->request('GET', 'http://perpustakaan.ummi.ac.id/api/index.php/book/?search=' . $keywords);
            $data = json_decode($response->getBody());
            return $data->data;
        }
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', 'http://perpustakaan.ummi.ac.id/api/index.php/book/');
        $data = json_decode($response->getBody());
        return $data->data;
    }
    public function apiLimitBuku()
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', 'http://perpustakaan.ummi.ac.id/api/index.php/book/?limits=12');
        $data = json_decode($response->getBody());
        return $data->data;
    }
    public function apiDetailBuku($id)
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', 'http://perpustakaan.ummi.ac.id/api/index.php/book/?id=' . $id);
        $data = json_decode($response->getBody());
        return $data->data;
    }
    // QUERY DATABASE
    // GET =================================================================================================================================================
    // get data semua tabel pengguna member dan admin, berdasarkan role ada juga berdasarkan status
    public function ambilDataPengguna($role, $statusPeminjaman = null)
    {
        if ($role != null && $statusPeminjaman != null) {
            $builder = $this->db->table("tb_pengguna a");
            $builder->select('*, a.id as id_pengguna, c.keterangan as role_keterangan, d.keterangan as aktif_keterangan');
            $builder->join('tb_profil_pengguna b', 'b.user_id = a.id');
            $builder->join('tb_role_pengguna c', 'c.id = a.role');
            $builder->join('tb_status_aktif d', 'd.id = a.is_active');
            $builder->where('a.role', $role);
            $builder->where('a.status_pengajuan_member', $statusPeminjaman);
            return $builder;
        }
        $builder = $this->db->table("tb_pengguna a");
        $builder->select('*, a.id as id_pengguna, c.keterangan as role_keterangan, d.keterangan as aktif_keterangan');
        $builder->join('tb_profil_pengguna b', 'b.user_id = a.id');
        $builder->join('tb_role_pengguna c', 'c.id = a.role');
        $builder->join('tb_status_aktif d', 'd.id = a.is_active');
        $builder->where('a.role', $role);
        return $builder;
    }
    public function ambilDataPengajuanPeminjaman($role = null, $statusPeminjaman = null, $statusKetersediaan = null)
    {
        $builder = $this->db->table("tb_pengguna a");
        $builder->select('*, a.id as id_pengguna, c.keterangan as role_keterangan, d.keterangan as aktif_keterangan');
        $builder->join('tb_profil_pengguna b', 'b.user_id = a.id');
        $builder->join('tb_role_pengguna c', 'c.id = a.role');
        $builder->join('tb_status_aktif d', 'd.id = a.is_active');
        $builder->where('a.role', $role);
        $builder->where('a.status_pengajuan_member', $statusPeminjaman);
        $builder->where('a.status_ketersediaan_buku', $statusKetersediaan);
        return $builder->get()->getResultArray();
    }
    public function ambilDataStatus($role = null, $statusPeminjaman = null, $user_id = null, $statusKetersediaan = null)
    {
        $builder = $this->db->table("tb_pengguna a");
        $builder->select('*, a.id as id_pengguna');
        $builder->join('tb_profil_pengguna b', 'b.user_id = a.id');
        $builder->join('tb_peminjaman e', 'e.user_id = a.id');
        if ($user_id != null) {
            $builder->where('e.user_id', $user_id);
        }
        $builder->where('a.role', $role);
        $builder->where('a.status_pengajuan_member', $statusPeminjaman);
        $builder->where('a.status_ketersediaan_buku', $statusKetersediaan);
        return $builder;
    }
    public function ambilBookmark($id)
    {
        $builder = $this->db->table('tb_bookmark_member');
        $builder->where('user_id', $id);
        $builder->where('status !=', 3);
        return $builder;
    }
    public function ambilDataBukuPengajuanPeminjaman($id, $status = null)
    {
        if ($status != null) {
            $builder = $this->db->table('tb_bookmark_member');
            $builder->where('user_id', $id);
            $builder->where('status', $status);
            return $builder;
        }
        $builder = $this->db->table('tb_bookmark_member');
        $builder->where('user_id', $id);
        return $builder;
    }
    public function ambilDataPenggunaSatuBaris($id)
    {
        $builder = $this->db->table('tb_pengguna');
        $builder->where('id', $id);
        return $builder->get()->getRowArray();
    }
    // get data satu baris data tabel profil pengguna berdasarkan id
    public function ambilProfil($id)
    {
        return $this->db->table('tb_profil_pengguna')->where('user_id', $id)->get()->getRowArray();
    }
    // get Data member pengajuan namun tidak langsung menggunakan generating query results
    public function ambilDataMemberPengajuan($status)
    {
        $builder = $this->db->table("tb_pengguna a");
        $builder->select('*, a.id as id_pengguna, a.nama_lengkap as nama_pengguna, a.email as email_pengguna, f.created_at as pengajuan_dibuat, c.keterangan as role_keterangan, d.keterangan as aktif_keterangan');
        $builder->join('tb_profil_pengguna b', 'b.user_id = a.id');
        $builder->join('tb_role_pengguna c', 'c.id = a.role');
        $builder->join('tb_status_aktif d', 'd.id = a.is_active');
        $builder->join('tb_pengajuan_member f', 'f.user_id = a.id');
        $builder->where('a.status_pengajuan_member', $status);
        return $builder;
    }
    // get data table pesan penolakan pengajuan member verifikasi
    public function ambilDataTolakPengajuan()
    {
        return $this->db->table('tb_pengajuan_ditolak');
    }
    // get data satu barus table formulir pengajuan member
    public function ambilDataPengajuan($id)
    {
        return $this->db->table('tb_pengajuan_member')->where('user_id', $id)->get()->getRowArray();
    }
    public function periksaKetersediaanSimpan($status)
    {
        $builder = $this->db->table('tb_bookmark_member a');
        $builder->select('a.status');
        $builder->where('a.status', $status);
        $builder->where('a.status !=', 3);
        return $builder->get()->getResultArray();
    }
    public function ambilSatuBarisPinjaman($id)
    {
        return $this->db->table('tb_peminjaman')->where('user_id', $id)->get()->getRowArray();
    }
    public function ambilDonasiPengguna($id)
    {
        return $this->db->table('tb_donasi')->where('user_id', $id)->get()->getResultArray();
    }
    // UPDATE =================================================================================================================================================
    //  edit data pada table pengguna
    public function editProfilAdmin_1($id, $data)
    {
        $pengguna   = $this->db->table('tb_pengguna');

        $pengguna->set($data);
        $pengguna->where('id', $id);
        $pengguna->update();
    }
    // edit data pada table profil pengguna
    public function editProfilAdmin_2($id, $data)
    {
        $profil = $this->db->table('tb_profil_pengguna');
        $profil->set($data);
        $profil->where('user_id', $id);
        $profil->update();
    }
    // edit status peminjaman
    public function ubahStatusPeminjaman($id, $ubahStatus)
    {
        $pengguna = $this->db->table('tb_pengguna');

        $pengguna->set($ubahStatus);
        $pengguna->where('id', $id);
        $pengguna->update();
    }
    public function ubahStatusBuku($buku_id, $ubahStatusBuku, $user_id, $id)
    {
        $pengguna = $this->db->table('tb_bookmark_member');

        $pengguna->set($ubahStatusBuku);
        $pengguna->where('id', $id);
        $pengguna->where('buku_id', $buku_id);
        $pengguna->where('user_id', $user_id);
        $pengguna->where('status !=', 3);
        $pengguna->update();
    }
    public function ubahStatusBukuUser($id, $ubahStatusBuku)
    {
        $pengguna = $this->db->table('tb_bookmark_member');

        $pengguna->set($ubahStatusBuku);
        $pengguna->where('user_id', $id);
        $pengguna->where('status !=', 3);
        $pengguna->update();
    }
    // DELETE =================================================================================================================================================
    // delete pengguna dan profil pengguna
    public function hapusPengguna($id)
    {
        $pengguna   = $this->db->table('tb_pengguna');
        $profil     = $this->db->table('tb_profil_pengguna');

        $pengguna->delete(['id' => $id]);
        $profil->delete(['user_id' => $id]);
    }
    // delete formulir pengajuan member yang dikirimkan
    public function hapusMemberVerif($id)
    {
        return $this->db->table('tb_pengajuan_member')->delete(['user_id' => $id]);
    }
    public function hapusBookmark($id)
    {
        return $this->db->table('tb_bookmark_member')->delete(['user_id' => $id]);
    }
    public function peminjaman($id)
    {
        return $this->db->table('tb_peminjaman')->delete(['user_id' => $id]);
    }
    public function hapusDonatur($id)
    {
        return $this->db->table('tb_donasi')->delete(['id' => $id]);
    }
    public function hapusDonaturPengguna($user_id)
    {
        return $this->db->table('tb_donasi')->delete(['user_id' => $user_id]);
    }
    public function hapusBuku($kode_buku)
    {
        return $this->db->table('tb_buku_macatongsir')->delete(['kode_buku' => $kode_buku]);
    }
    // delete data ke table formulir pengajuran member verfikasi
    public function hapusPengajuanDitolak($id)
    {
        return $this->db->table('tb_pengajuan_member')->where('user_id', $id)->delete();
    }
    // INSERT =================================================================================================================================================
    // insert data ke tabel pesan penolakan pengajuan member verifikasi
    public function simpanTolak($data)
    {
        return $this->db->table('tb_pengajuan_ditolak')->insert($data);
    }
    public function insertPeminjaman($data)
    {
        return $this->db->table('tb_peminjaman')->insert($data);
    }
    public function ambilDonasi($status = null, $id = null)
    {
        $builder = $this->db->table('tb_donasi');
        if ($id != null) {
            $builder->where('id', $id);
        }
        if ($status != null) {
            $builder->where('status', $status);
        }
        return $builder;
    }
    public function ubahStatusDonasi($id, $ubahStatusDonasi)
    {
        $pengguna = $this->db->table('tb_donasi');

        $pengguna->set($ubahStatusDonasi);
        $pengguna->where('id', $id);
        $pengguna->update();
    }
    public function ambilKodeBuku()
    {
        $builder = $this->db->table('tb_buku_macatongsir');
        return $builder->selectMax('kode_buku')->get()->getRowArray();
    }
    public function simpanBuku($data)
    {
        $builder = $this->db->table('tb_buku_macatongsir');
        return $builder->insert($data);
    }
    public function ubahBuku($kode, $data)
    {
        $builder = $this->db->table('tb_buku_macatongsir');

        $builder->set($data);
        $builder->where('kode_buku', $kode);
        $builder->update();
    }
    public function bukuMacatongsir($kode_buku = null)
    {
        $builder = $this->db->table('tb_buku_macatongsir');
        if ($kode_buku != null) {
            $builder->where('kode_buku', $kode_buku);
        }
        return $builder;
    }
    public function ambilRiwayat($id = null)
    {
        $builder = $this->db->table('tb_bookmark_member a');
        $builder->select('*, b.id as id_pengguna, a.created_at as tanggal_dikembalikan');
        $builder->join('tb_pengguna b', 'b.id = a.user_id');
        $builder->where('a.status', 3);
        if ($id != null) {
            $builder->where('b.id', $id);
        } else {
            $builder->groupBy('a.user_id');
        }
        $builder->orderBy('a.created_at', 'desc');
        return $builder;
    }
    public function ambilRiwayatPeminjaman()
    {
        $builder = $this->db->table('tb_bookmark_member');
        $builder->where('status', 1);
        return $builder;
    }
    public function ambilTotalRiwayat($id)
    {
        $builder = $this->db->table('tb_bookmark_member');
        $builder->where('status', 3);
        $builder->where('user_id', $id);
        return $builder;
    }
    public function cekBukuBookmark($buku_id)
    {
        $builder = $this->db->table('tb_bookmark_member');
        $builder->where('buku_id', $buku_id);
        return $builder;
    }
    public function insertTutupPeminjaman($data)
    {
        $builder = $this->db->table('tb_status_peminjaman');
        return $builder->insert($data);
    }
    public function ambilTutupPeminjaman()
    {
        $builder = $this->db->table('tb_status_peminjaman');
        return $builder;
    }
    public function ambilKategoriBuku($id = null)
    {
        $builder = $this->db->table('tb_buku_kategori');
        if ($id != null) {
            $builder->where('id', $id);
        }
        return $builder;
    }
    public function insertKategoriBuku($data)
    {
        $builder = $this->db->table('tb_buku_kategori');
        return $builder->insert($data);
    }
}
