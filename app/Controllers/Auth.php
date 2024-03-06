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
        $recaptchaResponse = $this->request->getVar('g-recaptcha-response');
        $secretKey = getenv('SECRET_KEY');
        $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}");
        $status = json_decode($verify);
        if (!$status->success) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'LOGIN GAGAL<br>Verifikasi reCAPTCHA gagal.']);
        }

        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            $verify_pass = (md5($password) === $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'logged_in' => TRUE,
                ];
                $this->session->set($ses_data);
                return $this->response->setJSON(['status' => 'success', 'message' => 'LOGIN SUKSES', 'redirect' => '/user']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'LOGIN GAGAL<br>Password salah.']);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'LOGIN GAGAL<br>Username tidak ditemukan.']);
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
