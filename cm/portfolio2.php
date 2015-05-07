<?php
$gallery = $_GET['gallery'];
$error = false;
if (!empty($gallery)) {
	$sql = "SELECT * FROM portfolio WHERE gallery = $gallery";
	if ($rs = mysql_query($sql,$con)) {
		if (@mysql_num_rows($rs)==1) {
			$title = "Actualizar galer&iacute;a del portfolio";
			$item = mysql_fetch_array($rs);
			$order = $item['norder'];
			$family = $item['family'];
			$inlatestworks = $item['inlatestworks'];
			$thumb = $item['thumb'];
			$thumbcolor = $item['thumbcolor'];
			$images = $item['images'];
			$brief = $item['brief'];
			$briefen = $item['brief_en'];
			$text = $item['text'];
			$texten = $item["text_en"];
			$brand = "";
			$print = "";
			$website = "";
			$packaging = "";
			switch($family) {
				case "Brand": $brand = "selected='selected'"; break;
				case "Print": $print = "selected='selected'"; break;
				case "Website": $website = "selected='selected'"; break;
				case "packaging": $packaging = "selected='selected'"; break;
			}
			($inlatestworks==1)?$yes="checked=\"checked\"":$yes = "";
		} else {
			$error = true;
		}
	} else {
		$error = true;
	}
} else {
	$title = "Agregar galer&iacute;a al portfolio";
	$gallery = "";
	$family = "";
	$thumb = "";
	$thumbcolor = "";
	$images = "";
	$brief = "";
	$briefen = "";
	$text = "";
	$texten = "";
}
if ($error == false) {
	echo "<h4>".$title."</h4>";
	$form = "<form name=\"portfolioform\" id=\"portfolioform\" action=\"portfolioadd.php\" method=\"POST\" onSubmit=\"javascript:submitportfolio()\">";
	$form .= "<input type=\"hidden\" name=\"gallery\" value=\"$gallery\" />";
	$form .= "<div><label for=\"family\">Tipo de trabajo:</label> <select name=\"family\" id=\"family\"><option value=\"Brand\" $brand>Brand</option><option value=\"Print\" $print>Print</option><option value=\"Website\" $website>Website</option><option value=\"Packaging\" $packaging>Packaging</option></select></div>";
	$form .= "<fieldset><legend>Thumbs</legend>";
	$form .= "<div><label for=\"thumb\">Blanco y Negro:</label> <input type=\"text\" name=\"thumb\" id=\"thumb\" value=\"$thumb\" /> <span class=\"note\">Nombre del archivo de la miniatura blanco y negro (240px x 160px)</span></div><div><label for=\"thumb\">Color:</label> <input type=\"text\" name=\"thumbcolor\" id=\"thumbcolor\" value=\"$thumbcolor\" /> <span class=\"note\">Nombre del archivo de la miniatura color (240px x 160px)</span></div></fieldset>";
	$form .= "<div><label for=\"images\">Im&aacute;genes:</label> <input type=\"text\" name=\"images\" id=\"images\" value=\"$images\" /> <span class=\"note\">Listado de archivos de im&aacute;genes, separados por comas. Ej: img1.jpg,img2.jpg </span></div>";
	$form .= "<div><label for=\"brief\">Resumen:</label> <input type=\"text\" name=\"brief\" id=\"brief\" value=\"$brief\" maxsize=\"255\" /></div>";
	$form .= "<div><label for=\"brief_en\">Resumen (Ingl&eacute;s):</label> <input type=\"text\" name=\"brief_en\" id=\"brief_en\" value=\"$briefen\" maxsize=\"255\" /></div>";
	$form .= "<div><label for=\"text\">Texto:</label> <input type=\"text\" name=\"text\" id=\"text\" value=\"$text\" /></div>";
	$form .= "<div><label for=\"text_en\">Texto (Ingl&eacute;s):</label> <input type=\"text\" name=\"text_en\" id=\"text_en\" value=\"$texten\"></div>";
	$form .= "<div><label for=\"order\">Ubicaci&oacute;n:</label> <input type=\"text\" name=\"order\" id=\"order\" value=\"$order\"></div>";
	$form .= "<div><label><input type=\"checkbox\" name=\"inlatestworks\" id=\"inlatestworks\" value=\"1\" $yes> Mostrar en <strong>Latest Works</strong><img src=\"images/star.png\" width=\"16\" height=\"16\" alt=\"Mostrar en Latest Works\" title=\"Mostrar en Latest Works\" /></label></div>";
	$form .= "<div><input type=\"submit\" value=\"Grabar\" /> <a href=\"?section=1&action=1\">Cancelar</a></div>";
} else {
	$form = "<p>Ocurri&oacute; un error. Reintentar la operaci&oacute;n. <a href=\"?section=1&action=1\">Volver</a></p>";
}
echo $form;
?>