<?php
    function sendEmail($email, $status, $project){
        $url = 'https://script.google.com/macros/s/AKfycbxye3hgyHArl6459Ga4CfQcK4_dxDWM3rDakhBp00danKsu45Bp3_LbeJM2nEgy1pm7/exec';
        $ch = curl_init($url);
        curl_setopt_array($ch, [
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_POSTFIELDS => http_build_query([
        	  "recipient" => $email,
        	  "subject"   => $project,
        	  "body"      => "Status of Project: ".$status.". This email is auto-generated. Do not reply this email."
           ])
        ]);

        $result = curl_exec($ch);
        echo $result;
    }
?>