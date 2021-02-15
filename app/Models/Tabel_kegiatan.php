<?php

namespace App\Models;

use CodeIgniter\Model;

class Tabel_kegiatan extends Model
{
    protected $table = 'tb_kegiatan';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_kegiatan', 'judul', 'mentor', 'kuota', 'biaya', 'tempat', 'no_hp_pementor', 'kegiatan_dimulai', 'kegiatan_selesai', 'isi', 'photo', 'status'];

    public function ambilKodeKegiatan()
    {
        $builder = $this->db->table($this->table);
        return $builder->selectMax('kode_kegiatan', 'kode')->get()->getRowArray();
    }
    public function insertFormulirKegiatan($data)
    {
        $builder = $this->db->table('tb_formulir_kegiatan');
        return $builder->insert($data);
    }
    public function ambilFormulir($kode_kegiatan)
    {
        $builder = $this->db->table('tb_formulir_kegiatan');
        $builder->where('kode_kegiatan', $kode_kegiatan);
        return $builder->get()->getResultArray();
    }
    public function hapusFormulir($kode_kegiatan)
    {
        $builder = $this->db->table('tb_formulir_kegiatan');
        return $builder->delete(['kode_kegiatan' => $kode_kegiatan]);
    }
    public function hapusKegiatan($kode_kegiatan)
    {
        $builder = $this->db->table('tb_kegiatan');
        return $builder->delete(['kode_kegiatan' => $kode_kegiatan]);
    }
    public function ambilFormulirKegiatan($kode_kegiatan = null)
    {
        $builder = $this->db->table('tb_formulir_kegiatan');
        $builder->select('*, tb_formulir_kegiatan.kode_kegiatan as kode_formulir');
        $builder->join('tb_kegiatan', 'tb_kegiatan.kode_kegiatan = tb_formulir_kegiatan.kode_kegiatan');
        $builder->where('user_id', session()->get('id'));
        if ($kode_kegiatan != null) {
            $builder->where('tb_formulir_kegiatan.kode_kegiatan', $kode_kegiatan);
        }
        return $builder;
    }
    public function batalkanFormulirKegiatan($kode_kegiatan)
    {
        $builder = $this->db->table('tb_formulir_kegiatan');
        return $builder->delete([
            'user_id' => session()->get('id'),
            'kode_kegiatan' => $kode_kegiatan
        ]);
    }
    public function ambilFormulirUser($user_id)
    {
        $builder = $this->db->table('tb_formulir_kegiatan');
        $builder->where('user_id', $user_id);
        return $builder->get()->getRowArray();
    }
    public function hapusFormulirUser($user_id)
    {
        $builder = $this->db->table('tb_formulir_kegiatan');
        return $builder->delete(['user_id' => $user_id]);
    }
}
