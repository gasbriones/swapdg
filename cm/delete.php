<?php
session_name("SWAPcm");
session_start();
require("config.php");
$sectionid = $_GET['section'];
$id = $_GET['id'];
if (!empty($sectionid) && !empty($id)) {
	$section = getSection($sectionid);
	if ( $section == "portfolio" ) {
		$sql2 = "SELECT thumb,thumbcolor,images FROM portfolio WHERE gallery=$id";
		$rs2 = @mysql_query($sql2,$con);
		$images = @mysql_fetch_array($rs2);
		$sql = "DELETE FROM $section WHERE gallery=$id";
	} else {
		$sql = "DELETE FROM $section WHERE id=$id";
	}
} else {
	header('Location:index.php?section='.$sectionid);
}
if ($rs = mysql_query($sql,$con)) {
	$_SESSION['mc'] = "El item fue eliminado.";
	if ( $section == "portfolio" ) {
		$_SESSION['mc'] .= "<br />Los siguientes archivos deber&aacute;n ser borrados del servidor: ".$images['thumb'].", ".$images['thumbcolor'].", ".$images['images'].".";
	}
	header('Location:index.php?section='.$sectionid);
} else {
	$_SESSION['mc'] = "Ocurri&oacute; un error. La secci&oacute;n no pudo ser actualizada.";
	header('Location:index.php?section='.$sectionid);
}
?>