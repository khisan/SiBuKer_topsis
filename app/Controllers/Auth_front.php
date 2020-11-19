<?php

namespace App\Controllers;

use App\Models\Jurusan_model;

class Auth_front extends BaseController
{
  public function __construct()
  {
    $this->JurusanModel = new Jurusan_model();
  }

  public function login()
  {
    return view('Auth/Alumni/v_login');
  }

  public function register()
  {
    session();
    $data = [
      'validate' => \Config\Services::validation(),
      'jurusan' => $this->JurusanModel->allData()
    ];
    return view('Auth/Alumni/v_register', $data);
  }
}
