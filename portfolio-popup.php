<?php
require("config.php");
$gallery = $_GET['gallery'];

$sql = "SELECT * FROM portfolio WHERE gallery=$gallery";
if ($rs=@mysql_query($sql,$con)) {
  if (@mysql_num_rows($rs)==1) {
    $item = mysql_fetch_array($rs);
    $group = $item['family'];
    $text = utf8_encode($item['text']);
    $text = ereg_replace("http://([.]?[a-zA-Z0-9_/-])*", "<a target=\"_blank\" href=\"\\0\">\\0</a>", $text);
    $images = explode(",",$item['images']);
  }
}
?>

<a href="javascript:void(0); closepopup();" class="close">x</a>
<ul class="bx-slider" style="width: auto; position: relative;">

<?php foreach ($images as $row): ?>

  <li><img id="file" src="portfolio/<?php echo $row ?>" /></li>

<?php endforeach?>
</ul>
<div id="popupfooter" class="footer">
    <p class="description"><span id="type" class="type"><?php echo $group ?></span><?php echo $text ?> </p>

<script type="text/javascript">
_gaq.push(['_trackEvent', 'Portfolio', 'Detalle del item <?php echo $item['brief']; ?>']);
(function($) {

   var slider=  $('.bx-slider').bxSlider({
        auto:true,
        minSlides: 3
    });


})(jQuery);
</script>