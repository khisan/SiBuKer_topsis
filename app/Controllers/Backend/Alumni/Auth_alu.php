<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Auth_model;

class Auth_alu extends BaseController
{
  public function register()
  {
    if ($this->validate([
      'nim' => [
        'rules' => 'required|is_unique[tb_alumni.nim]|nimCheck',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Ada',
          'nimCheck' => '{field} Harus Sesuai Jurusan di ITN Malang'
        ]
      ],
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Dipakai'
        ]
      ]
    ])) {
      $namaFoto = 'user_default.png';
      $data = array(
        'nim'           => $this->request->getPost('nim'),
        'password'      => $this->request->getPost('password'),
        'nama'          => $this->request->getPost('nama'),
        'foto'          => $namaFoto,
      );
      $model = new Auth_model();
      $model->insert($data);
      session()->setFlashdata('pesan', 'success');
      return redirect()->to('/alumni/register');
    } else {
      session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
      return redirect()->to('/alumni/register');
    }
  }

  public function login()
  {
    $model = new Auth_model();
    $table = 'tb_alumni';
    $nim = $this->request->getPost('nim');
    $password = $this->request->getPost('password');
    $row = $model->get_data_login_alu($nim, $table);
    if ($row == NULL) {
      session()->setFlashdata('pesan', 'errorU');
      return redirect()->to('/alumni/login');
    }
    if ($password == $row->password) {
      $data = array(
        'login' => TRUE,
        'nama'  => $row->nama,
        'id_alumni'   => $row->id_alumni
      );
      session()->set($data);
      session()->setFlashdata('pesan', 'success');
      return redirect()->to('/alumni/home');
    }
    session()->setFlashdata('pesan', 'errorP');
    return redirect()->to('/alumni/login');
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    session()->setFlashData('berhasil', 'Berhasil Logout');
    return redirect()->to('/alumni/login');
  }
}
