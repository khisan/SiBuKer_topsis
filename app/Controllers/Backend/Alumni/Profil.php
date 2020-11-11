<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Alumni_model;
use App\Models\Jurusan_model;

class Profil extends BaseController
{
  public function __construct()
  {
    $this->AlumniModel = new Alumni_model();
    $this->JurusanModel = new Jurusan_model();
  }
  public function index()
  {
    $table = 'tb_alumni';
    $sesiAlumni = session()->get();
    $nim = $sesiAlumni['nim'];
    $data = [
      $table = 'tb_alumni',
      $nim = $sesiAlumni['nim'],
      'title'   => 'Profil',
      'alumni'  => $this->AlumniModel->get_alumni_by_nim($nim, $table),
      'isi'     => 'Backend/Alumni/v_profil'
    ];
    return view('Backend/Alumni/layout/v_wrapper', $data);
  }

  public function ubah()
  {
    $data = [
      'title' => 'Edit Data Produk',
      'isi'   => 'Backend/Admin/v_edit_jurusan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }
}
