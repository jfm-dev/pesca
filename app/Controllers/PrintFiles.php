<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Helpers\Pdfhelper;

class PrintFiles extends BaseController
{
    public function print_cotation($id)
    {
        Pdfhelper::Pdfprint([
            'cotation' => $this->cotationmodel->getCotation($id),
            'services_cotation' => $this->servicecotationmodel->getServicesCotation($id),
            'prices' => $this->servicecotationmodel->getPrices($id),
            'services' => $this->servicemodel->findAll(),
            'category' => $this->categorymodel->findAll(),
            'units' => $this->unitmodel->findAll(),
            'accounts' => $this->financialaccountmodel->findAll(),
        ],'Cotação_'.$id.'_'.date('d/m/yyyy'), "pages/cotations/print");
    }

    public function print_invoice($id)
    {
        Pdfhelper::Pdfprint([
            'cotation' => $this->cotationmodel->getCotation($id),
            'services_cotation' => $this->servicecotationmodel->getServicesCotation($id),
            'prices' => $this->servicecotationmodel->getPrices($id),
            'services' => $this->servicemodel->findAll(),
            'category' => $this->categorymodel->findAll(),
            'units' => $this->unitmodel->findAll(),
            'accounts' => $this->financialaccountmodel->whereNotIn('name', ['Caixa'])->findAll(),
        ],'(Factura_'.$id.'_'.date('d/m/yyyy'), "pages/invoice/print");
    }

    public function print_invoice_recipe($id)
    {
        // Pdfhelper::Pdfprint([
        //     'cotation' => $this->cotationmodel->getCotation($id),
        //     'services_cotation' => $this->servicecotationmodel->getServicesCotation($id),
        //     'prices' => $this->servicecotationmodel->getPrices($id),
        //     'services' => $this->servicemodel->findAll(),
        //     'category' => $this->categorymodel->findAll(),
        //     'units' => $this->unitmodel->findAll(),
        //     'accounts' => $this->financialaccountmodel->findAll(),
        // ],'Recibo');
    }
}
