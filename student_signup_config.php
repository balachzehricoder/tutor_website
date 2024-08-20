<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('config.php'); // Include your database connection file

    // Prepare and sanitize form data
    $name = $_POST['Name'] ?? '';
    $phone = $_POST['Phone'] ?? '';
    $email = $_POST['Email'] ?? '';
    $password = $_POST['Password'] ?? '';
    $subject = $_POST['Subject'] ?? '';
    $messages = $_POST['messages'] ?? '';
    $techername = $_POST['techername'] ?? '';


    
    // Check if 'subjects' is set in $_POST and handle accordingly
$primary_column = isset($_POST["subjects"]) ? $_POST["subjects"] : [];
$primary_column1 = implode(" ", $primary_column);

$consent = isset($_POST['Consent']) ? 1 : 0; // Assuming 1 for checked, 0 for unchecked

// Sanitize suburb input (You can add more validation or sanitize functions)
$suburb = isset($_POST['Suburb']) ? $_POST['Suburb'] : '';

// Serialize selected data for status and tutoring_mode
$selectedStatus = isset($_POST['subject']) ? $_POST['subject'] : [];
$serializedStatus = implode(", ", $selectedStatus);

$selectedTutoringMode = isset($_POST['tutoring_mode']) ? $_POST['tutoring_mode'] : [];
$serializedTutoringMode = implode(", ", $selectedTutoringMode);

    // Sanitize and prepare 'messages' data (you can perform additional validation or formatting)

    // Insert data into the database using prepared statements for security
    $stmt = $conn->prepare("INSERT INTO students (name, phone, email, password, subject, suburb, consent, status, tutoringmode, messages, techername) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssissss", $name, $phone, $email, $password, $subject, $suburb, $consent, $serializedStatus, $serializedTutoringMode, $messages, $techername);

    if ($stmt->execute()) {


header("Location: login-page.html");


    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}


?>
