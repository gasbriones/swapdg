<?php
$bd_host = "localhost";
$bd_user = "root";
$bd_password = "root";
$bd_base = "swapdg_content";

$con = @mysql_connect($bd_host, $bd_user, $bd_password);
@mysql_select_db($bd_base, $con);

function getSection($sectionid) {
	switch($sectionid) {
		default: return "portfolio"; break;
		case 2: return "latest"; break;
		case 3: return "news"; break;
		case 4: return "comments"; break;
	}
}
?>