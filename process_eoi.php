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
$date               = sanitise($conn, $_POST['date']);
$gender             = isset($_POST['gender']) ? sanitise($conn, $_POST['gender']) : "";
$street             = sanitise($conn, $_POST['street']);
$suburb             = sanitise($conn, $_POST['suburb']);
$state              = sanitise($conn, $_POST['state']);
$postcode           = sanitise($conn, $_POST['postcode']);
$email              = sanitise($conn, $_POST['email']);
$phonenumber        = sanitise($conn, $_POST['phonenumber']);
$otherskills        = sanitise($conn, $_POST['otherskills']);

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

// --- Create EOI table if it doesn't exist ---
$table_sql = "CREATE TABLE IF NOT EXISTS eoi (
    eoi_id INT AUTO_INCREMENT PRIMARY KEY,
    job_ref VARCHAR(10),
    first_name VARCHAR(20),
    last_name VARCHAR(20),
    dob DATE,
    gender VARCHAR(10),
    street VARCHAR(40),
    suburb VARCHAR(40),
    state VARCHAR(10),
    postcode VARCHAR(4),
    email VARCHAR(50),
    phone VARCHAR(15),
    skills TEXT,
    status VARCHAR(20)
)";

if (!mysqli_query($conn, $table_sql)) {
    die("Error creating table: " . mysqli_error($conn));
}

// --- Insert form data into the database ---
$insert_sql = "INSERT INTO eoi 
(job_ref, first_name, last_name, dob, gender, street, suburb, state, postcode, email, phone, skills, status) 
VALUES 
('$jobreferencenumber', '$firstname', '$lastname', '$date', '$gender', '$street', '$suburb', '$state', '$postcode', '$email', '$phonenumber', '$skills_text', 'New')";

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
