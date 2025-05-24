<?php
require 'settings.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (!preg_match('/^(?=.*[A-Z])(?=.*\d).{6,}$/', $password)) {
        echo "Password must be at least 6 characters, include one uppercase letter and one number.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM managers WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "Username already exists.";
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $insert = $conn->prepare("INSERT INTO managers (username, password_hash) VALUES (?, ?)");
            $insert->bind_param("ss", $username, $password_hash);
            $insert->execute();
            echo "Manager registered successfully.";
        }
    }
}
?>

<form method="post">
    Username: <input name="username"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Register</button>
</form>
