<?php

namespace App\Controllers\Backend\Admin;

use App\Controllers\BaseController;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home',
			'isi' => 'Backend/Admin/v_home'
		];
		echo view('Backend/Admin/layout/v_wrapper', $data);
	}

	public function data_alumni()
	{
		$data = [
			'title' => 'Data Alumni',
			'isi' => 'Backend/Admin/v_data_alumni'
		];
		echo view('Backend/Admin/layout/v_wrapper', $data);
	}

	public function data_lowongan()
	{
		$data = [
			'title' => 'Data Lowongan',
			'isi' => 'Backend/Admin/v_data_lowongan'
		];
		echo view('Backend/Admin/layout/v_wrapper', $data);
	}

	public function rekomendasi_alumni()
	{
		$data = [
			'title' => 'Rekomendasi Alumni',
			'isi' => 'Backend/Admin/v_rekomendasi_alumni'
		];
		echo view('Backend/Admin/layout/v_wrapper', $data);
	}
}
