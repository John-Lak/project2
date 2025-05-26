<?php 
    session_start(); // Start a new session or resume the existing one to manage login messages (e.g., error/success)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Set character encoding to UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Enable responsive design on mobile devices -->
    <meta name="description" content="Login page example"> <!-- Brief description for search engines -->
    <meta name="keywords" content="login form, CSS, responsive design"> <!-- Relevant keywords for SEO -->
    <meta name="author" content="JL, NV"> <!-- Page author(s) -->
    <title>JLNV Management System</title> <!-- Page title shown in browser tab -->
    <link href="styles/styles.css" rel="stylesheet"> <!-- Link to external CSS stylesheet -->
</head>
<body>
    <?php 
        include 'header.inc'; // Include common header section (e.g., logo, branding)
        include 'nav.inc';    // Include navigation menu bar
    ?>
    
    <section id="login-main" class="login-box"> <!-- Main section for login form -->
        <h1>Login</h1>

        <?php
            // Check if an error message exists in session and display it
            if (isset($_SESSION['error'])) {
                echo '<div class="error">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']); // Clear error message after displaying
            }

            // Check if a success message exists in session and display it
            if (isset($_SESSION['success'])) {
                echo '<div class="success">' . $_SESSION['success'] . '</div>';
                unset($_SESSION['success']); // Clear success message after displaying
            }
        ?>

        <!-- Login form sends user input to process_login.php via POST method -->
        <form action="process_login.php" method="POST">
            <!-- Username input -->
            <label for="username">Username:</label>
            <input 
                type="text" 
                id="username" 
                name="username" 
                autocomplete="username"  
                required                 
            >

            <!-- Password input -->
            <label for="password">Password:</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                autocomplete="current-password" 
                required                        
            >

            <!-- Submit button -->
            <input type="submit" value="Login">
        </form>
    </section>

    <?php 
        include 'footer.inc'; // Include common footer section (e.g., copyright)
    ?>
</body>
</html>
