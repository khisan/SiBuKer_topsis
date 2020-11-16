<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;
use App\Models\Sub_Kriteria_Alumni_model;
use App\Models\Kriteria_Lowongan_model;

class SubKriteriaAlumni extends BaseController
{
  public function __construct()
  {
    $this->Sub_Kriteria_Alumni_model = new Sub_Kriteria_Alumni_model();
    $this->Kriteria_Lowongan_model = new Kriteria_Lowongan_model();
  }

  public function get_subkategori()
  {
    $kode = $this->request->getPost('kode');
    $data = $this->Kriteria_Lowongan_model->get_kriteria_by_kriteria($kode);
    echo json_encode($data);
  }

  public function index()
  {
    $data = [
      'title'   => 'Sub Kriteria Alumni',
      'sub_kriteria_alumni'  => $this->Sub_Kriteria_Alumni_model->allData(),
      'isi'     => 'Backend/Admin/v_sub_kriteria_alumni'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function tambah()
  {
    $data = [
      'title'   => 'Tambah Sub Kriteria Alumni',
      'kriteria_lowongan'  => $this->Kriteria_Lowongan_model->allData(),
      'isi'     => 'Backend/Admin/v_tambah_sub_kriteria_alumni'
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
    $this->Sub_Kriteria_Alumni_model->add($data);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !');
    return redirect()->to('/admin/sub-kriteria-alumni');
  }

  public function ubah($id_sub_kriteria_alumni)
  {
    $data = [
      'title' => 'Edit Sub Kriteria Alumni',
      'kriteria_lowongan'  => $this->Kriteria_Lowongan_model->allData(),
      'sub_kriteria_alumni' => $this->Sub_Kriteria_Alumni_model->edit($id_sub_kriteria_alumni),
      'isi'   => 'Backend/Admin/v_edit_sub_kriteria_alumni'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function update($id_sub_kriteria_alumni)
  {
    $data = [
      'id_sub_kriteria_alumni' => $id_sub_kriteria_alumni,
      'kode' => $this->request->getPost('kode'),
      'bobot' => $this->request->getPost('bobot'),
      'sub_kriteria' => $this->request->getPost('sub_kriteria'),
      'cost_benefit' => $this->request->getPost('cost_benefit'),
    ];
    $this->Sub_Kriteria_Alumni_model->update_data($data, $id_sub_kriteria_alumni);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/sub-kriteria-alumni');
  }

  public function delete($id_sub_kriteria_alumni)
  {
    $this->Sub_Kriteria_Alumni_model->delete_data($id_sub_kriteria_alumni);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/sub-kriteria-alumni');
  }
}
