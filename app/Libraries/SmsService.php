<?php

namespace App\Libraries;

use Twilio\Rest\Client;

class SmsService
{


    public function send($phone, $message)
    {
        $curl = curl_init();

        $data = json_encode([
            'phone' => '+258841474480',
            'message' => 'Olá! Esta é uma mensagem de teste da API v2.0',
            'sender_id' => 'MozeSMS'
        ]);

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.mozesms.com/v2/sms/send',
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer 2689:qjsPSu-qiZusB-t3aCxi-FE6IA4'
            ],
            CURLOPT_RETURNTRANSFER => true
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        echo "HTTP: $httpCode\n";
        echo "Response: $response\n";
    }
}
