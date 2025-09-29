<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load Composer's autoloader
require_once FCPATH . 'vendor/autoload.php';

use Mpdf\Mpdf;

class Pdf {

    protected $mpdf;

    public function __construct() {
        $this->mpdf = new Mpdf();
    }

    public function load_view($view, $data = []) {
        $CI = &get_instance();
        $html = $CI->load->view($view, $data, true);
        $this->mpdf->WriteHTML($html);
        $this->mpdf->Output();
    }
}
