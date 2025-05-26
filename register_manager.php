<?php
// Load database connection settings
require_once("settings.php");

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get user input
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    // Basic validation for username
    if (!preg_match("/^[a-zA-Z0-9_]{5,20}$/", $username)) {
        echo "Username must be 5–20 characters (letters, numbers, underscores).";
        exit;
    }

    // Basic validation for password
    if (strlen($password) < 8 || !preg_match("/\d/", $password)) {
        echo "Password must be at least 8 characters and include a number.";
        exit;
    }

    // Encrypt the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert new manager into the database
    $stmt = $conn->prepare("INSERT INTO managers (username, password_hash) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password_hash);

    // Check if insert was successful
    if ($stmt->execute()) {
        echo "Manager registered successfully.";
    } else {
        echo "Username already taken.";
    }

    $stmt->close();
}
?>

<!-- Registration form -->
<form method="post">
    <h2>Register Manager</h2>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>
