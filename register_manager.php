<?php
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "project_db";  // Make sure this matches your actual database

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = 'admin';               // Change as needed
$password = 'adminsforthewin25';           // Change as needed

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO managers (username, password_hash) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    echo "Manager registered successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>