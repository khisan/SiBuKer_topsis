<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AlumniModel;

class Frontend extends BaseController
{
  // public function __construct()
  // {
  //   helper('form');
  // }

  public function index()
  {
  }

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
