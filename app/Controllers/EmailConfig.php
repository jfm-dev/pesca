<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EmailConfig extends BaseController
{
    public function contact_us($data)
    {

        $email = \Config\Services::email();

        $email->setFrom('jfmdev0@gmail.com', 'JFM DEVELOPMENT');
        $email->setTo('jfmdev0@gmail.com');
        // $email->setCC('another@another-example.com');
        // $email->setBCC('them@their-example.com');
        $email->setSubject($data['subject']);
        $email->setMessage('De '.$data['name'].', E-mail '.$data['email'].'.  '.$data['message']);
        if ($email->send(true)) {
            return true;
        }
        return false;
    }

    public function simplemail($data)
    {

        $email = \Config\Services::email();

        $email->setFrom('jfmdev0@gmail.com', 'JFM DEVELOPMENT');
        $email->setTo($data['email']);
        // $email->setCC('another@another-example.com');
        // $email->setBCC('them@their-example.com');
        $email->setSubject($data['subject']);
        $email->setMessage($data['message']);
        if ($email->send(true)) {
            return true;
        }
        return false;
    }

    public function subscribe($data)
    {

        $email = \Config\Services::email();

        $email->setFrom('jfmdev0@gmail.com', 'JFM DEVELOPMENT');
        $email->setTo($data['email']);
        // $email->setCC('another@another-example.com');
        // $email->setBCC('them@their-example.com');
        $email->setSubject('Subinscrição bem sucedida');
        $email->setMessage('Prezado(a) ' . $data['name'] . ', confirmamos a sua subinscrição no nosso sistema para que possa receber nossas informações regularmente. Acompanhe-nos sempre.');
        if ($email->send(true)) {
            return true;
        }
        return false;
    }

    public function sendMessage($email, $data)
    {
        foreach ($email as $key => $value) {
            $email = \Config\Services::email();

            $email->setFrom('jfmdev0@gmail.com', 'JFM DEVELOPMENT');
            $email->setTo($value->email);
            // $email->setCC('another@another-example.com');
            // $email->setBCC('them@their-example.com');
            $email->setSubject('Pesca - Informação');
            $email->setMessage($data->message);
            $email->send(true);
        }
    }
}
