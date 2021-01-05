<?php

namespace App\Models;

use CodeIgniter\Model;

class Lamar_model extends Model
{

  function get_lamaran_by_id_alumni($id_alumni)
  {
    $builder = $this->db->table('tb_lamar');
    $builder->select('id_lamar,tb_lamar.id_alumni,tb_lamar.id_perusahaan,tb_lamar.id_lowongan,status,catatan,berkas,tb_perusahaan.nama_perusahaan,tb_lowongan.nama_lowongan, tb_alumni.nama');
    $builder->join('tb_perusahaan', 'tb_perusahaan.id_perusahaan = tb_lamar.id_perusahaan');
    $builder->join('tb_lowongan', 'tb_lowongan.id_lowongan = tb_lamar.id_lowongan');
    $builder->join('tb_alumni', 'tb_alumni.id_alumni = tb_lamar.id_alumni');
    $builder->where('tb_lamar.id_alumni', $id_alumni);
    $alumni = $builder->get()->getResultArray();
    return $alumni;
  }

  function get_lamaran_by_id_perusahaan($id_perusahaan)
  {
    $builder = $this->db->table('tb_lamar');
    $builder->select('id_lamar,tb_lamar.id_alumni,tb_lamar.id_perusahaan,tb_lamar.id_lowongan,status,catatan,berkas,tb_perusahaan.nama_perusahaan,tb_lowongan.nama_lowongan, tb_alumni.nama');
    $builder->join('tb_perusahaan', 'tb_perusahaan.id_perusahaan = tb_lamar.id_perusahaan');
    $builder->join('tb_lowongan', 'tb_lowongan.id_lowongan = tb_lamar.id_lowongan');
    $builder->join('tb_alumni', 'tb_alumni.id_alumni = tb_lamar.id_alumni');
    $builder->where('tb_lamar.id_perusahaan', $id_perusahaan);
    $perusahaan = $builder->get()->getResultArray();
    return $perusahaan;
  }

  public function add($data)
  {
    $this->db->table('tb_lamar')->insert($data);
  }

  public function edit($id_lamar)
  {
    return $this->db->table('tb_lamar')
      ->where('id_lamar', $id_lamar)->get()->getRowArray();
  }

  public function update_data($data, $id_lamar)
  {
    return $this->db->table('tb_lamar')
      ->update($data, array('id_lamar' => $id_lamar));
  }

  public function delete_data($id_lamar)
  {
    return $this->db->table('tb_lamar')
      ->delete(array('id_lamar' => $id_lamar));
  }
}
