<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;
use App\Models\Jurusan_model;

class Jurusan extends BaseController
{
  public function __construct()
  {
    $this->JurusanModel = new Jurusan_model();
  }
  public function index()
  {
    $data = [
      'title'   => 'Jurusan',
      'alumni'  => $this->JurusanModel->allData(),
      'isi'     => 'Backend/Admin/v_jurusan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }
  public function tambah()
  {
    $data = [
      'title'   => 'Tambah Jurusan',
      'isi'     => 'Backend/Admin/v_tambah_jurusan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }
}
