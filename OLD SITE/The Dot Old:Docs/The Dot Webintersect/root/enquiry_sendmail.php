<?php 

$to = "zanepocock@gmail.com"; 

$subject = "Email Sign Up for The Dot Progress"; 

$email = $_REQUEST['email'] ; 
         
$headers = "From: $email"; 

$sent = mail($to, $subject, $message, $headers) ; 

if($sent) {print "Your mail was sent successfully"; } 

else {print "We encountered an error sending your mail"; } 

?> 