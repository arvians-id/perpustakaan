<?php

namespace App\Filters;

use CodeIgniter\CodeIgniter;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('email')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        } else {
            if (session()->get('role') == 2) {
                if (service('uri')->getSegment(1) == 'admin') {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException();
                }
            } elseif (session()->get('role') == 1) {
                if (service('uri')->getSegment(1) == 'pengguna') {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException();
                }
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
