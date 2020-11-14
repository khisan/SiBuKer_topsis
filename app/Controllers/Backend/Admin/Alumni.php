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
      'alumni'  => $this->AlumniModel->allData(),
      'isi'     => 'Backend/Admin/v_alumni'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }
  public function tambah()
  {
    $data = [
      'title'   => 'Tambah Alumni',
      'isi'     => 'Backend/Admin/v_tambah_alumni'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function add()
  {
    $data = [
      'alumni' => $this->request->getPost('alumni'),
    ];
    $this->AlumniModel->add($data);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !');
    return redirect()->to('/admin/alumni');
  }

  public function update($id_alumni)
  {
    $data = [
      'id_alumni' => $id_alumni,
      'alumni' => $this->request->getPost('alumni')
    ];
    $this->AlumniModel->update_data($data, $id_alumni);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/backend/admin/alumni');
  }

  public function delete($id_alumni)
  {
    $this->AlumniModel->delete_data($id_alumni);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/backend/admin/alumni');
  }
}
