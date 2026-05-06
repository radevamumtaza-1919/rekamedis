<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model {

    // Ambil petugas berdasarkan jabatan apa pun
    public function getVerifikasi()
{
    return $this->db->get('petugas_verifikasi')->result();
}

public function getValidasi()
{
    return $this->db->get('petugas_validasi')->result();
}

}
