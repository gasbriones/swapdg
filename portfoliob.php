<?php
require("config.php");

$sql = "SELECT * FROM portfolio ORDER BY norder ASC";
if ($rs=@mysql_query($sql,$con)) {
  if (@mysql_num_rows($rs)>0) {
    $count = 1;
    $content = "";
		$imgcounter = 0;
    while ($item = mysql_fetch_array($rs)) {
			$imgcounter = $imgcounter + 1;
      if ($count == 1) {
        $content .= "<tr>";
      }
      $gallery = $item['gallery'];
      $images = $item['images'];
      $brief = htmlentities($item['brief']);
      $content .= "<td><a href='javascript:void(0); showgallery(\"$gallery\",\"$images\");' onmouseover='removeshadow(".$imgcounter.");' onmouseout='showshadow(".$imgcounter.");'><img id='img".$imgcounter."bw' class='".$item['family']."bw' src='portfolio/" . $item['thumb'] . "' width='240' height='160' /> <img id='img".$imgcounter."color' class='".$item['family']."color' src='portfolio/" . $item['thumbcolor'] . "' style='display:none;' width='240' height='160' /></a> <p class='category'>".$brief."</p></td>";
      if ($count == 3) {
        $content .= "</tr>";
        $count = 1;
      } else {
        $count++;
      }
    }
    if ($count == 2) {
      $content .= "<td></td><td></td></tr>";
    } else if ($count == 3) {
      $content .= "<td></td></tr>";
    }
  } else {
    $content = "<tr><td>There are no galleries published in our portfolio.</td></tr>";
  }
}
?>
<p class="tip">Click on an image to enlarge</p>
<table class="portfolio clearfix">
<thead></thead>
<tfoot id="tfoot"></tfoot>
<tbody>
<? echo $content; ?>
</tbody>
</table>