<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambil_sampel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ambil_sampel_model');
        $this->load->model('Pasien_model');

    }

    public function index() {
    $data['title'] = 'Data Ambil Sampel';

    $nik = $this->input->get('nik');

    if (!empty($nik)) {
        $data['sampel'] = $this->Ambil_sampel_model->search_by_nik($nik);
    } else {
        $data['sampel'] = $this->Ambil_sampel_model->get_all();
    }

    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar');
    $this->load->view('ambil_sampel/index', $data);
    $this->load->view('layout/footer');
}


    public function add() {
        $data['title'] = 'Tambah Data Ambil Sampel';
        $data['pasien'] = $this->Pasien_model->get_pasien_belum_ambil_sampel();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('ambil_sampel/form', $data);
        $this->load->view('layout/footer');
    }

    public function create() {
        $kelayakan = $this->input->post('kelayakan');
        $alasan = ($kelayakan == 'Tidak Layak') ? $this->input->post('alasan_tidak_layak') : null;

        $data = [
            'id_pasien'              => $this->input->post('id_pasien'),
            'jenis_sampel'           => $this->input->post('jenis_sampel'),
            'kelayakan'              => $kelayakan,
            'alasan_tidak_layak'     => $alasan,
            'volume'                 => $this->input->post('volume'),
            'lokasi_pengambilan'     => $this->input->post('lokasi_pengambilan'),
            'jam_pengambilan'        => $this->input->post('jam_pengambilan'),
            'tanggal_permintaan'     => $this->input->post('tanggal_permintaan'),
            'informasi_tambahan'     => $this->input->post('informasi_tambahan')
        ];

        $this->Ambil_sampel_model->insert($data);
        $this->session->set_flashdata('success', 'Data sampel berhasil disimpan.');
        redirect('ambil_sampel');
    }
public function edit($id) {
    $data['title']  = 'Edit Data Ambil Sampel';
    $data['sampel'] = $this->Ambil_sampel_model->get_by_id($id);
    $data['pasien'] = $this->Pasien_model->get_all(); // agar bisa ubah pasien
    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar');
    $this->load->view('ambil_sampel/form', $data);
    $this->load->view('layout/footer');
}

public function update($id) {
    $kelayakan = $this->input->post('kelayakan');
    $alasan = ($kelayakan == 'Tidak Layak') ? $this->input->post('alasan_tidak_layak') : null;

    $data = [
        'id_pasien'             => $this->input->post('id_pasien'),
        'jenis_sampel'          => $this->input->post('jenis_sampel'),
        'kelayakan'             => $kelayakan,
        'alasan_tidak_layak'    => $alasan,
        'volume'                => $this->input->post('volume'),
        'lokasi_pengambilan'    => $this->input->post('lokasi_pengambilan'),
        'jam_pengambilan'       => $this->input->post('jam_pengambilan'),
        'tanggal_permintaan'    => $this->input->post('tanggal_permintaan'),
        'informasi_tambahan'    => $this->input->post('informasi_tambahan')
        ];

    $this->Ambil_sampel_model->update($id, $data);
    $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
    redirect('ambil_sampel');
}

public function delete($id) {
    $this->Ambil_sampel_model->delete($id);
    $this->session->set_flashdata('success', 'Data berhasil dihapus.');
    redirect('ambil_sampel');
}

public function print($id)
{
    $data['sampel'] = $this->Ambil_sampel_model->get_by_id($id);

    if (!$data['sampel']) {
        show_404();
    }

    // Load library PDF
    $this->load->library('pdf');

    // Cetak PDF dari view print.php
    $this->pdf->load_view('ambil_sampel/print', $data, 'Sampel_'.$data['sampel']->no_register.'.pdf');
}



}
