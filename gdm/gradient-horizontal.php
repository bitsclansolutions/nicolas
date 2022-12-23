<?php
header('Content-Type: image/png');
include('GDMagic.php');

	$img = imagecreatetruecolor(500,100);

		$gdmagic = new GDMagic($img);
		$gdmagic->gradient(array(255,0,0),array(255,255,0));

imagepng($img);
imagedestroy($img);
?>