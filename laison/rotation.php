<?php

function url($port = 80){
    return sprintf(
        "%s%s",
        get_protocol() . get_baseurl($port),
        get_path()
    );
}

function get_baseurl($port){
    return $_SERVER['SERVER_NAME'] == 'localhost' ? $_SERVER['SERVER_NAME'] . ":" . $port : $_SERVER['SERVER_NAME'];
}
function get_protocol(){
    if($_SERVER['SERVER_NAME'] != 'localhost'){
        return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';
    }
    return 'http://';
}
function get_path(){
    return $_SERVER['SERVER_NAME'] == 'localhost' ? '/nicolas/laison/' : '/laison/';
}


$base = url(8888);
$srcImagePath=$base.$_GET['img'];
// echo $srcImagePath;
// die();
$name=$_GET['name'];

$tile = imagecreatefrompng($srcImagePath);
$tile = imagerotate($tile, 90, 0);

header ("Content-type: image/png");
imagepng($tile,"tmp/".$name.".png");
//imagedestroy($tile);
