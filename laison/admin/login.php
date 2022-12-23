<?php
include('connect.php');
$user_name =  $_POST['username'];
$password =  $_POST['password'];

$sql = "SELECT uUsername , uPassword FROM users where uUsername='$user_name'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $dbPassword = $data['uPassword'];
    if($dbPassword == $password){
        session_start();
        $_SESSION['user'] = "UserLoggedIn";
        $response = json_encode(["success" => "Login Successfully"]);
    } else{
        $response = json_encode(["error" => "Credentials are not correct"]);
    }
} else {
    $response = json_encode(["error" => "User Not present"]);
}
echo $response;
?>