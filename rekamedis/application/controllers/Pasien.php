<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Pasien_model');
            $this->load->model('Dokter_pengirim_model');
            $this->load->library('session');

            // Cek login dan role
            $role = $this->session->userdata('role');
            if (!$this->session->userdata('logged_in') || !in_array($role, ['admin','petugas'])) {
                redirect('auth/login');
            }
        }

            public function index() {
            $data['title'] = 'Data Pasien';

            // Cek apakah ada pencarian NIK
            $keyword = $this->input->get('keyword');
            if (!empty($keyword)) {
                $data['pasien'] = $this->Pasien_model->search_by_nik($keyword);
            } else {
                $data['pasien'] = $this->Pasien_model->get_all();
            }

            $this->load->view('layout/header', $data);

            // Sidebar sesuai role
            if ($this->session->userdata('role') == 'admin') {
                $this->load->view('layout/sidebar', $data);
            } else if ($this->session->userdata('role') == 'petugas') {
                $this->load->view('layout/sidebar_petugas', $data);
            }

            $this->load->view('pasien/index', $data);
            $this->load->view('layout/footer');
        }

            // Tampilkan form tambah pasien
        public function add() {
            $data['title'] = 'Tambah Pasien';

            // Tambahkan generate no register
            $data['no_register'] = $this->generate_no_register();

            $data['dokter'] = $this->Dokter_pengirim_model->get_all();
            $this->load->model('Dokter_pengirim_model');



            $this->load->view('layout/header', $data);

            // Sidebar sesuai role
            if ($this->session->userdata('role') == 'admin') {
                $this->load->view('layout/sidebar', $data);
            } else {
                $this->load->view('layout/sidebar_petugas', $data);
            }

            $this->load->view('pasien/form', $data);
            $this->load->view('layout/footer');
        }


                private function generate_no_register() {
            $today = date('Y-m-d');
            $prefix = 'PSN.' . date('Ymd') . '.';

            // Ambil pasien terakhir yang dibuat hari ini
            $last = $this->Pasien_model->get_last_register_today($today);

            if ($last && preg_match('/\.(\d{4})$/', $last->no_register, $matches)) {
                $last_number = (int)$matches[1] + 1;
            } else {
                $last_number = 1;
            }

            $no_register = $prefix . str_pad($last_number, 4, '0', STR_PAD_LEFT);
            return $no_register;
        }



// Proses submit form
            public function create() {
                if ($this->input->post()) {
                    // Ambil tanggal hari ini
                    $today = date('Y-m-d');

                    // Ambil nomor register terakhir hari ini dari database
                    $last = $this->Pasien_model->get_last_register_today($today);

                    // Hitung nomor urut baru
                    $last_number = $last ? intval(substr($last->no_register, -4)) + 1 : 1;

                    // Buat nomor register baru
                    $no_register = 'PSN.' . date('Ymd') . '.' . sprintf('%04d', $last_number);

                    // Buat data input
                    $data = [
                        'no_register'        => $no_register,
                        'nama_pasien'        => $this->input->post('nama_pasien'),
                        'nik'                => $this->input->post('nik'),
                        'tgl_lahir'          => $this->input->post('tgl_lahir'),
                        'alamat_pasien'      => $this->input->post('alamat_pasien'),
                        'gender'             => $this->input->post('gender'),
                        'status_pasien'      => $this->input->post('status_pasien'),
                        'id_dokter_pengirim' => $this->input->post('id_dokter_pengirim'),
                        'diagnosa'           => $this->input->post('diagnosa'),
                        'obat'               => $this->input->post('obat'),
                        'no_telp_pasien'     => $this->input->post('no_telp_pasien')
                    ];

                    $this->Pasien_model->insert($data);
                    $this->session->set_flashdata('success', 'Pasien berhasil ditambahkan');
                    redirect('pasien');
                } else {
                    redirect('pasien/add');
                }
            }

        public function edit($id) {
            $data['title'] = 'Edit Pasien';
            $data['pasien'] = $this->Pasien_model->get_by_id($id);
            $data['dokter'] = $this->Dokter_pengirim_model->get_all();

            if (!$data['pasien']) show_404();

            $this->load->model('Dokter_pengirim_model');
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('pasien/edit', $data);
            $this->load->view('layout/footer');
        }

        public function update($id) {
            $data = [
                'no_register' => $this->input->post('no_register'),
                'nama_pasien' => $this->input->post('nama_pasien'),
                'nik'  => $this->input->post('nik'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat_pasien' => $this->input->post('alamat_pasien'),
                'gender' => $this->input->post('gender'),
                'status_pasien' => $this->input->post('status_pasien'),
                'id_dokter_pengirim' => $this->input->post('id_dokter_pengirim'),
                'diagnosa' => $this->input->post('diagnosa'),
                'obat' => $this->input->post('obat'),
                'no_telp_pasien'  => $this->input->post('no_telp_pasien')
            ];

            $this->Pasien_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data pasien berhasil diperbarui');
            redirect('pasien');
        }

        public function delete($id) {
            $this->Pasien_model->delete($id);
            $this->session->set_flashdata('success', 'Data pasien berhasil dihapus');
            redirect('pasien');
        }

        public function show($id)
{
    $this->load->model('Dokter_pengirim_model');
    $data['title'] = 'Detail Pasien';
    $data['pasien'] = $this->Pasien_model->get_by_id($id);
    $data['dokter'] = $this->Dokter_pengirim_model->get_all();
    
    if (!$data['pasien']) {
        show_404();
    }

    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar', $data);
    $this->load->view('pasien/show', $data); // View yang akan kamu buat
    $this->load->view('layout/footer');
}

    }
