<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Sms extends BaseController
{
    private $apiKey = 'a8ab13a3ad389aab1ab48567eef60433';
    private $apiSecret = 'b572fbe01f8e283487164196db722fee0e303d08419219f825d580b49718c471';
    private $baseUrl = 'https://api.airtexts.com';



    // Send SMS
    public function sendSMS($message)
    {
        $contacts = $this->newslettermodel
            ->select('contact')
            ->findAll();
        // dd($contacts);
        foreach ($contacts as $key => $value) {
            $data = [
                'to' => $value->contact,
                'from' => 'INFOMSG',
                'message' => $message
            ];
            return $this->makeRequest('POST', '/sms/send', $data);
        }
    }

    private function makeRequest($method, $endpoint, $data = null)
    {
        $ch = curl_init($this->baseUrl . $endpoint);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'X-API-Key: ' . $this->apiKey,
            'X-API-Secret: ' . $this->apiSecret,
            'Content-Type: application/json'
        ]);

        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);

        return redirect()->back()->with('success', 'Sucesso!');
    }




    function sendBulkSMS($message)
    {
        $contacts = $this->newslettermodel
            ->select('contact')
            ->findAll();

        $recipients = array_column($contacts, 'contact');


        $data = [
            'recipients' => is_array($recipients) ? $recipients : explode(',', $recipients),
            'from' => 'INFOMSG',
            'message' => $message,
            'batch_size' => 100
        ];

        // dd($data);

        $ch = curl_init('https://api.airtexts.com/sms/sendbulk');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'X-API-Key: a8ab13a3ad389aab1ab48567eef60433',
            'X-API-Secret: b572fbe01f8e283487164196db722fee0e303d08419219f825d580b49718c471',
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);
        dd($result);
         return redirect()->back()->with('success', 'Sucesso!');
    }
}
