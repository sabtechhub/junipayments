<?php

// $amount = doubleval(5);
// $total_amount = doubleval(5);


$token = "JWT TOKEN HERE";


$phoneNumber  = 'YOUR PHONE NUMBER';
$provider     = 'mtn'; // PROVIDER
$channel = 'mobile_money'; //CHANNEL



$params = 'channel=' . $channel . '&phoneNumber=' . $phoneNumber . '&provider=' . $provider;

$url = 'https://api.junipayments.com/resolve?';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url . $params,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'clientid: CLIENT ID HERE',
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
  ),
));

$response = json_decode(curl_exec($curl));

curl_close($curl);

print_r($response);
