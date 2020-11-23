<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Alumni_model;
use App\Models\Lowongan_model;
use App\Models\Sub_Kriteria_Lowongan_model;
use App\Models\Kriteria_Model;

class HasilRekomendasi extends BaseController
{
  public function __construct()
  {
    $this->Sub_Kriteria_Lowongan_model = new Sub_Kriteria_Lowongan_model();
    $this->Alumni_Model = new Alumni_model();
    $this->Lowongan_model = new Lowongan_model();
    $this->Kriteria_Model = new Kriteria_Model();
  }

  //Pembagi 
  public function pembagi()
  {
    $jmlKriteria = $this->Kriteria_Model->jmlKriteria();
    $getNilai = $this->Lowongan_model->getNilai();
    $no = 1;
    while ($row = $getNilai->getUnbufferedRow()) {
      $matrik[$no - 1] = array($row->umur, $row->kualifikasi_pendidikan, $row->ipk, $row->jenis_kelamin, $row->pengalaman_kerja, $row->jurusan);
      $no++;
    }
    for ($i = 0; $i < $jmlKriteria; $i++) {
      // echo $jmlKriteria;
      $pangkatdua[$i] = 0;
      for ($j = 0; $j < sizeof($matrik); $j++) {
        $pangkatdua[$i] = $pangkatdua[$i] + pow($matrik[$j][$i], 2);
        // print_r($matrik);
        // echo pow($matrik[$j][$i], 2);
      }
      $pembagi[$i] = sqrt($pangkatdua[$i]);
    }
    return $pembagi;
  }

  public function matrikNormalisasi()
  {
    $jmlRecord = $this->Lowongan_model->jmlRecord();
    $no = 1;
    while ($row = $jmlRecord()) {
      $matrikNormalisasi[$no - 1] = array(
        $row / $this->pembagiNM[$no]
      );
    }
    $no++;
    return $row;
  }

  public function index()
  {
    $table = 'tb_alumni';
    $sesiAlumni = session()->get();
    $id_alumni = $sesiAlumni['id_alumni'];
    $data = [
      'title'   => 'Hasil Rekomendasi Lowongan',
      'alumni'  => $this->Alumni_Model->get_alumni_by_id($id_alumni, $table),
      'lowongan'  => $this->Lowongan_model->allData(),
      'tabel_pembagi' => $this->pembagi(),
      'isi'     => 'Backend/Alumni/v_hasil_rekomendasi'
    ];
    return view('Backend/Alumni/layout/v_wrapper', $data);
  }
}
