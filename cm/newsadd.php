<?php
session_name("SWAPcm");
session_start();
require("config.php");
$id = $_POST['id'];
$adate = $_POST['adate'];
$atext = $_POST['atext'];
$atexten = $_POST['atexten'];
if (!empty($id)) {
	$sql = "UPDATE news SET adate='$adate',atext='$atext',atexten='$atexten' WHERE id=$id";
} else {
	$sql = "INSERT INTO news (adate,atext,atexten) VALUES ('$adate','$atext','$atexten')";
}
if ($rs = mysql_query($sql,$con)) {
	$_SESSION['mc'] = "La noticia fue actualizada.";
	header('Location:index.php?section=3');
} else {
	$_SESSION['mc'] = "Ocurri&oacute; un error. La secci&oacute;n no pudo ser actualizada ".mysql_error();
	header('Location:index.php?section=3');
}
?>