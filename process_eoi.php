<?php
session_start();

// --- Database connection ---
$conn = mysqli_connect("localhost", "root", "", "group_2");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// --- Helper function to sanitize input ---
function sanitise($conn, $data) {
    return mysqli_real_escape_string($conn, trim($data));
}

// --- Check if form was submitted ---
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // Prevent direct URL access
    header("Location: apply.php");
    exit();
}

// --- Get and sanitize form data ---
$jobreferencenumber = sanitise($conn, $_POST['jobreferencenumber']);
$firstname          = sanitise($conn, $_POST['firstname']);
$lastname           = sanitise($conn, $_POST['lastname']);
$dob                = sanitise($conn, $_POST['dob']);
$gender             = sanitise($conn, $_POST['gender']);
$streetaddress      = sanitise($conn, $_POST['street']);
$suburbtown         = sanitise($conn, $_POST['suburb']);
$state              = sanitise($conn, $_POST['state']);
$postcode           = sanitise($conn, $_POST['postcode']);
$email              = sanitise($conn, $_POST['email']);
$phonenumber        = sanitise($conn, $_POST['phonenumber']);
$otherskillsText        = sanitise($conn, $_POST['otherskillsText']);

// --- Combine technical skills checkboxes ---
$skills = [];
for ($i = 1; $i <= 6; $i++) {
    if (isset($_POST["req$i"])) {
        $skills[] = "req$i";
    }
}
$skills_text = implode(", ", $skills);
if (!empty($otherskills)) {
    $skills_text .= (!empty($skills_text) ? ", " : "") . "Other: " . $otherskills;
}

// --- Server-side validation ---
$errors = [];

if (!preg_match("/^[A-Za-z ]{1,20}$/", $firstname)) {
    $errors[] = "Invalid first name (max 20 alpha characters).";
}

if (!preg_match("/^[A-Za-z ]{1,20}$/", $lastname)) {
    $errors[] = "Invalid last name (max 20 alpha characters).";
}

if (!preg_match("/^\d{4}$/", $postcode)) {
    $errors[] = "Invalid postcode (must be exactly 4 digits).";
}

if (!preg_match("/^[0-9 ]{8,12}$/", $phonenumber)) {
    $errors[] = "Invalid phone number (8-12 digits or spaces allowed).";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

if (count($errors) > 0) {
    echo "<h2>Form Errors:</h2><ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
    echo "<p><a href='apply.php'>Go back to the application form</a></p>";
    exit();
}

// --- CREATE TABLE IF NOT EXISTS (auto creation) ---
$create_table_sql = "
CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    JobReferenceNumber VARCHAR(10),
    FirstName VARCHAR(20),
    LastName VARCHAR(20),
    DOB DATE,
    Gender VARCHAR(10),
    StreetAddress VARCHAR(40),
    SuburbTown VARCHAR(40),
    State VARCHAR(10),
    Postcode VARCHAR(4),
    Email VARCHAR(50),
    PhoneNumber VARCHAR(15),
    OtherSkills TEXT,
    Status VARCHAR(20)
)";
if (!mysqli_query($conn, $create_table_sql)) {
    die("Error creating table: " . mysqli_error($conn));
}

// --- Insert form data into the database ---
$insert_sql = "INSERT INTO eoi 
(JobReferenceNumber, FirstName, LastName, DOB, Gender, StreetAddress, SuburbTown, State, Postcode, Email, PhoneNumber, OtherSkills, Status) 
VALUES 
('$jobreferencenumber', '$firstname', '$lastname', '$dob', '$gender', '$streetaddress', '$suburbtown', '$state', '$postcode', '$email', '$phonenumber', '$otherskillsText', 'New')";

if (mysqli_query($conn, $insert_sql)) {
    $eoi_id = mysqli_insert_id($conn); // get auto-generated EOInumber
    echo "<h2>Application Submitted Successfully!</h2>";
    echo "<p>Thank you, $firstname $lastname. Your application for <strong>$jobreferencenumber</strong> has been received.</p>";
    echo "<p>Your EOI Number is: <strong>$eoi_id</strong></p>";
    echo "<p><a href='apply.php'>Submit another application</a></p>";
} else {
    echo "Error inserting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
