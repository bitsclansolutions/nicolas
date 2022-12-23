<?php
session_start();

$str1 = $_SESSION['inner_image'];
$data1 = explode("/",$str1);
$name_ext1 = end($data1);
$inner_name = explode(".", $name_ext1)[0];

$str2 = $_SESSION['border_image'];
$data2 = explode("/",$str2);
$name_ext2 = end($data2);
$border_name = explode(".", $name_ext2)[0];

echo json_encode([
    'inner_image' => $_SESSION['inner_image'],
    'border_image' => $_SESSION['border_image'],
    'default_image' => 'border.png',
    'inner_name' => $inner_name,
    'border_name' => $border_name,
]);