<?php

namespace App\Controllers;

class Auth extends BaseController
{
  public function __construct()
  {
  }

  public function index()
  {
    return view('auth/v_auth');
  }
}
