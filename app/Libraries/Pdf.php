<?php

namespace App\Libraries;

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf
{
    protected $dompdf;

    public function __construct()
    {
        $options = new Options();
        $options->set('isRemoteEnabled ', true);
        $this->dompdf = new Dompdf($options);
    }

    public function generate($html, $filename)
    {

        $this->dompdf->loadHtml($html);
        $this->dompdf->set_paper("A4");
        $this->dompdf->render();



        $canvas = $this->dompdf->get_canvas();

        //For Footer
        // $footer = $canvas->open_object();
       
        // $date = date("Y-m-d H:i:s");
        // $canvas->page_text(250, 800, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(0, 0, 0));
        // $canvas->page_text(35, 800, "HiveDesk Screenshot Report", $font, 8, array(0, 0, 0));
        // $canvas->page_text(500, 800, $date, 8, array(0, 0, 0));
        // $canvas->close_object();
        // $canvas->add_object($footer, "all");
    
        //For header
        $header = $canvas->open_object();
        // $font = Font_Metrics::get_font("helvetica", "bold");
        // $canvas->page_text(35, 25, "HiveDesk Screenshot Report", $font, 8, array(0, 0, 0));
        // $canvas->page_text(490, 25, "hivedesk.com", $font, 8, array(0, 0, 0));
        $image = base_url('assets/image/logotype.png');
        $canvas->image($image,'png', 50, 115, 80, 105);
        $canvas->close_object();
        $canvas->add_object($header, "all");


        header('Content-Type: application/pdf');
        $this->dompdf->stream($filename, ['Attachment' => 0]);


        // $options = $dompdf->getOptions();
        // $options->set(array('isRemoteEnabled' => true));
        // $dompdf->setOptions($options);

        // $options = new Options();
        // $options->set('isRemoteEnabled', true);
        // $dompdf = new Dompdf($options);
    }
}
