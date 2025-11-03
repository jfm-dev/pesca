<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\SmsService;

class SendSms extends BaseController
{

    public function send_sms()
    {
        $sms = new SmsService();
        $enviado = $sms->send('+258875124492', 'Olá! Esta é uma mensagem de teste.');

        if ($enviado) {
            return 'SMS enviado com sucesso!';
        } else {
            return 'Falha ao enviar SMS.';
        }
    }
}
