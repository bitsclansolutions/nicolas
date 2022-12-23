<?php
include('connect.php');
$category_id = $_POST['category_id'];
$sub_category_name = $_POST['sub_category_name'];

$response = "";

$sql = "SELECT * from sub_category where `name` = '$sub_category_name' AND category_id = '$category_id'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $sql = "SELECT * FROM categories WHERE id = '$category_id'";
    $result = $conn->query($sql);
    if ($result) {
        $data = $result->fetch_assoc();
        $category_name = $data['nom'];

        $sql = "INSERT INTO `sub_category` (`id`, `name`, `category_id`) VALUES (NULL, '$sub_category_name', '$category_id')";
        $result = $conn->query($sql);
        if ($result) {
            if (mkdir("../data/".$category_name."/".$sub_category_name)) {
                $response = ["success" => "Sub Category Name Added Successfully"];
            } else {
                $response = ["error" => "Sub Category Folder Name Not created"];
            }
        } else {
            $response = ["error" => "Sub Category Not Added Successfully"];
        }
    }
} else {
    $response = ["error" => "Sub category Name Is already taken against this category Choose Different"];
}

echo json_encode($response);
?>