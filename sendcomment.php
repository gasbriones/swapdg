<?php
session_name("SWAP Design");
session_start();

$text = $_POST['text'];

if ( !($text) ) {
  $errormessage = "Please write your comment";
	include("commentform.php");
} else {
	$to_email = "maty@swapdg.com";
	$mail_subject = "SWAP comentario web";
	$message .= stripslashes($text);
	$message = @strip_tags($message);
	$headers  = "From: SWAP web <maty@swapdg.com> \n";
	$headers .= "Mime-Version: 1.0\n";
	$headers .= "Content-Type: text/plain; charset=ISO-8859-1;";
	@mail($to_email, $mail_subject, $message, $headers);
  $_SESSION["commentsent"] = "commentsent";
	include("messagesent.php");
}
?>