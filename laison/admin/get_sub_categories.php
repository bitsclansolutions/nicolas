<?php
include('connect.php');
$category_id =  $_POST['menu'];

$sql = "SELECT * FROM sub_category where category_id='$category_id'";

$result = $conn->query($sql);
$response="<option value=''>Select</option>";
$response .= "<option value='' onclick='add_sub_category();'>Add Sub Category</option>";
if ($result->num_rows > 0) {
    for($i=0; $i<$result->num_rows;$i++)
    {
        $data = $result->fetch_assoc();
        $id = $data['id'];
        $name = $data['name'];
        $response .= "<option value='".$data['id']."'>".$data['name']."</option>";
    }
} else {
    $response = ["error" => "No Sub Category Find"];
}
echo json_encode($response);
?>