<?php 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$formcontent="From: $firstname $lastname \nE-Mail: $email \nSubject: $subject \nMessage: $message";
$recipient = "jpark2284@gmail.com";
$subject = "-----ColettePark Message-----";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "<h1 color='#000' font-size='52px' font-family''goldoni', Cursive'>Thank you!  I will be in touch with you very shortly!</h1>";
?>