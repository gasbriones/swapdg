<?php
session_name("SWAPcm");
session_start();
require("config.php");
$order = $_POST['order'];
$gallery = $_POST['gallery'];
$family = $_POST['family'];
$inl = $_POST['inlatestworks'];
($inl==1)?$inlatestworks=1:$inlatestworks=0;
$thumb = $_POST['thumb'];
$thumbcolor = $_POST['thumbcolor'];
$images = $_POST['images'];
$brief = $_POST['brief'];
$briefen = $_POST['brief_en'];
$text = $_POST['text'];
$texten = $_POST["text_en"];
if (!empty($gallery)) {
	$sql = "UPDATE portfolio SET norder='$order', family='$family', inlatestworks='$inlatestworks', thumb='$thumb', thumbcolor='$thumbcolor', images='$images', brief='$brief', brief_en='$briefen', text='$text', text_en='$texten' WHERE gallery=$gallery";
} else {
	$sql = "INSERT INTO portfolio (norder,family,inlatestworks,thumb,thumbcolor,images,brief,brief_en,text,text_en) VALUES ($order,'$family','$inlatestworks','$thumb','$thumbcolor','$images','$brief','$briefen','$text','$texten')";
}
if ($rs = mysql_query($sql,$con)) {
	$_SESSION['mc'] = "El portfolio fue actualizado.";
	header('Location:index.php?section=1');
} else {
	$_SESSION['mc'] = "Ocurri&oacute; un error. El portfolio no pudo ser actualizado: ".mysql_error();
	header('Location:index.php?section=1');
}
?>