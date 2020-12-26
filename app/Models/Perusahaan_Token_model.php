<?php

namespace App\Models;

use CodeIgniter\Model;

class Perusahaan_Token_model extends Model
{
  public function add($token)
  {
    $this->db->table('tb_perusahaan_token')->insert($token);
  }

  public function getAllByToken($token)
  {
    $builder = $this->db->table('tb_perusahaan_token');
    $builder->select('*');
    $builder->where('token', $token);
    return $builder->get()->getRowArray();
  }

  public function getToken($token)
  {
    $builder = $this->db->table('tb_perusahaan_token');
    $builder->select('token');
    $builder->where('token', $token);
    return $builder->get()->getRowArray();
  }

  public function delete_data($email)
  {
    return $this->db->table('tb_perusahaan_token')
      ->delete(array('email' => $email));
  }
}
