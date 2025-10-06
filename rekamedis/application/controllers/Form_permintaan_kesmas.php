<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_permintaan_klinik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Form_permintaan_klinik_model'); // Buat nanti
    }

    public function index() {
    $data['title'] = 'Data Formulir Permintaan';
    $data['formulir'] = $this->Form_permintaan_klinik_model->get_all_formulir(); // Ambil data dari model

    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar');
    $this->load->view('form_permintaan_klinik/index', $data);
    $this->load->view('layout/footer');
}


        public function data() {
    $this->load->model('Form_permintaan_klinik_model');
    $data['title'] = 'Data Formulir Permintaan';
    $data['formulir'] = $this->Form_permintaan_klinik_model->get_all_formulir();

    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar');
    $this->load->view('form_permintaan_klinik/index', $data);
    $this->load->view('layout/footer');
}

        public function create() {
    $data['title'] = 'Formulir Permintaan Pemeriksaan';
    $data['no_register'] = $this->generate_no_register();

    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar');
    $this->load->view('form_permintaan_klinik/form', $data);
    $this->load->view('layout/footer');
}


    public function store() {
    $post = $this->input->post();

    // 1. Cek atau Tambah Dokter Pengirim
    $dokterData = [
        'nama'   => $post['nama_dokter'],
        'alamat' => $post['alamat_pengirim'],
        'no_telp'=> $post['telp_pengirim']
    ];
    $this->db->insert('dokter_pengirim', $dokterData);
    $id_dokter = $this->db->insert_id();

    // 2. Tambahkan Pasien
    $no_register = $this->generate_no_register();
    $pasienData = [
        'no_register' => $no_register,
        'nama_pasien'        => $post['nama_pasien'],
        'nik'         => $post['nik'],
        'tgl_lahir'   => $post['tgl_lahir'],
        'alamat_pasien'      => $post['alamat_pasien'],
        'gender'      => $post['gender'],
        'no_telp_pasien'     => $post['no_telp_pasien'],
        'status_pasien' => 'Rujukan',
        'diagnosa'    => $post['diagnosa_klinis'],
        'obat'        => $post['obat_dikonsumsi'],
        'id_dokter_pengirim' => $id_dokter
    ];
    $this->db->insert('pasien', $pasienData);
    $id_pasien = $this->db->insert_id();

    // 3. Simpan ke ambil_sampel
    $sampelData = [
        'id_pasien' => $id_pasien,
        'jenis_sampel' => isset($post['jenis_spesimen']) ? implode(',', $post['jenis_spesimen']) : '-',
        'lokasi_pengambilan' => isset($post['lokasi_pengambilan']) ? implode(',', $post['lokasi_pengambilan']) : '-',
        'volume' => $post['volume_spesimen'],
        'jam_pengambilan' => $post['jam_pengambilan'],
        'tanggal_permintaan' => $post['tgl_permintaan'],
        'informasi_tambahan' => $post['info_tambahan']
    ];
    $this->db->insert('ambil_sampel', $sampelData);

    // 4. Simpan Form Permintaan (untuk dokumentasi)
    $formData = [
        'no_register' => $no_register,
        'nama_pasien' => $post['nama_pasien'],
        'nik' => $post['nik'],
        'gender' => $post['gender'],
        'tgl_lahir' => $post['tgl_lahir'],
        'umur' => $post['umur'],
        'alamat_pasien' => $post['alamat_pasien'],
        'no_telp_pasien' => $post['no_telp_pasien'],
        'nama_dokter' => $post['nama_dokter'],
        'alamat_pengirim' => $post['alamat_pengirim'],
        'telp_pengirim' => $post['telp_pengirim'],
        'tgl_form' => $post['tgl_form'],
        'diagnosa_klinis' => $post['diagnosa_klinis'],
        'obat_dikonsumsi' => $post['obat_dikonsumsi'],
        'asal_sampel' => is_array($post['asal_sampel']) ? implode(',', $post['asal_sampel']) : '',
        'puasa' => $post['puasa'],
        'lokasi_pengambilan' => is_array($post['lokasi_pengambilan']) ? implode(',', $post['lokasi_pengambilan']) : '',
        'lokasi_lainnya' => $post['lokasi_lainnya'],
        'jenis_spesimen' => is_array($post['jenis_spesimen']) ? implode(',', $post['jenis_spesimen']) : '',
        'spesimen_lainnya' => $post['spesimen_lainnya'],
        'tgl_permintaan' => $post['tgl_permintaan'],
        'volume_spesimen' => $post['volume_spesimen'],
        'tgl_pengambilan' => $post['tgl_pengambilan'],
        'jam_pengambilan' => $post['jam_pengambilan'],
        'prioritas' => $post['prioritas'],
        'info_tambahan' => $post['info_tambahan']
    ];
    $this->db->insert('form_permintaan_klinik', $formData);

    $this->session->set_flashdata('success', 'Data berhasil disimpan ke semua menu!');
    redirect('form_permintaan_klinik');
}

private function generate_no_register() {
    $today = date('Ymd');
    $prefix = 'PSN.' . $today . '.';

    $this->db->like('no_register', $prefix);
    $this->db->order_by('no_register', 'desc');
    $this->db->limit(1);
    $last = $this->db->get('pasien')->row();

    $last_number = 1;
    if ($last && preg_match('/\.(\d{4})$/', $last->no_register, $match)) {
        $last_number = (int)$match[1] + 1;
    }

    return $prefix . str_pad($last_number, 4, '0', STR_PAD_LEFT);
}

        public function delete($id)
    {
        $this->db->delete('form_permintaan_klinik', ['id' => $id]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('form_permintaan_klinik');
    }


    public function detail($id) {
    $this->load->model('Form_permintaan_klinik_model');

    $data['form'] = $this->Form_permintaan_klinik_model->get_formulir_by_id($id);
    if (!$data['form']) {
        show_404(); // tampilkan halaman tidak ditemukan jika data tidak ada
    }

    $data['title'] = 'Detail Formulir Permintaan Pemeriksaan';

    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar');
    $this->load->view('form_permintaan_klinik/detail', $data);
    $this->load->view('layout/footer');
}


    public function simpan() {
    $post = $this->input->post();
    echo "<pre>"; print_r($post); exit;

    $this->Form_permintaan_klinik_model->simpan_form($post);
    $this->session->set_flashdata('success', 'Data berhasil disimpan.');
    redirect('form_permintaan_klinik');
}

}
