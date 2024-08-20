<?php
// Establish database connection and return $mysqli object
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutor";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}





$email = $_POST['Email'];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);


$sql = "UPDATE tutor_info
        SET reset_password_hash = ?,
        reset_token_expaires_at = ?
        WHERE Email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

if($mysqli->affected_rows){
    $mail = require __DIR__ . "/email.php";


    $mail->setFrom('phonesell7896@gmail.com', "phonesell.com"); 
    $mail->addAddress($email);
    $mail->Subject = "Reset your password";
    $mail->Body = <<<END

    Click <a href="http://localhost/tutor_website/tutorreset/reset-password.php?token=$token">here</a> 
    to reset your password. 





    END;

    try {

        $mail->send();

    } catch (Exception $e) {

        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";

    }

}

echo "Message sent, please check your inbox.";

header("Location: /tutor_website/login-page.html")







?>
