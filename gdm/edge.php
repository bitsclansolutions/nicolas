<?php
header('Content-Type: image/png');
include('GDMagic.php');

	$img = imagecreatefrompng('http://www.php.net/images/logos/php-med-trans.png');

		$gdmagic = new GDMagic($img);
		$gdmagic->edge();

imagepng($img);
imagedestroy($img);
?>