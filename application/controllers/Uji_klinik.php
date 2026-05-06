<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uji_klinik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Uji_klinik_model');
        $this->load->model('Form_permintaan_klinik_model');
        $this->load->database();
        $this->load->dbforge();

        // Cek dan tambahkan kolom yang mungkin hilang jika baru pindah database
        if ($this->db->table_exists('form_permintaan_klinik')) {
            $fields_to_add = [];
            
            if (!$this->db->field_exists('nik', 'form_permintaan_klinik')) {
                $fields_to_add['nik'] = ['type' => 'VARCHAR', 'constraint' => '50', 'null' => TRUE, 'after' => 'no_register'];
            }
            if (!$this->db->field_exists('nama_pasien', 'form_permintaan_klinik')) {
                $fields_to_add['nama_pasien'] = ['type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE, 'after' => 'no_register'];
            }
            if (!$this->db->field_exists('gender', 'form_permintaan_klinik')) {
                $fields_to_add['gender'] = ['type' => 'ENUM("Laki-laki","Perempuan")', 'null' => TRUE, 'after' => 'nama_pasien'];
            }
            if (!$this->db->field_exists('tgl_lahir', 'form_permintaan_klinik')) {
                $fields_to_add['tgl_lahir'] = ['type' => 'DATE', 'null' => TRUE, 'after' => 'gender'];
            }

            if (!empty($fields_to_add)) {
                $this->dbforge->add_column('form_permintaan_klinik', $fields_to_add);
            }
        }
    }

    // Halaman utama
    public function index() {
        $data['title'] = 'Uji Laboratorium Klinik';
        $data['formulir'] = $this->Uji_klinik_model->get_today_formulir_belum_input();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('uji_klinik/index', $data);
        $this->load->view('layout/footer');
    }

    // Form input hasil berdasarkan ID form
    public function input($id_form) {
        $data['title'] = 'Input Hasil Pemeriksaan';
        $data['form'] = $this->Form_permintaan_klinik_model->get_by_id($id_form);

        if (!$data['form']) show_404();

        // Ambil detail pemeriksaan + join ke tabel jenis_pemeriksaan
        $this->db->select('d.*, j.satuan, j.nilai_rujukan, j.metode');
        $this->db->from('form_permintaan_klinik_detail d');
        $this->db->join('jenis_pemeriksaan j', 'd.id_jenis = j.id_jenis', 'left');
        $this->db->where('d.id_form', $id_form);
        $data['detail'] = $this->db->get()->result();

        // Ambil ID pasien berdasarkan no_register
        $pasien = $this->db->get_where('pasien', ['no_register' => $data['form']->no_register])->row();
        $data['id_pasien'] = $pasien ? $pasien->id_pasien : null;

        // ✅ Tambahan: ambil daftar petugas & penanggung teknis & verifikator
        $data['daftar_petugas'] = $this->db->get('petugas_sampel_klinik')->result();
        $data['daftar_petugas_hasil'] = $this->db->get('petugas_sampel_klinik')->result();
        $data['daftar_penanggung_teknis'] = $this->db->get('penanggung_teknis_klinik')->result();
        $data['daftar_verifikator'] = $this->db->get('verifikator_klinik')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('uji_klinik/form', $data);
        $this->load->view('layout/footer');
    }


    // Simpan hasil pemeriksaan
    public function simpan_hasil() {
    $id_form = $this->input->post('id_form');
    $hasil = $this->input->post('hasil');

    // Simpan hasil per detail
    foreach ($hasil as $id_detail => $nilai) {
        $this->db->where('id_detail', $id_detail);
        $this->db->update('form_permintaan_klinik_detail', [
            'hasil' => $nilai,
            'tanggal_input' => date('Y-m-d H:i:s')
        ]);
    }

    // Ambil petugas
    $id_petugas = $this->input->post('id_petugas');
    $petugas = $this->db->get_where('petugas_sampel_klinik', ['id_petugas' => $id_petugas])->row();

    $pengambilan = [
        'id_form' => $id_form,
        'id_petugas' => $id_petugas,
        'petugas_pengambilan' => $petugas ? $petugas->nama_petugas : null,
        'tgl_jam_pengambilan' => $this->input->post('tgl_jam_pengambilan'),
        'tgl_jam_pemeriksaan' => $this->input->post('tgl_jam_pemeriksaan'),
        'tgl_jam_selesai' => $this->input->post('tgl_jam_selesai'),
        'tgl_jam_pelaporan' => $this->input->post('tgl_jam_pelaporan'),
        'note' => $this->input->post('note'),
        'petugas_hasil' => $this->input->post('petugas_hasil'),
        'verifikator_hasil' => $this->input->post('verifikator'),
        'penanggung_jawab_teknis' => $this->input->post('penanggung_jawab_teknis'),
        'sip_penanggung' => $this->input->post('sip_penanggung')
    ];

    $this->db->insert('form_pengambilan_klinik', $pengambilan);

    $this->session->set_flashdata('success', '✅ Hasil pemeriksaan berhasil disimpan!');
    redirect('uji_klinik');
}

}
