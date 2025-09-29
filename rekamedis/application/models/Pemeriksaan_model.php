<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_item() {
        $this->db->select('*');
        $this->db->from('item_pemeriksaan');
        return $this->db->get()->result();
    }

    public function get_by_id($id) {
        // kode lainnya
    }

    public function get_all_kategori_with_subkategori_item() {
        $kategori = $this->db->get('kategori_pemeriksaan')->result();

        foreach($kategori as $k) {
            $k->subkategori = $this->db->where('id_kategori', $k->id_kategori)
                                       ->get('subkategori_pemeriksaan')
                                       ->result();

            foreach($k->subkategori as $s) {
                $s->item = $this->db->where('id_subkategori', $s->id_subkategori)
                                    ->get('item_pemeriksaan')
                                    ->result();
            }
        }

        return $kategori;
    }
}
