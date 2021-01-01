<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Alumni_model;

class Profil extends BaseController
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
      'title'   => 'Profil',
      'alumni'  => $this->AlumniModel->get_alumni_by_id($id_alumni, $table),
      'isi'     => 'Backend/Alumni/v_profil'
    ];
    return view('Backend/Alumni/layout/v_wrapper', $data);
  }

  public function update($id_alumni)
  {
    // mengambil file foto dari form input
    $foto = $this->request->getFile('foto');

    // edit tanpa foto
    if ($foto->getError() == 4) {
      $data = [
        'id_alumni' => $id_alumni,
        'nama' => $this->request->getPost('nama'),
      ];
      $this->AlumniModel->update_data($data, $id_alumni);
      session()->setFlashdata('pesan', 'success');
      return redirect()->to('/alumni/profil');
    } else {
      // menghapus foto lama
      $alumni = $this->AlumniModel->get_alumni_by_id($id_alumni, 'tb_alumni');
      if ($alumni['foto'] !== "" && $alumni['foto'] !== "user_default.png") {
        unlink('alumni/' . $alumni['foto']);
      }

      // merename nama file foto
      $nama_file = $foto->getRandomName();
      // jika valid
      $data = array(
        'id_alumni' => $id_alumni,
        'nama' => $this->request->getPost('nama'),
        'foto' => $nama_file
      );
      // memindahkan file foto dari form input ke folder foto di directory
      $foto->move('alumni', $nama_file);
      $this->AlumniModel->update_data($data, $id_alumni);
      session()->setFlashdata('pesan', 'success');
      return redirect()->to('/alumni/profil');
    }
  }
}
