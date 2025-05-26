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
    die("Connection failed: " . $conn->connect_error); // Stop script on error
}

// SQL query to fetch all jobs from the "jobs" table
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql); // Run the query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Dynamic Job Listings"> <!-- SEO description -->
    <meta name="keywords" content="Jobs, Careers, Openings"> <!-- SEO keywords -->
    <meta name="author" content="JLNV Solutions"> <!-- Author info -->
    <title>Job Listings</title>
    <link rel="stylesheet" href="styles/styles.css"> <!-- External CSS file -->
</head>
<body>

<h1>Available Job Positions</h1>

<main class="job-container">
<?php
// If there are jobs found, display them
if ($result && $result->num_rows > 0) {
    while ($job = $result->fetch_assoc()) { // Loop through each job
        echo "<section class='job-box'>";
        echo "<h2>{$job['job_ref']} - {$job['title']}</h2>"; // Show job reference and title
        echo "<p><strong>Description:</strong> {$job['full_description']}</p>"; // Full job description
        echo "<p><strong>Salary range:</strong> {$job['salary_range']}</p>"; // Salary info
        echo "<p><strong>Reports to:</strong> {$job['reports_to']}</p>"; // Supervisor info

        // Responsibilities: Split comma-separated values into list items
        $responsibilities = array_filter(array_map('trim', explode(',', $job['responsibilities'])));
        echo "<h3>Key Responsibilities</h3><ul class='jobs-bullets'>";
        foreach ($responsibilities as $item) {
            echo "<li>$item</li>";
        }
        echo "</ul>";

        // Qualifications: Also split into list items
        $qualifications = array_filter(array_map('trim', explode(',', $job['qualifications'])));
        echo "<h3>Required Qualifications</h3><ul class='jobs-bullets'>";
        foreach ($qualifications as $item) {
            echo "<li>$item</li>";
        }
        echo "</ul>";

        echo "</section>"; // End of job section
    }
} else {
    echo "<p>No job listings available at this time.</p>"; // If no jobs found
}
?>
</main>

<!-- Footer -->
<?php include 'footer.inc'; ?> <!-- Include the footer -->

</body>
</html>

<?php
$conn->close(); // Close the database connection at the end
?>