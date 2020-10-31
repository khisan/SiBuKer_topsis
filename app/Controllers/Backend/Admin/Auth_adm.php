<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class Auth_adm extends BaseController
{
  public function index()
  {
    return view('Auth/Admin/v_login');
  }
  public function login()
  {
    $model = new AuthModel;
    $table = 'tb_admin';
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $row = $model->get_data_login($username, $table);
    // dd($row->password);
    if ($row == NULL) {
      session()->setFlashdata('pesan', 'username anda salah');
      return redirect()->to('/backend/admin/auth_adm');
    }
    if (password_verify($password, $row->password)) {
      $data = array(
        'login' => TRUE,
        'nama' => $row->nama,
      );
      session()->set($data);
      session()->setFlashdata('pesan', 'Berhasil Login');
      return redirect()->to('/backend/admin/Home');
    }
    session()->setFlashdata('pesan', 'Password Salah');
    return redirect()->to('/Backend/admin/auth_adm');
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    session()->setFlashData('pesan', 'Berhasil Logout');
    return redirect()->to('/Backend/admin/auth_adm');
  }
}
