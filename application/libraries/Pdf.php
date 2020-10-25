<?php defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf extends Dompdf
{
    public $filename;
    function __construct()
    {
        parent::__construct();
    }

    function cetak($view, $data, $size,  $orientation)
    {
        $CI = &get_instance();

        $opt = new Options();
        $opt->set('isRemoteEnabled', TRUE);
        $dom = new Dompdf($opt);
        $dom->setPaper($size, $orientation);
        $html = $CI->load->view($view, $data, TRUE);
        $dom->loadHtml($html);
        $dom->render();
        $dom->stream($this->filename, array("Attachment" => false));
    }
}
