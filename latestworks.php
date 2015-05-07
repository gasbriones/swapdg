<?php
require("config.php");
$sql = "SELECT gallery,thumbcolor,images FROM portfolio WHERE inlatestworks=1 ORDER BY gallery DESC LIMIT 3";
if ($rs=@mysql_query($sql,$con)) {
	if (@mysql_num_rows($rs)>0) {
	echo "<ul>";
		$imgcounter = 0;
		while($item = @mysql_fetch_array($rs)) {
			$imgcounter++;
			echo "<li><a href='javascript:void(0); showgallery(\"".$item['gallery']."\",\"".$item['images']."\")'; onmouseover='removeshadowlw($imgcounter);' onmouseout='showshadowlw($imgcounter);'><img id='home".$imgcounter."' src=\"miniimg.php?thumb=".$item['thumbcolor']."\" /></a></li>";
		}
	}
	echo "</ul>";
}
?>