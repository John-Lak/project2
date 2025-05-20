<!DOCTYPE html>
<html>
<head>
    <title>Enhancements Documentation</title>
</head>
<body>
<h1>Enhancements Documentation</h1>

<h2>1. Sort EOIs by Selected Field</h2>
<p>
Implemented functionality that allows the manager to select the field (e.g., Name, Date, Status) on which to sort the Expression of Interest (EOI) records.
This is done by adding a dropdown menu on the EOI listing page and updating the SQL query to ORDER BY the selected field dynamically.
This improves usability by allowing managers to view EOIs in their preferred order.
</p>

<h2>2. Manager Registration Page with Validation</h2>
<p>
Created a registration page for managers that includes server-side validation:
<ul>
<li>Ensures the username is unique by checking against existing usernames in the database.</li>
<li>Enforces password rules: minimum 8 characters, at least one uppercase letter, one number, and one special character.</li>
<li>Passwords are hashed before storing in the database for security.</li>
</ul>
This allows secure creation of manager accounts for site access control.
</p>

<h2>3. Access Control for manage.php</h2>
<p>
Implemented login authentication by verifying username and password before granting access to the manage.php page.
If the user is not authenticated, they are redirected to the login page.
Sessions are used to track logged-in status securely.
This restricts sensitive management functions to authorized personnel only.
</p>


</body>
</html>
