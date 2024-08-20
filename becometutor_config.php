
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('config.php');
if(isset ($_POST['submit']))
{
    $Title = $_POST["title"];
    $Name = $_POST["name"];
    $Phone = $_POST["phone"];
    $Email = $_POST["email"];
    $Password = $_POST["password"];
    $Address = $_POST["address"];
    $Tutoringrate = $_POST["tutoringRate"]; // Check variable name consistency
    $Gender = $_POST["gender"];
    $Status = $_POST["status"];
    $TutoringMode = $_POST["tutoringMode"];
    $TutoringExperience = $_POST["tutoringExperience"];
    $NativeLanguage = $_POST["nativeLanguage"];
    $primary_column = $_POST["subjects"];
    $primary_column1 = implode(" ",$primary_column);
    

    // education
   // Check if the form fields were submitted and are not empty
if (isset($_POST["MajorSubject"])) {
    $MajorSubject = $_POST["MajorSubject"];
} else {
    // Handle the case when 'MajorSubject' is not submitted or empty
    $MajorSubject = '';
}

if (isset($_POST["OtherSubject"])) {
    $OtherSubject = $_POST["OtherSubject"];
} else {
    $OtherSubject = '';
}

if (isset($_POST["Education"])) {
    $Education = $_POST["Education"];
} else {
    $Education = '';
}

if (isset($_POST["QExperience"])) {
    $QExperience = $_POST["QExperience"];
} else {
    $QExperience = '';
}

if (isset($_POST["Location"])) {
    $Location = $_POST["Location"];
} else {
    $Location = '';
}

if (isset($_POST["TravelPolicy"])) {
    $TravelPolicy = $_POST["TravelPolicy"];
} else {
    $TravelPolicy = '';
}

$selectedSubjects = isset($_POST['subjects']) ? $_POST['subjects'] : [];

// Serialize the array to store in the database
$serializedSubjects = serialize($selectedSubjects);
include ('image_upload.php');
if(isset($_FILES["uploadimg"]) && !empty($_FILES["uploadimg"])) {
    $fileResult = UploadImage($_FILES["uploadimg"]);
    if(isset($fileResult["uploadedFile"])) {
        $path = $fileResult["uploadedFile"];

        // The rest of your code for database insertion goes here
        // ...
    } else {
        echo "Error uploading file";
    }
} else {
    echo "No file uploaded or file input name does not match.";
}





$query = "insert into tutor_info (Title, Name, Phone, Email, Password, Address, Tutoring_rate, Gender, I_am_a, Tutoring_Mode, Experience, Native_lang, MajorSubject, OtherSubject, Education, QExperience, Location, TravelPolicy, primary_column, uploadimg)
VALUES ('$Title', '$Name', '$Phone', '$Email', '$Password', '$Address', '$Tutoringrate', '$Gender', '$Status', '$TutoringMode', '$TutoringExperience', '$NativeLanguage', '$MajorSubject', '$OtherSubject', '$Education', '$QExperience', '$Location', '$TravelPolicy', '$primary_column1', '$path')";
$run = mysqli_query($conn,$query);
if($run)
{
header("Location: login-page.html");
}
else
{
echo"Not Established";
}







    
   

  
    



}











?>


