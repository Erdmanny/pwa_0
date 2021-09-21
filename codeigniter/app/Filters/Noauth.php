<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Noauth implements FilterInterface
{
    /**
     * @param RequestInterface $request
     * @param null $arguments
     * @return \CodeIgniter\HTTP\RedirectResponse|mixed|void
     *
     * Skip Login, when session is set
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('isLoggedIn')){
            return redirect()->to('people');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}