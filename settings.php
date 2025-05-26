<?php
// Define database connection variables
$host = "localhost";           // Database host (usually 'localhost' for local servers)
$username = "root";            // MySQL username (default is 'root' in XAMPP/WAMP)
$password = "";                // MySQL password (empty by default in XAMPP)
$database = "project_db";      // Name of the database to connect to

// Attempt to connect to the MySQL database
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    // If the connection failed, display an error and stop the script
    die("Connection failed: " . mysqli_connect_error());
}
?>
