<?php

$amount = doubleval(5);
$total_amount = doubleval(5);
$token = "JWT TOKEN HERE";

$payload = array(
  "amount" => $amount,
  "tot_amnt" => $total_amount,
  "provider" => 'mtn',
  "phoneNumber" => 'MOBILE NUMBER TO DEBIT',
  "channel" => 'mobile_money',
  "senderEmail" => 'payer@email.com',
  "description" => 'test payment',
  "foreignID" => '111117785555',
  "callbackUrl" => 'https://webhook.site/6144b603-2df6-4e07-9331-2fdb5c2ae651',
  // 'json' => true
);


$payload = json_encode($payload);


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.junipayments.com/payment',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $payload,
  CURLOPT_HTTPHEADER => array(
    'clientid:  CLIENT ID HERE',
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
print_r($response);
