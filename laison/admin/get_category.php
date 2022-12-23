<?php
include('connect.php');

$sql = "SELECT * FROM categories where 1";

$result = $conn->query($sql);
$response="<option value=''>Select</option>";
if ($result->num_rows > 0) {
    for($i=0; $i<$result->num_rows;$i++)
    {
        $data = $result->fetch_assoc();
        $id = $data['id'];
        $name = $data['nom'];
        $response .= "<option value='".$data['id']."'>".$data['nom']."</option>";
    }
} else {
    $response = json_encode(["error" => "No Category Found"]);
}
echo json_encode($response);
?>