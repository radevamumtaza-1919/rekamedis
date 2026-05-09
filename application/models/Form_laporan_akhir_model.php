<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_laporan_akhir_model extends CI_Model {

    private $table = 'form_laporan_akhir';

    // ================= TAMPIL DATA =================
    public function get_all()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->get($this->table)
            ->result();
    }

    // ================= DETAIL DATA =================
    public function get_by_id($id)
    {
        return $this->db
            ->get_where($this->table, ['id' => $id])
            ->row();
    }

    // ================= SIMPAN DATA =================
    public function insert($data)
    {
        return $this->db
            ->insert($this->table, $data);
    }

    // ================= UPDATE DATA =================
    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update($this->table, $data);
    }

    // ================= HAPUS DATA =================
    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }

}