<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengguna_model extends Model
{
    protected $table = 'tb_pengajuan_member';
    protected $useTimestamps = true;
    protected $allowedFields = ['user_id', 'nama_lengkap', 'email', 'no_hp', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'alamat', 'status', 'pesan', 'photo_ktp_kartu_pelajar'];

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
        $response = $client->request('GET', 'http://perpustakaan.ummi.ac.id/api/index.php/book/?limits=20');
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
    public function apiCovid()
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', 'https://api.kawalcorona.com/indonesia/');
        $data = json_decode($response->getBody(), true);
        return $data;
    }
    // QUERY DATABASE ======================================================================================================================================
    public function status_pengguna($id, $data)
    {
        $pengguna = $this->db->table('tb_pengguna');

        $pengguna->set($data);
        $pengguna->where('id', $id);
        $pengguna->update();
    }
    public function ambilDataPengajuanRow($id)
    {
        return $this->db->table('tb_pengajuan_member')->where('user_id', $id)->get()->getRowArray();
    }
    public function pesan_ditolak($id)
    {
        return $this->db->table('tb_pengajuan_ditolak')->where('user_id', $id)->get()->getRowArray();
    }
    public function hapusPesanDitolak($id)
    {
        return $this->db->table('tb_pengajuan_ditolak')->where('user_id', $id)->delete();
    }
    public function simpanBookmark($data)
    {
        return $this->db->table('tb_bookmark_member')->insert($data);
    }
    public function hapusBookmark($id_buku, $id)
    {
        $builder = $this->db->table('tb_bookmark_member');
        $builder->where('id', $id_buku);
        $builder->where('user_id', $id);
        $builder->delete();
    }
    public function ambilBookmark()
    {
        $builder = $this->db->table('tb_bookmark_member');
        $builder->where('user_id', session()->get('id'));
        $builder->where('status !=', 3);
        return $builder;
    }
    public function cekHapusBookmark($id_buku, $id)
    {
        $builder = $this->db->table('tb_bookmark_member');
        $builder->where('id', $id_buku);
        $builder->where('user_id', $id);
        return $builder;
    }
    public function ambilRiwayat()
    {
        $builder = $this->db->table('tb_bookmark_member');
        $builder->where('user_id', session()->get('id'));
        $builder->where('status', 3);
        $builder->orderBy('created_at', 'desc');
        return $builder;
    }
    public function ambilBookmarkStatus($status)
    {
        $builder = $this->db->table('tb_bookmark_member');
        $builder->where('user_id', session()->get('id'));
        $builder->where('status', $status);
        return $builder;
    }
    // edit status peminjaman
    public function ubahStatusPeminjaman($id, $ubahStatus)
    {
        $pengguna = $this->db->table('tb_pengguna');

        $pengguna->set($ubahStatus);
        $pengguna->where('id', $id);
        $pengguna->update();
    } //  edit data pada table pengguna
    public function editProfilPengguna_1($id, $data)
    {
        $pengguna   = $this->db->table('tb_pengguna');

        $pengguna->set($data);
        $pengguna->where('id', $id);
        $pengguna->update();
    } // get data satu baris data tabel profil pengguna berdasarkan id
    public function ambilProfil($id)
    {
        return $this->db->table('tb_profil_pengguna')->where('user_id', $id)->get()->getRowArray();
    } // edit data pada table profil pengguna
    public function editProfilPengguna_2($id, $data)
    {
        $profil = $this->db->table('tb_profil_pengguna');
        $profil->set($data);
        $profil->where('user_id', $id);
        $profil->update();
    }
    public function ubahStatusBuku($id, $ubahStatusBuku)
    {
        $pengguna = $this->db->table('tb_bookmark_member');

        $pengguna->set($ubahStatusBuku);
        $pengguna->where('user_id', $id);
        $pengguna->update();
    }
    public function ubahPengguna($id, $data)
    {
        $pengguna   = $this->db->table('tb_pengguna');

        $pengguna->set($data);
        $pengguna->where('id', $id);
        $pengguna->update();
    }
    public function ambilSatuBarisPinjaman($id)
    {
        return $this->db->table('tb_peminjaman')->where('user_id', $id)->get()->getRowArray();
    }
    public function hapusPinjaman($id)
    {
        return $this->db->table('tb_peminjaman')->where('user_id', $id)->delete();
    }
    public function simpanDonasi($data)
    {
        return $this->db->table('tb_donasi')->insert($data);
    }
    public function ambilDonasi($status)
    {
        return $this->db->table('tb_donasi')->where('user_id', session()->get('id'))->where('status', $status)->get()->getResultArray();
    }
    public function ambilDataStatus($statusPeminjaman = null, $user_id = null, $statusKetersediaan = null)
    {
        $builder = $this->db->table("tb_pengguna a");
        $builder->select('*');
        $builder->join('tb_peminjaman b', 'b.user_id = a.id');
        if ($user_id != null) {
            $builder->where('b.user_id', $user_id);
        }
        $builder->where('a.status_pengajuan_member', $statusPeminjaman);
        $builder->where('a.status_ketersediaan_buku', $statusKetersediaan);
        return $builder;
    }
    public function ambilTutupPeminjaman()
    {
        $builder = $this->db->table('tb_status_peminjaman');
        return $builder;
    }
}
