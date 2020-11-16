<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;
use App\Models\Kriteria_Lowongan_model;

class KriteriaLowongan extends BaseController
{
  public function __construct()
  {
    $this->Kriteria_Lowongan_model = new Kriteria_Lowongan_model();
  }

  public function index()
  {
    $data = [
      'title'   => 'Kriteria Lowongan',
      'kriteria_lowongan'  => $this->Kriteria_Lowongan_model->allData(),
      'isi'     => 'Backend/Admin/v_kriteria_lowongan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function tambah()
  {
    $data = [
      'title'   => 'Tambah Kriteria Lowongan',
      'isi'     => 'Backend/Admin/v_tambah_kriteria_lowongan'
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
    $this->Kriteria_Lowongan_model->add($data);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !');
    return redirect()->to('/admin/kriteria-lowongan');
  }

  public function ubah($id_kriteria_lowongan)
  {
    $data = [
      'title' => 'Edit Kriteria Lowongan',
      'kriteria_lowongan' => $this->Kriteria_Lowongan_model->edit($id_kriteria_lowongan),
      'isi'   => 'Backend/Admin/v_edit_kriteria_lowongan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function update($id_kriteria_lowongan)
  {
    $data = [
      'id_kriteria_lowongan' => $id_kriteria_lowongan,
      'kode' => $this->request->getPost('kode'),
      'kriteria' => $this->request->getPost('kriteria'),
      'cost_benefit' => $this->request->getPost('cost_benefit'),
    ];
    $this->Kriteria_Lowongan_model->update_data($data, $id_kriteria_lowongan);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/kriteria-lowongan');
  }

  public function delete($id_kriteria_lowongan)
  {
    $this->Kriteria_Lowongan_model->delete_data($id_kriteria_lowongan);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/kriteria-lowongan');
  }
}
