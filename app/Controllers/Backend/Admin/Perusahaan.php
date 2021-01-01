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

  public function ubah($id_perusahaan)
  {
    $data = [
      'title' => 'Edit Kriteria',
      'perusahaan' => $this->Perusahaan_model->edit($id_perusahaan),
      'isi'   => 'Backend/Admin/v_edit_perusahaan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function update($id_perusahaan)
  {
    $data = [
      'id_perusahaan' => $id_perusahaan,
      'username' => $this->request->getPost('username'),
      'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
    ];
    $this->Perusahaan_model->update_data($data, $id_perusahaan);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/perusahaan');
  }

  public function delete($id_perusahaan)
  {
    $this->Perusahaan_model->delete_data($id_perusahaan);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/perusahaan');
  }
}
