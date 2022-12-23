<?php
include('admin/connect.php');

$category_id = $_POST['category'];
$response = "";

$sql = <<<SQL
    SELECT sc.id, sc.name
    FROM sub_category sc 
    WHERE category_id = $category_id;
SQL;

$result = $conn->query($sql);
if($result){
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $id   = $row['id'];
            $name = $row['name'];
            $title = ucwords(str_replace("_", " ", $row['name']));
            $response .= <<<OUTPUT
                <div class="motif-lable-box">
                    <input class="form-check-input motif-label-radio" type="radio" name="motif" id="motif1">
                    <label style="cursor: pointer;" class="motif-lable-text sub-nav-link" data-cat="$category_id" data-subcat="$id" title="$name" id="$name" for="motif1">
                        <p>$title</p>
                    </label>
                </div>
OUTPUT;
        }
    } else {
        $response = ["error" => "No Subcategory Found"];
    }
} else {
    $response = ["error" => "Error in query => ".$sql.""];
}

echo json_encode($response);
?>