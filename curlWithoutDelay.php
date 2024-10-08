<?php 

namespace App\Services;

class JunipayService
{
    public function momoprompt($amount, $network, $msisdn, $client_id)
    {
        // Preparing the payload for the request
        $payload = [
            "amount" => doubleval($amount),
            "tot_amnt" => doubleval($amount),
            "provider" => strtolower($network),
            "phoneNumber" => $msisdn,
            "channel" => 'mobile_money',
            "senderEmail" => 'sabsolinfo@gmail.com',
            "description" => 'SAB-TECH HUB PAYMENTS',
            "foreignID" => $client_id,
            "callbackUrl" => 'https://webhook.site/8068a52e-b8e0-4a20-a144-14ed4c7bb384'
        ];

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.junipayments.com/payment',
            CURLOPT_SSL_VERIFYPEER => 0, // Set to true for production
            CURLOPT_RETURNTRANSFER => false, // Do not wait for the response
            CURLOPT_TIMEOUT_MS => 1000, // Timeout immediately after sending the request
            CURLOPT_POST => true, // Ensure it is a POST request
            CURLOPT_POSTFIELDS => json_encode($payload), // Sending payload
            CURLOPT_HTTPHEADER => [
                'clientid: Qys10304',
                'Content-Type: application/json',
                'Authorization: Bearer '.$token,
            ]
        ]);

        // Execute the cURL request
        curl_exec($curl);

        // Close the cURL session
        curl_close($curl);
    }
}
