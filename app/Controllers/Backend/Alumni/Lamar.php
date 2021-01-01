<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Lamar_model;
use App\Models\Alumni_model;

class Lamar extends BaseController
{
  public function __construct()
  {
    $this->LamarModel = new Lamar_model();
    $this->AlumniModel = new Alumni_model();
  }

  public function index()
  {
    $table = 'tb_alumni';
    $table2 = 'tb_lamar';
    $sesiAlumni = session()->get();
    $id_alumni = $sesiAlumni['id_alumni'];
    $data = [
      'title'   => 'Data Lamaran',
      'alumni'  => $this->AlumniModel->get_alumni_by_id($id_alumni, $table),
      'lamar'  => $this->LamarModel->get_lamaran_by_id_alumni($id_alumni, $table2),
      'isi'     => 'Backend/Alumni/v_data_lamar'
    ];
    return view('Backend/Alumni/layout/v_wrapper', $data);
  }

  public function tambah($id_perusahaan, $id_lowongan)
  {
    $table = 'tb_alumni';
    $sesiAlumni = session()->get();
    $id_alumni = $sesiAlumni['id_alumni'];
    $data = [
      'title'   => 'Tambah Data Lamaran',
      'id_perusahaan' => $id_perusahaan,
      'id_lowongan' => $id_lowongan,
      'id_alumni' => $id_alumni,
      'validate' => \Config\Services::validation(),
      'alumni'  => $this->AlumniModel->get_alumni_by_id($id_alumni, $table),
      'isi'     => 'Backend/Alumni/v_tambah_lamar'
    ];
    // session()->set($data);
    return view('Backend/Alumni/layout/v_wrapper', $data);
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
        'rules' => 'required',
        'errors' => [
          'required' => 'Berkas Tidak Boleh Kosong'
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
      session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
      return redirect()->to('/alumni/lamar/tambah/(:num)/(:num)');
    }
  }
}
