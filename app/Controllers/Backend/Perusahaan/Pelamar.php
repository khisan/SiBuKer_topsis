<?php

namespace App\Controllers\Backend\Perusahaan;

use App\Controllers\BaseController;
use App\Models\Lamar_model;
use App\Models\Perusahaan_model;
use App\Models\Lowongan_model;
use App\Models\Alumni_model;

class Pelamar extends BaseController
{
  public function __construct()
  {
    $this->LamarModel = new Lamar_model();
    $this->PerusahaanModel = new Perusahaan_model();
    $this->LowonganModel = new Lowongan_model();
    $this->AlumniModel = new Alumni_model();
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
    $this->sendEmail($id_alumni);
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
    return $this->response->download('lamaran/' . $berkas, null);
  }

  public function setuju($id_lamar, $id_alumni)
  {
    $data = array(
      'status' => 1,
    );
    $this->sendEmail($id_alumni);
    $this->LamarModel->update_data($data, $id_lamar);
    session()->setFlashdata('pesan', 'success');
    return redirect()->to('/perusahaan/pelamar');
  }

  public function tolak($id_lamar, $id_alumni)
  {
    $data = array(
      'status' => 2,
    );
    $this->sendEmail($id_alumni);
    $this->LamarModel->update_data($data, $id_lamar);
    session()->setFlashdata('pesan', 'success');
    return redirect()->to('/perusahaan/pelamar');
  }

  private function sendEmail($id_alumni)
  {
    $email = \Config\Services::email();
    $config = [
      'protocol'      => 'smtp',
      'SMTPHost'     => 'smtp.googlemail.com',
      'SMTPUser'     => 'khisan8@gmail.com',
      'SMTPPass'     => 'ynjekksvndpzlcuh',
      'SMTPPort'     => 587,
      'mailType'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n"
    ];

    $tbl = 'tb_alumni';
    $alumni = $this->AlumniModel->get_alumni_by_id($id_alumni, $tbl);

    $table = 'tb_perusahaan';
    $sesiPerusahaan = session()->get();
    $id_perusahaan = $sesiPerusahaan['id_perusahaan'];

    $Perusahaan = $this->PerusahaanModel->get_perusahaan_by_id($id_perusahaan, $table);

    $email->initialize($config);
    $email->setFrom('khisan8@gmail.com', 'Pusat Karir ITN Malang');
    $email->setTo($alumni['email']);

    $email->setSubject('Review Lamaran');
    $email->setMessage('Ada review dari pihak perusahaan ' . $Perusahaan['nama_perusahaan']  . 'nih dari lamaran yang telah anda kirim : <a href="' . base_url() . '/alumni/lamar">Lihat Review</a>');
    if ($email->send()) {
      return true;
    } else {
      echo $email->printDebugger();
      die;
    }
  }
}
