<?php include 'header.inc'; ?> <!-- Include the header -->
<?php include 'nav.inc'; ?>    <!-- Include the navigation menu -->

<?php
// Database connection details
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "project_db";

// Establish connection to MySQL database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all jobs from the "jobs" table
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);

// Handle query failure
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Dynamic Job Listings">
    <meta name="keywords" content="Jobs, Careers, Openings">
    <meta name="author" content="JLNV Solutions">
    <title>Job Listings</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<h1>Available Job Positions</h1>

<main class="job-container">
<?php
if ($result->num_rows > 0) {
    while ($job = $result->fetch_assoc()) {
        echo "<section class='job-box'>";
        echo "<h2>" . htmlspecialchars($job['job_ref']) . " - " . htmlspecialchars($job['title']) . "</h2>";
        echo "<p><strong>Description:</strong> " . htmlspecialchars($job['full_description']) . "</p>";
        echo "<p><strong>Salary range:</strong> " . htmlspecialchars($job['salary_range']) . "</p>";
        echo "<p><strong>Reports to:</strong> " . htmlspecialchars($job['reports_to']) . "</p>";

        // Responsibilities
        $responsibilities = array_filter(array_map('trim', explode(',', $job['responsibilities'])));
        echo "<h3>Key Responsibilities</h3><ul class='jobs-bullets'>";
        foreach ($responsibilities as $item) {
            echo "<li>" . htmlspecialchars($item) . "</li>";
        }
        echo "</ul>";

        // Qualifications
        $qualifications = array_filter(array_map('trim', explode(',', $job['qualifications'])));
        echo "<h3>Required Qualifications</h3><ul class='jobs-bullets'>";
        foreach ($qualifications as $item) {
            echo "<li>" . htmlspecialchars($item) . "</li>";
        }
        echo "</ul>";

        echo "</section>";
    }
} else {
    echo "<p>No job listings available at this time.</p>";
}
?>
</main>

<?php include 'footer.inc'; ?> <!-- Include the footer -->

</body>
</html>

<?php
$conn->close(); // Close the database connection
?>