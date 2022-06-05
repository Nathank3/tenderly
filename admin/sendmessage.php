<?php

function sendMsg($messagesent, $phone)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.umeskiasoftwares.com/api/v1/smscheck',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));
    $response = curl_exec($curl);
    $data = json_decode($response);
    $api_key = $data->api_key;
    $baseUrl = "http://bulksms.mobitechtechnologies.com/api/sendsms";
    $ch = curl_init($baseUrl);
    $data = array(
        'api_key' => $api_key,
        'username' => 'umeskia',
        'sender_id' => "23107",
        'message' => $messagesent,
        'phone' => $phone
    );
    $payload = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     $result = curl_exec($ch);
    curl_close($ch);
}