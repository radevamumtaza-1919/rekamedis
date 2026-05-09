<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_rekam_medis_model extends CI_Model
{

    public function get_daily_registrations()
    {
        $sql = "SELECT tanggal, COUNT(DISTINCT id_pasien) as total_pasien 
                FROM (
                    SELECT DATE(created_at) as tanggal, id_pasien FROM pasien WHERE created_at IS NOT NULL
                    UNION
                    SELECT DATE(updated_at) as tanggal, id_pasien FROM pasien WHERE updated_at IS NOT NULL
                ) as combined
                GROUP BY tanggal
                ORDER BY tanggal DESC";
        return $this->db->query($sql)->result();
    }

    public function get_patients_by_date($date)
    {
        $sql = "SELECT DISTINCT * FROM pasien 
                WHERE DATE(created_at) = ? OR DATE(updated_at) = ?
                ORDER BY COALESCE(updated_at, created_at) DESC";
        return $this->db->query($sql, [$date, $date])->result();
    }

    public function get_daily_visits()
    {
        $this->db->select('DATE(tanggal_kunjungan) as tanggal, COUNT(id) as total_kunjungan');
        $this->db->from('kunjungan_rm');
        $this->db->where('tanggal_kunjungan IS NOT NULL');
        $this->db->group_by('DATE(tanggal_kunjungan)');
        $this->db->order_by('DATE(tanggal_kunjungan)', 'DESC');
        return $this->db->get()->result();
    }

    public function get_visits_by_date($date)
    {
        $this->db->select('kunjungan_rm.*, pasien.nama_pasien, pasien.no_rm');
        $this->db->from('kunjungan_rm');
        $this->db->join('pasien', 'pasien.no_rm = kunjungan_rm.no_rm', 'left');
        $this->db->where('DATE(kunjungan_rm.tanggal_kunjungan)', $date);
        $this->db->order_by('kunjungan_rm.tanggal_kunjungan', 'DESC');
        return $this->db->get()->result();
    }

    public function get_daily_klinik()
    {
        $this->db->select('DATE(form_permintaan_klinik.tgl_form) as tanggal, COUNT(form_permintaan_klinik.id) as total_pasien,
                           SUM(CASE WHEN LOWER(pasien.gender) = "laki-laki" OR LOWER(pasien.gender) = "l" THEN 1 ELSE 0 END) as total_l,
                           SUM(CASE WHEN LOWER(pasien.gender) = "perempuan" OR LOWER(pasien.gender) = "p" THEN 1 ELSE 0 END) as total_p');
        $this->db->from('form_permintaan_klinik');
        $this->db->join('pasien', 'pasien.id_pasien = form_permintaan_klinik.id_pasien', 'left');
        $this->db->where('form_permintaan_klinik.tgl_form IS NOT NULL');
        $this->db->group_by('DATE(form_permintaan_klinik.tgl_form)');
        $this->db->order_by('DATE(form_permintaan_klinik.tgl_form)', 'DESC');
        return $this->db->get()->result();
    }

    public function get_klinik_by_date($date)
    {
        $this->db->where('DATE(tgl_form)', $date);
        $this->db->order_by('tgl_form', 'DESC');
        return $this->db->get('form_permintaan_klinik')->result();
    }

    public function get_daily_uji_klinik()
    {
        // Ambil yang sudah ada hasilnya
        $this->db->select('DATE(f.tgl_form) as tanggal, COUNT(f.id) as total_pasien');
        $this->db->from('form_permintaan_klinik f');
        
        $this->db->join('(SELECT id_form, COUNT(hasil) AS total_hasil 
                          FROM form_permintaan_klinik_detail 
                          WHERE hasil IS NOT NULL AND hasil <> "" 
                          GROUP BY id_form) d', 'f.id = d.id_form', 'inner');
                          
        $this->db->group_by('DATE(f.tgl_form)');
        $this->db->order_by('DATE(f.tgl_form)', 'DESC');
        return $this->db->get()->result();
    }

    public function get_uji_klinik_by_date($date)
    {
        $this->db->select('f.*');
        $this->db->from('form_permintaan_klinik f');
        
        $this->db->join('(SELECT id_form, COUNT(hasil) AS total_hasil 
                          FROM form_permintaan_klinik_detail 
                          WHERE hasil IS NOT NULL AND hasil <> "" 
                          GROUP BY id_form) d', 'f.id = d.id_form', 'inner');
                          
        $this->db->where('DATE(f.tgl_form)', $date);
        $this->db->order_by('f.tgl_form', 'DESC');
        return $this->db->get()->result();
    }
}
