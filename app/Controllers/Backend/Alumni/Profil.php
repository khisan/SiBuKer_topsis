<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Alumni_model;

class Profil extends BaseController
{
  public function __construct()
  {
    $this->AlumniModel = new Alumni_model();
  }
  public function index()
  {
    $data = [
      'title'   => 'Profil',
      'alumni'  => $this->AlumniModel->allData(),
      'isi'     => 'Backend/Alumni/v_profil'
    ];
    return view('Backend/Alumni/layout/v_wrapper', $data);
  }
}
