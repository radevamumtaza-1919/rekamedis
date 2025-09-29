<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        $this->load->view('auth/login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Ambil user berdasarkan username
        $user = $this->User_model->get_by_username($username);

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata([
                'id_user'   => $user->id_user,
                'username'  => $user->username,
                'nama'      => $user->nama,
                'role'      => $user->role,
                'logged_in' => TRUE
            ]);

            // Redirect sesuai role
            switch ($user->role) {
        case 'admin': redirect('dashboard');
        case 'petugas': redirect('dashboard_petugas');
        case 'dokter': redirect('dashboard_dokter');
    }
} else {
    $this->session->set_flashdata('error', 'Username atau password salah!');
    redirect('auth/login');
}
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
