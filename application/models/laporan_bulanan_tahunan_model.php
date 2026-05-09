<?php

class Laporan_bulanan_tahunan_model extends CI_Model {
public function get_kategori_bulan($kategori, $bulan, $tahun)
{
    $this->db->select('
        nama_jenis,
        COUNT(*) as total
    ');

    $this->db->from('form_permintaan_klinik_detail');

    $this->db->like('kategori', $kategori);

    $this->db->where('MONTH(tanggal_input)', $bulan);

    $this->db->where('YEAR(tanggal_input)', $tahun);

    $this->db->group_by('nama_jenis');

    return $this->db->get()->result();
}
    // ================= LAPORAN TAHUNAN =================
    public function get_laporan_tahunan($tahun)
    {
        $this->db->select('
            kategori,
            nama_jenis,
            MONTH(tanggal_input) as bulan,
            COUNT(*) as total
        ');

        $this->db->from('form_permintaan_klinik_detail');

        $this->db->where('YEAR(tanggal_input)', $tahun);

        $this->db->group_by('kategori');
        $this->db->group_by('nama_jenis');
        $this->db->group_by('MONTH(tanggal_input)');

        $this->db->order_by('kategori', 'ASC');

        return $this->db->get()->result();
    }

}