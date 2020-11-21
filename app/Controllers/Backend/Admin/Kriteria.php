<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;
use App\Models\Kriteria_model;

class Kriteria extends BaseController
{
  public function __construct()
  {
    $this->Kriteria_model = new Kriteria_model();
  }

  public function index()
  {
    $data = [
      'title'   => 'Kriteria',
      'kriteria'  => $this->Kriteria_model->allData(),
      'isi'     => 'Backend/Admin/v_kriteria'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function tambah()
  {
    $data = [
      'title'   => 'Tambah Kriteria',
      'isi'     => 'Backend/Admin/v_tambah_kriteria'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function add()
  {
    $data = [
      'kode' => $this->request->getPost('kode'),
      'kriteria' => $this->request->getPost('kriteria'),
      'cost_benefit' => $this->request->getPost('cost_benefit'),
    ];
    $this->Kriteria_model->add($data);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !');
    return redirect()->to('/admin/kriteria');
  }

  public function ubah($id_kriteria)
  {
    $data = [
      'title' => 'Edit Kriteria',
      'kriteria' => $this->Kriteria_model->edit($id_kriteria),
      'isi'   => 'Backend/Admin/v_edit_kriteria'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function update($id_kriteria)
  {
    $data = [
      'id_kriteria' => $id_kriteria,
      'kode' => $this->request->getPost('kode'),
      'kriteria' => $this->request->getPost('kriteria'),
      'cost_benefit' => $this->request->getPost('cost_benefit'),
    ];
    $this->Kriteria_model->update_data($data, $id_kriteria);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/kriteria');
  }

  public function delete($id_kriteria)
  {
    $this->Kriteria_model->delete_data($id_kriteria);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/kriteria');
  }
}
