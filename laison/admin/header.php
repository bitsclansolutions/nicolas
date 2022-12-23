<?php
session_start(); 
if(!isset($_SESSION['user'])) {
    header("location:index.php");
}
include('helpers.php'); 
?>
<!DOCTYPE html>
<html>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css"/>
    <style>
        ul.breadcrumb {
            padding: 10px 16px;
            list-style: none;
            background-color: #eee;
        }
        ul.breadcrumb li {
            display: inline;
            font-size: 18px;
        }
        ul.breadcrumb li+li:before {
            padding: 8px;
            color: black;
            content: "/\00a0";
        }
        ul.breadcrumb li a {
            color: #0275d8;
            text-decoration: none;
        }
        ul.breadcrumb li a:hover {
            color: #01447e;
            text-decoration: underline;
        }
    </style>
    <body>
        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
            <a href="dashboard.php" class="w3-bar-item w3-button">Dashboard</a>
            <a href="images.php" class="w3-bar-item w3-button">Tiles</a>
            <a href="category.php" class="w3-bar-item w3-button">Category</a>
            <a href="sub_category.php" class="w3-bar-item w3-button">Sub Category</a>
            <a href="#" class="w3-bar-item w3-button" onclick="Logout();">Log out</a>
        </div>

