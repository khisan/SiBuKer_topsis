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

  public function edit($data)
  {
    $this->db->table('tb_alumni')
      ->where('id_alumni', $data['id_alumni'])
      ->update($data);
  }
}
