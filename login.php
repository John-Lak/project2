<?php
require 'settings.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check for lockout
    $check_attempts = $conn->prepare("SELECT COUNT(*) FROM login_attempts WHERE username = ? AND attempt_time > NOW() - INTERVAL 15 MINUTE");
    $check_attempts->bind_param("s", $username);
    $check_attempts->execute();
    $check_attempts->bind_result($attempts);
    $check_attempts->fetch();
    $check_attempts->close();

    if ($attempts >= 3) {
        echo "Too many login attempts. Try again later.";
        exit;
    }

    $stmt = $conn->prepare("SELECT password_hash FROM managers WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($password_hash);
    
    if ($stmt->fetch() && password_verify($password, $password_hash)) {
        $_SESSION['username'] = $username;
        header("Location: manage.php");
        exit;
    } else {
        $log_attempt = $conn->prepare("INSERT INTO login_attempts (username, attempt_time) VALUES (?, NOW())");
        $log_attempt->bind_param("s", $username);
        $log_attempt->execute();
        echo "Invalid login.";
    }
}
?>

<form method="post">
    Username: <input name="username"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>
