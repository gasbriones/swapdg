<?php
$sql = "SELECT * FROM news ORDER BY adate DESC,id";
$table = "<table class=\"list\"><tr><td><strong>Noticias</strong> | <a href=\"?section=3&action=2\" title=\"Agregar una nueva noticia\">Agregar nuevo</a></td></tr>";
if ($rs = mysql_query($sql,$con)) {
	if (@mysql_num_rows($rs)>0) {
		while ($item = mysql_fetch_array($rs)) {
			$table .= "<tr><td><a href=\"?section=3&action=2&id=".$item['id']."\" title=\"Modificar esta noticia\"><img src=\"images/b_edit.png\" width=\"16\" height=\"16\" alt=\"Modificar esta noticia\" title=\"Modificar esta noticia\" /></a> <a href=\"javascript:void(0);\" onclick=\"javascript:deleteitem(3,".$item['id'].");\" title=\"Eliminar\"><img src=\"images/b_drop.png\" width=\"16\" height=\"16\" alt=\"Eliminar\" title=\"Eliminar\" /></a> ".$item['adate']." - ".$item['atext']."</td></tr>";
		}
	} else {
		$table .= "<tr><td>No hay items publicados en esta secci&oacute;n</td></tr>";
	}
} else {
	$table .= "<tr><td>Ocurri&oacute; un error al intentar obtener el listado de items: ".mysql_error()."</td></tr>";
}
$table .= "</table>";
echo $table;
?>