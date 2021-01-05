<?php

namespace App\Controllers\Backend\Perusahaan;

use App\Controllers\BaseController;
use App\Models\Lamar_model;
use App\Models\Perusahaan_model;
use App\Models\Lowongan_model;

class Pelamar extends BaseController
{
  public function __construct()
  {
    $this->LamarModel = new Lamar_model();
    $this->PerusahaanModel = new Perusahaan_model();
    $this->LowonganModel = new Lowongan_model();
  }

  public function index()
  {
    $table = 'tb_perusahaan';
    $sesiPerusahaan = session()->get();
    $id_perusahaan = $sesiPerusahaan['id_perusahaan'];
    $data = [
      'title'   => 'Data Pelamar',
      'perusahaan'  => $this->PerusahaanModel->get_perusahaan_by_id($id_perusahaan, $table),
      'pelamar'  => $this->LamarModel->get_lamaran_by_id_perusahaan($id_perusahaan),
      'isi'     => 'Backend/Perusahaan/v_data_pelamar'
    ];
    return view('Backend/Perusahaan/layout/v_wrapper', $data);
  }

  public function catatan($id_lamar, $id_perusahaan, $id_lowongan)
  {
    $table = 'tb_perusahaan';
    $sesiPerusahaan = session()->get();
    $id_perusahaan = $sesiPerusahaan['id_perusahaan'];
    $data = [
      'title'   => 'Tambah Catatan',
      'id_perusahaan' => $id_perusahaan,
      'id_lowongan' => $id_lowongan,
      'lamar' => $this->LamarModel->edit($id_lamar),
      'lowongan'  => $this->LowonganModel->getLowonganById($id_lowongan, $table),
      'perusahaan'  => $this->PerusahaanModel->get_perusahaan_by_id($id_perusahaan, $table),
      'isi'     => 'Backend/Perusahaan/v_tambah_catatan'
    ];
    return view('Backend/Perusahaan/layout/v_wrapper', $data);
  }


  public function update($id_lamar)
  {
    $data = array(
      'catatan' => $this->request->getPost('catatan'),
    );
    $this->LamarModel->update_data($data, $id_lamar);
    session()->setFlashdata('pesan', 'success');
    return redirect()->to('/perusahaan/pelamar');
  }

  public function add()
  {
    if ($this->validate([
      'id_lowongan' => [
        'rules' => 'is_unique[tb_lamar.id_lowongan]|trim',
        'errors' => [
          'is_unique' => 'Anda sudah mengirim lamaran yang sama sebelumnya!',
        ]
      ],
      'berkas' => [
        'rules' => 'is_unique[tb_lamar.berkas]|mime_in[berkas,rar]',
        'errors' => [
          'mime_in' => 'Berkas Wajib Berekstensi .rar',
          'is_unique' => 'Nama file tidak boleh sama!'
        ]
      ]
    ])) {
      // mengambil file berkas dari form input
      $berkas = $this->request->getFile('berkas');
      // merename nama file berkas
      $nama_file = $berkas->getName();
      $data = [
        'id_perusahaan' => $this->request->getPost('id_perusahaan'),
        'id_lowongan' => $this->request->getPost('id_lowongan'),
        'id_alumni' => $this->request->getPost('id_alumni'),
        'berkas' => $nama_file,
        'status' => 0,
      ];
      // memindahkan file gambar dari form input ke folder lamaran di directory
      $berkas->move('lamaran', $nama_file);
      $this->LamarModel->add($data);
      session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !');
      return redirect()->to('/alumni/lamar');
    } else {
      $id_perusahaan = $this->request->getPost('id_perusahaan');
      $id_lowongan = $this->request->getPost('id_lowongan');
      session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
      return redirect()->to('/alumni/lamar/tambah/' . $id_perusahaan . '/' . $id_lowongan);
    }
  }

  public function download($nama_berkas)
  {
    $berkas = $nama_berkas;
    // $file_berkas = file_get_contents('lamaran' . $berkas);
    $this->response->download('/perusahaan/' . 'perusahaan.png', null);
    // $file = '/lamaran';
    // echo set_realpath($file);
    return redirect()->to('/alumni/lamar');
  }

  public function setuju($id_lamar)
  {
    $data = array(
      'status' => 1,
    );
    $this->LamarModel->update_data($data, $id_lamar);
    session()->setFlashdata('pesan', 'success');
    return redirect()->to('/perusahaan/pelamar');
  }

  public function tolak($id_lamar)
  {
    $data = array(
      'status' => 2,
    );
    $this->LamarModel->update_data($data, $id_lamar);
    session()->setFlashdata('pesan', 'success');
    return redirect()->to('/perusahaan/pelamar');
  }
}
