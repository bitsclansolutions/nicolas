<?php
include('admin/connect.php');

$img_id   = $_POST['img'];

$sql = <<<SQL
        SELECT name
        FROM images
        WHERE id = $img_id;
SQL;
$result   = $conn->query($sql);
$row      = mysqli_fetch_array($result);
$name     = $row['name'];

$img_name = explode('.', $name)[0];
$corner_tl = "data/corner/{$img_name}_tl.png";

echo json_encode($corner_tl);
?>