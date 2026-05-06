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
    public function modal_input_hasil()
{
    // Pastikan file views/pemeriksaan/modal_input_hasil.php ada
    $this->load->view('pemeriksaan/modal_input_hasil');
}
        public function simpan_hasil()
{
    $data = [
        'id_pemeriksaan' => $this->input->post('id_pemeriksaan'),
        'hasil'          => $this->input->post('hasil'),
        'satuan'         => $this->input->post('satuan'),
        'nilai_rujukan'  => $this->input->post('nilai_rujukan'),
        'metode'         => $this->input->post('metode'),
        'keterangan'     => $this->input->post('keterangan'),
        'tanggal_input'  => date('Y-m-d H:i:s'),
    ];
    $this->db->insert('hasil_pemeriksaan', $data);

    echo json_encode(['status' => 'success']);
}

}
