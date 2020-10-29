<?php

namespace App\Controllers;

class Auth_alu extends BaseController
{
  public function __construct()
  {
  }

  public function index()
  {
    return view('auth/alumni/v_auth');
  }
}
