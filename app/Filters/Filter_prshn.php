<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Filter_prshn implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    $session = session();
    if ($session->get('login') != TRUE) {
      return redirect()->to('/perusahaan/login');
    }
  }

  //--------------------------------------------------------------------

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
  }
}
