<?php

namespace App\Controllers\Backend\Perusahaan;

use App\Controllers\BaseController;
use App\Models\Auth_model;
use App\Models\Perusahaan_Token_model;
use App\Models\Perusahaan_model;

class Auth_prshn extends BaseController
{
  public function index()
  {
    return view('Auth/Perusahaan/v_login');
  }

  public function daftar()
  {
    session();
    $data = [
      'validate' => \Config\Services::validation(),
    ];
    return view('Auth/Perusahaan/v_register', $data);
  }

  public function register()
  {
    if ($this->validate([
      'username' => [
        'rules' => 'required|is_unique[tb_perusahaan.username]',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Ada',
        ]
      ],
      'email' => [
        'rules' => 'required|is_unique[tb_perusahaan.email]|valid_email',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Ada',
          'valid_email' => '{field} Harus yang Valid'
        ]
      ],
      'nama_perusahaan' => [
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
      $Foto = 'perusahaan.png';
      $email = $this->request->getPost('email');
      $data = array(
        'username'        => $this->request->getPost('username'),
        'email'           => $email,
        'password'        => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
        'foto'            => $Foto,
        'is_active'       => 0,
      );
      // siapkan token
      $buat_token = base64_encode(random_bytes(32));
      $token = [
        'email'         => $email,
        'token'         => $buat_token,
        'date_created'  => time()
      ];
      $Tokenmodel = new Perusahaan_Token_model();
      $Perusahaanmodel = new Perusahaan_model();
      $Perusahaanmodel->add($data);
      $Tokenmodel->add($token);
      $this->sendEmail($buat_token);
      session()->setFlashdata('pesan', 'success');
      return redirect()->to('/perusahaan/register');
    } else {
      session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
      return redirect()->to('/perusahaan/register');
    }
  }

  // function looping()
  // {
  //   $modelwoi = new Lowongan_model();
  //   for ($i = 1; $i <= 75; $i++) {
  //     dd($i);
  //   }
  //   $data = [
  //     'id_perusahaan' => $i
  //   ];
  //   $modelwoi->add($data);
  //   // dd($data);
  //   return redirect()->to('/Home');
  // }

  public function login()
  {
    $model = new Auth_model();
    $table = 'tb_perusahaan';
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $row = $model->get_data_login_prshn($username, $table);
    if ($row != NULL) {
      if ($row->is_active == 1) {
        if (password_verify($password, $row->password)) {
          $data = array(
            'login' => TRUE,
            'nama_perusahaan'  => $row->nama_perusahaan,
            'id_perusahaan'   => $row->id_perusahaan
          );
          session()->set($data);
          session()->setFlashdata('pesan', 'success');
          return redirect()->to('/perusahaan/home');
        } else {
          session()->setFlashdata('pesan', 'errorP');
          return redirect()->to('/perusahaan/login');
        }
      } else {
        session()->setFlashdata('pesan', 'errorT');
        return redirect()->to('/perusahaan/login');
      }
    } else {
      session()->setFlashdata('pesan', 'errorU');
      return redirect()->to('/perusahaan/login');
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    session()->setFlashData('pesan', 'Berhasil Logout');
    return redirect()->to('/perusahaan/login');
  }

  private function sendEmail($buat_token)
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

    $email->setFrom('578f8babe1d93b', 'Pusat Karir ITN Malang');
    $email->setTo($this->request->getPost('email'));

    $email->setSubject('Verifikasi Akun');
    $email->setMessage('Klik link berikut untuk aktivasi akun : <a href="' . base_url() . '/Backend/perusahaan/auth_prshn/verify?email=' . $this->request->getPost('email') . '&token=' . urlencode($buat_token) . '">Activate</a>');

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
    $Perusahaanmodel = new Perusahaan_model();
    $Tokenmodel = new Perusahaan_Token_model();

    $perusahaan = $Perusahaanmodel->getEmail($email);

    if ($perusahaan) {
      $token = $Tokenmodel->getToken($token);
      $perusahaan_token = $Tokenmodel->getAllByToken($token);

      if ($token) {
        if (time() - $perusahaan_token['date_created'] < (60 * 60 * 24)) {
          $db      = \Config\Database::connect();
          $builder = $db->table('tb_perusahaan');
          $builder->set('is_active', 1);
          $builder->where('email', $email);
          $builder->update();

          $Tokenmodel->delete_data($email);

          session()->setFlashdata('pesan', 'success');
          return redirect()->to('/perusahaan/login');
        } else {
          $Perusahaanmodel->delete_email($email);
          $Tokenmodel->delete_data($email);

          session()->setFlashdata('pesan', 'tokenExp');
          return redirect()->to('/perusahaan/login');
        }
      } else {
        session()->setFlashdata('pesan', 'tokenWro');
        return redirect()->to('/perusahaan/login');
      }
    } else {
      session()->setFlashdata('pesan', 'emailS');
      return redirect()->to('/perusahaan/login');
    }
  }
}
