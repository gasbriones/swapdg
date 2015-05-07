<?php
$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['text'];

if (! ($name) || ! ($email) || ! ($text) || ( !ereg("^([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z,]+))*([_,-])?[@]([0-9,a-z,A-Z]{3,})([_\,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2,3}([.]([0-9,a-z,A-Z]){2,3})?$", $email )) ) {
  $errormessage = "Please make shure all fields are completed and that you have entered a valid email address.";
	include("contactform.php");
} else {
	$to_email = "maty@swapdg.com";
	$mail_subject = "SWAP mensaje web";
	$message .= stripslashes($text);
	$message = @strip_tags($message);
	$headers  = "From: $nombre <$email> \n";
	$headers .= "Mime-Version: 1.0\n";
	$headers .= "Content-Type: text/plain; charset=ISO-8859-1;";
	@mail($to_email, $mail_subject, $message, $headers);
	include("messagesent.php");
}
?>