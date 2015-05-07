<?php
$output =<<< EOT
<div id="popup">
  <div><img src="media/popup-close.png" class="close" alt="Close" title="Close" onclick="closepopup()" /></div>
  <img id="file" src="/media/pix.png" />
  <div class="footer">
    <p class="description"><span id="type" class="type">$item['group']</span> $item['text']</p>
EOT;
echo $output;
if (sizeof($images) > 1) {
  echo("<ul class='gallery'>");
  $i = 0;
  while ( $image = $images[$i] ) {
    echo ("<li><span onclick='javascript:swapgalleryimg('$image')';>". ($i.1) ."</span></li>";
    $i.=1;
  }
  echo("</ul>");
}
$output =<<< EOT
  </div>
</div>
EOT;
echo $output;
?>