<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;
use App\Models\Lowongan_model;
use App\Models\Sub_Kriteria_Lowongan_model;

class Lowongan extends BaseController
{
  public function __construct()
  {
    $this->Lowongan_model = new Lowongan_model();
    $this->Sub_Kriteria_Lowongan_model = new Sub_Kriteria_Lowongan_model();
  }

  public function index()
  {
    $data = [
      'title'   => 'Data Lowongan',
      'lowongan'  => $this->Lowongan_model->allData(),
      'isi'     => 'Backend/Admin/v_lowongan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function tambah()
  {
    $data = [
      'title'   => 'Tambah Data Lowongan',
      'umur'  => $this->Sub_Kriteria_Lowongan_model->getUmur(),
      'kualifikasi_pendidikan'  => $this->Sub_Kriteria_Lowongan_model->getKualifikasiPendidikan(),
      'ipk'  => $this->Sub_Kriteria_Lowongan_model->getIpk(),
      'pengalaman_kerja'  => $this->Sub_Kriteria_Lowongan_model->getPengalamanKerja(),
      'isi'     => 'Backend/Admin/v_tambah_lowongan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function add()
  {
    // mengambil file gambar dari form input
    $gambar = $this->request->getFile('gambar');
    // merename nama file gambar
    $nama_file = $gambar->getRandomName();
    $gambar_default = 'default.png';
    if ($gambar->getError() == 4) {
      $data = [
        'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
        'nama_lowongan' => $this->request->getPost('nama_lowongan'),
        'umur' => $this->request->getPost('umur'),
        'kualifikasi_pendidikan' => $this->request->getPost('kualifikasi_pendidikan'),
        'ipk' => $this->request->getPost('ipk'),
        'pengalaman_kerja' => $this->request->getPost('pengalaman_kerja'),
        'deskripsi_lowongan' => $this->request->getPost('deskripsi_lowongan'),
        'gambar' => $gambar_default,
      ];
    } else {
      $data = [
        'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
        'nama_lowongan' => $this->request->getPost('nama_lowongan'),
        'umur' => $this->request->getPost('umur'),
        'kualifikasi_pendidikan' => $this->request->getPost('kualifikasi_pendidikan'),
        'ipk' => $this->request->getPost('ipk'),
        'pengalaman_kerja' => $this->request->getPost('pengalaman_kerja'),
        'deskripsi_lowongan' => $this->request->getPost('deskripsi_lowongan'),
        'gambar' => $nama_file,
      ];
      // memindahkan file gambar dari form input ke folder gambar di directory
      $gambar->move('lowongan', $nama_file);
    }
    $this->Lowongan_model->add($data);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !');
    return redirect()->to('/admin/lowongan');
  }

  public function ubah($id_lowongan)
  {
    $data = [
      'title' => 'Edit Data Lowongan',
      'umur'  => $this->Sub_Kriteria_Lowongan_model->getUmur(),
      'kualifikasi_pendidikan'  => $this->Sub_Kriteria_Lowongan_model->getKualifikasiPendidikan(),
      'ipk'  => $this->Sub_Kriteria_Lowongan_model->getIpk(),
      'pengalaman_kerja'  => $this->Sub_Kriteria_Lowongan_model->getPengalamanKerja(),
      'lowongan' => $this->Lowongan_model->edit($id_lowongan),
      'isi'   => 'Backend/Admin/v_edit_lowongan'
    ];
    return view('Backend/Admin/layout/v_wrapper', $data);
  }

  public function update($id_lowongan)
  {
    // mengambil file gambar dari form input
    $gambar = $this->request->getFile('gambar');

    // edit tanpa gambar
    if ($gambar->getError() == 4) {
      $data = [
        'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
        'nama_lowongan' => $this->request->getPost('nama_lowongan'),
        'umur' => $this->request->getPost('umur'),
        'kualifikasi_pendidikan' => $this->request->getPost('kualifikasi_pendidikan'),
        'ipk' => $this->request->getPost('ipk'),
        'pengalaman_kerja' => $this->request->getPost('pengalaman_kerja'),
        'deskripsi_lowongan' => $this->request->getPost('deskripsi_lowongan'),
      ];
      $this->Lowongan_model->update_data($data, $id_lowongan);
      session()->setFlashdata('success', 'Data Berhasil Diubah');
      return redirect()->to('/admin/lowongan');
    } else {
      // menghapus gambar lama
      $lowongan = $this->Lowongan_model->detail_data($id_lowongan);
      if ($lowongan['gambar'] !== "" && $lowongan['gambar'] !== "default.png") {
        unlink('lowongan/' . $lowongan['gambar']);
      }
      // merename nama file gambar
      $nama_file = $gambar->getRandomName();
      // jika valid
      $data = array(
        'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
        'nama_lowongan' => $this->request->getPost('nama_lowongan'),
        'umur' => $this->request->getPost('umur'),
        'kualifikasi_pendidikan' => $this->request->getPost('kualifikasi_pendidikan'),
        'ipk' => $this->request->getPost('ipk'),
        'pengalaman_kerja' => $this->request->getPost('pengalaman_kerja'),
        'deskripsi_lowongan' => $this->request->getPost('deskripsi_lowongan'),
        'gambar' => $nama_file,
      );
      // memindahkan file gambar dari form input ke folder gambar di directory
      $gambar->move('lowongan', $nama_file);
      $this->Lowongan_model->update_data($data, $id_lowongan);
      session()->setFlashdata('pesan', 'success');
      return redirect()->to('/admin/lowongan');
    }
  }

  public function delete($id_lowongan)
  {
    $this->Lowongan_model->delete_data($id_lowongan);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/admin/lowongan');
  }
}
