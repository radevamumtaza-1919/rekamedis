<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_laporan_model extends CI_Model {

    public function get_pasien_dengan_soap() {
        $this->db->select('k.id as kunjungan_id, k.no_rm, k.tanggal_kunjungan, k.status_soap, p.nama_pasien, p.nik, p.gender');
        $this->db->from('kunjungan_rm k');
        $this->db->join('pasien p', 'k.no_rm = p.no_rm', 'left');
        $this->db->join('form_permintaan_klinik f', 'f.kunjungan_id = k.id', 'left');
        $this->db->join('form_permintaan_klinik_detail d', 'd.id_form = f.id', 'left');
        $this->db->group_start();
        $this->db->where('k.status_soap', 'Sudah diisi');
        $this->db->or_where('d.hasil IS NOT NULL');
        $this->db->group_end();
        $this->db->group_by(['k.id', 'k.no_rm', 'k.tanggal_kunjungan', 'k.status_soap', 'p.nama_pasien', 'p.nik', 'p.gender']);
        $this->db->order_by('k.tanggal_kunjungan', 'DESC');
        return $this->db->get()->result();
    }

    public function count_kunjungan_by_no_rm($no_rm) {
        $this->db->where('no_rm', $no_rm);
        return $this->db->count_all_results('kunjungan_rm');
    }

    public function get_detail_hasil_uji($id_kunjungan) {
        $this->db->select('
            p.nama_pasien, p.no_rm, p.gender, p.tgl_lahir, p.nik,
            k.id as kunjungan_id, k.tanggal_kunjungan, k.keluhan_utama, k.riwayat_penyakit, k.asesmen_diagnosa, k.plan_rencana, k.nama_dokter_pemeriksa, k.unit, k.status_soap,
            f.id as id_form, f.no_register, f.diagnosa_klinis,
            d.id_detail, d.nama_jenis as nama_pemeriksaan, d.kategori, d.sub_kategori, d.hasil, COALESCE(j.satuan, d.satuan) as satuan, COALESCE(j.nilai_rujukan, d.nilai_rujukan) as nilai_rujukan, COALESCE(j.metode, d.metode) as metode,
            a.petugas_pengambilan, a.tgl_jam_pengambilan, a.petugas_hasil, a.tgl_jam_pemeriksaan, a.verifikator_hasil, a.penanggung_jawab_teknis, a.sip_penanggung, a.note
        ');
        $this->db->from('kunjungan_rm k');
        $this->db->join('pasien p', 'k.no_rm = p.no_rm', 'inner');
        $this->db->join('form_permintaan_klinik f', 'f.kunjungan_id = k.id OR (f.kunjungan_id IS NULL AND f.no_rm = k.no_rm AND DATE(f.tgl_form) = DATE(k.tanggal_kunjungan))', 'left');
        $this->db->join('form_permintaan_klinik_detail d', 'f.id = d.id_form', 'left');
        $this->db->join('jenis_pemeriksaan j', 'd.id_jenis = j.id_jenis', 'left');
        $this->db->join('form_pengambilan_klinik a', 'f.id = a.id_form', 'left');
        $this->db->where('k.id', $id_kunjungan);
        $this->db->order_by('d.id_detail', 'ASC');
        return $this->db->get()->result();
    }

}
