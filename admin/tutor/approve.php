<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepare the SQL statement
    $sql = "UPDATE tutor_info SET is_approved = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            echo "User approved successfully";
            header("Location: index.php");
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Statement preparation error: " . $conn->error;
    }
} else {
    echo "ID not provided";
}

$conn->close();
?>