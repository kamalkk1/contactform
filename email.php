<?php

$toemail = "kamal@thoughtnet.in";
$subject = "simple";
$body = "HI";
$headers = "From: kamalk2620@gmail.com" . "\r\n" .
"CC: kamalk2620@gmail.com";


if(mail($toemail, $subject, $body, $headers)) {
 
    echo "Email sent successfully!";
} else {
   
    echo "Failed to send the email.";
}


?>