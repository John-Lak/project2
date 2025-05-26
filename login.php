<?php 
    session_start(); // Start session to manage login messages
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Character encoding -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive design -->
    <meta name="description" content="Login page example"> <!-- SEO description -->
    <meta name="keywords" content="login form, CSS, responsive design"> <!-- SEO keywords -->
    <meta name="author" content="JL, NV"> <!-- Author info -->
    <title>JLNV Management System</title>
    <link href="styles/styles.css" rel="stylesheet"> <!-- External stylesheet -->
</head>
<body>
    <?php 
        include 'header.inc'; // Include header HTML
        include 'nav.inc';    // Include navigation menu
    ?>
    
    <section id="login-main">
        <h1>Login</h1>

        <?php
            // Display error message from session if exists
            if (isset($_SESSION['error'])) {
                echo '<div class="error">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']); // Clear error after displaying
            }

            // Display success message from session if exists
            if (isset($_SESSION['success'])) {
                echo '<div class="success">' . $_SESSION['success'] . '</div>';
                unset($_SESSION['success']); // Clear success after displaying
            }
        ?>

        <!-- Login form -->
        <form action="process_login.php" method="POST">
            <label for="username">Username:</label>
            <input 
                type="text" 
                id="username" 
                name="username" 
                autocomplete="username"
                required
            >
            <label for="password">Password:</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                autocomplete="current-password"
                required
            >

            <input type="submit" value="Login">
        </form>

        <!-- Optional link to manager panel -->

        
        <div>
        <h1 class="menu"><a href="manage.php">Manager</a></h1>
       
    </section>


    <?php 
        include 'footer.inc'; // Include footer HTML
    ?>
</body>
</html>
