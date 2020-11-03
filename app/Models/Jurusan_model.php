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

  public function edit($id_jurusan)
  {
    return $jurusan = $this->db->table('tb_jurusan')
      ->where('id_jurusan', $id_jurusan)->get()->getRowArray();
  }

  public function update_data($data, $id_jurusan)
  {
    return $this->db->table('tb_jurusan')
      ->update($data, array('id_jurusan' => $id_jurusan));
  }

  public function delete_data($id_jurusan)
  {
    return $this->db->table('tb_jurusan')
      ->delete(array('id_jurusan' => $id_jurusan));
  }
}
