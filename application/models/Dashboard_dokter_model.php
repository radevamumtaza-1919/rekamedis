<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_dokter_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function count_pasien() {
        return $this->db->count_all('pasien'); // contoh
    }

    public function get_pasien_all() {
        return $this->db->get('pasien')->result();
    }

}
