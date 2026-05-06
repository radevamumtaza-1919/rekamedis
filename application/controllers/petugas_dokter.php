<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_dokter extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Petugas_dokter_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Data Dokter Pemeriksa';
        $data['dokters'] = $this->Petugas_dokter_model->get_all();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('petugas_rekam_medis/index', $data);
        $this->load->view('layout/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Dokter Pemeriksa';
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('petugas_rekam_medis/create', $data);
        $this->load->view('layout/footer');
    }

    public function store()
    {
        $data = [
            'nama_dokter' => $this->input->post('nama_dokter'),
            'spesialisasi' => $this->input->post('spesialisasi'),
            'sip' => $this->input->post('sip')
        ];

        $this->Petugas_dokter_model->insert($data);
        $this->session->set_flashdata('success', 'Data dokter berhasil ditambahkan.');
        redirect('petugas_dokter');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Dokter Pemeriksa';
        $data['dokter'] = $this->Petugas_dokter_model->get_by_id($id);

        if (!$data['dokter']) show_404();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('petugas_rekam_medis/edit', $data);
        $this->load->view('layout/footer');
    }

    public function update($id)
    {
        $data = [
            'nama_dokter' => $this->input->post('nama_dokter'),
            'spesialisasi' => $this->input->post('spesialisasi'),
            'sip' => $this->input->post('sip')
        ];

        $this->Petugas_dokter_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data dokter berhasil diperbarui.');
        redirect('petugas_dokter');
    }

    public function delete($id)
    {
        $this->Petugas_dokter_model->delete($id);
        $this->session->set_flashdata('success', 'Data dokter berhasil dihapus.');
        redirect('petugas_dokter');
    }
}
