<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_pengirim extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dokter_pengirim_model');
        $this->load->library('session');
    }

        public function index() {
        $data['title'] = 'Data Dokter Pengirim';

        // Tangkap input pencarian
        $keyword = $this->input->get('q');

        // Kirim ke model: jika ada pencarian, pakai search
        if (!empty($keyword)) {
            $data['dokter_pengirim'] = $this->Dokter_pengirim_model->search($keyword);
        } else {
            $data['dokter_pengirim'] = $this->Dokter_pengirim_model->get_all();
        }

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('dokter_pengirim/index', $data);
        $this->load->view('layout/footer');
    }


    public function add() {
        $data['title'] = 'Tambah Dokter Pengirim';

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('dokter_pengirim/form');
        $this->load->view('layout/footer');
    }

    public function create() {
        $data = [
            'nama'    => $this->input->post('nama'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat'  => $this->input->post('alamat')
        ];

        $this->Dokter_pengirim_model->insert($data);
        $this->session->set_flashdata('success', 'Data dokter berhasil ditambahkan.');
        redirect('dokter_pengirim');
    }

    public function edit($id) {
        $data['title'] = 'Edit Dokter Pengirim';
        $data['dokter_pengirim'] = $this->Dokter_pengirim_model->get_by_id($id);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('dokter_pengirim/form', $data);
        $this->load->view('layout/footer');
    }

    public function update($id) {
        $data = [
            'nama'    => $this->input->post('nama'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat'  => $this->input->post('alamat')
        ];

        $this->Dokter_pengirim_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data dokter berhasil diperbarui.');
        redirect('dokter_pengirim');
    }

    public function delete($id) {
        $this->Dokter_pengirim_model->delete($id);
        $this->session->set_flashdata('success', 'Data dokter berhasil dihapus.');
        redirect('dokter_pengirim');
    }
}
