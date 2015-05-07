<?php
session_name("SWAPcm");
session_start();
require("config.php");
$nsection = $_GET["section"];
if (empty($nsection)) {
	$nsection = 1;
}
if ($nsection == 1) {
	$meta = "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=latin1\" />";
} else {
	$meta = "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8 \" />";
}
$section = getSection($nsection);
$action = $_GET["action"];
if (empty($action)) {
	$action = 1;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="en" dir="ltr">
<head>
<?php echo $meta; ?>
<link rel="stylesheet" href="css/base.css" TYPE="text/css">
<link rel="stylesheet" href="css/styles.css" TYPE="text/css">
<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<title>Swap</title>
</head>
<body>
<div id="hd">
<h3>Administrador de Contenidos Swap</h3>
</div>
<ul id="mainmenu">
	<li><a href="?section=1">Portfolio</a></li>
	<li><a href="?section=3">News</a></li>
	<li><a href="?section=4">Comments</a></li>
</ul>
<div id="bd">
<?php if (isset($_SESSION['mc'])) { echo "<p>".$_SESSION['mc']."</p>"; unset($_SESSION["mc"]); } ?>
<?php include ($section . $action . ".php"); ?>
</div>
</body>
</html>