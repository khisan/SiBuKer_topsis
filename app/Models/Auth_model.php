<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_model extends Model
{
  protected $table      = 'tb_alumni';
  protected $primaryKey = 'id_alumni';

  protected $returnType     = 'array';
  protected $useSoftDeletes = true;

  protected $allowedFields = ['nama', 'jenis_kelamin', 'umur', 'nim', 'password', 'id_jurusan'];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  function get_data_login($nim, $tbl)
  {
    $builder = $this->db->table($tbl);
    $builder->where('nim', $nim);
    $login = $builder->get()->getRow();
    return $login;
  }
}
