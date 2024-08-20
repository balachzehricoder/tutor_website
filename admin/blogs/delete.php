<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM blogs WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Blog post deleted successfully";
    } else {
        echo "Error deleting blog post: " . $conn->error;
    }
} else {
    echo "ID not provided";
}

$conn->close();
?>
