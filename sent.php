<?php
session_start();

// Check authentication
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate user input
    $message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

    // Fetch sender's details using a prepared statement
    $query = "SELECT name, email, phone, subject, suburb, messages FROM students WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $senderName = $row['name'];
        $senderEmail = $row['email'];
        $senderPhone = $row['phone'];
        $senderSubject = $row['subject'];
        $senderLocation = $row['suburb'];
        $senderMessage = $row['messages'];
    } else {
        echo "Sender details not found.";
        exit();
    }

    $stmt->close();

    // Get receiver ID from the URL parameter
    $receiverId = $_GET['id'] ?? null;

    // Insert the message into the database
    $insertQuery = "INSERT INTO messages (sender_id, resiver_id, sender_name, sender_subject, sender_email, sender_phone, sender_location, sender_message, messages) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bind_param("iisssssss", $_SESSION['user_id'], $receiverId, $senderName, $senderSubject, $senderEmail, $senderPhone, $senderLocation, $senderMessage, $message);

    
    $insertStmt->execute();

    // Check if the message was inserted successfully
    if ($insertStmt->affected_rows > 0) {
        header("Location: student-homepage.php");
        exit();
    } else {
        echo "Error sending message.";
    }

    $insertStmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Custom Code Start  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- ... (your existing styles) ... -->
    <!-- Custom Code End  -->
</head>
<body>
    <form action="" method="post">
        <textarea name="message" class="t2555"></textarea>
        <div class="t2551">
            <button type="submit" class="t2552 button-primary">Submit</button>
        </div>
    </form>
</body>
</html>
