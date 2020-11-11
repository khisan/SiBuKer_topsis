<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;

class Home extends BaseController
{
	public function index()
	{
		// dd($sesiAlumni = session()->get());
		// dd($nim = $sesiAlumni['nim']);
		$data = [
			'title' => 'Home',
			'isi' => 'Backend/Alumni/v_home'
		];
		echo view('Backend/Alumni/layout/v_wrapper', $data);
	}

	// public function data_lowongan()
	// {
	// 	$data = [
	// 		'title' => 'Data Lowongan',
	// 		'isi' => 'Backend/Admin/v_data_lowongan'
	// 	];
	// 	echo view('Backend/Alumni/layout/v_wrapper', $data);
	// }

	// public function rekomendasi_lowongan()
	// {
	// 	$data = [
	// 		'title' => 'Rekomendasi Lowongan',
	// 		'isi' => 'Backend/Alumni/v_rekomendasi_lowongan'
	// 	];
	// 	echo view('Backend/Alumni/layout/v_wrapper', $data);
	// }
}
