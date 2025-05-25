<?php
require_once("settings.php");
$conn = mysqli_connect($host, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if (!preg_match("/^[a-zA-Z0-9_]{5,20}$/", $username)) {
        echo "Username must be 5–20 characters (letters, numbers, underscores).";
        exit;
    }

    if (strlen($password) < 8 || !preg_match("/\d/", $password)) {
        echo "Password must be at least 8 characters and contain a number.";
        exit;
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO managers (username, password_hash) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password_hash);

    if ($stmt->execute()) {
        echo "Manager registered successfully.";
    } else {
        echo "Username already taken.";
    }

    $stmt->close();
}
?>

<form method="post">
    <h2>Register Manager</h2>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>