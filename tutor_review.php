<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "review";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['rating_value']) && isset($_GET['tutor_id'])) {
    $tutor_id = $_GET['tutor_id'];
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if tutor_id exists in tutor table before inserting into review_table
    $check_tutor = mysqli_query($conn, "SELECT tutor_id FROM tutor WHERE tutor_id = '$tutor_id'");
    if (mysqli_num_rows($check_tutor) == 0) {
        echo "Invalid tutor ID";
        exit;
    }

    $rating_value = $_POST['rating_value'];
    $userName = $_POST['userName'];
    $userMessage = $_POST['userMessage'];
    $now = time();

    $sql = "INSERT INTO review_table (name, rating, message, datetime, tutor_id)
            VALUES ('$userName', '$rating_value', '$userMessage', '$now', '$tutor_id')";

    if (mysqli_query($conn, $sql)) {
        echo "New Review Added Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if (isset($_POST['action'])) {
    // Fetching reviews code remains unchanged
    // ...
}
?>
