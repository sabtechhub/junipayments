<?php



$token = "JWT TOKEN HERE";

$account_number  = 'ACCOUNT NUMBER TO VERIFY';
$bank_code     = 'BANK CODE'; //REFER FROM JUNIPAY SITE
$channel = 'bank';



$params = 'channel=' . $channel . '&account_number=' . $account_number . '&bank_code=' . $bank_code;

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
