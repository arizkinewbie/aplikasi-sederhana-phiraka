<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => md5('admin123'),
            'CreateTime' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('tbl_user')->insert($data);
    }
}
