<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puskesmas_wilayah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Puskesmas_wilayah_model');
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        $data['title'] = 'Manajemen Puskesmas Wilayah';
        $data['wilayah'] = $this->Puskesmas_wilayah_model->get_all();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('puskesmas_wilayah/index', $data);
        $this->load->view('layout/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Puskesmas Wilayah';
        $data['action'] = site_url('puskesmas_wilayah/create_action');
        $data['wilayah'] = (object)[
            'id' => '',
            'nama_puskesmas' => '',
            'kecamatan' => '',
            'kelurahan_list' => ''
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('puskesmas_wilayah/form', $data);
        $this->load->view('layout/footer');
    }

    public function create_action()
    {
        $data = [
            'nama_puskesmas' => $this->input->post('nama_puskesmas'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kelurahan_list' => $this->input->post('kelurahan_list')
        ];

        $this->Puskesmas_wilayah_model->insert($data);
        redirect('puskesmas_wilayah');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Puskesmas Wilayah';
        $data['action'] = site_url('puskesmas_wilayah/edit_action');
        $data['wilayah'] = $this->Puskesmas_wilayah_model->get_by_id($id);

        if (!$data['wilayah']) show_404();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('puskesmas_wilayah/form', $data);
        $this->load->view('layout/footer');
    }

    public function edit_action()
    {
        $id = $this->input->post('id');
        if (empty($id)) {
            $this->session->set_flashdata('error', 'ID tidak ditemukan.');
            redirect('puskesmas_wilayah');
        }

        $data = [
            'nama_puskesmas' => $this->input->post('nama_puskesmas'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kelurahan_list' => $this->input->post('kelurahan_list')
        ];

        $this->Puskesmas_wilayah_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
        redirect('puskesmas_wilayah');
    }

    public function delete($id)
    {
        $this->Puskesmas_wilayah_model->delete($id);
        redirect('puskesmas_wilayah');
    }
}
