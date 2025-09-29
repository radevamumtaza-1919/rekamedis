<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_petugas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Hanya petugas yang boleh mengakses
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'petugas') {
            redirect('auth/login');
        }

        // load model pasien jika ingin statistik
        $this->load->model('Dashboard_petugas_model');
    }

    public function index() {
        $data['title'] = 'Dashboard Petugas';

        // contoh statistik: total pasien
        $data['total_pasien'] = 0; // sementara

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar_petugas'); // sidebar khusus petugas
        $this->load->view('petugas/dashboard', $data);
        $this->load->view('layout/footer');
    }
}
