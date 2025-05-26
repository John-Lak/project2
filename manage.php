<?php
require_once("settings.php"); // Load DB connection settings

// Connect to MySQL database
$conn = @mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("<p>Connection failed: " . mysqli_connect_error() . "</p>"); // Stop if connection fails
}

// Function to display query results as an HTML table
function printResults($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='5'><tr>";
        // Print table headers
        while ($fieldinfo = mysqli_fetch_field($result)) {
            echo "<th>{$fieldinfo->name}</th>";
        }
        echo "</tr>";
        // Print each row of data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $val) {
                echo "<td>" . htmlspecialchars($val) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No results found.</p>"; // If no rows returned
    }
}

// Handle form submissions when the page posts data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"]; // Determine which form was submitted

    if ($action === "list_all") {
        // List all EOIs in the database
        $query = "SELECT * FROM eoi";
        $result = mysqli_query($conn, $query);
        echo "<h2>All EOIs</h2>";
        printResults($result);
    }

    elseif ($action === "search_jobref") {
        // Search EOIs by Job Reference
        $jobref = mysqli_real_escape_string($conn, $_POST["jobref"]);
        $query = "SELECT * FROM eoi WHERE JobRef='$jobref'";
        $result = mysqli_query($conn, $query);
        echo "<h2>EOIs for Job Reference: $jobref</h2>";
        printResults($result);
    }

    elseif ($action === "search_name") {
        // Search EOIs by applicant first and/or last name
        $firstname = mysqli_real_escape_string($conn, trim($_POST["firstname"]));
        $lastname = mysqli_real_escape_string($conn, trim($_POST["lastname"]));
        $conditions = [];
        if ($firstname) $conditions[] = "FirstName LIKE '%$firstname%'";
        if ($lastname)  $conditions[] = "LastName LIKE '%$lastname%'";
        
        if (!empty($conditions)) {
            $query = "SELECT * FROM eoi WHERE " . implode(" AND ", $conditions);
            $result = mysqli_query($conn, $query);
            echo "<h2>Search Results</h2>";
            printResults($result);
        } else {
            echo "<p>Please enter a first name, last name, or both.</p>";
        }
    }

    elseif ($action === "delete_jobref") {
        // Delete EOIs by Job Reference number
        $jobref = mysqli_real_escape_string($conn, $_POST["jobref_del"]);
        $query = "DELETE FROM eoi WHERE JobRef='$jobref'";
        if (mysqli_query($conn, $query)) {
            echo "<p>All EOIs with Job Reference <strong>$jobref</strong> deleted.</p>";
        } else {
            echo "<p>Error deleting EOIs: " . mysqli_error($conn) . "</p>";
        }
    }

    elseif ($action === "update_status") {
        // Update the Status field for a specific EOI by ID
        $eoi_id = intval($_POST["eoi_id"]);
        $status = mysqli_real_escape_string($conn, $_POST["status"]);
        $query = "UPDATE eoi SET Status='$status' WHERE EOInumber=$eoi_id";
        if (mysqli_query($conn, $query)) {
            echo "<p>Status updated for EOI #$eoi_id to <strong>$status</strong>.</p>";
        } else {
            echo "<p>Error updating status: " . mysqli_error($conn) . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>EOI Management Panel</title>
    <link rel="stylesheet" href="styles/eoi_management.css"> <!-- External CSS -->
</head>
<body>

<nav>
    <!-- Navigation links -->
    <a href="index.php">Home</a>
    <a href="manage.php">Manager Panel</a>
    <a href="logout.php">Logout</a>
</nav>

<h1>EOI Management Panel</h1>

<!-- Form to list all EOIs -->
<form method="post">
    <input type="hidden" name="action" value="list_all">
    <input type="submit" value="List All EOIs">
</form>

<!-- Form to search EOIs by Job Reference -->
<form method="post">
    <h3>Search EOIs by Job Reference</h3>
    <input type="hidden" name="action" value="search_jobref">
    Job Ref: <input type="text" name="jobref" required>
    <input type="submit" value="Search">
</form>

<!-- Form to search EOIs by applicant name -->
<form method="post">
    <h3>Search EOIs by Applicant Name</h3>
    <input type="hidden" name="action" value="search_name">
    First Name: <input type="text" name="firstname">
    Last Name: <input type="text" name="lastname">
    <input type="submit" value="Search">
</form>

<!-- Form to delete EOIs by Job Reference -->
<form method="post" onsubmit="return confirm('Are you sure you want to delete all EOIs with this job reference?');">
    <h3>Delete EOIs by Job Reference</h3>
    <input type="hidden" name="action" value="delete_jobref">
    Job Ref: <input type="text" name="jobref_del" required>
    <input type="submit" value="Delete">
</form>

<!-- Form to update EOI status -->
<form method="post">
    <h3>Update EOI Status</h3>
    <input type="hidden" name="action" value="update_status">
    EOI Number: <input type="number" name="eoi_id" required>
    Status:
    <select name="status">
        <option value="New">New</option>
        <option value="Current">Current</option>
        <option value="Final">Final</option>
    </select>
    <input type="submit" value="Update Status">
</form>

</body>
</html>