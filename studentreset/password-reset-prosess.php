<?php
$token = $_POST["token"];
$token_hash = hash("sha256", $token);

// Establish database connection and return $mysqli object
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutor";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM students WHERE reset_password_hash = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    die("Token not found");
}

$newPassword = $_POST["password"]; // Get the new password from the form

$updateSql = "UPDATE students
              SET password = ?,
              reset_password_hash = NULL,
              reset_token_expaires_at = NULL
              WHERE id = ?";

$updateStmt = $mysqli->prepare($updateSql);
$updateStmt->bind_param("si", $newPassword, $user["id"]); // Assuming id is an integer
$updateStmt->execute();

echo "Password updated. You can now login.";



header("Location: /tutor_website/login-pgae.html")
?>
