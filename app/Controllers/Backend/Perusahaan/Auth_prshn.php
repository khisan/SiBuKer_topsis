<?php

namespace App\Controllers\Backend\Perusahaan;

use App\Controllers\BaseController;
use App\Models\Auth_model;

class Auth_prshn extends BaseController
{
  public function index()
  {
    return view('Auth/Perusahaan/v_login');
  }

  public function daftar()
  {
    return view('Auth/Perusahaan/v_register');
  }

  public function login()
  {
    $model = new Auth_model;
    $table = 'tb_perusahaan';
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $row = $model->get_data_login_adm($username, $table);
    // dd($row->password);
    if ($row == NULL) {
      session()->setFlashdata('pesan', 'errorU');
      return redirect()->to('/Perusahaan/login');
    }
    if ($password == $row->password) {
      $data = array(
        'login' => TRUE,
        'username' => $row->username,
        'nama' => $row->nama,
      );
      session()->set($data);
      session()->setFlashdata('pesan', 'Berhasil Login');
      return redirect()->to('/Perusahaan/home');
    }
    session()->setFlashdata('pesan', 'errorP');
    return redirect()->to('/Perusahaan/login');
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    session()->setFlashData('pesan', 'Berhasil Logout');
    return redirect()->to('/Perusahaan/login');
  }
}
