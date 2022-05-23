<?php
function sendMsg($messagesent, $phone)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.umeskiasoftwares.com/api/v1/sms',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
                "api_key":"SFhERkJLN0o6NzU0bTYxNGU=",
                "email":"alvo967@gmail.com",
                "Sender_Id": "23107",
                "message": "' .  $messagesent . '",
                "phone":"' . $phone . '"
              }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));
    $response = curl_exec($curl);
}