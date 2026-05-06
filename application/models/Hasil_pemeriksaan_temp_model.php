<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_pemeriksaan_temp_model extends CI_Model {

    protected $table = 'hasil_pemeriksaan_temp';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
}
