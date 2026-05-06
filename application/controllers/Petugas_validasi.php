<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_validasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Petugas_validasi_model');
    }

    public function index() {
        $data['title'] = "Data Petugas Validasi";
        $data['petugas'] = $this->Petugas_validasi_model->get_all();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('petugas_validasi/index', $data);
        $this->load->view('layout/footer');
    }

    public function create() {
        $data['title'] = "Tambah Petugas Validasi";
        $data['petugas'] = null;

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('petugas_validasi/form', $data);
        $this->load->view('layout/footer');
    }

    public function create_action() {
        $data = [
            'nama_petugas' => $this->input->post('nama_petugas'),
            'jabatan'      => $this->input->post('jabatan')
        ];
        $this->Petugas_validasi_model->insert($data);

        redirect('petugas_validasi');
    }

    public function edit($id) {
        $data['title'] = "Edit Petugas Validasi";
        $data['petugas'] = $this->Petugas_validasi_model->get_by_id($id);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('petugas_validasi/form', $data);
        $this->load->view('layout/footer');
    }

    public function edit_action($id) {
        $data = [
            'nama_petugas' => $this->input->post('nama_petugas'),
            'jabatan'      => $this->input->post('jabatan')
        ];
        $this->Petugas_validasi_model->update($id, $data);

        redirect('petugas_validasi');
    }

    public function delete($id) {
        $this->Petugas_validasi_model->delete($id);

        redirect('petugas_validasi');
    }
}
