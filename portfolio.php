<?php
require("config.php");
$sql = "SELECT * FROM portfolio ORDER BY norder ASC";
if ($rs = @mysql_query($sql, $con)) {
    if (@mysql_num_rows($rs) > 0) {

        $imgcounter = 0;
        while ($item = mysql_fetch_array($rs)) {
            $imgcounter = $imgcounter + 1;
            $gallery = $item['gallery'];
            $images = $item['images'];
            $brief = htmlentities($item['brief']);
            $content .= "<li class='" . $item['family'] . " item'><a href='javascript:void(0); showgallery(\"$gallery\",\"$images\");' onmouseover='removeshadow(" . $imgcounter . ");' onmouseout='showshadow(" . $imgcounter . ");'><img id='img" . $imgcounter . "bw' class='" . $item['family'] . "bw' src='portfolio/" . $item['thumb'] . "' width='240' height='160' /> <img id='img" . $imgcounter . "color' class='" . $item['family'] . "color' src='portfolio/" . $item['thumbcolor'] . "' style='display:none;' width='240' height='160' /></a> <p class='category'>" . $brief . "</p></li>";
        }
    } else {
        $content = "<li>There are no galleries published in our portfolio.</li>";
    }
}
?>
<p class="tip">Click on an image to enlarge</p>
<ul id="portfolio-iso" class="portfolio clearfix">
    <?php echo $content; ?>
</ul>