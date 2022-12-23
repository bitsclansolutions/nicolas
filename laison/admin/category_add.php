<?php
include('helpers.php');
include('connect.php');
$category_name = $_POST['category_name'];
$response = "";

$sql = "SELECT * from categories where `nom` = '$category_name'";

$result = $conn->query($sql);
if ($result->num_rows == 0){
    $sql = "INSERT INTO `categories` (`id`, `nom`, `format_parent`, `ordre`) VALUES (NULL, '$category_name', NULL, NULL)";
    $result = $conn->query($sql);
    if($result) {
        if(mkdir("../data/".$category_name,0777)){
            $response = ["success" => "Category Added Successfully"];
        } else {
            $response = ["error" => "Folder not created Successfully"];
        }
    } else {
        $response = ["error" => "Category Not Added Successfully"];
    }
} else {
    $response = ["error" => "Category Name Is already taken Choose Different"];
}

echo json_encode($response);
?>