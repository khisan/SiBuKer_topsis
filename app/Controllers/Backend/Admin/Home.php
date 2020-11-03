<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;

class Home extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Home',
      'isi' => 'Backend/Admin/v_home'
    ];
    echo view('Backend/Admin/layout/v_wrapper', $data);
  }
}
