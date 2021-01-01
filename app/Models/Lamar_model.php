<?php

namespace App\Models;

use CodeIgniter\Model;

class Lamar_model extends Model
{

  function get_lamaran_by_id_alumni($id_alumni, $tbl)
  {
    $builder = $this->db->table($tbl);
    $builder->where('id_alumni', $id_alumni);
    $alumni = $builder->get()->getRowArray();
    return $alumni;
  }

  public function add($data)
  {
    $this->db->table('tb_lamar')->insert($data);
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

  public function delete_email($id_lamar)
  {
    return $this->db->table('tb_lamar')
      ->delete(array('id_lamar' => $id_lamar));
  }
}
