<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penanggung_teknis extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penanggung_teknis_model');
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        $data['title'] = 'Data Penanggung Jawab Teknis';
        $data['petugas'] = $this->Penanggung_teknis_model->get_all();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('penanggung_teknis/index', $data);
        $this->load->view('layout/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Penanggung Jawab Teknis';
        $data['action'] = site_url('penanggung_teknis/create_action');
        $data['petugas'] = (object)[
            'id_petugas' => '',
            'nama_petugas' => '',
            'jabatan' => '',
            'sip' => ''
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('penanggung_teknis/form', $data);
        $this->load->view('layout/footer');
    }

    public function create_action()
    {
        $data = [
            'nama_petugas' => $this->input->post('nama_petugas'),
            'jabatan' => $this->input->post('jabatan'),
            'sip' => $this->input->post('sip')
        ];

        $this->Penanggung_teknis_model->insert($data);
        redirect('penanggung_teknis');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Penanggung Jawab Teknis';
        // set action supaya form selalu pakai $action (POST-based)
        $data['action'] = site_url('penanggung_teknis/edit_action');
        $data['petugas'] = $this->Penanggung_teknis_model->get_by_id($id);

        if (!$data['petugas']) show_404();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('penanggung_teknis/form', $data);
        $this->load->view('layout/footer');
    }

    /**
     * edit_action tanpa parameter: ambil id dari POST (hidden input)
     * sehingga form submit akan aman baik create maupun edit.
     */
    public function edit_action()
    {
        $id = $this->input->post('id_petugas');
        if (empty($id)) {
            // tidak ada id -> redirect ke index atau tampil error
            $this->session->set_flashdata('error', 'ID penanggung jawab tidak ditemukan.');
            redirect('penanggung_teknis');
        }

        $data = [
            'nama_petugas' => $this->input->post('nama_petugas'),
            'jabatan' => $this->input->post('jabatan'),
            'sip' => $this->input->post('sip')
        ];

        $this->Penanggung_teknis_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
        redirect('penanggung_teknis');
    }

    public function delete($id)
    {
        $this->Penanggung_teknis_model->delete($id);
        redirect('penanggung_teknis');
    }
}
