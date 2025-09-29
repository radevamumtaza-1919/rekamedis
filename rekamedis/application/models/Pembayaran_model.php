<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

    private $table = 'pembayaran';

    public function get_all() {
        $this->db->select('pembayaran.*, pasien.nama_pasien');
        $this->db->from($this->table);
        $this->db->join('pasien', 'pasien.no_register = pembayaran.no_register');
        return $this->db->get()->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id_pembayaran' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_pembayaran', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['id_pembayaran' => $id]);
    }
}
