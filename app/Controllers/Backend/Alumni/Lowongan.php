<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Alumni_model;
use App\Models\Lowongan_model;
use App\Models\Sub_Kriteria_Lowongan_model;

class Lowongan extends BaseController
{
  public function __construct()
  {
    $this->AlumniModel = new Alumni_model();
    $this->Lowongan_model = new Lowongan_model();
    $this->Sub_Kriteria_Lowongan_model = new Sub_Kriteria_Lowongan_model();
  }

  public function index()
  {
    $table = 'tb_alumni';
    $sesiAlumni = session()->get();
    $id_alumni = $sesiAlumni['id_alumni'];
    $data = [
      'title'   => 'Data Lowongan',
      'alumni'  => $this->AlumniModel->get_alumni_by_id($id_alumni, $table),
      'lowongan'  => $this->Lowongan_model->allData(),
      'isi'     => 'Backend/Alumni/v_lowongan'
    ];
    return view('Backend/Alumni/layout/v_wrapper', $data);
  }
}
