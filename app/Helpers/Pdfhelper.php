<?php

namespace App\Helpers;

use App\Libraries\Pdf;

class Pdfhelper
{
    public static function Pdfprint($data, $filename, $filepath)
    {
        $pdf = new Pdf();
        $html =  view($filepath, $data);
   
        $pdf->generate($html, $filename);
    }
}
