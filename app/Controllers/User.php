<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }
        $model = new UserModel();
        $data['users'] = $model->findAll();
        $data['title'] = 'Daftar User';
        return view('user/list', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah User Baru';
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
        return redirect()->to('/user');
    }

    public function edit($id = null)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        $data['title'] = 'Edit User';
        return view('user/edit', $data);
    }

    public function update()
    {
        $model = new UserModel();
        $id = $this->request->getPost('id');
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];
        $model->update($id, $data);
        return redirect()->to('/user');
    }

    public function delete($id = null)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/user');
    }
}
