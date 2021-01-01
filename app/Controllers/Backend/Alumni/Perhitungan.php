<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Alumni_model;
use App\Models\Lowongan_model;
use App\Models\Sub_Kriteria_Lowongan_model;
use App\Models\Kriteria_Model;

class Perhitungan extends BaseController
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
    $sesiJurusan = session()->get();
    $jurusan = $sesiJurusan['jurusan'];
    $jmlKriteria = $this->Kriteria_Model->jmlKriteria();
    $getNilai = $this->Lowongan_model->getNilai($jurusan);
    $no = 1;
    $matrikNormalisasi = array();
    while ($row = $getNilai->getUnbufferedRow()) {
      $matrikNormalisasi[$no - 1] = array($row->umur, $row->kualifikasi_pendidikan, $row->ipk, $row->pengalaman_kerja);
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
    $sesiJurusan = session()->get();
    $jurusan = $sesiJurusan['jurusan'];
    $pembagi = $this->pembagi();
    $getNilai = $this->Lowongan_model->getNilai($jurusan);
    $no = 1;
    $matrikNormalisasi = array();
    while ($row = $getNilai->getUnbufferedRow()) {
      $matrikNormalisasi[$no - 1] = array(
        $row->umur / $pembagi[0],
        $row->kualifikasi_pendidikan / $pembagi[1],
        $row->ipk / $pembagi[2],
        $row->pengalaman_kerja / $pembagi[3],
        $row->nama_lowongan,
      );
      $no++;
    }
    return $matrikNormalisasi;
  }

  //Normalisasi Bobot
  function normalisasiBobot()
  {
    $sesiJurusan = session()->get();
    $jurusan = $sesiJurusan['jurusan'];
    $matrikNormalisasi = $this->matrikNormalisasi();
    $lowongan = $this->Lowongan_model->getNilai($jurusan);
    $sesiNilaiAlumni = session()->get();
    $umur = $sesiNilaiAlumni['umur'];
    $kualifikasi_pendidikan = $sesiNilaiAlumni['kualifikasi_pendidikan'];
    $ipk = $sesiNilaiAlumni['ipk'];
    $pengalaman_kerja = $sesiNilaiAlumni['pengalaman_kerja'];
    $no = 1;
    $normalisasiBobot = array();
    while ($lowongan->getUnbufferedRow()) {
      $normalisasiBobot[$no - 1] = array(
        $matrikNormalisasi[$no - 1][0] * $umur,
        $matrikNormalisasi[$no - 1][1] * $kualifikasi_pendidikan,
        $matrikNormalisasi[$no - 1][2] * $ipk,
        $matrikNormalisasi[$no - 1][3] * $pengalaman_kerja,
        $matrikNormalisasi[$no - 1][4]
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
      max($NormalisasiBobotTrans[2]),
      max($NormalisasiBobotTrans[3]),
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
      min($NormalisasiBobotTrans[2]),
      min($NormalisasiBobotTrans[3]),
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

  // Nilai V
  function nilaiV()
  {
    $sesiJurusan = session()->get();
    $jurusan = $sesiJurusan['jurusan'];
    $lowongan = $this->Lowongan_model->getNilai($jurusan);
    $dMin = $this->dMin();
    $dPlus = $this->dPlus();
    $nilaiV = array();
    $no = 1;
    while ($lowongan->getUnbufferedRow()) {
      array_push(
        $nilaiV,
        $dMin[$no - 1] / ($dMin[$no - 1] + $dPlus[$no - 1]),
      );
      $no++;
    }
    return $nilaiV;
  }

  // 5 Nilai V Tertinggi
  function nilaiVAlt()
  {
    $sesiJurusan = session()->get();
    $jurusan = $sesiJurusan['jurusan'];
    $nilaiVTertinggi = $this->nilaiV();
    $nilaiVAlt = array();
    $lowongan = $this->Lowongan_model->getNilai($jurusan);
    $no = 0;
    while ($low = $lowongan->getUnbufferedRow('array')) {
      $nilaiVAlt[$no][0] = $nilaiVTertinggi[$no];
      $nilaiVAlt[$no][1] = $low['nama_lowongan'];
      $no++;
    }
    return $nilaiVAlt;
  }

  function nilaiVTertinggi()
  {
    $nilaiVAlt = $this->nilaiVAlt();
    rsort($nilaiVAlt);
    foreach ($nilaiVAlt as $x_value) {
      $hsl[] =  array($x_value[1], $x_value[0]);
    }
    return $hsl;
  }

  function nilaiVTertinggiLimit()
  {
    $sesiJurusan = session()->get();
    $jurusan = $sesiJurusan['jurusan'];
    try {
      if ($this->Lowongan_model->countLowonganByJurusan($jurusan) < 5) {
        $nilaiVTertinggi = $this->nilaiVTertinggi();
        $nilaiVTertinggiLimit = array();
        $lowongan = $this->Lowongan_model->getLowonganByJurusan($jurusan);
        $no = 0;
        while ($low = $lowongan->getUnbufferedRow('array')) {
          $nilaiVTertinggiLimit[$no] = $nilaiVTertinggi[$no];
          $no++;
        }
      } elseif ($this->Lowongan_model->countLowonganByJurusan($jurusan) > 5) {
        $nilaiVTertinggi = $this->nilaiVTertinggi();
        $nilaiVTertinggiLimit = array();
        $lowongan = $this->Lowongan_model->getNilaiLimit();
        $no = 0;
        while ($low = $lowongan->getUnbufferedRow('array')) {
          $nilaiVTertinggiLimit[$no] = $nilaiVTertinggi[$no];
          $no++;
        }
      }
    } catch (\Throwable $th) {
      "error";
    }
    return $nilaiVTertinggiLimit;
  }

  public function index()
  {
    $table = 'tb_alumni';
    $sesiAlumni = session()->get();
    $id_alumni = $sesiAlumni['id_alumni'];
    $jurusan = $sesiAlumni['jurusan'];
    $data = [
      'title'   => 'Detail Perhitungan TOPSIS',
      'alumni'  => $this->Alumni_Model->get_alumni_by_id($id_alumni, $table),
      'lowongan'  => $this->Lowongan_model->getLowonganByJurusan($jurusan),
      'lowongan_get_nilai' => $this->Lowongan_model->getNilai($jurusan),
      'lowongan_get_nilai_2' => $this->Lowongan_model->getNilai($jurusan),
      'lowongan_get_nilai_limit' => $this->Lowongan_model->getNilaiLimit(),
      'tabel_pembagi' => $this->pembagi(),
      'matrik_normalisasi' => $this->matrikNormalisasi(),
      'normalisasi_bobot' => $this->normalisasiBobot(),
      'matrik_solusi_p' => $this->matrikSolusiIdealPositif(),
      'matrik_solusi_n' => $this->matrikSolusiIdealNegatif(),
      'd_plus' => $this->dPlus(),
      'd_min' => $this->dMin(),
      'nilai_v' => $this->nilaiV(),
      'nilai_v_tertinggi_limit' => $this->nilaiVTertinggiLimit(),
      'isi'     => 'Backend/Alumni/v_detail_perhitungan'
    ];
    return view('Backend/Alumni/layout/v_wrapper', $data);
  }
}
