<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_pengirim_model extends CI_Model {

    private $table = 'dokter_pengirim';

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id_dokter_pengirim' => $id])->row();
    }

    public function insert($data) {
    $data['created_at'] = date('Y-m-d H:i:s'); // Tambahkan ini
    return $this->db->insert('dokter_pengirim', $data);
}

    public function update($id, $data) {
        return $this->db->where('id_dokter_pengirim', $id)->update($this->table, $data);
    }

    public function search($keyword) {
    $this->db->like('nama', $keyword);
    $this->db->or_like('alamat', $keyword);
    $this->db->or_like('no_telp', $keyword);
    return $this->db->get('dokter_pengirim')->result();
}


    public function delete($id) {
        return $this->db->delete($this->table, ['id_dokter_pengirim' => $id]);
    }
}
