<?php
if(isset($_POST['email'])) {
	$email_to = "dave@daveada.com";
    $email_subject = "Contact from Tacotlan.com";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['firstname']) ||
        !isset($_POST['lastname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }

    $firstname = $_POST['firstname']; // required
    $lastname = $_POST['lastname']; // required
    $email_from = $_POST['email']; // required
    $subject = $_POST['subject']; // required
    $message = $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_from)) {
    	$error_message .= 'Please enter a valid E-Mail Address.<br />';
 	}
 
    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$firstname)) {
    	$error_message .= 'Please enter a valid First Name.<br />';
 	}
 
  	if(!preg_match($string_exp,$lastname)) {
    	$error_message .= 'Please enter a valid Last Name.<br />';
  	}

  	if(strlen($message) < 5) {
    	$error_message .= 'We need to know a little more information.<br />';
  	}

  	if(strlen($error_message) > 0) {
    	died($error_message);
  	}
 
    	$email_message = "You've received the following comment:\n\n";
 
     
    	function clean_string($string) {
      		$bad = array("content-type","bcc:","to:","cc:","href");
     		return str_replace($bad,"",$string);
    	}
 
     

	    $email_message .= "First Name: ".clean_string($firstname)."\n";
	    $email_message .= "Last Name: ".clean_string($lastname)."\n";
	    $email_message .= "Subject: ".clean_string($subject)."\n";
	    $email_message .= "Email: ".clean_string($email_from)."\n";

	    $email_message .= "Message: ".clean_string($message)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>

<!-- include your own success html here -->
<!DOCTYPE html>
<html> 
    <head>
        <style>
            @font-face{
                font-family:'cooperhewittbold';
                src:url('../fonts/cooper/CooperHewitt-Bold.otf');
}
            body{
                background-color: rgba(86,168,143,0.9)
            }
            h1{
                color: #fff;
                font-family:'cooperhewittbold';
                font-size: 36px;
            }
        </style>
    </head>
    <h1>Thank you for contacting us. We will be in touch with you very soon.</h1>
 </html>
<?php
 
}
?>