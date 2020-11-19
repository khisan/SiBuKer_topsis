<?php

namespace App\Models;

use CodeIgniter\Model;

class Alumni_model extends Model
{
  public function allData()
  {
    $builder = $this->db->table('tb_alumni');
    $builder->select('id_alumni,nim,nama,jenis_kelamin,umur,jurusan,kualifikasi_pendidikan,ipk');
    $builder->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_alumni.id_jurusan');
    $query = $builder->get()->getResultArray();
    return $query;
  }

  function get_alumni_by_id($nim, $tbl)
  {
    $builder = $this->db->table($tbl);
    $builder->where('id_alumni', $nim);
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
  public function delete_data($id_alumni)
  {
    return $this->db->table('tb_alumni')
      ->delete(array('id_alumni' => $id_alumni));
  }
}
