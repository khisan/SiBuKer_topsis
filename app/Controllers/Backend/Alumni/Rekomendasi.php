<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Alumni_model;
use App\Models\Sub_Kriteria_Alumni_model;

class Rekomendasi extends BaseController
{
  public function __construct()
  {
    $this->Alumni_Model = new Alumni_model();
    $this->Sub_Kriteria_Alumni_model = new Sub_Kriteria_Alumni_model();
  }
  public function index()
  {
    $table = 'tb_alumni';
    $sesiAlumni = session()->get();
    $id_alumni = $sesiAlumni['id_alumni'];
    $data = [
      'title'   => 'Rekomendasi Lowongan',
      'alumni'  => $this->Alumni_Model->get_alumni_by_id($id_alumni, $table),
      'umur'  => $this->Sub_Kriteria_Alumni_model->getUmur(),
      'kualifikasi_pendidikan'  => $this->Sub_Kriteria_Alumni_model->getKualifikasiPendidikan(),
      'ipk'  => $this->Sub_Kriteria_Alumni_model->getIpk(),
      'jenis_kelamin'  => $this->Sub_Kriteria_Alumni_model->getJenisKelamin(),
      'pengalaman_kerja'  => $this->Sub_Kriteria_Alumni_model->getPengalamanKerja(),
      'jurusan'  => $this->Sub_Kriteria_Alumni_model->getJurusan(),
      'isi'     => 'Backend/Alumni/v_rekomendasi_lowongan'
    ];
    return view('Backend/Alumni/layout/v_wrapper', $data);
  }

  public function hitung($id_alumni)
  {
    $data = [
      'umur' => $this->request->getPost('umur'),
      'kualifikasi_pendidikan' => $this->request->getPost('kualifikasi_pendidikan'),
      'ipk' => $this->request->getPost('ipk'),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
      'pengalaman_kerja' => $this->request->getPost('pengalaman_kerja'),
      'jurusan' => $this->request->getPost('jurusan'),
    ];
    $this->Alumni_Model->update_data($data, $id_alumni);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/alumni/hasil-rekomendasi');
  }
}
