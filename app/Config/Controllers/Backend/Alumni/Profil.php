<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;

use App\Models\Alumni_model;

class Profil extends BaseController
{
  public function __construct()
  {
    helper('form');
    $this->Alumni_model = new Alumni_model();
  }

  public function index()
  {
    $data = [
      'title' => 'Profil',
      'alumni' => $this->Alumni_model->allData(),
      'isi' => 'Backend/Alumni/v_profil.php'
    ];
    return view('Backend/Alumni/layout/v_wrapper', $data);
  }
}
