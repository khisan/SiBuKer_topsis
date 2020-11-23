<?php

namespace App\Models;

use CodeIgniter\Model;

class Kriteria_model extends Model
{
  public function allData()
  {
    return $this->db->table('tb_kriteria')
      ->orderBy('kode', 'ASC')
      ->get()->getResultArray();
  }

  public function jmlKriteria()
  {
    return $this->db->table('tb_kriteria')->countAll();
  }

  public function get_kriteria_by_kriteria($kode)
  {
    return $this->db->table('tb_kriteria')
      ->select('cost_benefit')
      ->where('kode', $kode)
      ->get()->getRowArray();
  }

  public function add($data)
  {
    $this->db->table('tb_kriteria')->insert($data);
  }

  public function edit($id_kriteria)
  {
    return $kriteria = $this->db->table('tb_kriteria')
      ->where('id_kriteria', $id_kriteria)->get()->getRowArray();
  }

  public function update_data($data, $id_kriteria)
  {
    return $this->db->table('tb_kriteria')
      ->update($data, array('id_kriteria' => $id_kriteria));
  }

  public function delete_data($id_kriteria)
  {
    return $this->db->table('tb_kriteria')
      ->delete(array('id_kriteria' => $id_kriteria));
  }
}
