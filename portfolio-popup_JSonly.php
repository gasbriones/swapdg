<?php
require("config.php");
$gallery = $_GET['gallery'];

$sql = "SELECT * FROM portfolio WHERE gallery=$gallery LIMIT 1";
if ($rs=@mysql_query($sql,$con)) {
  if (@mysql_num_rows($rs)==1) {
    $item = mysql_fetch_array($rs);
    $group = $item['family'];
    $text = utf8_encode($item['text']);
    $text = ereg_replace("http://([.]?[a-zA-Z0-9_/-])*", "<a target=\"_blank\" href=\"\\0\">\\0</a>", $text);
    $images = explode(",",$item['images']);
    $output =<<< EOT
<a href="javascript:void(0); closepopup()" class="close"><img src="media/popup-close.png" alt="Close" title="Close" /></a>
<img id="file" style="visibility:hidden" />
<div id="footer" class="footer" style="display:none;">
  <p class="description"><span id="type" class="type">$group</span> $text</p>
EOT;
  echo $output;
  if (sizeof($images) > 1) {
    echo("<ul class='gallery'>");
    $i = 0;
    while ( $image = $images[$i] ) {
      echo ("<li><a href='javascript:void(0); swapgalleryimg(\"$image\");'>". ($i+1) ."</a></li>");
      $i++;
    }
    echo("</ul>");
  }
  echo("</div>");
  }
}
?>