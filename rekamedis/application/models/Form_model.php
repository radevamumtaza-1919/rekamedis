<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model {
    
    public function simpan_form($data) {
        // Mapping input ke kolom database
        $insertData = [
            'no_register' => $data['no_register'],
            'nama_pasien' => $data['nama_pasien'],
            'nik' => $data['nik'],
            'gender' => $data['gender'],
            'tgl_lahir' => $data['tgl_lahir'],
            'umur' => $data['umur'],
            'alamat_pasien' => $data['alamat_pasien'],
            'telp_pasien' => $data['telp_pasien'],
            'nama_dokter' => $data['nama_dokter'],
            'alamat_pengirim' => $data['alamat_pengirim'],
            'telp_pengirim' => $data['telp_pengirim'],
            'tgl_form' => $data['tgl_form'],
            'diagnosa_klinis' => $data['diagnosa_klinis'],
            'obat_dikonsumsi' => $data['obat_dikonsumsi'],
            'asal_sampel' => implode(',', $data['asal_sampel'] ?? []),
            'puasa' => $data['puasa'] ?? '',
            'lokasi_pengambilan' => implode(',', $data['lokasi_pengambilan'] ?? []),
            'lokasi_lainnya' => $data['lokasi_lainnya'],
            'jenis_spesimen' => implode(',', $data['jenis_spesimen'] ?? []),
            'spesimen_lainnya' => $data['spesimen_lainnya'],
            'tgl_permintaan' => $data['tgl_permintaan'],
            'volume_spesimen' => $data['volume_spesimen'],
            'tgl_pengambilan' => $data['tgl_pengambilan'],
            'jam_pengambilan' => $data['jam_pengambilan'],
            'prioritas' => $data['prioritas'],
            'info_tambahan' => $data['info_tambahan']
        ];

        return $this->db->insert('form_permintaan', $insertData);
    }
    public function get_all_formulir() {
        return $this->db->get('form_permintaan')->result();

    }
    public function get_formulir_by_id($id) {
        return $this->db->get_where('form_permintaan', ['id' => $id])->row();
    }
}