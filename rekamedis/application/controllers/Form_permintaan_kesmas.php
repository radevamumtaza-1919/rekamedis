<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_permintaan_kesmas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->model('Form_permintaan_kesmas_model'); // Nonaktif dulu karena belum pakai DB
    }

    // Tampilkan daftar data (kosong dulu)
    public function index() {
        $data['title'] = 'Data Formulir Permintaan Kesmas';
        $data['formulir'] = []; // kosong dulu, karena belum pakai database

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('form_permintaan_kesmas/index', $data);
        $this->load->view('layout/footer');
    }

    // Alias index (boleh dihapus nanti)
    public function data() {
        redirect('form_permintaan_kesmas');
    }

    // Tampilkan form input
    public function create() {
        $data['title'] = 'Formulir Permintaan Pemeriksaan Kesmas';
        $data['no_register'] = $this->generate_no_register(); // tetap dipakai walau tidak simpan

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('form_permintaan_kesmas/form', $data);
        $this->load->view('layout/footer');
    }

    // Proses simpan form (sementara hanya tampilkan data POST)
    public function store() {
        $post = $this->input->post();

        echo "<pre>";
        print_r($post);
        echo "</pre>";

        echo "<p style='color:green;'>Data berhasil diterima (belum disimpan ke database)</p>";
        echo "<a href='" . site_url('form_permintaan_kesmas') . "'>← Kembali ke daftar</a>";

        // Jika sudah siap pakai database, aktifkan baris-baris di bawah ini
        /*
        $this->Form_permintaan_kesmas_model->insert_formulir($post);
        $this->session->set_flashdata('success', 'Data berhasil disimpan.');
        redirect('form_permintaan_kesmas');
        */
    }

    // Hanya dummy register number
    private function generate_no_register() {
        $today = date('Ymd');
        return 'KESMAS.' . $today . '.0001';
    }

    // Hapus data (belum aktif karena belum ada DB)
    public function delete($id) {
        // $this->db->delete('form_permintaan_kesmas', ['id' => $id]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus. (simulasi)');
        redirect('form_permintaan_kesmas');
    }

    // Detail data (belum aktif karena belum ada DB)
    public function detail($id) {
        /*
        $data['form'] = $this->Form_permintaan_kesmas_model->get_formulir_by_id($id);
        if (!$data['form']) {
            show_404();
        }
        */
        $data['title'] = 'Detail Formulir Permintaan Kesmas (Dummy)';
        $data['form'] = null;

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('form_permintaan_kesmas/detail', $data);
        $this->load->view('layout/footer');
    }

    // Fungsi simpan cadangan (dummy)
    public function simpan() {
        $post = $this->input->post();
        echo "<pre>";
        print_r($post);
        echo "</pre>";
        echo "<p style='color:blue;'>Data disimpan (mode simulasi)</p>";
    }

}
