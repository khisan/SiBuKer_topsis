<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;
use App\Models\Auth_model;

class Home extends BaseController
{
  public function __construct()
  {
    $this->AuthModel = new Auth_model();
  }
  public function index()
  {
    $table = 'tb_admin';
    $sesiAdmin = session()->get();
    $username = $sesiAdmin['username'];
    $data = [
      'title' => 'Home',
      'isi' => 'Backend/Admin/v_home',
      'admin'  => $this->AuthModel->get_data_login_adm($username, $table)
    ];
    //dd($data);
    echo view('Backend/Admin/layout/v_wrapper', $data);
  }
}
