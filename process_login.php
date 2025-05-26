<?php
session_start(); 

// Database connection details
$host = "localhost";
$db_user = "root";
$db_pass = "";  // Update if your database has a password
$db_name = "users";  // Database name

// Create connection to MySQL database
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

// Check connection success
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get username and password from POST request safely
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Prepare SQL query using prepared statement for security
$sql = "SELECT * FROM managers WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);  // Bind parameters (string, string)
$stmt->execute();  // Execute query
$result = $stmt->get_result();  // Get results

// Check if exactly one matching user was found
if ($result && $result->num_rows === 1) {
    $_SESSION['success'] = "Login successful!";  // Set success message in session
    header("Location: login.php");  // Redirect back to login page or dashboard
    exit();
} else {
    $_SESSION['error'] = "Invalid username or password. Please try again.";  // Set error message
    header("Location: login.php");  // Redirect back to login page
    exit();
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
