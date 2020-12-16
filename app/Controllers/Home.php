<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    $data = [
      'isi' => 'Frontend/v_home'
    ];
    echo view('Frontend/layout/v_wrapper', $data);
  }
}
