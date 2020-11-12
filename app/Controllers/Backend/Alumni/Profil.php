<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Alumni_model;
use App\Models\Jurusan_model;

class Profil extends BaseController
{
  public function __construct()
  {
    $this->AlumniModel = new Alumni_model();
    $this->JurusanModel = new Jurusan_model();
  }
  public function index()
  {
    $table = 'tb_alumni';
    $sesiAlumni = session()->get();
    $nim = $sesiAlumni['nim'];
    $data = [
      $table = 'tb_alumni',
      $nim = $sesiAlumni['nim'],
      'title'   => 'Profil',
      'alumni'  => $this->AlumniModel->get_alumni_by_nim($nim, $table),
      'jurusan' => $this->JurusanModel->allData(),
      'isi'     => 'Backend/Alumni/v_profil'
    ];
    return view('Backend/Alumni/layout/v_wrapper', $data);
  }

  public function update($id_alumni)
  {
    // mengambil file foto dari form input
    $foto = $this->request->getFile('foto');

    if ($foto->getError() == 4) {
      $data = [
        'id_alumni' => $id_alumni,
        'password' => $this->request->getPost('password'),
        'nama' => $this->request->getPost('nama'),
        'id_jurusan' => $this->request->getPost('jurusan'),
        'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        'umur' => $this->request->getPost('umur'),
        'kualifikasi_pendidikan' => $this->request->getPost('kualifikasi_pendidikan'),
        'ipk' => $this->request->getPost('ipk'),
      ];
      $this->AlumniModel->update_data($data, $id_alumni);
      session()->setFlashdata('pesan', 'success');
      return redirect()->to('/alumni/profil');
    } else {
      // menghapus foto lama
      $alumni = $this->AlumniModel->detail_data($id_alumni);
      if ($alumni['foto'] !== "") {
        unlink('foto/' . $alumni['foto']);
      }

      // merename nama file foto
      $nama_file = $foto->getRandomName();
      // jika valid
      $data = array(
        'id_alumni' => $id_alumni,
        'password' => $this->request->getPost('password'),
        'nama' => $this->request->getPost('nama'),
        'id_jurusan' => $this->request->getPost('jurusan'),
        'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        'umur' => $this->request->getPost('umur'),
        'kualifikasi_pendidikan' => $this->request->getPost('kualifikasi_pendidikan'),
        'ipk' => $this->request->getPost('ipk'),
        'foto' => $nama_file
      );
      // memindahkan file foto dari form input ke folder foto di directory
      $foto->move('foto', $nama_file);
      $this->AlumniModel->update_data($data, $id_alumni);
      session()->setFlashdata('pesan', 'success');
      return redirect()->to('/alumni/profil');
    }
  }
}
