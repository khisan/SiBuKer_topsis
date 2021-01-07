<?php

namespace App\Controllers\Backend\Alumni;

use App\Controllers\BaseController;
use App\Models\Auth_model;
use App\Models\Alumni_Token_model;
use App\Models\Alumni_model;

class Auth_alu extends BaseController
{
  public function register()
  {
    if ($this->validate([
      'nim' => [
        'rules' => 'required|is_unique[tb_alumni.nim]|nimCheck',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Ada',
          'nimCheck' => '{field} Harus Sesuai Jurusan di ITN Malang'
        ]
      ],
      'email' => [
        'rules' => 'required|is_unique[tb_alumni.email]|valid_email|trim',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Ada',
          'valid_email' => '{field} Harus yang Valid'
        ]
      ],
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Dipakai'
        ]
      ]
    ])) {
      $namaFoto = 'user_default.png';
      $email = $this->request->getPost('email');
      $data = array(
        'nim'                     => $this->request->getPost('nim'),
        'email'                   => $email,
        'password'                => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'nama'                    => $this->request->getPost('nama'),
        'foto'                    => $namaFoto,
        'kualifikasi_pendidikan'  => $this->request->getPost('kualifikasi_pendidikan'),
        'jurusan'                 => $this->request->getPost('jurusan'),
        'is_active'     => 0,
      );
      // siapkan token
      $buat_token = base64_encode(random_bytes(32));
      $token = [
        'email'         => $email,
        'token'         => $buat_token,
        'date_created'  => time()
      ];
      $Tokenmodel = new Alumni_Token_model();
      $Authmodel = new Auth_model();
      $Authmodel->insert($data);
      $Tokenmodel->add($token);
      $this->sendEmail($buat_token, 'verify');
      session()->setFlashdata('pesan', 'success');
      return redirect()->to('/alumni/register');
    } else {
      session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
      return redirect()->to('/alumni/register');
    }
  }

  private function sendEmail($buat_token, $type)
  {
    $email = \Config\Services::email();
    $config = [
      'protocol'      => 'smtp',
      'SMTPHost'     => 'smtp.googlemail.com',
      'SMTPUser'     => 'khisan8@gmail.com',
      'SMTPPass'     => 'ynjekksvndpzlcuh',
      'SMTPPort'     => 587,
      'mailType'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n"
    ];

    $email->initialize($config);

    $email->setFrom('khisan8@gmail.com', 'Pusat Karir ITN Malang');
    $email->setTo($this->request->getPost('email'));

    if ($type == 'verify') {
      $email->setSubject('Verifikasi Akun');
      $email->setMessage('Klik link berikut untuk aktivasi akun : <a href="' . base_url() . '/Backend/Alumni/auth_alu/verify?email=' . $this->request->getPost('email') . '&token=' . urlencode($buat_token) . '">Activate</a>');
    }

    if ($email->send()) {
      return true;
    } else {
      echo $email->printDebugger();
      die;
    }
  }

  public function verify()
  {
    $email = $this->request->getGet('email');
    $token = $this->request->getGet('token');
    $Alumnimodel = new Alumni_model();
    $Tokenmodel = new Alumni_Token_model();

    $alumni = $Alumnimodel->getEmail($email);

    if ($alumni) {
      $token = $Tokenmodel->getToken($token);
      $alumni_token = $Tokenmodel->getAllByToken($token);

      if ($token) {
        if (time() - $alumni_token['date_created'] < (60 * 60 * 24)) {
          $db      = \Config\Database::connect();
          $builder = $db->table('tb_alumni');
          $builder->set('is_active', 1);
          $builder->where('email', $email);
          $builder->update();

          $Tokenmodel->delete_data($email);

          session()->setFlashdata('pesan', 'success');
          return redirect()->to('/alumni/login');
        } else {
          $Alumnimodel->delete_email($email);
          $Tokenmodel->delete_data($email);

          session()->setFlashdata('pesan', 'tokenExp');
          return redirect()->to('/alumni/login');
        }
      } else {
        session()->setFlashdata('pesan', 'tokenWro');
        return redirect()->to('/alumni/login');
      }
    } else {
      session()->setFlashdata('pesan', 'emailS');
      return redirect()->to('/alumni/login');
    }
  }

  public function login()
  {
    $model = new Auth_model();
    $table = 'tb_alumni';
    $nim = $this->request->getPost('nim');
    $password = $this->request->getPost('password');
    $row = $model->get_data_login_alu($nim, $table);
    if ($row != NULL) {
      if ($row['is_active'] == 1) {
        if (password_verify($password, $row['password'])) {
          $data = array(
            'login' => TRUE,
            'nama'  => $row['nama'],
            'id_alumni'   => $row['id_alumni'],
            'nim'   => $row['nim']
          );
          session()->set($data);
          session()->setFlashdata('pesan', 'success');
          return redirect()->to('/alumni/home');
        } else {
          session()->setFlashdata('pesan', 'errorP');
          return redirect()->to('/alumni/login');
        }
      } else {
        session()->setFlashdata('pesan', 'errorT');
        return redirect()->to('/alumni/login');
      }
    } else {
      session()->setFlashdata('pesan', 'errorU');
      return redirect()->to('/alumni/login');
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    session()->setFlashData('berhasil', 'Berhasil Logout');
    return redirect()->to('/alumni/login');
  }
}
