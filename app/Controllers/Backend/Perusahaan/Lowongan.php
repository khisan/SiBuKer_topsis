<?php

namespace App\Controllers\Backend\Perusahaan;

use App\Controllers\BaseController;
use App\Models\Perusahaan_model;
use App\Models\Lowongan_model;
use App\Models\Sub_Kriteria_Lowongan_model;

class Lowongan extends BaseController
{
  public function __construct()
  {
    $this->PerusahaanModel = new Perusahaan_model();
    $this->Lowongan_model = new Lowongan_model();
    $this->Sub_Kriteria_Lowongan_model = new Sub_Kriteria_Lowongan_model();
  }

  public function index()
  {
    $table = 'tb_perusahaan';
    $sesiPerusahaan = session()->get();
    $id_perusahaan = $sesiPerusahaan['id_perusahaan'];
    $data = [
      'title'   => 'Data Lowongan',
      'perusahaan'  => $this->PerusahaanModel->get_perusahaan_by_id($id_perusahaan, $table),
      'lowongan'  => $this->Lowongan_model->getLowonganByPerusahaan($id_perusahaan),
      'id_perusahaan' => $id_perusahaan,
      'isi'     => 'Backend/Perusahaan/v_lowongan'
    ];
    return view('Backend/Perusahaan/layout/v_wrapper', $data);
  }

  public function tambah()
  {
    $table = 'tb_perusahaan';
    $sesiPerusahaan = session()->get();
    $id_perusahaan = $sesiPerusahaan['id_perusahaan'];
    $data = [
      'title'   => 'Tambah Data Lowongan',
      'perusahaan'  => $this->PerusahaanModel->get_perusahaan_by_id($id_perusahaan, $table),
      'id_perusahaan' => $id_perusahaan,
      'umur'  => $this->Sub_Kriteria_Lowongan_model->getUmur(),
      'kualifikasi_pendidikan'  => $this->Sub_Kriteria_Lowongan_model->getKualifikasiPendidikan(),
      'ipk'  => $this->Sub_Kriteria_Lowongan_model->getIpk(),
      'pengalaman_kerja'  => $this->Sub_Kriteria_Lowongan_model->getPengalamanKerja(),
      'isi'     => 'Backend/Perusahaan/v_tambah_lowongan'
    ];
    return view('Backend/Perusahaan/layout/v_wrapper', $data);
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
        'id_perusahaan' => $this->request->getPost('id_perusahaan'),
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
        'id_perusahaan' => $this->request->getPost('id_perusahaan'),
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
    return redirect()->to('/perusahaan/lowongan');
  }

  public function ubah($id_lowongan)
  {
    $table = 'tb_perusahaan';
    $sesiPerusahaan = session()->get();
    $id_perusahaan = $sesiPerusahaan['id_perusahaan'];
    $data = [
      'title' => 'Edit Data Lowongan',
      'perusahaan'  => $this->PerusahaanModel->get_perusahaan_by_id($id_perusahaan, $table),
      'umur'  => $this->Sub_Kriteria_Lowongan_model->getUmur(),
      'kualifikasi_pendidikan'  => $this->Sub_Kriteria_Lowongan_model->getKualifikasiPendidikan(),
      'ipk'  => $this->Sub_Kriteria_Lowongan_model->getIpk(),
      'pengalaman_kerja'  => $this->Sub_Kriteria_Lowongan_model->getPengalamanKerja(),
      'lowongan' => $this->Lowongan_model->edit($id_lowongan),
      'isi'   => 'Backend/Perusahaan/v_edit_lowongan'
    ];
    return view('Backend/Perusahaan/layout/v_wrapper', $data);
  }

  public function update($id_lowongan)
  {
    // mengambil file gambar dari form input
    $gambar = $this->request->getFile('gambar');
    // dd($gambar->getRealPath());

    // edit tanpa gambar
    if ($gambar->getError() == 4) {
      $data = [
        'nama_lowongan' => $this->request->getPost('nama_lowongan'),
        'umur' => $this->request->getPost('umur'),
        'kualifikasi_pendidikan' => $this->request->getPost('kualifikasi_pendidikan'),
        'ipk' => $this->request->getPost('ipk'),
        'pengalaman_kerja' => $this->request->getPost('pengalaman_kerja'),
        'deskripsi_lowongan' => $this->request->getPost('deskripsi_lowongan'),
      ];
      $this->Lowongan_model->update_data($data, $id_lowongan);
      session()->setFlashdata('success', 'Data Berhasil Diubah');
      return redirect()->to('/perusahaan/lowongan');
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
      return redirect()->to('/perusahaan/lowongan');
    }
  }

  public function delete($id_lowongan)
  {
    $lowongan = $this->Lowongan_model->detail_data($id_lowongan);
    unlink('lowongan/' . $lowongan['gambar']);
    $this->Lowongan_model->delete_data($id_lowongan);
    session()->setFlashdata('success', 'Data Berhasil Diubah');
    return redirect()->to('/perusahaan/lowongan');
  }
}
