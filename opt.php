<?php

$details = file_get_contents("php://input");


$get_data = json_decode($details);

$status_code = $get_data->code;
$status      = $get_data->info->status;
$messsage       = $get_data->info->message;
$transaction_id = $get_data->info->transID;


echo "The Status code is " . $status_code, " The status is : " . $status . " The Message is : " . $messsage . " The Transaction Id is : " . $transaction_id;
