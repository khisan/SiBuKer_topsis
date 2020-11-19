<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Alumni_model;

class Home extends BaseController
{
	public function __construct()
	{
		$this->AlumniModel = new Alumni_model();
	}
	public function index()
	{
		$table = 'tb_alumni';
		$sesiAlumni = session()->get();
		$id_alumni = $sesiAlumni['id_alumni'];
		$data = [
			'title' => 'Home',
			'isi' => 'Backend/Alumni/v_home',
			'alumni'  => $this->AlumniModel->get_alumni_by_id($id_alumni, $table)
		];
		echo view('Backend/Alumni/layout/v_wrapper', $data);
	}
}
