<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

        // Cek login
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard';

        // Load tampilan lengkap
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('dashboard');  // isi konten utama
        $this->load->view('layout/footer');
    }
}