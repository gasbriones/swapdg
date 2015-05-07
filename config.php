<?php
$bd_host = "localhost";
$bd_user = "root";
$bd_password = "root";
$bd_base = "swapdg_content";

$con = @mysql_connect($bd_host, $bd_user, $bd_password);
@mysql_select_db($bd_base, $con);

?>