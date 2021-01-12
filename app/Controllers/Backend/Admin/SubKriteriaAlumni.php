<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;
use App\Models\Sub_Kriteria_Alumni_Model;
use App\Models\Kriteria_Model;

class SubKriteriaAlumni extends BaseController
{
  public function __construct()
  {
    $this->Sub_Kriteria_Alumni_Model = new Sub_Kriteria_Alumni_Model();
    $this->Kriteria_Model = new Kriteria_Model();
  }

  public function get_subkategori()
  {
    $kode = $this->request->getPost('kode');
    $data = $this->Kriteria_Model->get_kriteria_by_kriteria($kode);
    echo json_encode($data);
  }

  public function index()
  {
    $data = [
      'title'   => 'Sub Kriteria Alumni',
      'sub_kriteria_alumni'  => $this->Sub_Kriteria_Alumni_Model->allData(),
      'isi'     => 'Backend/Admin/v_sub_kriteria_alumni'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function tambah()
  {
    $data = [
      'title'   => 'Tambah Sub Kriteria Alumni',
      'kriteria'  => $this->Kriteria_Model->allData(),
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
    ];
    $this->Sub_Kriteria_Alumni_Model->add($data);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !');
    return redirect()->to('/admin/sub-kriteria-alumni');
  }

  public function ubah($id_sub_kriteria_alumni)
  {
    $data = [
      'title' => 'Edit Sub Kriteria Alumni',
      'kriteria'  => $this->Kriteria_Model->allData(),
      'sub_kriteria_alumni' => $this->Sub_Kriteria_Alumni_Model->edit($id_sub_kriteria_alumni),
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
    ];
    $this->Sub_Kriteria_Alumni_Model->update_data($data, $id_sub_kriteria_alumni);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/sub-kriteria-alumni');
  }

  public function delete($id_sub_kriteria_alumni)
  {
    $this->Sub_Kriteria_Alumni_Model->delete_data($id_sub_kriteria_alumni);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/sub-kriteria-alumni');
  }
}
