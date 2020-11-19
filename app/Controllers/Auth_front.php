<?php

namespace App\Controllers;

class Auth_front extends BaseController
{
  public function login()
  {
    return view('Auth/Alumni/v_login');
  }

  public function register()
  {
    session();
    $data = [
      'validate' => \Config\Services::validation(),
    ];
    return view('Auth/Alumni/v_register', $data);
  }
}
