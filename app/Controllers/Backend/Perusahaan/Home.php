<?php

namespace App\Controllers\Backend\Perusahaan;

use App\Controllers\BaseController;
use App\Models\Perusahaan_model;

class Home extends BaseController
{
	public function __construct()
	{
		$this->PerusahaanModel = new Perusahaan_model();
	}
	public function index()
	{
		$table = 'tb_perusahaan';
		$sesiPerusahaan = session()->get();
		$id_perusahaan = $sesiPerusahaan['id_perusahaan'];
		$data = [
			'title' => 'Home',
			'isi' => 'Backend/Perusahaan/v_home',
			'perusahaan'  => $this->PerusahaanModel->get_perusahaan_by_id($id_perusahaan, $table)
		];
		echo view('Backend/Perusahaan/layout/v_wrapper', $data);
	}
}
