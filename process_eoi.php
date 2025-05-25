<?php

require_once("settings.php");
$conn = @mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("<p>Database connection failure</p>");
}

if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['jobref'])) {
    header("Location: apply.php");
    exit();
}

function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$errors = [];

$jobref    = strtoupper(sanitize($_POST["jobref"] ?? ''));
$firstname = sanitize($_POST["firstname"] ?? '');
$lastname  = sanitize($_POST["lastname"] ?? '');
$dob       = sanitize($_POST["dob"] ?? '');
$gender    = sanitize($_POST["gender"] ?? '');
$address   = sanitize($_POST["address"] ?? '');
$suburb    = sanitize($_POST["suburb"] ?? '');
$state     = strtoupper(sanitize($_POST["state"] ?? ''));
$postcode  = sanitize($_POST["postcode"] ?? '');
$email     = sanitize($_POST["email"] ?? '');
$phone     = sanitize($_POST["phone"] ?? '');
$skills    = $_POST["skills"] ?? [];
$other_skills = sanitize($_POST["other_skills"] ?? '');

// Validation
if (!preg_match('/^[A-Z]{2}\d{3}$/', $jobref)) $errors[] = "Invalid job reference.";
if (!preg_match('/^[A-Za-z]{1,20}$/', $firstname)) $errors[] = "Invalid first name.";
if (!preg_match('/^[A-Za-z]{1,20}$/', $lastname)) $errors[] = "Invalid last name.";
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $dob)) $errors[] = "Invalid date of birth.";
if (!$gender) $errors[] = "Gender required.";
if (!$address || strlen($address) > 40) $errors[] = "Invalid address.";
if (!$suburb || strlen($suburb) > 40) $errors[] = "Invalid suburb.";
if (!in_array($state, ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"])) $errors[] = "Invalid state.";
if (!preg_match('/^\d{4}$/', $postcode)) $errors[] = "Postcode must be 4 digits.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email.";
if (!preg_match('/^[0-9 ]{8,12}$/', $phone)) $errors[] = "Invalid phone number.";
if (empty($skills)) $errors[] = "At least one skill must be selected.";

if ($other_skills) {
    $skills[] = $other_skills;
}

// Postcode vs State check
$state_postcode_ranges = [
    "VIC" => [3000, 3999],
    "NSW" => [2000, 2999],
    "QLD" => [4000, 4999],
    "NT"  => [800, 899],
    "WA"  => [6000, 6999],
    "SA"  => [5000, 5999],
    "TAS" => [7000, 7999],
    "ACT" => [200, 299]
];
$pc = (int)$postcode;
if (isset($state_postcode_ranges[$state])) {
    [$min, $max] = $state_postcode_ranges[$state];
    if ($pc < $min || $pc > $max) {
        $errors[] = "Postcode does not match the selected state.";
    }
}

if ($errors) {
    echo "<h2>Submission Error</h2><ul>";
    foreach ($errors as $error) echo "<li>$error</li>";
    echo "</ul><a href='apply.php'>Go back</a>";
    exit();
}

// Create table if not exists
$table = "eoi";
$create_table = "CREATE TABLE IF NOT EXISTS $table (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    JobRef VARCHAR(10),
    FirstName VARCHAR(20),
    LastName VARCHAR(20),
    DOB VARCHAR(10),
    Gender VARCHAR(10),
    Address VARCHAR(40),
    Suburb VARCHAR(40),
    State VARCHAR(3),
    Postcode VARCHAR(4),
    Email VARCHAR(100),
    Phone VARCHAR(12),
    Skills TEXT
)";
mysqli_query($conn, $create_table);

$skills_str = implode(", ", array_map('sanitize', $skills));

$stmt = $conn->prepare("INSERT INTO $table 
    (JobRef, FirstName, LastName, DOB, Gender, Address, Suburb, State, Postcode, Email, Phone, Skills) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssssssss", 
    $jobref, $firstname, $lastname, $dob, $gender, $address, $suburb, 
    $state, $postcode, $email, $phone, $skills_str);

if ($stmt->execute()) {
    $eoi_id = $stmt->insert_id;
    echo "<h2>Application Received</h2>";
    echo "<p>Your EOI number is: <strong>" . htmlspecialchars($eoi_id) . "</strong></p>";
    echo "<a href='apply.php'>Submit another application</a>";
} else {
    echo "<p>Error submitting application.</p>";
}

$stmt->close();
mysqli_close($conn);
?>