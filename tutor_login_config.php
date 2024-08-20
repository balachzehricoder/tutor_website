<?php
session_start(); // Start a session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include('config.php'); // Assuming this includes your database connection

    // Get input data
    $email = $_POST['Email'] ?? '';
    $password = $_POST['Password'] ?? '';

    // Check if the entered email matches a record in the database
    $query = "SELECT id, Name,  Password, is_approved FROM tutor_info WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['Password']; // Assuming 'password' is the column name for storing passwords
        $is_approved = $row['is_approved'];

        // Verify the entered password with the stored plaintext password (not recommended)
        if ( $is_approved == 1 && $password === $stored_password) { // Check plaintext password
            // Password is correct, set session variables and redirect to dashboard or any other page
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['full_name'];
            $_SESSION['role'] = $row['role'];            header("Location: tutor-homepage.php"); // Redirect to dashboard after successful login
            exit();
        } else {
            // Password is incorrect
            echo "Incorrect password or your account is not approved. Please try again or contact the admin.";
            session_destroy();
        }
    } else {
        // Email doesn't exist
        echo "Email not found. Please register or try again.";
    }

    $stmt->close();
    $conn->close();
}
?>
