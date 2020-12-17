<?php

namespace App\Controllers;

class ListLowongan extends BaseController
{
  public function index()
  {
    $data = [
      'isi' => 'Frontend/v_data_lowongan'
    ];
    echo view('Frontend/layout/v_wrapper', $data);
  }
}
