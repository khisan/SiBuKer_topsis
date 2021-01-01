<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;
use App\Models\Perusahaan_model;

class Perusahaan extends BaseController
{
  public function __construct()
  {
    $this->Perusahaan_model = new Perusahaan_model();
  }

  public function index()
  {
    $data = [
      'title'   => 'Perusahaan',
      'perusahaan'  => $this->Perusahaan_model->allData(),
      'isi'     => 'Backend/Admin/v_perusahaan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function delete($id_perusahaan)
  {
    $this->Perusahaan_model->delete_data($id_perusahaan);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/perusahaan');
  }
}
