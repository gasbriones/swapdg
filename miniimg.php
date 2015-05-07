<?php
$thumb = $_GET['thumb'];
header("Content-type: image/jpg");
$src = imagecreatefromjpeg("portfolio/".$thumb);
list($width,$height)=getimagesize("portfolio/".$thumb);
if ($width > $height) {
	$newwidth=($width * 88) / $height;
	$newheight=88;
} else {
	$newwidth=88;
	$newheight=($height * 88) / $width;
}
$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagedestroy($src);
$dest = imagecreatetruecolor(88,88);
$startx = ($newwidth - 88) / 2;
$starty = ($newheight - 88) / 2;
imagecopy($dest, $tmp, 0, 0, $startx, $starty, 88, 88);
imagedestroy($tmp);
imagejpeg($dest);
imagedestroy($dest);
?>