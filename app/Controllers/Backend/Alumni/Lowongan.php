<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Lowongan_model;
use App\Models\Sub_Kriteria_Lowongan_model;

class Lowongan extends BaseController
{
  public function __construct()
  {
    $this->Lowongan_model = new Lowongan_model();
    $this->Sub_Kriteria_Lowongan_model = new Sub_Kriteria_Lowongan_model();
  }

  public function index()
  {
    $data = [
      'title'   => 'Data Lowongan',
      'lowongan'  => $this->Lowongan_model->allData(),
      'isi'     => 'Backend/Alumni/v_lowongan'
    ];
    return view('Backend/Alumni/layout/v_wrapper', $data);
  }
}
