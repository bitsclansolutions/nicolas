<?php
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array('r'=>$r,'g'=> $g,'b'=> $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}
$t=$_GET['color'];
$rpc=hex2rgb($t);
$im = imagecreatetruecolor(230, 230);

// sets background to red
$cl = imagecolorallocate($im, $rpc['r'],$rpc['g'],$rpc['b']);
imagefill($im, 0, 0, $cl);

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);

