<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambil_sampel_model extends CI_Model {

    private $table = 'ambil_sampel';

    public function get_all() {
    $this->db->select('ambil_sampel.*, pasien.no_register, pasien.nama_pasien');
    $this->db->from('ambil_sampel');
    $this->db->join('pasien', 'pasien.id_pasien = ambil_sampel.id_pasien');
    $this->db->order_by('ambil_sampel.created_at', 'DESC');
    return $this->db->get()->result();
}
public function get_by_id($id) {
    $this->db->select('ambil_sampel.*, pasien.no_register, pasien.nama_pasien');
    $this->db->from('ambil_sampel');
    $this->db->join('pasien', 'pasien.id_pasien = ambil_sampel.id_pasien');
    $this->db->where('ambil_sampel.id_ambil_sampel', $id);
    return $this->db->get()->row(); // pakai row(), bukan result()
}

public function update($id, $data) {
    return $this->db->where('id_ambil_sampel', $id)->update($this->table, $data);
}

public function search_by_nik($nik) {
    $this->db->select('ambil_sampel.*, pasien.no_register, pasien.nama_pasien, pasien.nik');
    $this->db->from('ambil_sampel');
    $this->db->join('pasien', 'pasien.id_pasien = ambil_sampel.id_pasien');
    $this->db->where('pasien.nik', $nik);
    $this->db->order_by('ambil_sampel.created_at', 'DESC');
    return $this->db->get()->result();
}

public function delete($id) {
    return $this->db->delete($this->table, ['id_ambil_sampel' => $id]);
}


    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }
}
