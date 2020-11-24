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
  function pembagi()
  {
    $jmlKriteria = $this->Kriteria_Model->jmlKriteria();
    $getNilai = $this->Lowongan_model->getNilai();
    $no = 1;
    while ($row = $getNilai->getUnbufferedRow()) {
      $matrikNormalisasi[$no - 1] = array($row->umur, $row->kualifikasi_pendidikan, $row->ipk, $row->jenis_kelamin, $row->pengalaman_kerja, $row->jurusan);
      $no++;
    }
    for ($i = 0; $i < $jmlKriteria; $i++) {
      $pangkatdua[$i] = 0;
      for ($j = 0; $j < sizeof($matrikNormalisasi); $j++) {
        $pangkatdua[$i] = $pangkatdua[$i] + pow($matrikNormalisasi[$j][$i], 2);
      }
      $pembagi[$i] = sqrt($pangkatdua[$i]);
    }
    return $pembagi;
  }

  //Matrik Normalisasi
  function matrikNormalisasi()
  {
    $pembagi = $this->pembagi();
    $getNilai = $this->Lowongan_model->getNilai();
    $no = 1;
    while ($row = $getNilai->getUnbufferedRow()) {
      $matrikNormalisasi[$no - 1] = array(
        $row->umur / $pembagi[0],
        $row->kualifikasi_pendidikan / $pembagi[1],
        $row->ipk / $pembagi[2],
        $row->jenis_kelamin / $pembagi[3],
        $row->pengalaman_kerja / $pembagi[4],
        $row->jurusan / $pembagi[5]
      );
      $no++;
    }
    return $matrikNormalisasi;
  }

  //Normalisasi Bobot
  function normalisasiBobot()
  {
    $matrikNormalisasi = $this->matrikNormalisasi();
    $lowongan = $this->Lowongan_model->getNilai();
    $sesiNilaiAlumni = session()->get();
    $umur = $sesiNilaiAlumni['umur'];
    $kualifikasi_pendidikan = $sesiNilaiAlumni['kualifikasi_pendidikan'];
    $ipk = $sesiNilaiAlumni['ipk'];
    $jenis_kelamin = $sesiNilaiAlumni['jenis_kelamin'];
    $pengalaman_kerja = $sesiNilaiAlumni['pengalaman_kerja'];
    $jurusan = $sesiNilaiAlumni['jurusan'];
    $no = 1;
    while ($lowongan->getUnbufferedRow()) {
      $normalisasiBobot[$no - 1] = array(
        $matrikNormalisasi[$no - 1][0] * $umur,
        $matrikNormalisasi[$no - 1][1] * $kualifikasi_pendidikan,
        $matrikNormalisasi[$no - 1][2] * $ipk,
        $matrikNormalisasi[$no - 1][3] * $jenis_kelamin,
        $matrikNormalisasi[$no - 1][4] * $pengalaman_kerja,
        $matrikNormalisasi[$no - 1][5] * $jurusan
      );
      $no++;
    }
    return $normalisasiBobot;
  }

  // Normalisasi Transpose
  function Transpose($squareArray)
  {
    if ($squareArray == null) {
      return null;
    }
    $rotatedArray = array();
    $r = 0;

    foreach ($squareArray as $row) {
      $c = 0;
      if (is_array($row)) {
        foreach ($row as $cell) {
          $rotatedArray[$c][$r] = $cell;
          ++$c;
        }
      } else $rotatedArray[$c][$r] = $row;
      ++$r;
    }
    return $rotatedArray;
  }

  // Matrik Solusi Ideal Positif
  function matrikSolusiIdealPositif()
  {
    $NormalisasiBobot = $this->normalisasiBobot();
    $NormalisasiBobotTrans = $this->Transpose($NormalisasiBobot);
    $matrikSolusiIdealPositif = array(
      min($NormalisasiBobotTrans[0]),
      max($NormalisasiBobotTrans[1]),
      min($NormalisasiBobotTrans[2]),
      max($NormalisasiBobotTrans[3]),
      min($NormalisasiBobotTrans[4]),
      max($NormalisasiBobotTrans[5]),
    );
    return $matrikSolusiIdealPositif;
  }

  // Matrik Solusi Ideal Positif Negatif
  function matrikSolusiIdealNegatif()
  {
    $NormalisasiBobot = $this->normalisasiBobot();
    $NormalisasiBobotTrans = $this->Transpose($NormalisasiBobot);
    $matrikSolusiIdealNegatif = array(
      max($NormalisasiBobotTrans[0]),
      min($NormalisasiBobotTrans[1]),
      max($NormalisasiBobotTrans[2]),
      min($NormalisasiBobotTrans[3]),
      max($NormalisasiBobotTrans[4]),
      min($NormalisasiBobotTrans[5]),
    );
    return $matrikSolusiIdealNegatif;
  }

  // Fungsi Mengitung Jarak Antara Nilai Terbobot Setiap Alternatif Terhadap Solusi Ideal Positif
  function JarakIplus($aplus, $bob)
  {
    for ($i = 0; $i < sizeof($bob); $i++) {
      $dplus[$i] = 0;
      for ($j = 0; $j < sizeof($aplus); $j++) {
        $dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]), 2);
      }
      $dplus[$i] = round(sqrt($dplus[$i]), 4);
    }
    return $dplus;
  }

  // Dplus Jarak
  function dPlus()
  {
    $NormalisasiBobot = $this->normalisasiBobot();
    $IdealPositif = $this->matrikSolusiIdealPositif();
    $dPlus = $this->JarakIplus($IdealPositif, $NormalisasiBobot);
    return $dPlus;
  }

  // Dmin Jarak
  function dMin()
  {
    $NormalisasiBobot = $this->normalisasiBobot();
    $IdealNegatif = $this->matrikSolusiIdealNegatif();
    $dMin = $this->JarakIplus($IdealNegatif, $NormalisasiBobot);
    return $dMin;
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
      'lowongan_get_nilai' => $this->Lowongan_model->getNilai(),
      'tabel_pembagi' => $this->pembagi(),
      'matrik_normalisasi' => $this->matrikNormalisasi(),
      'normalisasi_bobot' => $this->normalisasiBobot(),
      'matrik_solusi_p' => $this->matrikSolusiIdealPositif(),
      'matrik_solusi_n' => $this->matrikSolusiIdealNegatif(),
      'd_plus' => $this->dPlus(),
      'd_min' => $this->dMin(),
      'isi'     => 'Backend/Alumni/v_hasil_rekomendasi'
    ];
    return view('Backend/Alumni/layout/v_wrapper', $data);
  }
}
