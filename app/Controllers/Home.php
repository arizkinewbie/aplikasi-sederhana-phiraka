<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        session();
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        return redirect()->to('/user');
    }
}
