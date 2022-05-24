<?php
//#265605

// hover #84b943
include('includes/config.php');
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
    echo $response = curl_exec($curl);
}


$getUsers = mysqli_query($con, "SELECT * FROM  users");
if (mysqli_num_rows($getUsers) > 0) {
    while ($userInfo = mysqli_fetch_array($getUsers)) {
        $messagesent = "A new tender has been posted :  Product name :  $productname , Category : $category , Company Name : $productcompany";
        $phone = '254' . $userInfo['contactno'];
        sendMsg($messagesent, $phone);
    }
}