<?php
$sql = "SELECT gallery,family,inlatestworks,brief FROM portfolio ORDER BY family ASC, norder ASC, gallery DESC";
$table = "<table class=\"list\"><tr><td><strong>Portfolio</strong> | <a href=\"?section=1&action=2\" title=\"Agregar nueva galer&iacute;a\">Agregar nuevo</a>";
if ($rs = mysql_query($sql,$con)) {
	if (@mysql_num_rows($rs)>0) {
		$currentgroup = "";
		while ($item = mysql_fetch_array($rs)) {
			if ($currentgroup != $item['family']) {
				$table .= "<tr><td class=\"group\">Tipo de trabajo: <strong>".$item['family']."</strong></td></tr>";
			}
			($item['inlatestworks']==1)?$star="<img src=\"images/star.png\" width=\"16\" height=\"16\" alt=\"Mostrar en Latest Works\" title=\"Mostrar en Latest Works\" />":$star="<img src=\"images/pix.png\" width=\"16\" height=\"16\" />";
			$table .= "<tr><td><a href=\"?section=1&action=2&gallery=".$item['gallery']."\" title=\"Modificar esta galer&iacute;a\"><img src=\"images/b_edit.png\" width=\"16\" height=\"16\" alt=\"Modificar esta galer&iacute;a\" title=\"Modificar esta galer&iacute;a\" /></a> <a href=\"javascript:void(0);\" onclick=\"javascript:deleteitem(1,".$item['gallery'].");\" title=\"Eliminar\"><img src=\"images/b_drop.png\" width=\"16\" height=\"16\" alt=\"Eliminar\" title=\"Eliminar\" /></a> ".$star.$item['brief']."</td></tr>";
			$currentgroup = $item['family'];
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