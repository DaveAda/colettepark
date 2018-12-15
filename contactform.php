<?php 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$formcontent="From: $firstname $lastname \nE-Mail: $email \nSubject: $subject \nMessage: $message";
$recipient = "davealyinovich@gmail.com";
$subject = "-----ColettePark Message-----";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "<h1 color='red' font-size='52px'>Thank You!</h1>";
?>