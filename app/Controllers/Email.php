<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Email extends BaseController
{
    protected $emailconfig;

    public function __construct()
    {
        $this->emailconfig = new EmailConfig;
    }

    
    public function contact_us()
    {

        $data = $this->request->getPost();

        if ($this->emailconfig->simplemail($data)) {
            return json_encode(['type' => 'success', 'message' => 'Menssagem enviada com sucesso!']);
        }
        return json_encode(['type' => 'error', 'message' => 'Houve um erro!']);
    }
}
