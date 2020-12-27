<?php

namespace App\Models;

use CodeIgniter\Model;

class Perusahaan_model extends Model
{


  public function getEmail($email)
  {
    $builder = $this->db->table('tb_perusahaan');
    $builder->select('email');
    $builder->where('email', $email);
    return $builder->get()->getRowArray();
  }

  function get_perusahaan_by_id($id_perusahaan, $tbl)
  {
    $builder = $this->db->table($tbl);
    $builder->where('id_perusahaan', $id_perusahaan);
    $perusahaan = $builder->get()->getRowArray();
    return $perusahaan;
  }

  public function update_data($data, $id_perusahaan)
  {
    return $this->db->table('tb_perusahaan')
      ->update($data, array('id_perusahaan' => $id_perusahaan));
  }

  public function delete_data($id_perusahaan)
  {
    return $this->db->table('tb_perusahaan')
      ->delete(array('id_perusahaan' => $id_perusahaan));
  }

  public function delete_email($email)
  {
    return $this->db->table('tb_perusahaan')
      ->delete(array('email' => $email));
  }
}
