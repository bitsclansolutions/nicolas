<?php
const BASE= "/home/cimenterie2/www/simulateur/laison/";
$srcImagePath=BASE.$_GET['img'];
$name=$_GET['name'];

$tile = imagecreatefrompng($srcImagePath);
$tile = imagerotate($tile, 90, 0);

header ("Content-type: image/png");
imagepng($tile,"tmp/".$name.".png");
imagedestroy($tile);
