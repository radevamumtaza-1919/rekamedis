<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_bulanan_tahunan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Laporan_bulanan_tahunan_model');
    }

    public function index($bulan = null, $tahun = null)
{
    // jika kosong gunakan bulan & tahun sekarang
    $bulan = $bulan ?? date('m');
    $tahun = $tahun ?? date('Y');

    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;

    $data['hematologi'] =
        $this->Laporan_bulanan_tahunan_model
        ->get_kategori_bulan('HEMATOLOGI', $bulan, $tahun);

    $data['kimia_darah'] =
        $this->Laporan_bulanan_tahunan_model
        ->get_kategori_bulan('KIMIA DARAH', $bulan, $tahun);

    $data['urinalisis'] =
        $this->Laporan_bulanan_tahunan_model
        ->get_kategori_bulan('URINALISA', $bulan, $tahun);

    $data['hemostasis'] =
        $this->Laporan_bulanan_tahunan_model
        ->get_kategori_bulan('HEMOSTASIS', $bulan, $tahun);

    $data['biomolekuler'] =
        $this->Laporan_bulanan_tahunan_model
        ->get_kategori_bulan('BIOMOLEKULER', $bulan, $tahun);

    $data['imunologi'] =
        $this->Laporan_bulanan_tahunan_model
        ->get_kategori_bulan('IMUNOLOGI', $bulan, $tahun);

    $data['mikrobiologi'] =
        $this->Laporan_bulanan_tahunan_model
        ->get_kategori_bulan('MIKROBIOLOGI', $bulan, $tahun);

    $data['toksikologi'] =
        $this->Laporan_bulanan_tahunan_model
        ->get_kategori_bulan('TOKSIKOLOGI', $bulan, $tahun);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('laporan_bulanan_tahunan/index', $data);
        $this->load->view('layout/footer');
    }
    // ================= LAPORAN TAHUNAN =================
    public function laporan_tahunan()
    {
        $tahun = $this->input->get('tahun');

        if(!$tahun){
            $tahun = date('Y');
        }

        $data['tahun'] = $tahun;

        $data['laporan_tahunan'] =
            $this->Laporan_bulanan_tahunan_model
            ->get_laporan_tahunan($tahun);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('laporan_bulanan_tahunan/laporan_tahunan', $data);
        $this->load->view('layout/footer');
    }
}