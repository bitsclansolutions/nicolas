<?php
session_start();
$response = "";
unset($_SESSION['user']);
$response = ["success","Logged out"];
echo json_encode($response);
?>