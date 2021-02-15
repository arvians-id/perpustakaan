<?php

namespace App\Models;

use CodeIgniter\Model;

class Masuk_model extends Model
{
    protected $table = 'tb_pengguna';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_lengkap', 'email', 'password', 'role', 'is_active', 'status_pengajuan_member', 'status_ketersediaan_buku'];

    public function auth_pengguna()
    {
        $builder = $this->db->table("$this->table a");
        $builder->select('*,a.id as pengguna_id, c.keterangan as role_keterangan, d.keterangan as aktif_keterangan');
        $builder->join('tb_profil_pengguna b', 'b.user_id = a.id');
        $builder->join('tb_role_pengguna c', 'c.id = a.role');
        $builder->join('tb_status_aktif d', 'd.id = a.is_active');
        $builder->where('a.email', session()->get('email'));
        return $builder->get()->getRowArray();
    }
    public function insertPengguna($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $builder->insert($data);
        $insertID = $db->insertID();

        $dataProf = [
            'user_id' => $insertID,
            'tanggal_lahir' => 0,
            'no_hp' => '',
            'jenis_kelamin' => 'Lainnya',
            'status' => '',
            'photo' => 'default.png'
        ];
        $tableProfil = $this->db->table('tb_profil_pengguna');
        return $tableProfil->insert($dataProf);
    }
    public function ubahAktivasi($email)
    {
        $pengguna = $this->db->table('tb_pengguna');

        $pengguna->set('is_active', 1);
        $pengguna->where('email', $email);
        $pengguna->update();
    }
    public function insertToken($data)
    {
        return $this->db->table('tb_pengguna_token')->insert($data);
    }
    public function ambilToken($token)
    {
        return $this->db->table('tb_pengguna_token')->where('token', $token)->get()->getRowArray();
    }
    public function cekToken($email)
    {
        return $this->db->table('tb_pengguna_token')->where('email', $email)->get()->getRowArray();
    }
    public function hapusToken($email)
    {
        return $this->db->table('tb_pengguna_token')->delete(['email' => $email]);
    }
    public function resetPassword($email, $password)
    {
        $builder = $this->db->table('tb_pengguna');
        $builder->set('password', $password);
        $builder->where('email', $email);
        return $builder->update();
    }
}
