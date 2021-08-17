<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;


class User extends BaseController
{
    private $_userModel, $_session;

    public function __construct()
    {
        $this->_userModel = new UserModel();
        $this->_session = \Config\Services::session();
    }


    public function index(): string
    {
        return view('login');
    }


    public function login()
    {
        helper(['form', 'url']);

        $mail = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $error = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required|validateUser[email,password]',
        ],
            [
                'email' => [
                    'required' => 'A valid email is required',
                    'valid_email' => 'A valid email is required'
                ],
                'password' => [
                    'required' => 'A password is required',
                    'validateUser' => 'Email or Password don\'t match'
                ]
            ]
        );

        if (!$error) {
            return view('login', ['error' => $this->validator]);
        } else if ($user = $this->_userModel->validatePassword($mail, $password)) {
            $this->_session->set([
                'id' => $user->id,
                'email' => $user->email,
                'isLoggedIn' => true,
                'token' => $user->token
            ]);

            return redirect()->to('people');
        } else {
            return redirect()->to('/');
        }
    }


    public function showRegistration(): string
    {
        return view('register');
    }


    public function register()
    {
        helper(['form', 'url']);

        $mail = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $token = $this->request->getVar('token');

        $error = $this->validate([
            'email' => 'required|max_length[50]|valid_email|is_unique[user.email]',
            'token' => 'required|min_length[4]|max_length[4]|is_unique[user.token]',
            'password' => 'required|min_length[8]|max_length[255]',
            'password_confirm' => 'matches[password]'
        ],
            [
                'email' => [
                    'required' => 'A valid email is required',
                    'max_length' => 'Email can\'t be longter than 50',
                    'valid_email' => 'A valid email is required',
                    'is_unique' => 'Email does already exist'
                ],
                'token' => [
                    'required' => 'A token is required',
                    'min_length' => 'Token must be of length 4',
                    'max_length' => 'Token must be of length 4',
                    'is_unique' => 'Token does already exist'
                ],
                'password' => [
                    'required' => 'A password is required',
                    'min_length' => 'Password must have more than 8 signs',
                    'max_length' => 'Password must have less than 255 signs'
                ],
                'password_confirm' => [
                    'matches' => 'Passwords don\'t match'
                ]
            ]);

        if (!$error) {
            return view('register', ['validation' => $this->validator]);
        } else {
            $this->_userModel->createUser($mail, $password, $token);
            return redirect()->to('/');
        }
    }


    public function logout(): RedirectResponse
    {
        $this->_session->destroy();
        return redirect()->to('/');
    }
}