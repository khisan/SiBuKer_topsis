<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home',
			'isi' => 'Backend/Alumni/v_home'
		];
		echo view('Backend/layout/v_wrapper', $data);
	}

	public function data_alumni()
	{
		$data = [
			'title' => 'Profil Saya',
			'isi' => 'Backend/Alumni/v_profil_saya'
		];
		echo view('Backend/layout/v_wrapper', $data);
	}

	public function data_lowongan()
	{
		$data = [
			'title' => 'Data Lowongan',
			'isi' => 'Backend/Admin/v_data_lowongan'
		];
		echo view('Backend/layout/v_wrapper', $data);
	}

	public function rekomendasi_alumni()
	{
		$data = [
			'title' => 'Rekomendasi Lowongan',
			'isi' => 'Backend/Alumni/v_rekomendasi_lowongan'
		];
		echo view('Backend/layout/v_wrapper', $data);
	}
}
