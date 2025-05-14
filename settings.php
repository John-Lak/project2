<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "project_db"; // Replace with your actual DB name

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>