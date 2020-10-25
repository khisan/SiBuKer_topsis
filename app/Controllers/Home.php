<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home',
			'isi' => 'Backend/v_home'
		];
		echo view('Backend/layout/v_wrapper', $data);
	}
}
