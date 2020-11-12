<?php

namespace App\Models;

use CodeIgniter\Model;

class Alumni_model extends Model
{
  public function allData()
  {
    return $this->db->table('tb_alumni')
      ->get()->getResultArray();
  }

  function get_alumni_by_nim($nim, $tbl)
  {
    $builder = $this->db->table($tbl);
    $builder->where('nim', $nim);
    $alumni = $builder->get()->getResultArray();
    return $alumni;
  }

  function detail_data($id_alumni)
  {
    return $this->db->table('tb_alumni')
      ->where('id_alumni', $id_alumni)
      ->get()->getRowArray();
  }

  public function update_data($data, $id_alumni)
  {
    return $this->db->table('tb_alumni')
      ->update($data, array('id_alumni' => $id_alumni));
  }
}
