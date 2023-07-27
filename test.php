<?php



function sendEmail($to, $subject, $message, $from)
{
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

  
    if (mail($to, $subject, $message, $headers)) {
   
        echo "Email sent successfully!";
    } else {

        echo "Failed to send the email.";
    }
}

$to = 'dowofib215@quipas.com';
$subject = 'Test Email';
$message = 'This is a test email';
$from = 'kamalk2620@gmail.com'; 

sendEmail($to, $subject, $message, $from);
?>
