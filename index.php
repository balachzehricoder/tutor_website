<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Custom Code Start  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
    <title> Perth Tutors | Homepage </title>
    <meta property="og:title" content="Perth Tutors | Homepage" />
    <meta name="twitter:title" content="Perth Tutors | Homepage" />

    <!-- Description  -->
    <meta name="description" content=""/>
    <meta property="og:description" content="" />
    <meta name="twitter:description" content="" />

    <!-- Favicon  -->
    <link rel="icon" type="image/x-icon" href="assets/d62b55cdb707d16aeaabfe2cfa8bb46c_497.svg">
    <link rel="apple-touch-icon" href="assets/d62b55cdb707d16aeaabfe2cfa8bb46c_497.svg">
    <link rel="stylesheet" href="css/tabs-cass.css">
    <script src="js/tabs-js.js"></script>

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
    <meta name="robots" content="index, follow">

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
    <link rel="stylesheet" href="css/tabs-css.css">
    <script src="js/tabs-js.js"></script>

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
            <div class="t13 dh-body">
                <!-- Component: Navbar-->
                <div class="t80">
                    <section class="t85">
                        <container class="t82">
                            <div class="t83">
                                <a page-id="2" href="index.html" class="t120">
                                    <img src="assets/36dd8b0c43e809de25402efe13a86734_4604.svg" loading="lazy" alt="null" class="t86">
                                </a>
                                <div id="menu" class="t84">
                                    <a page-id="2" href="index.html" class="t162">Home</a>
                                    <a page-id="3" href="about-us.html" class="t162">About us</a>
                                    <a page-id="4" href="pricing.html" class="t162">Pricing</a>
                                    <a page-id="5" href="contact-us.html" class="t162">Contact</a>
                                    <a page-id="14" href="login-page.html" class="t162">Login</a>
                                    <a page-id="25" href="signup.html" class="t1070 button-tertiary button-tertiary">Sign up</a>
                                </div>
                                <div dh-transform="hamburger" dh-transform-options="a:menu|b:fade|c:false|d:true" class="t94 142 142">
                                    <div class="t91"></div>
                                    <div class="t91"></div>
                                    <div class="t91"></div>
                                </div>
                            </div>
                        </container>
                    </section>
                </div>
                <section class="t123">
                    <container class="t40">
                        <div class="t139">
                            <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t31">
                                <h1 class="t233">Empowering Startups with Solutions</h1>
                                <p class="t34">At our company, we are passionate about empowering early startups with top-notch web solutions. Our talented team of experts combines innovative design, seamless user experience, and advanced technology to create websites that not only impress but also drive results.</p>
                                <div class="t122">
                                    <a href="contact-us.html" page-id="5" class="t37 button-tertiary">Contact Us</a>
                                </div>
                            </div>
                            <img src="assets/6c38022497e3f8a53da7b044fabbaef5_36880.jpeg" loading="lazy" alt="null" class="t693">
                        </div>



                       

<section class="t29">
                    <container class="t38">
    <div class="div-tabs">
        <div class="tab-container">
            <button type="button" class="tab active" onclick="openTab(event, 'Online')">Online</button>
            <button type="button" class="tab" onclick="openTab(event, 'InPerson')">In-Person</button>
        </div>

        <div id="Online" class="tab-content active">
            <form class="search-container" method="get" action="tutor_search.php" >
                <input type="text" placeholder="Enter Subject" name="q">
                <button name="submit" type="submit" id="tabName" ><img src="search-icon.png" alt="Search"></button>
            </form>
        </div>

        <div id="InPerson" class="tab-content">
            <form class="search-container" method="get" action="tutor_search_wtih_location.php" >
                <input type="text" placeholder="Enter Subject" name="subject">
                <input type="text" placeholder="Search Location" name="location">
                <button type="submit"><img src="search-icon.png" alt="Search"></button>
            </form>
        </div>
    </div>
   
                    </container>
    </section>

                <section class="t29">
                    <container class="t38">
                        <div class="t36">
                            <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t229">
                                <div class="t260">
                                    <h2 class="t33">
                                        <span class="t244">How to </span>
                                        <span class="t245">Get Started?</span>
                                    </h2>
                                    <p class="t39">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                    <a page-id="5" href="contact-us.html" class="t43 link-arrow-blue">
                                        <span class="t42">Know more</span>
                                        <img src="assets/933053747a44f90e76b76d2e255336a4_270.svg" loading="lazy" alt="null" class="t41">
                                    </a>
                                </div>
                                <div class="t35">
                                    <div class="t247">
                                        <img src="assets/875270c328f21b61e955ec868a09701d_86612.png" loading="lazy" alt="null" class="t246">
                                    </div>
                                </div>
                            </div>
                            <div class="t124">
                                <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t234">
                                    <img src="assets/9b381b97f80de81fe0bd37a70c467273_1269.svg" loading="lazy" alt="null" class="t275">
                                    <h3 class="t130">Decide Tutoring Mode</h3>
                                    <p class="t32">Euismod faucibus turpis eu gravida mi. Pellentesque et velit aliquam .</p>
                                </div>
                                <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t248 icon-box">
                                    <img src="assets/9b381b97f80de81fe0bd37a70c467273_1269.svg" loading="lazy" alt="null" class="t249">
                                    <h3 class="t250">Select Tutor</h3>
                                    <p class="t251">Euismod faucibus turpis eu gravida mi. Pellentesque et velit aliquam .</p>
                                </div>
                                <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t252 icon-box">
                                    <img src="assets/9b381b97f80de81fe0bd37a70c467273_1269.svg" loading="lazy" alt="null" class="t253">
                                    <h3 class="t254">Fill Up the Form</h3>
                                    <p class="t255">Euismod faucibus turpis eu gravida mi. Pellentesque et velit aliquam .</p>
                                </div>
                                <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t256 icon-box">
                                    <img src="assets/9b381b97f80de81fe0bd37a70c467273_1269.svg" loading="lazy" alt="null" class="t257">
                                    <h3 class="t258">Start Tuition</h3>
                                    <p class="t259">Euismod faucibus turpis eu gravida mi. Pellentesque et velit aliquam .</p>
                                </div>
                            </div>
                        </div>
                    </container>
                    <container class="t694">
                        <div class="t695">
                            <div class="t696">
                                <img src="assets/b864362bf6b2d0cb1d6c9e3d42bffcbf_648.svg" loading="lazy" alt="null" class="t697">
                                <div class="t698">
                                    <span class="t699">Trusted By</span>
                                    <span class="t700">1000+ Students</span>
                                </div>
                            </div>
                            <div class="t701">
                                <img src="assets/e6fe2dc14fc346d08a037527b6e8e27c_595.svg" loading="lazy" alt="null" class="t705">
                                <div class="t702">
                                    <span class="t703">Experienced Tutors</span>
                                    <span class="t704">500+</span>
                                </div>
                            </div>
                            <div class="t706">
                                <img src="assets/d4f50bf52f9933d2ad6487a3ba3651d8_2322.svg" loading="lazy" alt="null" class="t707">
                                <div class="t708">
                                    <span class="t710">Classes</span>
                                    <span class="t709">9000+</span>
                                </div>
                            </div>
                        </div>
                    </container>
                </section>
                <section id="courses" class="t151">
                    <container class="t30">
                        <div class="t261">
                            <h2 class="t262">
                                <span class="t263">Academic Subjects, Languages & </span>
                                <span class="t465">Competitive </span>
                                <span class="t264">Exams Preparation</span>
                            </h2>
                            <p class="t265">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="t266">
                            <div class="t267">
                                <div class="t268">
                                    <img src="assets/d2c374ef7ec3feb6e76bcbaaf165c512_25693.jpeg" loading="lazy" alt="null" class="t269">
                                </div>
                                <div class="t271"></div>
                                <div class="t273">
                                    <h4 class="t270">Academic Subjects</h4>
                                    <p class="t466 short-p">I'm a university student studying Master of Teaching in secondary stream. I've completed the units regarding teaching junior and stream.  Graduate from university of wollongong. </p>
                                    <div class="t274">
                                        <a page-id="9" href="academic-subjects.html" class="t272 button-tertiary">Browse Subjects</a>
                                    </div>
                                </div>
                            </div>
                            <div class="t476">
                                <div class="t477">
                                    <img src="assets/6c38022497e3f8a53da7b044fabbaef5_36880.jpeg" loading="lazy" alt="null" class="t478">
                                </div>
                                <div class="t484"></div>
                                <div class="t479">
                                    <h4 class="t480">Languages</h4>
                                    <p class="t483 short-p">I'm a university student studying Master of Teaching in secondary stream. I've completed the units regarding teaching junior and stream.  Graduate from university of wollongong. </p>
                                    <div class="t481">
                                        <a page-id="10" href="language-tutoring.html" class="t482 button-tertiary">Browse Languages</a>
                                    </div>
                                </div>
                            </div>
                            <div class="t467">
                                <div class="t468">
                                    <img src="assets/d2c374ef7ec3feb6e76bcbaaf165c512_25693.jpeg" loading="lazy" alt="null" class="t469">
                                </div>
                                <div class="t475"></div>
                                <div class="t470">
                                    <h4 class="t471">Competitive Exams</h4>
                                    <p class="t474 short-p">I'm a university student studying Master of Teaching in secondary stream. I've completed the units regarding teaching junior and stream.  Graduate from university of wollongong. </p>
                                    <div class="t472">
                                        <a page-id="11" href="exams-tutoring.html" class="t473 button-tertiary">Browse Exams</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </container>
                </section>
                  <section class="t453">
                    <container class="t712">
                        <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t728">
                            <h2 class="t729">
                                <span class="t730">Browse From Our </span>
                                <span class="t731">Top Tutors</span>
                            </h2>
                            <p class="t732">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="t713">
                            <!-- div start -->
                            <?php
    // Assuming you have a database connection established in $conn variable
include("config.php");
    $query = "SELECT * FROM tutor_info LIMIT 6"; // Replace 'your_table_name' with your actual table name
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        foreach ($result as $row) {
            $id = $row['id'];
            $image = $row['uploadimg'];
            $price = $row['Tutoring_rate'];
            $location = $row['Location'];
            $description = $row['Experience'];
            $mode = $row['Tutoring_Mode'];
            $iam = $row['I_am_a'];
            $majorsubject = $row['MajorSubject'];
            $Name = $row['Name'];
            $bio = $row ['QExperience'];
            // Add other fields as needed

            // Escape output for security
            $escaped_description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
            // You should do the same for other variables if you plan to directly output them to HTML

            // Output HTML for each tutor card
            ?>
                                                        <div class="t714">
                                <div class="t715">
                                    <img src="<?php echo $image ?>" loading="lazy" alt="null" class="t722">
                                    <div class="t716">
                                        <span class="t719">$<?php echo $price ?> / h</span>
                                        <span class="t717"><?php echo $mode ?></span>
                                        <span class="t718"><?php echo $iam ?></span>
                                        <span class="t720"><?php echo $majorsubject ?></span>
                                        <span class="t721"><?php echo $location ?></span>
                                    </div>
                                </div>
                                <div class="t723">
                                    <h4 class="t724"><?php echo $Name ?></h4>
                                    <p class="t725"><?php echo $bio ?> </p>
                                </div>
                                <div class="t726">
                                    <a page-id="8" href="tutor-listing.php?id=<?php echo $id ?>" class="t727 button-tertiary">Contact Tutor</a>
                                </div>
                            </div>
                            <!-- div end -->
                           <?php }} ?>
                            </div>
                            
                            </div>
                        </div>
                        <div class="t733">
                            <a page-id="7" href="all-tutor-listings.php" class="t734 link-arrow-gold">
                                <span class="t735">See More Tutors</span>
                                <img src="assets/72f6d43ce8f67fb507895e21994eecf4_269.svg" loading="lazy" alt="null" class="t736">
                            </a>
                        </div>
                    </container>
                </section>
                <section class="t81">
                    <container class="t63">
                        <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t70">
                            <div class="t68">
                                <h3 class="t64">Tutors From All The Suburbs of Perth, WA</h3>
                                <p class="t69">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed.<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed.Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                                <ul class="t294">
                                    <li class="t295">Hamilton Hill</li>
                                    <li class="t295">Hamilton Hill</li>
                                    <li class="t295">Hamilton Hill</li>
                                    <li class="t295">Hamilton Hill</li>
                                    <li class="t296">Great Support</li>
                                    <li class="t296">Great Support</li>
                                    <li class="t296">Great Support</li>
                                    <li class="t296">Great Support</li>
                                </ul>
                                <a class="t297 button-tertiary">Brows all the suburbs</a>
                            </div>
                            <div class="t88">
                                <img src="assets/7c3aac580f53346c47b0b0aee96376c0_6290.jpeg" loading="lazy" alt="null" class="t298">
                            </div>
                        </div>
                    </container>
                </section>
                <section class="t276">
                    <container class="t277">
                        <div class="t280">
                            <h2 class="t281">What you’ve been saying</h2>
                        </div>
                        <div dh-transform="swiper" dh-transform-options="e:true|b:20|ra:2|rc:2|re:1|rg:1|a1:true|a:3" class="t278">
                            <div class="t279">
                                <div class="t287">
                                    <div class="t288">
                                        <img src="assets/63dc17a450e26eb91620ce3033839028_1169046.svg" loading="lazy" alt="null" class="t289">
                                    </div>
                                    <h5 class="t293">Trisha Lion</h5>
                                    <span class="t292">Hermes Clutch</span>
                                    <p class="t290">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce felis tellus, malesuada vel cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</p>
                                    <div class="t291"></div>
                                </div>
                                <div class="t287">
                                    <div class="t288">
                                        <img src="assets/08d7ac028b1e6bd06b195efbe3b3fac9_74954.jpeg" loading="lazy" alt="null" class="t289">
                                    </div>
                                    <h5 class="t293">Alessandra Roy</h5>
                                    <span class="t292">Hermes Clutch</span>
                                    <p class="t290">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce felis tellus, malesuada vel cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</p>
                                    <div class="t291"></div>
                                </div>
                                <div class="t287">
                                    <div class="t288">
                                        <img src="assets/f5d5a000be0c1ac57f08e67e83413c28_58072.jpeg" loading="lazy" alt="null" class="t289">
                                    </div>
                                    <h5 class="t293">Kate Ross</h5>
                                    <span class="t292">Hermes Clutch</span>
                                    <p class="t290">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce felis tellus, malesuada vel cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</p>
                                    <div class="t291"></div>
                                </div>
                                <div class="t287">
                                    <div class="t288">
                                        <img src="assets/63dc17a450e26eb91620ce3033839028_1169046.svg" loading="lazy" alt="null" class="t289">
                                    </div>
                                    <h5 class="t293">Trisha Lion</h5>
                                    <span class="t292">Hermes Clutch</span>
                                    <p class="t290">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce felis tellus, malesuada vel cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</p>
                                    <div class="t291"></div>
                                </div>
                                <div class="t287">
                                    <div class="t288">
                                        <img src="assets/63dc17a450e26eb91620ce3033839028_1169046.svg" loading="lazy" alt="null" class="t289">
                                    </div>
                                    <h5 class="t293">Trisha Lion</h5>
                                    <span class="t292">Hermes Clutch</span>
                                    <p class="t290">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce felis tellus, malesuada vel cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</p>
                                    <div class="t291"></div>
                                </div>
                                <div class="t287">
                                    <div class="t288">
                                        <img src="assets/63dc17a450e26eb91620ce3033839028_1169046.svg" loading="lazy" alt="null" class="t289">
                                    </div>
                                    <h5 class="t293">Trisha Lion</h5>
                                    <span class="t292">Hermes Clutch</span>
                                    <p class="t290">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce felis tellus, malesuada vel cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</p>
                                    <div class="t291"></div>
                                </div>
                            </div>
                        </div>
                        <div class="t282">
                            <div class="t283 text-38 arrow-prev">
                                <img src="assets/1e35d6a8e637664f0029c36068b6111e_616.svg" loading="lazy" alt="null" class="t284">
                            </div>
                            <div class="t285 text-38 arrow-next">
                                <img src="assets/8163cfb25330526757e92069310dc95c_624.svg" loading="lazy" alt="null" class="t286">
                            </div>
                        </div>
                    </container>
                </section>
                <section dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t235">
                    <container class="t488">
                        <div class="t489">
                            <div class="t490"></div>
                            <a class="t499">
                                <img src="null" loading="lazy" alt="null" class="t500">
                            </a>
                            <div class="t491">
                                <h2 class="t492">Tutoring Inquiries</h2>
                                <div class="t2057 dh-embed"><link rel='stylesheet' href='https://app.ligna.io/api/data/css/style.php?did=7959'>
<!-- <script id='ligna-dataform' form-id ='7959' type='text/javascript' src='https://app.ligna.io/api/data/dataforms.js' async defer></script> -->
<div id="custom-ligna-dataform"> </div></div>
                            </div>
                            <div class="t493">
                                <div class="t494">
                                    <h3 class="t495">Contact Information</h3>
                                    <p class="t501">We're happy to answer your questions and provide more information about our programs, tutors, and approach.</p>
                                    <div class="t496">
                                        <img src="assets/a9db1fc21a1282aa16bad292dc599fda_360.svg" loading="lazy" alt="null" class="t497">
                                        <a href="mailto:contact@perthtutorswa.com" link-type="email" class="t498">contact@perthtutorswa.com</a>
                                    </div>
                                    <div class="t496">
                                        <img src="assets/c93c7869d477fe958c03655dd007a56a_434.svg" loading="lazy" alt="null" class="t497">
                                        <a href="mailto:contact@perthtutorswa.com" link-type="page" class="t498">08:00AM - 9:00PM</a>
                                    </div>
                                    <div class="t496">
                                        <img src="assets/2a1f23d699016aa8442ee6b1fdefaf68_733.svg" loading="lazy" alt="null" class="t497">
                                        <a href="tel:+610863777346" link-type="phone" class="t498">(08) 63 777 346</a>
                                    </div>
                                    <div class="t496">
                                        <img src="assets/e22c31f2354c16206a2f27ca8f86a01c_483.svg" loading="lazy" alt="null" class="t497">
                                        <a href="mailto:contact@perthtutorswa.com" link-type="page" class="t498">Perth WA 6000</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </container>
                </section>
                <!-- Component: Footer-->
                <div class="t142">
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
    <script>
    $(document).ready(function() {
      $('#location').keyup(function() {
        var query = $(this).val();
        if (query !== '') {
          $.ajax({
            url: "locationname.php",
            method: "post",
            data: { query: query },
            success: function(data) {
              $('#locationame').fadeIn();
              $('#locationame').html(data);
            }
          });
        } else {
          $('#locationame').fadeOut();
          $('#locationame').html("");
        }
      });
  
      $(document).on('click', '#locationame li', function() {
        $('#location').val($(this).text());
        $('#locationame').fadeOut();
      });
    });
  </script>
    
</body>
</html>