<?php
session_start(); // Start or resume the session to store messages and login state

// Database configuration
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "project_db";  // Change this if your actual database name is different

// Create a new database connection using MySQL
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

// Check for database connection errors
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Retrieve submitted username and password from POST request
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Prepare a SQL query to select the user with the given username
$sql = "SELECT * FROM managers WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username); // Bind the username parameter to the SQL query
$stmt->execute(); // Execute the prepared statement
$result = $stmt->get_result(); // Get the result set from the executed query

// Check if exactly one user was found with that username
if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc(); // Fetch user data as an associative array

    // Verify the entered password against the hashed password stored in the database
    if (password_verify($password, $user['password_hash'])) {
        $_SESSION['success'] = "Login successful!"; // Set success message
        header("Location: manage.php"); // Redirect to management page
        exit(); // Stop further script execution
    } else {
        // Password does not match
        $_SESSION['error'] = "Invalid username or password.";
        header("Location: login.php"); // Redirect back to login page
        exit();
    }
} else {
    // No user found with that username
    $_SESSION['error'] = "Invalid username or password.";
    header("Location: login.php"); // Redirect back to login page
    exit();
}

// Clean up
$stmt->close(); // Close the prepared statement
$conn->close(); // Close the database connection
?>