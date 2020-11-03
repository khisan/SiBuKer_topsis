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
      'jurusan'  => $this->JurusanModel->allData(),
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

  public function add()
  {
    $data = [
      'jurusan' => $this->request->getPost('jurusan'),
    ];
    $this->JurusanModel->add($data);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !');
    return redirect()->to('/admin/jurusan');
  }

  public function ubah($id_jurusan)
  {
    $data = [
      'title' => 'Edit Data Produk',
      'jurusan' => $this->JurusanModel->edit($id_jurusan),
      'isi'   => 'Backend/Admin/v_edit_jurusan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function update($id_jurusan)
  {
    $data = [
      'id_jurusan' => $id_jurusan,
      'jurusan' => $this->request->getPost('jurusan')
    ];
    $this->JurusanModel->update_data($data, $id_jurusan);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/backend/admin/jurusan');
  }
}
