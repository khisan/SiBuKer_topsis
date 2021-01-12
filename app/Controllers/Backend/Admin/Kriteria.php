<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;
use App\Models\Kriteria_Model;

class Kriteria extends BaseController
{
  public function __construct()
  {
    $this->Kriteria_Model = new Kriteria_Model();
  }

  public function index()
  {
    $data = [
      'title'   => 'Kriteria',
      'kriteria'  => $this->Kriteria_Model->allData(),
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
    $this->Kriteria_Model->add($data);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !');
    return redirect()->to('/admin/kriteria');
  }

  public function ubah($id_kriteria)
  {
    $data = [
      'title' => 'Edit Kriteria',
      'kriteria' => $this->Kriteria_Model->edit($id_kriteria),
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
    $this->Kriteria_Model->update_data($data, $id_kriteria);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/kriteria');
  }

  public function delete($id_kriteria)
  {
    $this->Kriteria_Model->delete_data($id_kriteria);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/kriteria');
  }
}
