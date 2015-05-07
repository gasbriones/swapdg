<?php
require("config.php");
$page = $_GET["page"];
if (empty($page)) {
  $page = 1;
}
$records = ($page-1) * 15;
$sql = "SELECT * FROM portfolio LIMIT $records,16";

if ($page > 1) {
  $showprev = "<a href=\"javascript:void(0); loadportfolio(".($page - 1).");\">Previous</a>";
} else {
  $showprev = "<span class='disabled'>Previous</span>";
}
if ($rs=@mysql_query($sql,$con)) {
  if (@mysql_num_rows($rs)>0) {
    if (@mysql_num_rows($rs) == 16) {
      $shownext = "<a href=\"javascript:void(0); loadportfolio(".($page + 1).");\">Next</a>";
    } else {
      $shownext = "<span class='disabled'>Next</span>";
    }
    $count = 1;
    $content = "";
    $imgcounter = 0;
    $content .= "<tr><td colspan=\"3\" class=\"pager\" align=\"center\">$showprev | $shownext</td></tr>";
    while ( ($item = mysql_fetch_array($rs)) && ($imgcounter < 15) ){
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
<table class="portfolio">
<thead></thead>
<tfoot></tfoot>
<tbody>
<?php echo $content; ?>
</tbody>
</table>