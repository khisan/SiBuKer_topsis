<?php

namespace App\Models;

use CodeIgniter\Model;

class Jurusan_model extends Model
{
  public function allData()
  {
    return $this->db->table('tb_jurusan')
      ->get()->getResultArray();
  }

  public function add($data)
  {
    $this->db->table('tb_jurusan')->insert($data);
  }

  public function edit($data)
  {
    $this->db->table('tb_jurusan')
      ->where('id_jurusan', $data['id_jurusan'])
      ->update($data);
  }

  public function delete_data($data)
  {
    $this->db->table('tb_jurusan')
      ->where('id_jurusan', $data['id_jurusan'])
      ->delete($data);
  }
}
