<?php

namespace App\Models;

use CodeIgniter\Model;

class Kriteria_Lowongan_model extends Model
{
  public function allData()
  {
    return $this->db->table('tb_kriteria_lowongan')
      ->orderBy('kode', 'ASC')
      ->get()->getResultArray();
  }

  function get_kriteria_by_kriteria($kode)
  {
    return $this->db->table('tb_kriteria_lowongan')
      ->select('cost_benefit')
      ->where('kode', $kode)
      ->get()->getRowArray();
  }

  public function add($data)
  {
    $this->db->table('tb_kriteria_lowongan')->insert($data);
  }

  public function edit($id_kriteria_lowongan)
  {
    return $kriteria = $this->db->table('tb_kriteria_lowongan')
      ->where('id_kriteria_lowongan', $id_kriteria_lowongan)->get()->getRowArray();
  }

  public function update_data($data, $id_kriteria_lowongan)
  {
    return $this->db->table('tb_kriteria_lowongan')
      ->update($data, array('id_kriteria_lowongan' => $id_kriteria_lowongan));
  }

  public function delete_data($id_kriteria_lowongan)
  {
    return $this->db->table('tb_kriteria_lowongan')
      ->delete(array('id_kriteria_lowongan' => $id_kriteria_lowongan));
  }
}
