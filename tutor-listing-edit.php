<?php

session_start();
include 'config.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION["user_id"];
$query = "SELECT * FROM tutor_info WHERE id='$id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    foreach ($result as $row) {
        $full_name = $row['Name'];
        $email = $row['Email'];
        $phone = $row['Phone'];
        $address = $row['Address'];
        $rate = $row['Tutoring_rate'];
        $mode = $row['Tutoring_Mode'];
        $Experience = $row['Experience'];
        $Location = $row['Location'];
        $OtherSubject = $row['OtherSubject'];
        $iam = $row['I_am_a'];
        $img = $row['uploadimg'];
        $travel = $row['TravelPolicy'];

       

    }
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
    <title> Perth Tutors | Tutor Listing Edit </title>
    <meta property="og:title" content="Perth Tutors | Tutor Listing Edit" />
    <meta name="twitter:title" content="Perth Tutors | Tutor Listing Edit" />

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
            <div class="t584 dh-body">
                <!-- Component: Tutor Login Header-->
                <div class="t1683">
                    <section class="t1670">
                        <container class="t1671">
                            <div class="t1672">
                                <a page-id="2" href="index.html" class="t1677">
                                    <img src="assets/36dd8b0c43e809de25402efe13a86734_4604.svg" loading="lazy" alt="null" class="t1678">
                                </a>
                                <div id="menu" class="t1673">
                                    <a page-id="17" href="tutor-homepage.html" class="t1674">Home</a>
                                    <a page-id="19" link-type="page" href="tutor-chat.html" class="t1674">Chat</a>
                                    <a page-id="26" href="student-messages.html" class="t1674">Messages</a>
                                    <a page-id="12" href="tutor-listing-edit.php" class="t2606">
                                        <img src="<?php echo $img; ?>" loading="lazy" alt="null" class="t2605">
                                    </a>
                                    <div class="t1675">
                                        <a class="t1676 button-tertiary button-tertiary" href="logout.php" >Log Out</a>
                                    </div>
                                </div>
                                <div dh-transform="hamburger" dh-transform-options="a:menu|b:fade|c:false|d:true" class="t1679">
                                    <img src="assets/4474856564362a26acc1b8706c0faa3c_597.svg" loading="lazy" alt="null" class="t1680">
                                </div>
                            </div>
                        </container>
                    </section>
                </div>
                <section class="t1445">
                    <container class="t1446">
                        <div class="t1447">
                            <div class="t1479">
                                <img src="<?php echo $img ?>" loading="lazy" alt="null" class="t1485">
                                <div class="t1480">
                                    <img src="assets/d645592a6155cc52c59f3063de05e897_199.svg" loading="lazy" alt="null" class="t1481">
                                    <div class="t1482">
                                        <span class="t1483">11</span>
                                        <span class="t1484"> Reviews</span>
                                    </div>
                                </div>
                            </div>
                            <div class="t1456">
                                <div class="t1457">
                                    <h1 class="t1458"><?php echo $full_name; ?></h1>
                                    <div class="t1459">
                                        <div class="t1469">
                                            <div class="t1470">
                                                <img src="assets/dfacef9814ef952ed0000260bb8d8050_405.svg" loading="lazy" alt="null" class="t1472">
                                                <span class="t1471"><?php echo $mode ?></span>
                                            </div>
                                            <div class="t1473">
                                                <img src="assets/4d2a4e71f6b3432a96c1c6b48e5df53a_336.svg" loading="lazy" alt="null" class="t1475">
                                                <span class="t1474"><?php echo $iam ?></span>
                                            </div>
                                        </div>
                                        <div class="t1460">
                                            <div class="t1464">
                                                <img src="assets/0bf6c00eb1aa8d187b2be33a83554222_434.svg" loading="lazy" alt="null" class="t1465">
                                                <div class="t1466">
                                                    <span class="t1468"><?php echo $Experience ?></span>
                                                    <span class="t1467"> Years Experience</span>
                                                </div>
                                            </div>
                                            <div class="t1461">
                                                <img src="assets/56f9c2651bab9c418820161723a65961_405.svg" loading="lazy" alt="null" class="t1462">
                                                <span class="t1463"><?php echo $Location ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="t1476">
                                        <h3 class="t1478">Other Subjects I can teach:</h3>
                                        <p class="t1477"><?php echo $OtherSubject ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="t1448">
                            <a page-id="20" href="tutor-edit-profile.php?id=<?php echo $_SESSION['user_id']; ?>" class="t1455 button-tertiary">Edit Profile</a>

                                <div class="t1449">
                                    <span class="t1450">Starting From:</span>
                                    <span class="t1451">
                                        <span class="t1452">$<?php echo $rate ?></span>
                                        <span class="t1453"> / hr</span>
                                    </span>
                                    <span class="t1454">1st lesson free</span>
                                </div>
                            </div>
                        </div>
                        <div class="t1486">
                            <div class="t1490">
                                <h3 class="t1491">About Tutor and Lesson</h3>
                                <p class="t1492">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="t1487">
                                <h3 class="t1488">Travel Policy</h3>
                                <p class="t1489"><?php echo $travel; ?></p>
                            </div>
                        </div>
                        <div class="t1493">
                            <div class="t1505">
                                <h4 class="t1506">Feedback</h4>
                            </div>
                            <?php 
                            
                            
                            
                            
                            include("config.php");
                            
                            $query = "SELECT * FROM reviews where user_id ='$id' AND approved = 1" ;
                            $result = $conn->query($query);
                            if($result->num_rows > 0){
                                foreach($result as $row){
                                    $Name = $row['user_name'];
                                    $message = $row['message'];
                                    $rating = $row['rating'];
                                                        
                                                        ?>
                                                        <div class="t1580">
                                                            <div class="t1581">
                                                                <h5 class="t1583"><?php echo $Name ?></h5>
                                                                <div class="t1584">
                                                                    <div class="t1585">
                                                                        <img src="assets/1e4908a905366a43e84318679cd81699_1380.svg" loading="lazy" alt="null" class="t1586">
                                                                    </div>
                                                                </div>
                                                                <p class="t1582"><?php echo 
                                                                $message ?></p>
                                                            </div>
                                                        </div>
                                                    
                                                    <?php }} ?>
                                                       
                                                        </div>
                                                        <div class="t1587">
                                                            <a class="t1588">
                                                                <span class="t1589">See more</span>
                                                                <img src="assets/ed72bb4c6e5915ac23a5496d310a1e3a_253.svg" loading="lazy" alt="null" class="t1590">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </container>
                                            </section>
                <!-- Component: Footer-->
                <div class="t585">
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