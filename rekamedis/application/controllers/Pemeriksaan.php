<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pemeriksaan_model');
    }

    public function index() {
        $data['title'] = 'Menu Pemeriksaan';
        $data['kategori'] = $this->Pemeriksaan_model->get_all_kategori_with_subkategori_item();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('pemeriksaan/index', $data);
        $this->load->view('layout/footer');
    }
}
