<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "docwebox";
$conn = new mysqli($server, $username, $password, $database);
if($conn->connect_error){
    die("Connection faied: ". $conn->connect_error);
}
?>