<?php

namespace App\Models;

use CodeIgniter\Model;

class Lowongan_model extends Model
{
  public function allData()
  {
    return $this->db->table('tb_lowongan')
      ->get()->getResultArray();
  }

  function detail_data($id_alumni)
  {
    return $this->db->table('tb_lowongan')
      ->where('id_lowongan', $id_alumni)
      ->get()->getRowArray();
  }

  public function add($data)
  {
    $this->db->table('tb_lowongan')->insert($data);
  }

  public function edit($id_lowongan)
  {
    return $kriteria = $this->db->table('tb_lowongan')
      ->where('id_lowongan', $id_lowongan)->get()->getRowArray();
  }

  public function update_data($data, $id_lowongan)
  {
    return $this->db->table('tb_lowongan')
      ->update($data, array('id_lowongan' => $id_lowongan));
  }

  public function delete_data($id_lowongan)
  {
    return $this->db->table('tb_lowongan')
      ->delete(array('id_lowongan' => $id_lowongan));
  }
}
