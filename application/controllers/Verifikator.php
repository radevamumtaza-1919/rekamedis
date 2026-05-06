<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikator extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Verifikator_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Data Verifikator Klinik';
        $data['petugas'] = $this->Verifikator_model->get_all();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('verifikator/index', $data);
        $this->load->view('layout/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Verifikator';
        $data['action'] = site_url('verifikator/create_action');
        $data['petugas'] = (object)[
            'id_petugas' => '',
            'nama_petugas' => '',
            'jabatan' => '',
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('verifikator/form', $data);
        $this->load->view('layout/footer');
    }

    public function create_action()
    {
        $data = [
            'nama_petugas' => $this->input->post('nama_petugas'),
            'jabatan'      => $this->input->post('jabatan'),
        ];

        $this->Verifikator_model->insert($data);
        $this->session->set_flashdata('success', 'Data verifikator berhasil ditambahkan.');
        redirect('verifikator');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Verifikator';
        // Action tanpa ID di URL, karena ID dikirim lewat hidden input POST
        $data['action'] = site_url('verifikator/edit_action');
        $data['petugas'] = $this->Verifikator_model->get_by_id($id);

        if (!$data['petugas']) show_404();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('verifikator/form', $data);
        $this->load->view('layout/footer');
    }

    public function edit_action()
    {
        $id = $this->input->post('id_petugas');
        if (empty($id)) {
            $this->session->set_flashdata('error', 'ID verifikator tidak ditemukan.');
            redirect('verifikator');
        }

        $data = [
            'nama_petugas' => $this->input->post('nama_petugas'),
            'jabatan'      => $this->input->post('jabatan'),
        ];

        $this->Verifikator_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data verifikator berhasil diperbarui.');
        redirect('verifikator');
    }

    public function delete($id)
    {
        $this->Verifikator_model->delete($id);
        $this->session->set_flashdata('success', 'Data verifikator berhasil dihapus.');
        redirect('verifikator');
    }
}
