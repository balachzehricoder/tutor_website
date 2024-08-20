<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // First, delete associated records from 'reviews' table
    $sql_delete_reviews = "DELETE FROM reviews WHERE user_id = $id";

    if ($conn->query($sql_delete_reviews) === TRUE) {
        // After deleting associated reviews, delete tutor record from 'tutors' table
        $sql_delete_tutor = "DELETE FROM tutor_info WHERE id = $id";

        if ($conn->query($sql_delete_tutor) === TRUE) {
            echo "Tutor and associated reviews deleted successfully";
        } else {
            echo "Error deleting tutor record: " . $conn->error;
        }
    } else {
        echo "Error deleting associated reviews: " . $conn->error;
    }
} else {
    echo "ID not provided";
}

$conn->close();
?>
