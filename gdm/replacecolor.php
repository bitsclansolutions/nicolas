<?php
header('Content-Type: image/png');
include('GDMagic.php');

	$img = imagecreatefrompng('http://www.php.net/images/logos/php-med-trans.png');

		$gdmagic = new GDMagic($img);
		$gdmagic->replacecolor(array(0,0,0),array(255,0,0));

imagepng($img);
imagedestroy($img);
?>