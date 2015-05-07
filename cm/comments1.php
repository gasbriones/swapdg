<?php
$sql = "SELECT * FROM comments ORDER BY adate DESC,id";
$table = "<table class=\"list\"><tr><td><strong>Comentarios</strong> | <a href=\"?section=4&action=2\" title=\"Agregar un nuevo comentario\">Agregar nuevo</a>";
if ($rs = mysql_query($sql,$con)) {
	if (@mysql_num_rows($rs)>0) {
		while ($item = mysql_fetch_array($rs)) {
			$table .= "<tr><td><a href=\"?section=4&action=2&id=".$item['id']."\" title=\"Modificar este comentario\"><img src=\"images/b_edit.png\" width=\"16\" height=\"16\" alt=\"Modificar este comentario\" title=\"Modificar este comentario\" /></a> <a href=\"javascript:void(0);\" onclick=\"javascript:deleteitem(4,".$item['id'].");\"><img src=\"images/b_drop.png\" width=\"16\" height=\"16\" alt=\"Eliminar\" title=\"Eliminar\" /></a> ".$item['adate']." - ".$item['atext']."</td></tr>";
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