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

	public function data_alumni()
	{
		$data = [
			'title' => 'Data Alumni',
			'isi' => 'Backend/v_data_alumni'
		];
		echo view('Backend/layout/v_wrapper', $data);
	}

	public function data_lowongan()
	{
		$data = [
			'title' => 'Data Lowongan',
			'isi' => 'Backend/v_data_lowongan'
		];
		echo view('Backend/layout/v_wrapper', $data);
	}

	public function rekomendasi_alumni()
	{
		$data = [
			'title' => 'Rekomendasi Alumni',
			'isi' => 'Backend/v_rekomendasi_alumni'
		];
		echo view('Backend/layout/v_wrapper', $data);
	}
}
