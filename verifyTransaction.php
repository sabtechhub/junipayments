<?php


$token = "YOUR JWT TOKEN HERE";


$payload = array(
  "transID" => "1666594180558"
);




$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.junipayments.com/checktranstatus',
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
