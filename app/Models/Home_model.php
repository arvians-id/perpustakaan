<?php

namespace App\Models;

use CodeIgniter\Model;

class Home_model extends Model
{

    protected $table = 'tb_artikel';
    protected $useTimestamps = true;
    protected $allowedFields = ['slug', 'judul', 'isi', 'kategori', 'photo', 'status'];
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
    public function apiLimitBuku($limit)
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', 'http://perpustakaan.ummi.ac.id/api/index.php/book/?limits=' . $limit);
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
    public function apiYoutube()
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', 'https://www.googleapis.com/youtube/v3/channels?key=AIzaSyBJwlfXAwepLmrVj9GSPp1cYjAq5zcCdrk&part=snippet,statistics&id=UCyFoGtXyT5maOIY6mNIgCnA');
        $data = json_decode($response->getBody(), true);
        return $data;
    }
    public function apiVideoYoutube()
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', 'https://www.googleapis.com/youtube/v3/playlistItems?key=AIzaSyBJwlfXAwepLmrVj9GSPp1cYjAq5zcCdrk&part=snippet&channelId=UC6wPYkCOm9iiJDqysXhVk5Q&playlistId=PLiGhrAWJWoEIsqO3rgkYm_fWQdBGMSZhG&maxResults=8');
        $data = json_decode($response->getBody(), true);
        return $data;
    }
    public function apiCovid()
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', 'https://covid19.mathdro.id/api/countries/indonesia/confirmed');
        $data = json_decode($response->getBody(), true);
        return $data[0];
    }
    public function ambilBookmark()
    {
        $builder = $this->db->table('tb_bookmark_member');
        $builder->where('user_id', session()->get('id'));
        $builder->where('status !=', 3);
        return $builder;
    }
    public function simpanBookmark($data)
    {
        return $this->db->table('tb_bookmark_member')->insert($data);
    }
    public function simpanKategori($data)
    {
        return $this->db->table('tb_artikel_kategori')->insert($data);
    }
    public function hapusKategori($id)
    {
        return $this->db->table('tb_artikel_kategori')->delete(['id' => $id]);
    }
    public function ambilKategori()
    {
        return $this->db->table('tb_artikel_kategori')->get()->getResultArray();
    }
    public function artikelLainnya($limit)
    {
        return $this->db->table('tb_artikel a')->orderBy('a.id', 'desc')->get($limit)->getResultArray();
    }
    public function ambilDonasi($status, $tahun = null, $bulan = null)
    {
        $builder = $this->db->table('tb_donasi');
        $builder->where('status', $status);
        if ($tahun != null && $bulan == null) {
            $builder->where("DATE_FORMAT(tanggal_terima,'%Y')", $tahun);
        } elseif ($tahun != null && $bulan != null) {
            $builder->where("DATE_FORMAT(tanggal_terima,'%Y/%m')", $tahun . '/' . $bulan);
        }
        // $builder->where('tanggal_terima BETWEEN NOW() - INTERVAL 365 DAY AND NOW()');
        return $builder;
    }
    //Baru
    public function ambilBukuKategori($id = null)
    {
        $builder = $this->db->table('tb_buku_kategori');
        if ($id != null) {
            $builder->where('id', $id);
        }
        return $builder;
    }
}
