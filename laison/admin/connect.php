<?php
$servername = "localhost";
$username = "bitsclan_nicolas";
$password = "@@Bitsclan123@@";
$dbname = "bitsclan_nicolas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>