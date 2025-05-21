<?php include 'header.inc'; ?>
<?php include 'nav.inc'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Jobs page for the company">
  <meta name="keywords" content="Jobs, job description, pay">
  <meta name="author" content="John Lakshmalla, Nam Vo">
  <title>Jobs Page</title>
  <link href="styles/styles.css" rel="stylesheet">
</head>

<?php
// Database connection details
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "project_db"; // 🔁 Replace with your actual DB name

// Establish connection
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch all jobs
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);
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
if ($result && $result->num_rows > 0) {
    while ($job = $result->fetch_assoc()) {
        echo "<section class='job-box'>";
        echo "<h2>{$job['job_ref']} - {$job['title']}</h2>";
        echo "<p><strong>Description:</strong> {$job['description']}</p>";
        echo "<p><strong>Salary range:</strong> {$job['salary_range']}</p>";
        echo "<p><strong>Reports to:</strong> {$job['reports_to']}</p>";

        // Responsibilities
        $responsibilities = array_filter(array_map('trim', explode(',', $job['responsibilities'])));
        echo "<h3>Key Responsibilities</h3><ul>";
        foreach ($responsibilities as $item) {
            echo "<li>$item</li>";
        }
        echo "</ul>";

        // Qualifications
        $qualifications = array_filter(array_map('trim', explode(',', $job['qualifications'])));
        echo "<h3>Required Qualifications</h3><ul>";
        foreach ($qualifications as $item) {
            echo "<li>$item</li>";
        }
        echo "</ul>";

        echo "</section>";
    }
} else {
    echo "<p>No job listings available at this time.</p>";
}
?>
</main>

  <!-- Footer -->
  <?php include 'footer.inc'; ?>

</body>
</html>

<?php
$conn->close();
?>