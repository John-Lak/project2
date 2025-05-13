<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "project_db"; // Replace with your actual DB name

$conn = mysqli_connect('localhost', 'root', '', 'project_db');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>