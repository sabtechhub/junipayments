<?php

$amount = doubleval(1); //AMOUNT HERE
$total_amount = doubleval(1);
$token = "YOUR JWT TOKEN HERE";


$digits = 13;
$ref = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

$phoneNumber = 'PHONE TO RECEIVE PAYMENT';
$channel = 'mobile_money';
$amount = $total_amount; //amount
$provider = 'mtn'; //PROVIDER
$foreignID = $ref;
$sender_name = 'SABSTECH SMARTVOTE';
$callbackUrl = 'CALL BACK URL';
$receiver = 'afia pokuaa' . rand(1, 99999);
$receiver_phone = "RECEIVER PHONE";
$narration  = 'sabstech payments';



$payload = array(
  "channel" => $channel,
  "phoneNumber" => $phoneNumber,
  "amount" => $amount,
  "provider" => $provider,
  "foreignID" => $foreignID,
  "receiver_phone" => $receiver_phone,
  "sender" => $sender_name,
  "receiver" => $receiver,
  "callbackUrl" => $callbackUrl,
  "narration" => $narration
);




$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.junipayments.com/transfer',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($payload),
  CURLOPT_HTTPHEADER => array(
    'clientid: CLIENT ID HERE',
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
print_r($response);
