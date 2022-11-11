<?php

$amount = doubleval(5);  //amount here
$total_amount = doubleval(5); //amounthere
$token = "YOUR JWT TOKEN HERE";
$digits = 13;

$ref = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);  //13 DIGIT REFERENCE


$bank_code = 'BANK CODE HERE';
$channel = 'bank';
$amount = $amount;
$account_number = 'BANK ACCOUNT NUMBER HERE';
$foreignID = $ref;
$sender_name = 'SABSTECH';
$callbackUrl = "CALL BACK URL HERE";
$receiver = 'Solomon' . rand(9, 9999);
$receiver_phone = "233244895292";
$narration  = 'sabstech payments';



$payload = array(
  "channel" => $channel,
  "bank_code" => $bank_code,
  "amount" => $amount,
  "account_number" => $account_number,
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
