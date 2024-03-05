<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = session();
    }
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/user');
        }
        $data['title'] = 'Form login';
        return view('auth/login', $data);
    }

    public function login()
    {

        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'logged_in' => TRUE,
                ];
                $this->session->set($ses_data);
                $this->session->setFlashdata('msg', 'LOGIN SUKSES');
                return redirect()->to('/user');
            } else {
                $this->session->setFlashdata('msg', 'LOGIN GAGAL<br>Password salah.');
                return redirect()->to('/login');
            }
        } else {
            $this->session->setFlashdata('msg', 'LOGIN GAGAL<br>Nama tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
