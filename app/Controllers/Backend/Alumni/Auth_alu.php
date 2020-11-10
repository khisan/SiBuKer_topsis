<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Auth_model;

class Auth_alu extends BaseController
{
  public function register()
  {
    $val = $this->validate([
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ]
      ],
      'jenis_kelamin' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ]
      ],
      'umur' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ]
      ],
      'nim' => [
        'rules' => 'required|is_unique[tb_alumni.nim]|nimCheck',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Dipakai',
          'nimCheck' => '{field} Harus Sesuai Jurusan di ITN Malang'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Dipakai'
        ]
      ]
    ]);

    if (!$val) {
      $pesanvalidasi = \Config\Services::validation();
      return redirect()->to('/alumni/register')->withInput()->with('validate', $pesanvalidasi);
    }

    $data = array(
      'nama' => $this->request->getPost('nama'),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
      'umur' => $this->request->getPost('umur'),
      'nim' => $this->request->getPost('nim'),
      'password' => $this->request->getPost('password'),
    );
    $model = new Auth_model();
    $model->insert($data);
    session()->setFlashdata('pesan', 'Selamat Anda berhasil Registrasi, silahkan login!');
    return redirect()->to('/alumni/login');
  }

  public function login()
  {
    $model = new Auth_model();
    $table = 'tb_alumni';
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $row = $model->get_data_login($username, $table);
    // dd($row->password);
    if ($row == NULL) {
      session()->setFlashdata('pesan', 'username anda salah');
      return redirect()->to('/alumni/login');
    }
    if ($password == $row->password) {
      $data = array(
        'login' => TRUE,
        'nama' => $row->nama,
      );
      session()->set($data);
      session()->setFlashdata('pesan', 'Berhasil Login');
      return redirect()->to('/alumni/home');
    }
    session()->setFlashdata('pesan', 'Password Salah');
    return redirect()->to('/alumni/login');
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    session()->setFlashData('pesan', 'Berhasil Logout');
    return redirect()->to('/alumni/login');
  }
}
