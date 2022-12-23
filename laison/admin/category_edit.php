<?php
include('connect.php');
$id = $_POST['id'];
$sql = "SELECT * FROM categories where id='$id'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);
?>