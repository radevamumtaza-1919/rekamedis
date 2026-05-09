<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_laporan_akhir extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('form_laporan_akhir/index');
        $this->load->view('layout/footer');
    }

    public function detail($bulan, $tahun = null)
    {
        $tahun = $tahun ?? date('Y');

        redirect('laporan_bulanan_tahunan/index/' . $bulan . '/' . $tahun);
    }
}