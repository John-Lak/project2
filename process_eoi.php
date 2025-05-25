<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: apply.php");
    exit();
}

// Sanitize function
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Validation flags
$errors = [];

// Required fields
$jobref   = sanitize($_POST["jobref"] ?? '');
$firstname = sanitize($_POST["firstname"] ?? '');
$lastname = sanitize($_POST["lastname"] ?? '');
$dob = sanitize($_POST["dob"] ?? '');
$gender = sanitize($_POST["gender"] ?? '');
$address = sanitize($_POST["address"] ?? '');
$suburb = sanitize($_POST["suburb"] ?? '');
$state = strtoupper(sanitize($_POST["state"] ?? ''));
$postcode = sanitize($_POST["postcode"] ?? '');
$email = sanitize($_POST["email"] ?? '');
$phone = sanitize($_POST["phone"] ?? '');
$skills = $_POST["skills"] ?? [];

if (!$jobref || !preg_match('/^[a-zA-Z]{2}\d{3}$/', $jobref)) $errors[] = "Invalid job reference.";
if (!$firstname || !preg_match('/^[A-Za-z]{1,20}$/', $firstname)) $errors[] = "Invalid first name.";
if (!$lastname || !preg_match('/^[A-Za-z]{1,20}$/', $lastname)) $errors[] = "Invalid last name.";
if (!$dob || !preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $dob)) $errors[] = "Invalid date of birth.";
if (!$gender) $errors[] = "Gender required.";
if (!$address || strlen($address) > 40) $errors[] = "Invalid address.";
if (!$suburb || strlen($suburb) > 40) $errors[] = "Invalid suburb.";
if (!in_array($state, ["VIC","NSW","QLD","NT","WA","SA","TAS","ACT"])) $errors[] = "Invalid state.";
if (!preg_match('/^\d{4}$/', $postcode)) $errors[] = "Postcode must be 4 digits.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email.";
if (!preg_match('/^[0-9 ]{8,12}$/', $phone)) $errors[] = "Invalid phone number.";
if (empty($skills)) $errors[] = "At least one skill must be selected.";

// Check postcode/state matching
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
$range = $state_postcode_ranges[$state];
if ($pc < $range[0] || $pc > $range[1]) $errors[] = "Postcode does not match state.";

if ($errors) {
    echo "<h2>Submission Error</h2><ul>";
    foreach ($errors as $error) echo "<li>$error</li>";
    echo "</ul><a href='apply.php'>Go back</a>";
    exit();
}

// DB connection
require_once("settings.php"); // Contains $host, $user, $pwd, $sql_db
$conn = @mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("<p>Database connection failure</p>");
}

// Prepare and insert
$skills_str = implode(", ", array_map('sanitize', $skills));
$insert = "INSERT INTO $table 
    (JobRef, FirstName, LastName, DOB, Gender, Address, Suburb, State, Postcode, Email, Phone, Skills)
    VALUES 
    ('$jobref', '$firstname', '$lastname', '$dob', '$gender', '$address', '$suburb', '$state', '$postcode', '$email', '$phone', '$skills_str')";

if (mysqli_query($conn, $insert)) {
    $eoi_id = mysqli_insert_id($conn);
    echo "<h2>Application Received</h2>";
    echo "<p>Your EOI number is: <strong>$eoi_id</strong></p>";
    echo "<a href='apply.php'>Submit another application</a>";
} else {
    echo "<p>Error submitting application.</p>";
}

mysqli_close($conn);
?>