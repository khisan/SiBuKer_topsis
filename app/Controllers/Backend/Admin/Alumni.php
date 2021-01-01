<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;
use App\Models\Alumni_model;

class Alumni extends BaseController
{
  public function __construct()
  {
    $this->AlumniModel = new Alumni_model();
  }
  public function index()
  {
    $data = [
      'title'   => 'Alumni',
      'alumni'  => $this->AlumniModel->semuaData(),
      'isi'     => 'Backend/Admin/v_alumni'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function delete($id_alumni)
  {
    $this->AlumniModel->delete_data($id_alumni);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/backend/admin/alumni');
  }
}
