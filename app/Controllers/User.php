<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = session();
    }
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        $data['title'] = 'Form daftar user';
        return view('user/list', $data);
    }

    public function add()
    {
        $data['title'] = 'Form tambah user';
        return view('user/add', $data);
    }

    public function create()
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'CreateTime' => date('Y-m-d H:i:s')
        ];
        $model->save($data);
        $this->session->setFlashdata('msg', 'TAMBAH USER BERHASIL');
        return redirect()->to('/user');
    }

    public function edit($id = null)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        $data['title'] = 'Form ubah user';
        return view('user/edit', $data);
    }

    public function update()
    {
        $model = new UserModel();
        $id = $this->request->getPost('id');
        $data = [
            'username' => $this->request->getPost('username'),
        ];
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = $password;
        }

        $model->update($id, $data);
        $this->session->setFlashdata('msg', 'EDIT USER BERHASIL');
        return redirect()->to('/user');
    }


    public function delete($id = null)
    {
        // $data['title'] = 'Form hapus user';
        $model = new UserModel();
        $model->delete($id);
        $this->session->setFlashdata('msg', 'HAPUS USER BERHASIL');
        return redirect()->to('/user');
    }
}
