<?php
$id = $_GET['id'];
$error = false;
if (!empty($id)) {
	$sql = "SELECT * FROM comments WHERE id = $id";
	if ($rs = mysql_query($sql,$con)) {
		if (@mysql_num_rows($rs)==1) {
			$title = "Modificar comentario.";
			$item = mysql_fetch_array($rs);
			$date = $item['adate'];
			$text = $item['atext'];
			$texten = $item['atexten'];
		} else {
			$error = true;
		}
	} else {
		$error = true;
	}
} else {
	$title = "Agregar comentario.";
	$id = "";
	$date = "";
	$text = "";
	$texten = "";
}
if ($error == false) {
	echo "<h4>".$title."</h4>";
	$form = "<form name=\"newsform\" id=\"newsform\" action=\"commentsadd.php\" method=\"POST\" onSubmit=\"javascript:submitnews()\">";
	$form .= "<input type=\"hidden\" name=\"id\" value=\"$id\" />";
	$form .= "<div><label for=\"adate\">Fecha:</label> <input type=\"text\" name=\"adate\" id=\"adate\" value=\"$date\" /></div>";
	$form .= "<div><label for=\"atext\">Texto:</label> <input type=\"text\" name=\"atext\" id=\"atext\" value=\"$text\" maxsize=\"255\" /></div>";
	$form .= "<div><label for=\"atexten\">Texto (Ingl&eacute;s):</label> <input type=\"text\" name=\"atexten\" id=\"atexten\" value=\"$texten\" maxsize=\"255\" /></div>";
	$form .= "<div><input type=\"submit\" value=\"Grabar\" /> <a href=\"?section=4&action=1\">Cancelar</a></div>";
} else {
	$form = "<p>Ocurri&oacute; un error. Reintentar la operaci&oacute;n. <a href=\"?section=4&action=1\">Volver</a></p>";
}
echo $form;
?>