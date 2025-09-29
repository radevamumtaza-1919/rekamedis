<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pembayaran_model');
        $this->load->model('Pasien_model');
    }

    public function index() {
        $data['title'] = 'Data Pembayaran';
        $data['pembayaran'] = $this->Pembayaran_model->get_all();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('pembayaran/index', $data);
        $this->load->view('layout/footer');
    }

    public function add() {
        $data['title'] = 'Tambah Pembayaran';
        $data['pasien'] = $this->Pasien_model->get_all();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('pembayaran/form', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id) {
        $data['title'] = 'Edit Pembayaran';
        $data['pembayaran'] = $this->Pembayaran_model->get_by_id($id);
        $data['pasien'] = $this->Pasien_model->get_all();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('pembayaran/form', $data);
        $this->load->view('layout/footer');
    }

    public function save($id = null) {
        $status = $this->input->post('status');
        $tanggal_pelunasan = ($status === 'Lunas') ? date('Y-m-d H:i:s') : null;

        $data = [
            'no_register' => $this->input->post('no_register'),
            'keterangan' => $this->input->post('keterangan'),
            'total_biaya' => $this->input->post('total_biaya'),
            'metode_pembayaran' => $this->input->post('metode_pembayaran'),
            'status' => $status,
            'tanggal_pelunasan' => $tanggal_pelunasan,
        ];

        if ($id) {
            $this->Pembayaran_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data pembayaran berhasil diperbarui.');
        } else {
            $this->Pembayaran_model->insert($data);
            $this->session->set_flashdata('success', 'Data pembayaran berhasil ditambahkan.');
        }

        redirect('pembayaran');
    }

    public function delete($id) {
        $this->Pembayaran_model->delete($id);
        $this->session->set_flashdata('success', 'Data pembayaran berhasil dihapus.');
        redirect('pembayaran');
    }
}
