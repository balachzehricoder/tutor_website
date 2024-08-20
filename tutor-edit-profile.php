<?php
error_reporting(E_ALL);
session_start();
include 'config.php';
include 'image_upload.php'; // Include the image upload file

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION["user_id"];
$query = "SELECT * FROM tutor_info WHERE id='$id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    foreach ($result as $row) {
        $img = $row['uploadimg'];
        
    }
}
// Check if the ID is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve user information based on the ID
    $query = "SELECT * FROM tutor_info WHERE id='$id'";
    $result = $conn->query($query);


       

    if ($result === false) {
        // Error in the query
        die("Error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();
        $checkbox = $row['primary_column'];
        $primary1 = explode(" ", $checkbox);
        
        // Check the contents of $primary1 array
        // Update user information if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
            // Get other values from the form
            $id = $_POST['id'];
            $name = $_POST['Name'];
            $phone = $_POST['Phone'];
            $email = $_POST['Email'];
            $address = $_POST['Address'];
            $tutoringRate = $_POST['Tutoring_rate'];
            $iam = $_POST['I_am_a'];
            $tutoringMode = $_POST['Tutoring_Mode'];
            $experience = $_POST['Experience'];
            $nativeLang = $_POST['Native_lang'];
            $majorSubject = $_POST['MajorSubject'];
            $otherSubject = $_POST['OtherSubject'];
            $education = $_POST['Education'];
            $qExperience = $_POST['QExperience'];
            $location = $_POST['Location'];
            $travelPolicy = $_POST['TravelPolicy'];
            $primary_column = $_POST["subjects"];
            $primary_column1 = implode(" ",$primary_column);

            


           

            // Update the image if a new profile picture is uploaded
            if (isset($_FILES["uploadimg"]) && !empty($_FILES["uploadimg"])) {
                $fileResult = UploadImage($_FILES["uploadimg"]);
                if (isset($fileResult["uploadedFile"])) {
                    $path = $fileResult["uploadedFile"];
                    // Update the image path in the database
                    $updateImageQuery = "UPDATE tutor_info SET uploadimg='$path' WHERE id='$id'";
                    $conn->query($updateImageQuery);
                    echo "Profile picture updated successfully";
                } else {
                }
            }

            // Prepare and execute the update query for other fields
            $updateQuery = "UPDATE tutor_info SET  Name='$name', Phone='$phone', Email='$email' , Address='$address', Tutoring_rate='$tutoringRate', I_am_a='$iam', Tutoring_Mode='$tutoringMode', Experience='$experience', Native_lang='$nativeLang', MajorSubject='$majorSubject', OtherSubject='$otherSubject', Education='$education', QExperience='$qExperience', Location='$location', TravelPolicy='$travelPolicy', primary_column='$primary_column1'  WHERE id='$id'";
            
            if ($conn->query($updateQuery) === TRUE) {
                echo "Record updated successfully";
                header("Location:tutor-listing-edit.php");
                // Optionally, redirect the user after successful update
                // header("Location: profile.php");
                // exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        // Your HTML form for profile update goes here
        // Include the file input for profile picture update
?>

<?php
    } else {
        echo "No user found with the given ID";
    }
} else {
    echo "No ID parameter found in the URL.";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Custom Code Start  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        main {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <!-- Custom Code End  -->

    <!-- Settings -->
    <meta for="charset" charset="utf-8" />
    <meta for="referrer" name="referrer" content="origin" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- Title -->
    <title> Perth Tutors | Tutor Edit Profile </title>
    <meta property="og:title" content="Perth Tutors | Tutor Edit Profile" />
    <meta name="twitter:title" content="Perth Tutors | Tutor Edit Profile" />

    <!-- Description  -->
    <meta name="description" content=""/>
    <meta property="og:description" content="" />
    <meta name="twitter:description" content="" />

    <!-- Favicon  -->
    <link rel="icon" type="image/x-icon" href="assets/d62b55cdb707d16aeaabfe2cfa8bb46c_497.svg">
    <link rel="apple-touch-icon" href="assets/d62b55cdb707d16aeaabfe2cfa8bb46c_497.svg">

    <!-- Cover  -->
    <meta property="og:image" content="null" />
    <meta name="twitter:image" content="null">
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    <!-- Site  -->
    <meta property="og:site_name" content="Perth Tutors" />
    <meta property="og:type" content="website" />
    <meta name="apple-mobile-web-app-title" content="Perth Tutors">

    <!-- Robots  -->
    <meta name="robots" content="noindex, nofollow">

    <!-- Language  -->
    <meta property="og:locale" content="en" />
    <meta http-equiv="content-language" content="en" />

    <!-- CSS  -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- jQuery -->
    <script src="assets/jQuery.js"></script>

    <!-- Framework  -->
    <link rel="stylesheet" href="css/framework.css">
    <script src="js/framework.js"></script>

    <!-- Plugins  -->
    <link rel="stylesheet" href="css/plugins.css">
    <script src="js/plugins.js"></script>

    <!-- Files  -->
    <link rel="stylesheet" href="css/files.css">
    <script src="js/files.js"></script>

    <!-- Fonts  -->
    

    <!-- Custom Code Start  -->
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <!-- Custom Code End  -->
</head>
<body>
    

    <div id="dh-website">
        <main>
            <div class="t1684 dh-body">
                <!-- Component: Tutor Login Header-->
                <div class="t1685">
                    <section class="t1670">
                        <container class="t1671">
                            <div class="t1672">
                                <a page-id="2" href="index.html" class="t1677">
                                    <img src="assets/36dd8b0c43e809de25402efe13a86734_4604.svg" loading="lazy" alt="null" class="t1678">
                                </a>
                                <div id="menu" class="t1673">
                                    <a page-id="17" href="tutor-homepage.php" class="t1674">Home</a>
                                    <a page-id="19" link-type="page" href="tutor-chat.html" class="t1674">Chat</a>
                                    <a page-id="26" href="student-messages.html" class="t1674">Messages</a>
                                    <a page-id="12" href="tutor-listing-edit.html" class="t2606">
                                        <img src="<?php echo $img  ?>" loading="lazy" alt="null" class="t2605">
                                    </a>
                                    <div class="t1675">
                                        <a class="t1676 button-tertiary button-tertiary">Log Out</a>
                                    </div>
                                </div>
                                <div dh-transform="hamburger" dh-transform-options="a:menu|b:fade|c:false|d:true" class="t1679">
                                    <img src="assets/4474856564362a26acc1b8706c0faa3c_597.svg" loading="lazy" alt="null" class="t1680">
                                </div>
                            </div>
                        </container>
                    </section>
                </div>
                <section class="t1687">
                    <container class="t1688">
                        <h1 class="t1859">Tutor Registration Form</h1>
                            <div class="t1690">
                                <div class="t1691">
                                <form method="post" enctype="multipart/form-data">                                        <div class="t1802">
                                <div class="t1803">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    
    <div class="t1804">
        <label class="t1805 field-label">Name</label>
        <input name="Name" required="true" placeholder="Name" value="<?php echo $row['Name']; ?>" class="t1806">
    </div>
    
    <div class="t1807">
        <label class="t1808 field-label">Phone</label>
        <input name="Phone" type="tel" required="true" placeholder="Phone" class="t1809" value="<?php echo $row['Phone']; ?>">
    </div>
    
    <div class="t1819">
        <label class="t1820 field-label">Email</label>
        <input name="Email" type="email" required="true" placeholder="Email" class="t1821" value="<?php echo $row['Email']; ?>">
    </div>
    
    <div class="t1816">
        <label for="Address" class="t1817 field-label">Address</label>
        <input name="Address" type="text" placeholder="Address" class="t1818" value="<?php echo $row['Address']; ?>">
    </div>
    
    <div class="t1825">
    <label class="t1826 field-label">Tutoring Rate ( Per hour )</label>
    <input name="Tutoring_rate" type="tel" required="true" placeholder="Rate" class="t1827" value="<?php echo isset($row['Tutoring_rate']) ? $row['Tutoring_rate'] : ''; ?>">
</div>


    <div class="t1266">
            <label for="I am a...." class="t1267 field-label">I am a....</label>
            <select name="I_am_a" required="true" class="t1268 field-style">
                <option disabled="disabled" selected="selected" class="t1271">Select Your Status</option>
                <option value="Private Tutor" class="t1270" <?php if ($row['I_am_a'] === 'Private Tutor') echo 'selected'; ?>>Private Tutor</option>
                <option value="University Student" class="t1269" <?php if ($row['I_am_a'] === 'University Student') echo 'selected'; ?>>University Student</option>
                <option value="High School Student" class="t1272" <?php if ($row['I_am_a'] === 'High School Student') echo 'selected'; ?>>High School Student</option>
            </select>
        </div>


    
    <div class="t1828">
        <label for="TutoringMode" class="t1829 field-label">Tutoring Mode</label>
        <select name="Tutoring_Mode" required="true" class="t1830 field-style">
            <option disabled="disabled" class="t1833">Select Tutoring Mode</option>
            <option value="Online" class="t1832" <?php if ($row['Tutoring_Mode'] === 'Online') echo 'selected'; ?>>Online</option>
            <option value="In-Person" class="t1831" <?php if ($row['Tutoring_Mode'] === 'In-Person') echo 'selected'; ?>>In-Person</option>
            <option value="Online / In-Person" class="t1834" <?php if ($row['Tutoring_Mode'] === 'Online / In-Person') echo 'selected'; ?>>Online / In-Person</option>
        </select>
    </div>
    
    <div class="t1835">
        <label class="t1836 field-label">Experience (in years)</label>
        <input name="Experience" type="text" required="true" placeholder="Tutoring Experience" class="t1837" value="<?php echo $row['Experience']; ?>">
    </div>
    
    <div class="t1853">
        <label for="NativeLanguage" class="t1854 field-label">Native Language</label>
        <input name="Native_lang" type="text" required="true" placeholder="Native Language" class="t1855" value="<?php echo $row['Native_lang']; ?>">
    </div>
    
    <div class="t1856">
        <label for="ProfileImage" class="t1857 field-label">Profile Image</label>
        <input name="uploadimg" type="file"  placeholder="Profile Image" class="t1858">
    </div>
</div>

<div class="t1749">
    <div class="t1750">
        <h3 class="t1751">Your Education</h3>
            <div class="t1766">
                <label class="t1767">Your Major Subject</label>
                <input name="MajorSubject" value="<?php echo $row['MajorSubject']; ?>"  placeholder="Major Subject (e.g Math, English, Science, Physics, Chemistry, Human Biology, Statistics, Accounting etc)" class="t1768">
                <div class="t1769">
                    <span class="t1770">Major Subject ( e.g Math, English, Science, Physics, Chemistry, Human Biology, Statistics, Accounting etc ). Write only One Major Subject as this will appear in your Tutor Card whose example is given below in the image.</span>
                </div>
            </div>
            <div class="t1797">
                <label class="t1798">Other Subjects That You Can Teach ( Max 5 )</label>
                <input name="OtherSubject" value="<?php echo $row['OtherSubject']; ?>" required="true" placeholder="(e.g Math, English, Science, Physics, Chemistry, Human Biology, Statistics, Accounting etc)" class="t1799">
                <div class="t1800">
                    <span class="t1801">Write other subjects that you can teach. Make sure to separate the subjects with commas. Remember only 5 other subjects are allowed maximum. <br>( eg, Primary, Math, Secondary Math, Method, Math Specialist, Statistics )</span>
                </div>
            </div>
            <div class="t1753">
                <label class="t1759 field-label">Short Bio</label>
                <div class="t1754">
                    <textarea name="Education" required="true" placeholder="Write your short bio that will appear in your tutoring card. Make sure to keep your short bio of maximum 45 words. Write your achievements, degree, tutoring experience, etc in understandable short phrases." class="t1755"><?php echo $row['Education']; ?></textarea>
                    <div class="t1756">
                        <b class="t1758">Tutor Card Example</b>
                        <img src="assets/b4e19e4312a765ab0edec1c2526a71e2_68493.jpeg" loading="lazy" alt="null" class="t1757">
                    </div>
                </div>
            </div>
            <div class="t1760">
                <label class="t1761 field-label">Qualification, Experience, Achievements and Way of Tutoring</label>
                <textarea name="QExperience" required="true" placeholder="Details about your qualification experience and way of teaching etc. Tell your students why they should get tuition from you? Tell about your WWCC ( Working With Children Check)." class="t1762"><?php echo $row['QExperience']; ?></textarea>
            </div>
            <div class="t1763">
                <label class="t1764">Your Location</label>
                <input name="Location" required="true" placeholder="Location" class="t1765" value="<?php echo $row['Location']; ?>">
            </div>
            <div class="t1771">
                <h3 class="t1795">Meeting Place</h3>
                <p class="t1796">Please select one or more options to show where you run your tutoring sessions</p>
                <div class="t1772">
                    <label class="t1773 field-label">What is your Travel Policy?</label>
                    <textarea name="TravelPolicy" required="true" placeholder="If you teach at student's place then how far you will travel with no extra fee?" class="t1774"><?php echo $row['TravelPolicy']; ?></textarea>
                </div>
            </div>
        </form>
    </div>
</div>

                                        <div class="t1693">
                                            <div class="t1709">
                                                <h3 class="t1710">Primary Subjects</h3>
                                                <div class="t1711">
                                                    <div class="t1712">
                                                        <input name="subjects[]" type="checkbox" placeholder="Mathematics" value="p-Math" class="t1714"
    <?php if (in_array('p-Math', $primary1)) {
        echo "checked";
    } ?>
>

                                                        <label for="p-Math" class="t1713">Mathematics</label>
                                                    </div>
                                                    <div class="t1712">
                                                        <input name="subjects[]" type="checkbox" placeholder="Humanities" value="p-Humanities" class="t1714"  <?php if (in_array('p-Humanities', $primary1)) {
        echo "checked";
    } ?> >
                                                        <label for="Humanities" class="t1713">Humanities</label>
                                                    </div>
                                                    <div class="t1712">
                                                        <input name="subjects[]" type="checkbox" placeholder="Science" value="p-Science" class="t1714"  <?php if (in_array('p-Science', $primary1)) {
        echo "checked";
    } ?> >
                                                        <label for="Science" class="t1713">Science</label>
                                                    </div>
                                                    <div class="t1712">
                                                        <input name="subjects[]" type="checkbox" placeholder="English" value="p-English" class="t1714"  <?php if (in_array('p-English', $primary1)) {
        echo "checked";
    } ?> >
                                                        <label for="English" class="t1713">English</label>
                                                    </div>
                                                    <div class="t1712">
                                                        <input name="subjects[]" type="checkbox" placeholder="Health and Physical Education" value="p-Health and Physical Education" class="t1714"  <?php if (in_array('p-Health and Physical Education', $primary1)) {
        echo "checked";
    } ?> >
                                                        <label for="Health and Physical Education" class="t1713">Health and Physical Education</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="t1694">
                                                <h3 class="t1695">Secondary Subjects</h3>
                                                <div class="t1696">
                                                    <div class="t1697">
                                                        <div class="t1702">
                                                            <input name="subjects[]" type="checkbox" placeholder="Mathematics" value="s-Math" class="t1704"  <?php if (in_array('s-Math', $primary1)) {
        echo "checked";
    } ?> >
                                                            <label for="s-Math" class="t1703">Mathematics</label>
                                                        </div>
                                                        <div class="t1702">
                                                            <input name="subjects[]" type="checkbox" placeholder="Humanities" value="s-Humanities" class="t1704"  <?php if (in_array('s-Humanities', $primary1)) {
        echo "checked";
    } ?> >
                                                            <label for="Humanities" class="t1703">Humanities</label>
                                                        </div>
                                                        <div class="t1702">
                                                            <input name="subjects[]" type="checkbox" placeholder="Science" value="s-Science" class="t1704"  <?php if (in_array('s-Science', $primary1)) {
        echo "checked";
    } ?> >
                                                            <label for="Science" class="t1703">Science</label>
                                                        </div>
                                                        <div class="t1702">
                                                            <input name="subjects[]" type="checkbox" placeholder="English" value="s-English" class="t1704"  <?php if (in_array('s-English', $primary1)) {
        echo "checked";
    } ?> >
                                                            <label for="English" class="t1703">English</label>
                                                        </div>
                                                        <div class="t1702">
                                                            <input name="subjects[]" type="checkbox" placeholder="Health and Physical Education" value="s-Health and Physical Education" class="t1704"  <?php if (in_array('s-Health and Physical Education', $primary1)) {
        echo "checked";
    } ?> >
                                                            <label for="Health and Physical Education" class="t1703">Health and Physical Education</label>
                                                        </div>
                                                        <div class="t1698">
                                                            <div class="t1699">
                                                                <input name="subjects[]" type="checkbox" placeholder="Human Biology" value="s-Human Biology" class="t1701"  <?php if (in_array('s-Human Biology', $primary1)) {
        echo "checked";
    } ?> >
                                                                <label for="p-Math" class="t1700">Human Biology</label>
                                                            </div>
                                                            <div class="t1699">
                                                                <input name="subjects[]" type="checkbox" placeholder="Geography" value="s-Geography" class="t1701"  <?php if (in_array('p-MathGeography', $primary1)) {
        echo "checked";
    } ?>>
                                                                <label for="Geography" class="t1700">Geography</label>
                                                            </div>
                                                            <div class="t1699">
                                                                <input name="subjects[]" type="checkbox" placeholder="Economics and Business" value="s-Economics and Business" class="t1701"  <?php if (in_array('s-Economics and Business', $primary1)) {
        echo "checked";
    } ?> >
                                                                <label for="Economics and Business" class="t1700">Economics and Business</label>
                                                            </div>
                                                            <div class="t1699">
                                                                <input name="subjects[]" type="checkbox" placeholder="Digital Technologies" value="s-Digital Technologies" class="t1701"  <?php if (in_array('s-Digital Technologies', $primary1)) {
        echo "checked";
    } ?> >
                                                                <label for="Digital Technologies" class="t1700">Digital Technologies</label>
                                                            </div>
                                                            <div class="t1699">
                                                                <input name="subjects[]" type="checkbox" placeholder="Work Studies" value="s-Work Studies" class="t1701"  <?php if (in_array('s-Work Studies', $primary1)) {
        echo "checked";
    } ?> >
                                                                <label for="Work Studies" class="t1700">Work Studies</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="t1705">
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="Arabic" value="s-Arabic" class="t1708" <?php if
      (in_array('s-Arabic', $primary1)) { echo "checked" ; } ?>>
    <label for="Arabic" class="t1707">Arabic</label>
  </div>
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="Mandarin" value="s-Mandarin" class="t1708" <?php if
      (in_array('s-Mandarin', $primary1)) { echo "checked" ; } ?>>
    <label for="Mandarin" class="t1707">Mandarin</label>
  </div>
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="French" value="s-French" class="t1708" <?php if
      (in_array('s-French', $primary1)) { echo "checked" ; } ?>>
    <label for="French" class="t1707">French</label>
  </div>

  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="German" value="s-German" class="t1708" <?php if
      (in_array('s-German', $primary1)) { echo "checked" ; } ?>>
    <label for="German" class="t1707">German</label>
  </div>
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="Indonesian" value="s-Indonesian" class="t1708" <?php if
      (in_array('s-Indonesian', $primary1)) { echo "checked" ; } ?>>
    <label for="Indonesian" class="t1707">Indonesian</label>
  </div>
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="Italian" value="s-Italian" class="t1708" <?php if
      (in_array('s-Italian', $primary1)) { echo "checked" ; } ?>>
    <label for="Italian" class="t1707">Italian</label>
  </div>
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="Korean" value="s-Korean" class="t1708" <?php if
      (in_array('s-Korean', $primary1)) { echo "checked" ; } ?>>
    <label for="Korean" class="t1707">Korean</label>
  </div>
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="Modern Greek" value="s-Modern Greek" class="t1708" <?php if
      (in_array('s-Modern Greek', $primary1)) { echo "checked" ; } ?>>
    <label for="Modern Greek" class="t1707">Modern Greek</label>
  </div>
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="Spanish" value="s-Spanish" class="t1708" <?php if
      (in_array('s-Spanish', $primary1)) { echo "checked" ; } ?>>
    <label for="Spanish" class="t1707">Spanish</label>
  </div>
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="Vietnamese" value="s-Vietnamese" class="t1708" <?php if
      (in_array('s-Vietnamese', $primary1)) { echo "checked" ; } ?>>
    <label for="Vietnamese" class="t1707">Vietnamese</label>
  </div>
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="Japanese" value="s-Japanese" class="t1708" <?php if
      (in_array('s-Japanese', $primary1)) { echo "checked" ; } ?>>
    <label for="Japanese" class="t1707">Japanese</label>
  </div>
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="Aboriginal and Torres Strait Islander"
      value="s-Aboriginal and Torres Strait Islander" class="t1708" <?php if (in_array('s-Aboriginal and Torres Strait
      Islander', $primary1)) { echo "checked" ; } ?>>
    <label for="Aboriginal and Torres Strait Islander" class="t1707">Aboriginal and Torres Strait Islander</label>
  </div>
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="Latin" value="s-Latin" class="t1708" <?php if
      (in_array('s-Latin', $primary1)) { echo "checked" ; } ?>>
    <label for="Latin" class="t1707">Latin</label>
  </div>
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="Classical Greek" value="s-Classical Greek" class="t1708" <?php
      if (in_array('s-Classical Greek', $primary1)) { echo "checked" ; } ?>>
    <label for="Classical Greek" class="t1707">Classical Greek</label>
  </div>
  <div class="t1706">
    <input name="subjects[]" type="checkbox" placeholder="Turkish" value="s-Turkish" class="t1708" <?php if
      (in_array('s-Turkish', $primary1)) { echo "checked" ; } ?>>
    <label for="Turkish" class="t1707">Turkish</label>
  </div>
</div>
</div>
</div>
<div class="t1715">
  <h3 class="t1746">High School Subjects</h3>
  <div class="t1716">
    <div class="t1738">
      <div class="t1739">
        <input name="subjects[]" type="checkbox" placeholder="Physics" value="h-Physics" class="t1741" <?php if
          (in_array('h-Physics', $primary1)) { echo "checked" ; } ?>>
        <label for="Physics" class="t1740">Physics</label>
      </div>
      <div class="t1739">
        <input name="subjects[]" type="checkbox" placeholder="Chemistry" value="h-Chemistry" class="t1741" <?php if
          (in_array('h-Chemistry', $primary1)) { echo "checked" ; } ?>>
        <label for="Chemistry" class="t1740">Chemistry</label>
      </div>
      <div class="t1739">
        <input name="subjects[]" type="checkbox" placeholder="Human Biology" value="h-Human Biology" class="t1741" <?php
          if (in_array('h-Human Biology', $primary1)) { echo "checked" ; } ?>>
        <label for="Human Biology" class="t1740">Human Biology</label>
      </div>
      <div class="t1739">
        <input name="subjects[]" type="checkbox" placeholder="Psychology" value="h-Psychology" class="t1741" <?php if
          (in_array('h-Psychology', $primary1)) { echo "checked" ; } ?>>
        <label for="Psychology" class="t1740">Psychology</label>
      </div>
      <div class="t1739">
        <input name="subjects[]" type="checkbox" placeholder="UCAT" value="h-UCAT" class="t1741" <?php if
          (in_array('h-UCAT', $primary1)) { echo "checked" ; } ?>>
        <label for="UCAT" class="t1740">UCAT (University Clinical Aptitude Test)</label>
      </div>
      <div class="t1739">
        <input name="subjects[]" type="checkbox" placeholder="Geography" value="h-Geography" class="t1741" <?php if
          (in_array('h-Geography', $primary1)) { echo "checked" ; } ?>>
        <label for="Geography" class="t1740">Geography</label>
      </div>
      <div class="t1739">
        <input name="subjects[]" type="checkbox" placeholder="Politics and Law" value="h-Politics and Law" class="t1741"
          <?php if (in_array('h-Politics and Law', $primary1)) { echo "checked" ; } ?>>
        <label for="Politics and Law" class="t1740">Politics and Law</label>
      </div>
    </div>
    <div class="t1728">
      <div class="t1729">
        <input name="subjects[]" type="checkbox" value="h-English" placeholder="English" class="t1731" <?php if
          (in_array('English', $primary1)) { echo "checked" ; } ?>>
        <label for="English" class="t1730">English</label>
      </div>
      <div class="t1732">
        <input name="subjects[]" type="checkbox" value="h-All Mathematics" placeholder="All Mathematics" class="t1734"
          <?php if (in_array('h-All Mathematics', $primary1)) { echo "checked" ; } ?>>
        <label for="All Mathematics" class="t1733">All Mathematics</label>
      </div>
      <div class="t1735">
        <input name="subjects[]" type="checkbox" placeholder="Mathematics Essential" value="h-Mathematics Essential"
          class="t1737" <?php if (in_array('h-Mathematics Essential', $primary1)) { echo "checked" ; } ?>>
        <label for="Mathematics Essential" class="t1736">Mathematics Essential</label>
      </div>
      <div class="t1735">
        <input name="subjects[]" type="checkbox" placeholder="Mathematics Specialist" value="h-Mathematics Specialist"
          class="t1737" <?php if (in_array('h-Mathematics Specialist', $primary1)) { echo "checked" ; } ?>>
        <label for="Mathematics Specialist" class="t1736">Mathematics Specialist</label>
      </div>
      <div class="t1735">
        <input name="subjects[]" type="checkbox" placeholder="Mathematics Applications"
          value="h-Mathematics Applications" class="t1737" <?php if (in_array('Mathematics Applications', $primary1)) {
          echo "checked" ; } ?>>
        <label for="Mathematics Applications" class="t1736">Mathematics Applications</label>
      </div>
      <div class="t1735">
        <input name="subjects[]" type="checkbox" placeholder="Mathematics Foundation" value="h-Mathematics Foundation"
          class="t1737" <?php if (in_array('h-Mathematics Foundation', $primary1)) { echo "checked" ; } ?>>
        <label for="Mathematics Foundation" class="t1736">Mathematics Foundation</label>
      </div>
      <div class="t1735">
        <input name="subjects[]" type="checkbox" placeholder="Mathematics Preliminary" value="h-Mathematics Preliminary"
          class="t1737" <?php if (in_array('h-Mathematics Preliminary', $primary1)) { echo "checked" ; } ?>>
        <label for="Mathematics Preliminary" class="t1736">Mathematics Preliminary</label>
      </div>
      <div class="t1735">
        <input name="subjects[]" type="checkbox" placeholder="Accounting" value="h-Accounting" class="t1737" <?php if
          (in_array('h-Accounting', $primary1)) { echo "checked" ; } ?>>
        <label for="Accounting" class="t1736">Accounting</label>
      </div>
      <div class="t1735">
        <input name="subjects[]" type="checkbox" placeholder="General Mathematics" value="h-General Mathematics"
          class="t1737" <?php if (in_array('h-General Mathematics', $primary1)) { echo "checked" ; } ?>>
        <label for="General Mathematics" class="t1736">General Mathematics</label>
      </div>
      <div class="t1735">
        <input name="subjects[]" type="checkbox" placeholder="Mathematical Methods" value="h-Mathematical Methods"
          class="t1737" <?php if (in_array('h-Mathematical Methods', $primary1)) { echo "checked" ; } ?>>
        <label for="Mathematical Methods" class="t1736">Mathematical Methods</label>
      </div>
      <div class="t1735">
        <input name="subjects[]" type="checkbox" placeholder="Finance" value="h-Finance" class="t1737" <?php if
          (in_array('h-Finance', $primary1)) { echo "checked" ; } ?>>
        <label for="Finance" class="t1736">Finance</label>
      </div>
      <div class="t1735">
        <input name="subjects[]" type="checkbox" placeholder="Economics" value="h-Economics" class="t1737" <?php if
          (in_array('h-Economics', $primary1)) { echo "checked" ; } ?>>
        <label for="Economics" class="t1736">Economics</label>
      </div>
    </div>
    <div class="t1717">
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="Arabic" value="h-Arabic" class="t1720" <?php if
          (in_array('h-Arabic', $primary1)) { echo "checked" ; } ?>>
        <label for="Arabic" class="t1719">Arabic</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="Mandarin" value="h-Mandarin" class="t1720" <?php if
          (in_array('h-Mandarin', $primary1)) { echo "checked" ; } ?>>
        <label for="Mandarin" class="t1719">Mandarin</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="French" value="h-French" class="t1720" <?php if
          (in_array('s-French', $primary1)) { echo "checked" ; } ?>>
        <label for="French" class="t1719">French</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="German" value="h-German" class="t1720" <?php if
          (in_array('h-German', $primary1)) { echo "checked" ; } ?>>
        <label for="German" class="t1719">German</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="Indonesian" value="h-Indonesian" class="t1720" <?php if
          (in_array('h-Indonesian', $primary1)) { echo "checked" ; } ?>>
        <label for="Indonesian" class="t1719">Indonesian</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="Italian" value="h-Italian" class="t1720" <?php if
          (in_array('h-Italian', $primary1)) { echo "checked" ; } ?>>
        <label for="Italian" class="t1719">Italian</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="Korean" value="h-Korean" class="t1720" <?php if
          (in_array('h-Korean', $primary1)) { echo "checked" ; } ?>>
        <label for="Korean" class="t1719">Korean</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="Modern Greek" value="h-Modern Greek" class="t1720" <?php if
          (in_array('h-Modern Greek', $primary1)) { echo "checked" ; } ?>>
        <label for="Modern Greek" class="t1719">Modern Greek</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="Spanish" value="h-Spanish" class="t1720" <?php if
          (in_array('h-Spanish', $primary1)) { echo "checked" ; } ?>>
        <label for="Spanish" class="t1719">Spanish</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="Vietnamese" value="h-Vietnamese" class="t1720" <?php if
          (in_array('h-Vietnamese', $primary1)) { echo "checked" ; } ?>>
        <label for="Vietnamese" class="t1719">Vietnamese</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="Japanese" value="h-Japanese" class="t1720" <?php if
          (in_array('h-Japanese', $primary1)) { echo "checked" ; } ?>>
        <label for="Japanese" class="t1719">Japanese</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="Aboriginal and Torres Strait Islander"
          value="h-Aboriginal and Torres Strait Islander" class="t1720" <?php if (in_array('h-Aboriginal and Torres
          Strait Islander', $primary1)) { echo "checked" ; } ?>>
        <label for="Aboriginal and Torres Strait Islander" class="t1719">Aboriginal and Torres Strait Islander</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="Latin" value="h-Latin" class="t1720" <?php if
          (in_array('h-Latin', $primary1)) { echo "checked" ; } ?>>
        <label for="Latin" class="t1719">Latin</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="Classical Greek" value="h-Classical Greek" class="t1720"
          <?php if (in_array('h-Classical Greek', $primary1)) { echo "checked" ; } ?>>
        <label for="Classical Greek" class="t1719">Classical Greek</label>
      </div>
      <div class="t1718">
        <input name="subjects[]" type="checkbox" placeholder="Turkish" value="h-Turkish" class="t1720" <?php if
          (in_array('h-Turkish', $primary1)) { echo "checked" ; } ?>>
        <label for="Turkish" class="t1719">Turkish</label>
      </div>
    </div>
    <div class="t1742">
      <div class="t1743">
        <input name="subjects[]" type="checkbox" placeholder="Applied Information Technology"
          value="h-Applied Information Technology" class="t1744" <?php if (in_array('h-Applied Information Technology',
          $primary1)) { echo "checked" ; } ?>>
        <label for="Applied Information Technology" class="t1745">Applied Information Technology</label>
      </div>
      <div class="t1743">
        <input name="subjects[]" type="checkbox" placeholder="Automotive Engineering and Technology"
          value="h-Automotive Engineering and Technology" class="t1744" <?php if (in_array('h-Automotive Engineering and
          Technology', $primary1)) { echo "checked" ; } ?>>
        <label for="Automotive Engineering and Technology" class="t1745">Automotive Engineering</label>
      </div>
      <div class="t1743">
        <input name="subjects[]" type="checkbox" placeholder="Computer Science" value="h-Computer Science" class="t1744"
          <?php if (in_array('h-Computer Science', $primary1)) { echo "checked" ; } ?>>
        <label for="Computer Science" class="t1745">Computer Science</label>
      </div>
      <div class="t1743">
        <input name="subjects[]" type="checkbox" placeholder="Basic Programming Languages"
          value="h-Basic Programming Languages" class="t1744" <?php if (in_array('h-Basic Programming Languages',
          $primary1)) { echo "checked" ; } ?>>
        <label for="Basic Programming Languages" class="t1745">Basic Programming Languages</label>
      </div>
      <div class="t1743">
        <input name="subjects[]" type="checkbox" placeholder="Python" value="h-Python" class="t1744" <?php if
          (in_array('h-Python', $primary1)) { echo "checked" ; } ?>>
        <label for="Python" class="t1745">Python</label>
      </div>
      <div class="t1743">
        <input name="subjects[]" type="checkbox" placeholder="Java" value="h-Java" class="t1744" <?php if
          (in_array('h-Java', $primary1)) { echo "checked" ; } ?>>
        <label for="Java" class="t1745">Java</label>
      </div>
      <div class="t1743">
        <input name="subjects[]" type="checkbox" placeholder="Database Languages" value="h-Database Languages"
          class="t1744" <?php if (in_array('h-Database Languages', $primary1)) { echo "checked" ; } ?>>
        <label for="Database Languages" class="t1745">Database Languages</label>
      </div>
      <div class="t1743">
        <input name="subjects[]" type="checkbox" placeholder="React" value="h-React" class="t1744" <?php if
          (in_array('h-React', $primary1)) { echo "checked" ; } ?>>
        <label for="React" class="t1745">React</label>
      </div>
      <div class="t1743">
        <input name="subjects[]" type="checkbox" placeholder="C" value="h-C" class="t1744" <?php if (in_array('h-C',
          $primary1)) { echo "checked" ; } ?>>
        <label for="C" class="t1745">C</label>
      </div>
      <div class="t1743">
        <input name="subjects[]" type="checkbox" placeholder="R" value="h-R" class="t1744" <?php if (in_array('h-R',
          $primary1)) { echo "checked" ; } ?>>
        <label for="R" class="t1745">R</label>
      </div>
      <div class="t1743">
        <input name="subjects[]" type="checkbox" placeholder="PHP" value="h-PHP" class="t1744" <?php if
          (in_array('h-PHP', $primary1)) { echo "checked" ; } ?>>
        <label for="PHP" class="t1745">PHP</label>
      </div>
      <div class="t1743">
        <input name="subjects[]" type="checkbox" placeholder="Typescript" value="h-Typescript" class="t1744" <?php if
          (in_array('h-Typescript', $primary1)) { echo "checked" ; } ?>>
        <label for="Typescript" class="t1745">Typescript</label>
      </div>
      <div class="t1743">
        <input name="subjects[]" type="checkbox" placeholder="Swift" value="h-Swift" class="t1744" <?php if
          (in_array('h-Swift', $primary1)) { echo "checked" ; } ?>>
        <label for="Swift" class="t1745">Swift</label>
      </div>
    </div>
    <div class="t1721">
      <h3 class="t1722">Exams Preparation</h3>
      <div class="t1723">
        <div class="t1724">
          <div class="t1725">
            <input name="subjects[]" type="checkbox" placeholder="NAPLAN" value="e-NAPLAN" class="t1727" <?php if
              (in_array('e-NAPLAN', $primary1)) { echo "checked" ; } ?>>
            <label for="NAPLAN" class="t1726">NAPLAN</label>
          </div>
          <div class="t1725">
            <input name="subjects[]" type="checkbox" placeholder="GATE" value="e-GATE" class="t1727" <?php if
              (in_array('e-GATE', $primary1)) { echo "checked" ; } ?>>
            <label for="GATE" class="t1726">GATE</label>
          </div>
          <div class="t1725">
            <input name="subjects[]" type="checkbox" placeholder="ATAR / WACE " value="e-ATAR-WACE " class="t1727" <?php
              if (in_array('e-ATAR-WACE', $primary1)) { echo "checked" ; } ?>>
            <label for="ATAR" class="t1726">ATAR / WACE </label>
          </div>
          <div class="t1725">
            <input name="subjects[]" type="checkbox" placeholder="English" value="e-OLNA" class="t1727" <?php if
              (in_array('e-OLNA', $primary1)) { echo "checked" ; } ?>>
            <label for="OLNA" class="t1726">OLNA</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="t1747">
                <input type="submit" class="t1748 button-tertiary" value="Update">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </form>
                    </container>
                </section>
                <!-- Component: Footer-->
                <div class="t1686">
                    <section class="t131">
                        <container class="t134">
                            <div class="t133">
                                <div class="t135">
                                    <img src="assets/36dd8b0c43e809de25402efe13a86734_4604.svg" loading="lazy" alt="null" class="t136">
                                    <p class="t137">We are always open to discuss your project and improve your online presence.</p>
                                    <div class="t147">
                                        <a class="t148">
                                            <img src="assets/9cdaff445c042e1a8bc7b0bca218b1ed_597.svg" loading="lazy" alt="null" class="t149">
                                        </a>
                                        <a class="t148">
                                            <img src="assets/3ce8823419a832a06bd4d16130a68d60_1415.svg" loading="lazy" alt="null" class="t149">
                                        </a>
                                        <a class="t148">
                                            <img src="assets/f96f5a08c1c7531a9bbedae562cfc8c9_3216.svg" loading="lazy" alt="null" class="t149">
                                        </a>
                                    </div>
                                    <div class="t93">
                                        <div class="t90">
                                            <p class="t144 text-18 text-18">Email us at:</p>
                                            <a href="mailto:contact@website.com" link-type="email" class="t143">contact@website.com</a>
                                        </div>
                                        <a page-id="6" href="become-tutor.html" class="t582 button-tertiary button-tertiary">Become Tutor</a>
                                    </div>
                                </div>
                                <div class="t145">
                                    <div class="t319">
                                        <h2 class="t150">Contact</h2>
                                        <p class="t146">We are always open to discuss your project, improve your online presence and help with your UX/UI design challenges.</p>
                                    </div>
                                    <div class="t583">
                                        <a href="tel:+61340204345" link-type="phone" class="t543">
                                            <ul class="t299">
                                                <li class="t300">
                                                    <img src="assets/e7a3345498a02da8b46d2a24af2a7d8b_506.svg" loading="lazy" alt="null" class="t301">
                                                    <span class="t544">034 02 04 345</span>
                                                </li>
                                            </ul>
                                        </a>
                                        <a href="tel:+61340204345" link-type="phone" class="t543">
                                            <ul class="t299">
                                                <li class="t300">
                                                    <img src="assets/b6e20c909b9d9009baed735e5659e56b_1024.svg" loading="lazy" alt="null" class="t301">
                                                    <span class="t544">034 02 04 345</span>
                                                </li>
                                            </ul>
                                        </a>
                                        <a href="mailto:contact@perthtutorswa.com" link-type="email" target="_BLANK" class="t543">
                                            <ul class="t299">
                                                <li class="t300">
                                                    <img src="assets/4059607622aab9fa33b7de5860fe6bba_353.svg" loading="lazy" alt="null" class="t301">
                                                    <span class="t544">contact@perthtutorswa.com</span>
                                                </li>
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="t302">
                                <div class="t317">
                                    <h3 class="t318">Quick Links</h3>
                                    <ul class="t571">
                                        <li class="t574">
                                            <a page-id="2" href="index.html" class="t575">Home</a>
                                        </li>
                                        <li class="t576">
                                            <a page-id="4" href="pricing.html" class="t577 list-button list-button">Pricing</a>
                                        </li>
                                        <li class="t572">
                                            <a page-id="3" href="about-us.html" class="t573 list-button list-button">About Us</a>
                                        </li>
                                        <li class="t580">
                                            <a page-id="5" href="contact-us.html" class="t581 list-button list-button">Contact Us</a>
                                        </li>
                                        <li class="t578">
                                            <a page-id="6" href="become-tutor.html" class="t579 list-button list-button">Become Tutor</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="t303">
                                    <h3 class="t306">Subjects</h3>
                                    <ul class="t304">
                                        <li class="t305">
                                            <a class="t311">Math</a>
                                        </li>
                                        <li class="t327">
                                            <a class="t328">Algebra</a>
                                        </li>
                                        <li class="t325">
                                            <a class="t326">Accounting</a>
                                        </li>
                                        <li class="t329">
                                            <a class="t330">Maths Methods</a>
                                        </li>
                                        <li class="t323">
                                            <a class="t324">Math Specialist</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="t545">
                                    <h3 class="t557">Subjects</h3>
                                    <ul class="t546">
                                        <li class="t547">
                                            <a class="t548">Calculus</a>
                                        </li>
                                        <li class="t549">
                                            <a class="t550">Statistics</a>
                                        </li>
                                        <li class="t551">
                                            <a class="t552">English</a>
                                        </li>
                                        <li class="t555">
                                            <a class="t556">Essay Writing</a>
                                        </li>
                                        <li class="t553">
                                            <a class="t554">Chemistry</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="t558">
                                    <h3 class="t570">Subjects</h3>
                                    <ul class="t559">
                                        <li class="t560">
                                            <a class="t561">Psychology</a>
                                        </li>
                                        <li class="t564">
                                            <a class="t565">Study Skills</a>
                                        </li>
                                        <li class="t568">
                                            <a class="t569">Human Biology</a>
                                        </li>
                                        <li class="t562">
                                            <a class="t563">Business</a>
                                        </li>
                                        <li class="t566">
                                            <a class="t567">Economics</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="t312">
                                <div class="t309">
                                    <h3 class="t310">Languages</h3>
                                    <ul class="t331">
                                        <li class="t332">
                                            <a class="t333">Italian</a>
                                        </li>
                                        <li class="t340">
                                            <a class="t341">Japanese</a>
                                        </li>
                                        <li class="t338">
                                            <a class="t339">Mandarin</a>
                                        </li>
                                        <li class="t336">
                                            <a class="t337">Spanish</a>
                                        </li>
                                        <li class="t334">
                                            <a class="t335">French</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="t307">
                                    <h3 class="t308">Competitive Exams</h3>
                                    <ul class="t342">
                                        <li class="t343">
                                            <a class="t344">NAPLAN</a>
                                        </li>
                                        <li class="t351">
                                            <a class="t352">GATE</a>
                                        </li>
                                        <li class="t349">
                                            <a class="t350">OLNA</a>
                                        </li>
                                        <li class="t347">
                                            <a class="t348">UMAT</a>
                                        </li>
                                        <li class="t345">
                                            <a class="t346">ESL</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="t313">
                                    <h3 class="t314">Locations</h3>
                                    <ul class="t353">
                                        <li class="t354">
                                            <a class="t355">Piara Waters</a>
                                        </li>
                                        <li class="t362">
                                            <a class="t363">North Coogee</a>
                                        </li>
                                        <li class="t360">
                                            <a class="t361">East Perth</a>
                                        </li>
                                        <li class="t358">
                                            <a class="t359">Claremont</a>
                                        </li>
                                        <li class="t356">
                                            <a class="t357">West Perth</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="t315">
                                    <h3 class="t316">Locations</h3>
                                    <ul class="t364">
                                        <li class="t365">
                                            <a class="t366">Willetton</a>
                                        </li>
                                        <li class="t373">
                                            <a class="t374">Northbridge</a>
                                        </li>
                                        <li class="t371">
                                            <a class="t372">Cottesloe</a>
                                        </li>
                                        <li class="t369">
                                            <a class="t370">Churchlands</a>
                                        </li>
                                        <li class="t367">
                                            <a class="t368">Floreat</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="t2158">
                                    <h3 class="t2159">Locations</h3>
                                    <ul class="t2160">
                                        <li class="t2161">
                                            <a class="t2162">Forrestdale</a>
                                        </li>
                                        <li class="t2169">
                                            <a class="t2170">Brabham</a>
                                        </li>
                                        <li class="t2167">
                                            <a class="t2168">Henley Brook</a>
                                        </li>
                                        <li class="t2165">
                                            <a class="t2166">Alkimos</a>
                                        </li>
                                        <li class="t2163">
                                            <a class="t2164">Eglinton</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="t2171">
                                    <h3 class="t2172">Locations</h3>
                                    <ul class="t2173">
                                        <li class="t2174">
                                            <a class="t2175">Harrisdale</a>
                                        </li>
                                        <li class="t2182">
                                            <a class="t2183">Casuarina</a>
                                        </li>
                                        <li class="t2180">
                                            <a class="t2181">Wandi</a>
                                        </li>
                                        <li class="t2178">
                                            <a class="t2179">Karnup</a>
                                        </li>
                                        <li class="t2176">
                                            <a class="t2177">North Baldivis</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="t320">
                                <span class="t321">Copyright © 2023,  Perth Tutors Wa         </span>
                                <span class="t322">Powered by Elite Ranking Services.com</span>
                            </div>
                        </container>
                    </section>
                </div>
            </div>

        </main>
    </div>

    <div id="dh-modal">
        <items for="md.modal" field="html"></items>
    </div>

    
</body>
</html>