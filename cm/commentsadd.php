<?php
session_name("SWAPcm");
session_start();
require("config.php");
$id = $_POST['id'];
$adate = $_POST['adate'];
$atext = $_POST['atext'];
$atexten = $_POST['atexten'];
if (!empty($id)) {
	$sql = "UPDATE comments SET adate='$adate',atext='$atext',atexten='$atexten' WHERE id=$id";
} else {
	$sql = "INSERT INTO comments (adate,atext,atexten) VALUES ('$adate','$atext','$atexten')";
}
if ($rs = mysql_query($sql,$con)) {
	$_SESSION['mc'] = "El comentario fue actualizado.";
	header('Location:index.php?section=4');
} else {
	$_SESSION['mc'] = "Ocurri&oacute; un error. La secci&oacute;n no pudo ser actualizada: ".mysql_error();
	header('Location:index.php?section=4');
}
?>