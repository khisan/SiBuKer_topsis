<?php

namespace App\Controllers\Backend\Perusahaan;

use App\Controllers\BaseController;
use App\Models\Perusahaan_model;

class Profil extends BaseController
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
      'title'   => 'Profil',
      'perusahaan'  => $this->PerusahaanModel->get_perusahaan_by_id($id_perusahaan, $table),
      'isi'     => 'Backend/Perusahaan/v_profil'
    ];
    return view('Backend/Perusahaan/layout/v_wrapper', $data);
  }

  public function update($id_perusahaan)
  {
    // mengambil file foto dari form input
    $foto = $this->request->getFile('foto');

    // edit tanpa foto
    if ($foto->getError() == 4) {
      $data = [
        'id_perusahaan' => $id_perusahaan,
        'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
        'username' => $this->request->getPost('username')
      ];
      $this->PerusahaanModel->update_data($data, $id_perusahaan);
      session()->setFlashdata('pesan', 'success');
      return redirect()->to('/perusahaan/profil');
    } else {
      // menghapus foto lama
      $perusahaan = $this->PerusahaanModel->get_perusahaan_by_id($id_perusahaan, 'tb_perusahaan');
      if ($perusahaan['foto'] !== "" && $perusahaan['foto'] !== "perusahaan.png") {
        unlink('perusahaan/' . $perusahaan['foto']);
      }

      // merename nama file foto
      $nama_file = $foto->getRandomName();
      // jika valid
      $data = array(
        'id_perusahaan' => $id_perusahaan,
        'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
        'username' => $this->request->getPost('username'),
        'foto' => $nama_file
      );
      // memindahkan file foto dari form input ke folder foto di directory
      $foto->move('perusahaan', $nama_file);
      $this->PerusahaanModel->update_data($data, $id_perusahaan);
      session()->setFlashdata('pesan', 'success');
      return redirect()->to('/perusahaan/profil');
    }
  }
}
