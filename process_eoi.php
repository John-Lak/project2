<?php
require_once("settings.php");

$conn = @mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("<p>Database connection failed</p>");
}

// Only allow POST
if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['jobref'])) {
    header("Location: apply.php");
    exit();
}

function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Collect and sanitize inputs
$jobref = strtoupper(sanitize($_POST["jobref"] ?? ''));
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
$other_skills = sanitize($_POST["other_skills"] ?? '');

$errors = [];

// Validation
if (!preg_match('/^[A-Z]{2}\d{3}$/', $jobref)) $errors[] = "Invalid Job Reference.";
if (!preg_match('/^[A-Za-z]{1,20}$/', $firstname)) $errors[] = "Invalid First Name.";
if (!preg_match('/^[A-Za-z]{1,20}$/', $lastname)) $errors[] = "Invalid Last Name.";
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $dob)) $errors[] = "Invalid Date of Birth.";
if (!in_array($gender, ["Male", "Female"])) $errors[] = "Gender not selected.";
if (!$address || strlen($address) > 40) $errors[] = "Invalid Address.";
if (!$suburb || strlen($suburb) > 40) $errors[] = "Invalid Suburb.";
if (!in_array($state, ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"])) $errors[] = "Invalid State.";
if (!preg_match('/^\d{4}$/', $postcode)) $errors[] = "Invalid Postcode.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid Email.";
if (!preg_match('/^[0-9 ]{8,12}$/', $phone)) $errors[] = "Invalid Phone.";
if (empty($skills)) $errors[] = "Select at least one skill.";
if ($other_skills) $skills[] = $other_skills;

// Postcode validation against state
$state_ranges = [
    "VIC" => [3000, 3999],
    "NSW" => [2000, 2999],
    "QLD" => [4000, 4999],
    "NT" => [0800, 0899],
    "WA" => [6000, 6999],
    "SA" => [5000, 5999],
    "TAS" => [7000, 7999],
    "ACT" => [0200, 0299]
];

$pc = (int)$postcode;
if (isset($state_ranges[$state])) {
    [$min, $max] = $state_ranges[$state];
    if ($pc < $min || $pc > $max) {
        $errors[] = "Postcode does not match state.";
    }
}

if ($errors) {
    echo "<h2>Submission Error</h2><ul>";
    foreach ($errors as $e) echo "<li>$e</li>";
    echo "</ul><a href='apply.php'>Return to application</a>";
    exit();
}

// Create table if not exists
$table = "eoi";
$create_query = "CREATE TABLE IF NOT EXISTS $table (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    JobRef VARCHAR(10),
    FirstName VARCHAR(20),
    LastName VARCHAR(20),
    DOB DATE,
    Gender VARCHAR(10),
    Address VARCHAR(40),
    Suburb VARCHAR(40),
    State VARCHAR(3),
    Postcode VARCHAR(4),
    Email VARCHAR(100),
    Phone VARCHAR(12),
    Skills TEXT
)";
mysqli_query($conn, $create_query);

// Insert data
$skills_str = implode(", ", array_map('sanitize', $skills));
$stmt = $conn->prepare("INSERT INTO $table 
    (JobRef, FirstName, LastName, DOB, Gender, Address, Suburb, State, Postcode, Email, Phone, Skills) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssssssss", $jobref, $firstname, $lastname, $dob, $gender, $address, $suburb, $state, $postcode, $email, $phone, $skills_str);

if ($stmt->execute()) {
    $eoi_id = $stmt->insert_id;
    echo "<h2>Application Received</h2>";
    echo "<p>Your EOI number is: <strong>" . htmlspecialchars($eoi_id) . "</strong></p>";
    echo "<a href='apply.php'>Submit another application</a>";
} else {
    echo "<p>There was a problem submitting your application. Please try again.</p>";
}

$stmt->close();
mysqli_close($conn);
?>