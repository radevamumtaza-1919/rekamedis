<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeder extends CI_Controller {

    public function admin() {
        $password = password_hash('admin123', PASSWORD_DEFAULT);

        $data = [
            'username' => 'admin',
            'password' => $password,
            'nama'     => 'Administrator',
            'role'     => 'admin'
        ];

        $this->db->insert('user', $data);
        echo "Admin berhasil ditambahkan!";
    }
}
