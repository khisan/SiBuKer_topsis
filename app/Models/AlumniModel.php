<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
  protected $table      = 'tb_alumni';
  protected $primaryKey = 'id_alumni';

  protected $returnType     = 'array';
  protected $useSoftDeletes = true;

  protected $allowedFields = ['nama', 'jenis_kelamin', 'umur', 'username', 'password'];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
}
