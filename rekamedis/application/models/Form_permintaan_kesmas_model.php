<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_permintaan_kesmas_model extends CI_Model {

    private $table = 'form_permintaan_kesmas'; // nama tabel utama (buat sesuai struktur kamu)

    public function __construct() {
        parent::__construct();
    }

    // Ambil semua data formulir
    public function get_all_formulir() {
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->table)->result();
    }

    // Ambil satu data formulir berdasarkan ID
    public function get_formulir_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Simpan data baru (dari form input)
    public function insert_formulir($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // Update data (jika nanti kamu pakai fitur edit)
    public function update_formulir($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Hapus data berdasarkan ID
    public function delete_formulir($id) {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    // Auto generate no_register (mirip pasien)
    public function generate_no_register() {
        $today = date('Ymd');
        $prefix = 'KESMAS.' . $today . '.';

        $this->db->like('no_register', $prefix);
        $this->db->order_by('no_register', 'desc');
        $this->db->limit(1);
        $last = $this->db->get($this->table)->row();

        $last_number = 1;
        if ($last && preg_match('/\.(\d{4})$/', $last->no_register, $match)) {
            $last_number = (int)$match[1] + 1;
        }

        return $prefix . str_pad($last_number, 4, '0', STR_PAD_LEFT);
    }

}
