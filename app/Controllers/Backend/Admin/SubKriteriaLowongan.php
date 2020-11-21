<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;
use App\Models\Sub_Kriteria_Lowongan_model;
use App\Models\Kriteria_model;

class SubKriteriaLowongan extends BaseController
{
  public function __construct()
  {
    $this->Sub_Kriteria_Lowongan_model = new Sub_Kriteria_Lowongan_model();
    $this->Kriteria_model = new Kriteria_model();
  }

  public function get_subkategori()
  {
    $kode = $this->request->getPost('kode');
    $data = $this->Kriteria_model->get_kriteria_by_kriteria($kode);
    echo json_encode($data);
  }

  public function index()
  {
    $data = [
      'title'   => 'Sub Kriteria Lowongan',
      'sub_kriteria_lowongan'  => $this->Sub_Kriteria_Lowongan_model->allData(),
      'isi'     => 'Backend/Admin/v_sub_kriteria_lowongan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function tambah()
  {
    $data = [
      'title'   => 'Tambah Sub Kriteria Lowongan',
      'kriteria'  => $this->Kriteria_model->allData(),
      'isi'     => 'Backend/Admin/v_tambah_sub_kriteria_lowongan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function add()
  {
    $data = [
      'kode' => $this->request->getPost('kode'),
      'sub_kriteria' => $this->request->getPost('sub_kriteria'),
      'bobot' => $this->request->getPost('bobot'),
      'cost_benefit' => $this->request->getPost('cost_benefit'),
    ];
    $this->Sub_Kriteria_Lowongan_model->add($data);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !');
    return redirect()->to('/admin/sub-kriteria-lowongan');
  }

  public function ubah($id_sub_kriteria_lowongan)
  {
    $data = [
      'title' => 'Edit Sub Kriteria Lowongan',
      'kriteria'  => $this->Kriteria_model->allData(),
      'sub_kriteria_lowongan' => $this->Sub_Kriteria_Lowongan_model->edit($id_sub_kriteria_lowongan),
      'isi'   => 'Backend/Admin/v_edit_sub_kriteria_lowongan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function update($id_sub_kriteria_lowongan)
  {
    $data = [
      'id_sub_kriteria_lowongan' => $id_sub_kriteria_lowongan,
      'kode' => $this->request->getPost('kode'),
      'bobot' => $this->request->getPost('bobot'),
      'sub_kriteria' => $this->request->getPost('sub_kriteria'),
      'cost_benefit' => $this->request->getPost('cost_benefit'),
    ];
    $this->Sub_Kriteria_Lowongan_model->update_data($data, $id_sub_kriteria_lowongan);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/sub-kriteria-lowongan');
  }

  public function delete($id_sub_kriteria_lowongan)
  {
    $this->Sub_Kriteria_Lowongan_model->delete_data($id_sub_kriteria_lowongan);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/sub-kriteria-lowongan');
  }
}
