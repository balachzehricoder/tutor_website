<?php
error_reporting(0);
session_start();
include 'config.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve updated information from the form
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $suburb = $_POST['suburb'];
    $status = implode(" ", $_POST['subjects']); // Assuming status is an array from checkboxes
    $tutoringmode = implode(" ", $_POST['tutoring_mode']); // Assuming tutoring_mode is an array from checkboxes
    $messages = $_POST['messages'];


    // Update query
    $query = "UPDATE students SET 
              name='$name', 
              phone='$phone', 
              email='$email', 
              subject='$subject', 
              suburb='$suburb', 
              status='$status', 
              tutoringmode='$tutoringmode' ,
              messages='$messages'
              WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        echo "User data updated successfully";
    } else {
        echo "Error updating user data: " . $conn->error;
    }
}

// Fetching user data to pre-fill the form fields
$query = "SELECT id, name, phone, email, subject, suburb, consent, status, messages, tutoringmode FROM students WHERE id='$id'";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Populate the form with user data
    // Create HTML form elements to display the data and allow updates


    
$radio = $row['status'];

$radio1 = explode(" ", $radio);


$radio2 = $row['tutoringmode'];

$radio3 = explode(" ", $radio2);
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
    <title> Perth Tutors | Student Edit Profile </title>
    <meta property="og:title" content="Perth Tutors | Student Edit Profile" />
    <meta name="twitter:title" content="Perth Tutors | Student Edit Profile" />

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
            <div class="t2036 dh-body">
                <!-- Component: Student Login Header-->
                <div class="t2037">
                    <section class="t1872">
                        <container class="t1873">
                            <div class="t1874">
                                <a page-id="2" href="index.html" class="t1875">
                                    <img src="assets/36dd8b0c43e809de25402efe13a86734_4604.svg" loading="lazy" alt="null" class="t1876">
                                </a>
                                <div id="menu" class="t1877">
                                    <a page-id="21" href="student-homepage.html" class="t1880">Home</a>
                                    <a page-id="22" href="student-chat.html" class="t1880">Chat</a>
                                    <a page-id="28" href="student-profile.html" class="t2607">
                                        <img src="assets/4474856564362a26acc1b8706c0faa3c_597.svg" loading="lazy" alt="null" class="t2604">
                                    </a>
                                    <div class="t1878">
                                        <a class="t1879 button-tertiary button-tertiary">Log Out</a>
                                    </div>
                                </div>
                                <div dh-transform="hamburger" dh-transform-options="a:menu|b:fade|c:false|d:true" class="t1881">
                                    <img src="assets/4474856564362a26acc1b8706c0faa3c_597.svg" loading="lazy" alt="null" class="t1882">
                                </div>
                            </div>
                        </container>
                    </section>
                </div>
                <section class="t2038">
                    <container class="t2047">
                        <h1 class="t2052">Edit Your Profile</h1>
                        <div class="t2048">
                            <form class="t2049" method="post" >
                                <div class="t2643">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                    <div class="t2647">
                                        <label class="t2649 field-label">Name</label>
                                        <input name="name" required="true" value="<?php echo $row['name']; ?>"placeholder="Name" class="t2648 main-input">
                                    </div>
                                    <div class="t2644">
                                        <label class="t2645 field-label">Phone</label>
                                        <input name="phone" type="tel" value="<?php echo $row['phone']; ?>"required="true" placeholder="Phone" class="t2646">
                                    </div>
                                    <div class="t2650">
                                        <label class="t2651 field-label">Email</label>
                                        <input name="email" type="email"  value="<?php echo $row['email']; ?>"required="true" placeholder="Email" class="t2652">
                                    </div>
                                   
                                    <div class="t2656">
                                        <label for="Subject" class="t2657 field-label">Subject</label>
                                        <input name="subject" type="text" placeholder="Subject" value="<?php echo $row['subject']; ?>"class="t2658">
                                    </div>
                                    <div class="t2659">
                                        <label for="Suburb You Live in" class="t2660 field-label">Your Address (Suburb You Live in )</label>
                                        <input name="suburb" type="text" value="<?php echo $row['suburb']; ?>"required="true" placeholder="Enter Suburb" class="t2661">
                                    </div>
                                    <div class="t2662">
                                        <label class="t2673 field-label">I am a...</label>
                                        <div class="t2663">
                                            <div class="t2667">
                                                <input name="subjects[]" type="radio" value="Student" placeholder="Student" class="t2669" <?php if
      (in_array('Student', $radio1)) { echo "checked" ; } ?> >
                                                <label for="Student" class="t2668">Student</label>
                                            </div>
                                            <div class="t2670">
                                                <input name="subjects[]" type="radio" value="Parent" placeholder="Parent" class="t2672" <?php if
      (in_array('Parent', $radio1)) { echo "checked" ; } ?> >
                                                <label for="Parent" class="t2671">Parent</label>
                                            </div>
                                            <div class="t2664">
                                                <input name="subjects[]" type="radio" value="Other" placeholder="Other" class="t2666" <?php if
      (in_array('Other', $radio1)) { echo "checked" ; } ?> >
                                                <label for="Other" class="t2665">Other</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="t2674">
                                        <label for="Tutoring Mode" class="t2675 field-label">Tutoring Mode</label>
                                        <div class="t2676">
                                            <div class="t2680">
                                                <input name="tutoring_mode[]" type="radio" value="Online" placeholder="Online" class="t2682" <?php if
      (in_array('Online', $radio3)) { echo "checked" ; } ?> >
                                                <label for="Online" class="t2681">Online</label>
                                            </div>
                                            <div class="t2683">
                                                <input name="tutoring_mode[]" type="radio" value="In-Person" placeholder="In-Person" class="t2685" <?php if
      (in_array('In-Person', $radio3)) { echo "checked" ; } ?> >
                                                <label for="In-Person" class="t2684">In-Person</label>
                                            </div>
                                            <div class="t2677">
                                                <input name="tutoring_mode[]" type="radio" value="Online/In-Person" placeholder="Online/In-Person" class="t2679" <?php if
      (in_array('Online/In-Person', $radio3)) { echo "checked" ; } ?> >
                                                <label for="Online/In-Person" class="t2678">Online/In-Person</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label for="Message" class="t2286 field-label">Message</label>
                                <textarea name="messages" class="t2285"><?php echo $row['messages']; ?></textarea>

                                <div class="t2050">
                                    <button type="submit" class="t2051 button-tertiary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </container>
                </section>
                <!-- Component: Footer-->
                <div class="t2039">
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