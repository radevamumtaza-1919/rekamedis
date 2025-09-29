<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_petugas_model extends CI_Model {

    private $table_pasien = 'pasien';

    public function count_pasien() {
        return $this->db->count_all($this->table_pasien);
    }

    // Tambahkan method lain sesuai kebutuhan
}
