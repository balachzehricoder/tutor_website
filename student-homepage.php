<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login-page.html");
    exit();
}?>

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
    <title> Perth Tutors | Student Homepage </title>
    <meta property="og:title" content="Perth Tutors | Student Homepage" />
    <meta name="twitter:title" content="Perth Tutors | Student Homepage" />

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
            <div class="t1860 dh-body">
                <!-- Component: Student Login Header-->
                <div class="t2035">
                    <section class="t1872">
                        <container class="t1873">
                            <div class="t1874">
                                <a page-id="2" href="index.html" class="t1875">
                                    <img src="assets/36dd8b0c43e809de25402efe13a86734_4604.svg" loading="lazy" alt="null" class="t1876">
                                </a>
                                <div id="menu" class="t1877">
                                    <a page-id="21" href="student-homepage.html" class="t1880">Home</a>
                                    <a page-id="22" href="student-chat.html" class="t1880">Chat</a>
                                    <a page-id="28" href="student-profile.php" class="t2607">
                                        <img src="assets/4474856564362a26acc1b8706c0faa3c_597.svg" loading="lazy" alt="null" class="t2604">
                                    </a>
                                    <div class="t1878">
                                        <a class="t1879 button-tertiary button-tertiary" href="logout.php" >Log Out</a>
                                    </div>
                                </div>
                                <div dh-transform="hamburger" dh-transform-options="a:menu|b:fade|c:false|d:true" class="t1881">
                                    <img src="assets/4474856564362a26acc1b8706c0faa3c_597.svg" loading="lazy" alt="null" class="t1882">
                                </div>
                            </div>
                        </container>
                    </section>
                </div>
                <section class="t1885">
                    <container class="t1886">
                        <div class="t1887">
                            <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t1888">
                                <h1 class="t1889">Empowering Startups with Solutions</h1>
                                <p class="t1890">At our company, we are passionate about empowering early startups with top-notch web solutions. Our talented team of experts combines innovative design, seamless user experience, and advanced technology to create websites that not only impress but also drive results.</p>
                                <div class="t1891">
                                    <a class="t1892 button-tertiary">Contact Us</a>
                                </div>
                            </div>
                            <img src="assets/6c38022497e3f8a53da7b044fabbaef5_36880.jpeg" loading="lazy" alt="null" class="t1893">
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
                <section class="t1894">
                    <container class="t1895">
                        <div class="t1896">
                            <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t1897">
                                <div class="t1901">
                                    <h2 class="t1902">
                                        <span class="t1903">How to </span>
                                        <span class="t1904">Get Started?</span>
                                    </h2>
                                    <p class="t1905">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                    <a page-id="5" href="contact-us.html" class="t1906 link-arrow-blue">
                                        <span class="t1907">Know more</span>
                                        <img src="assets/933053747a44f90e76b76d2e255336a4_270.svg" loading="lazy" alt="null" class="t1908">
                                    </a>
                                </div>
                                <div class="t1898">
                                    <div class="t1899">
                                        <img src="assets/875270c328f21b61e955ec868a09701d_86612.png" loading="lazy" alt="null" class="t1900">
                                    </div>
                                </div>
                            </div>
                            <div class="t1909">
                                <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t1910">
                                    <img src="assets/9b381b97f80de81fe0bd37a70c467273_1269.svg" loading="lazy" alt="null" class="t1911">
                                    <h3 class="t1912">Decide Tutoring Mode</h3>
                                    <p class="t1913">Euismod faucibus turpis eu gravida mi. Pellentesque et velit aliquam .</p>
                                </div>
                                <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t1918 icon-box">
                                    <img src="assets/9b381b97f80de81fe0bd37a70c467273_1269.svg" loading="lazy" alt="null" class="t1919">
                                    <h3 class="t1920">Select Tutor</h3>
                                    <p class="t1921">Euismod faucibus turpis eu gravida mi. Pellentesque et velit aliquam .</p>
                                </div>
                                <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t1914 icon-box">
                                    <img src="assets/9b381b97f80de81fe0bd37a70c467273_1269.svg" loading="lazy" alt="null" class="t1915">
                                    <h3 class="t1917">Fill Up the Form</h3>
                                    <p class="t1916">Euismod faucibus turpis eu gravida mi. Pellentesque et velit aliquam .</p>
                                </div>
                                <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t1922 icon-box">
                                    <img src="assets/9b381b97f80de81fe0bd37a70c467273_1269.svg" loading="lazy" alt="null" class="t1923">
                                    <h3 class="t1924">Start Tuition</h3>
                                    <p class="t1925">Euismod faucibus turpis eu gravida mi. Pellentesque et velit aliquam .</p>
                                </div>
                            </div>
                        </div>
                    </container>
                    <container class="t1926">
                        <div class="t1927">
                            <div class="t1938">
                                <img src="assets/b864362bf6b2d0cb1d6c9e3d42bffcbf_648.svg" loading="lazy" alt="null" class="t1939">
                                <div class="t1940">
                                    <span class="t1941">Trusted By</span>
                                    <span class="t1942">1000+ Students</span>
                                </div>
                            </div>
                            <div class="t1928">
                                <img src="assets/e6fe2dc14fc346d08a037527b6e8e27c_595.svg" loading="lazy" alt="null" class="t1932">
                                <div class="t1929">
                                    <span class="t1930">Experienced Tutors</span>
                                    <span class="t1931">500+</span>
                                </div>
                            </div>
                            <div class="t1933">
                                <img src="assets/d4f50bf52f9933d2ad6487a3ba3651d8_2322.svg" loading="lazy" alt="null" class="t1934">
                                <div class="t1935">
                                    <span class="t1937">Classes</span>
                                    <span class="t1936">9000+</span>
                                </div>
                            </div>
                        </div>
                    </container>
                </section>
                <section id="courses" class="t1943">
                    <container class="t1944">
                        <div class="t1945">
                            <h2 class="t1947">
                                <span class="t1949">Academic Subjects, Languages & </span>
                                <span class="t1950">Competitive </span>
                                <span class="t1948">Exams Preparation</span>
                            </h2>
                            <p class="t1946">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="t1951">
                            <div class="t1952">
                                <div class="t1953">
                                    <img src="assets/d2c374ef7ec3feb6e76bcbaaf165c512_25693.jpeg" loading="lazy" alt="null" class="t1954">
                                </div>
                                <div class="t1960"></div>
                                <div class="t1955">
                                    <h4 class="t1956">Academic Subjects</h4>
                                    <p class="t1959 short-p">I'm a university student studying Master of Teaching in secondary stream. I've completed the units regarding teaching junior and stream.  Graduate from university of wollongong. </p>
                                    <div class="t1957">
                                        <a class="t1958 button-tertiary">Browse Subjects</a>
                                    </div>
                                </div>
                            </div>
                            <div class="t1961">
                                <div class="t1962">
                                    <img src="assets/6c38022497e3f8a53da7b044fabbaef5_36880.jpeg" loading="lazy" alt="null" class="t1963">
                                </div>
                                <div class="t1969"></div>
                                <div class="t1964">
                                    <h4 class="t1965">Languages</h4>
                                    <p class="t1968 short-p">I'm a university student studying Master of Teaching in secondary stream. I've completed the units regarding teaching junior and stream.  Graduate from university of wollongong. </p>
                                    <div class="t1966">
                                        <a class="t1967 button-tertiary">Browse Languages</a>
                                    </div>
                                </div>
                            </div>
                            <div class="t1970">
                                <div class="t1971">
                                    <img src="assets/d2c374ef7ec3feb6e76bcbaaf165c512_25693.jpeg" loading="lazy" alt="null" class="t1972">
                                </div>
                                <div class="t1978"></div>
                                <div class="t1973">
                                    <h4 class="t1974">Competitive Exams</h4>
                                    <p class="t1977 short-p">I'm a university student studying Master of Teaching in secondary stream. I've completed the units regarding teaching junior and stream.  Graduate from university of wollongong. </p>
                                    <div class="t1975">
                                        <a class="t1976 button-tertiary">Browse Exams</a>
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
                                    <a page-id="8" href="student_tutor_listting.php?id=<?php echo $id ?>" class="t727 button-tertiary">Contact Tutor</a>
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
                <section class="t2005">
                    <container class="t2006">
                        <div dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t2007">
                            <div class="t2008">
                                <h3 class="t2009">Tutors From All The Suburbs of Perth, WA</h3>
                                <p class="t2010">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed.Lorem ipsum dolor sit amet, consectetur adipiscing elit sed.<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed.Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                                <ul class="t2012">
                                    <li class="t2013">Hamilton Hill</li>
                                    <li class="t2013">Hamilton Hill</li>
                                    <li class="t2013">Hamilton Hill</li>
                                    <li class="t2013">Hamilton Hill</li>
                                    <li class="t2014">Great Support</li>
                                    <li class="t2014">Great Support</li>
                                    <li class="t2014">Great Support</li>
                                    <li class="t2014">Great Support</li>
                                </ul>
                                <a class="t2011 button-tertiary">Brows all the suburbs</a>
                            </div>
                            <div class="t2015">
                                <img src="assets/7c3aac580f53346c47b0b0aee96376c0_6290.jpeg" loading="lazy" alt="null" class="t2016">
                            </div>
                        </div>
                    </container>
                </section>
                <section class="t2017">
                    <container class="t2018">
                        <div class="t2028">
                            <h2 class="t2029">What you’ve been saying</h2>
                        </div>
                        <div dh-transform="swiper" dh-transform-options="e:true|b:20|ra:2|rc:2|re:1|rg:1|a1:true|a:3" class="t2019">
                            <div class="t2020">
                                <div class="t2021">
                                    <div class="t2022">
                                        <img src="assets/63dc17a450e26eb91620ce3033839028_1169046.svg" loading="lazy" alt="null" class="t2023">
                                    </div>
                                    <h5 class="t2027">Trisha Lion</h5>
                                    <span class="t2026">Hermes Clutch</span>
                                    <p class="t2024">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce felis tellus, malesuada vel cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</p>
                                    <div class="t2025"></div>
                                </div>
                                <div class="t2021">
                                    <div class="t2022">
                                        <img src="assets/08d7ac028b1e6bd06b195efbe3b3fac9_74954.jpeg" loading="lazy" alt="null" class="t2023">
                                    </div>
                                    <h5 class="t2027">Alessandra Roy</h5>
                                    <span class="t2026">Hermes Clutch</span>
                                    <p class="t2024">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce felis tellus, malesuada vel cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</p>
                                    <div class="t2025"></div>
                                </div>
                                <div class="t2021">
                                    <div class="t2022">
                                        <img src="assets/f5d5a000be0c1ac57f08e67e83413c28_58072.jpeg" loading="lazy" alt="null" class="t2023">
                                    </div>
                                    <h5 class="t2027">Kate Ross</h5>
                                    <span class="t2026">Hermes Clutch</span>
                                    <p class="t2024">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce felis tellus, malesuada vel cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</p>
                                    <div class="t2025"></div>
                                </div>
                                <div class="t2021">
                                    <div class="t2022">
                                        <img src="assets/63dc17a450e26eb91620ce3033839028_1169046.svg" loading="lazy" alt="null" class="t2023">
                                    </div>
                                    <h5 class="t2027">Trisha Lion</h5>
                                    <span class="t2026">Hermes Clutch</span>
                                    <p class="t2024">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce felis tellus, malesuada vel cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</p>
                                    <div class="t2025"></div>
                                </div>
                                <div class="t2021">
                                    <div class="t2022">
                                        <img src="assets/63dc17a450e26eb91620ce3033839028_1169046.svg" loading="lazy" alt="null" class="t2023">
                                    </div>
                                    <h5 class="t2027">Trisha Lion</h5>
                                    <span class="t2026">Hermes Clutch</span>
                                    <p class="t2024">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce felis tellus, malesuada vel cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</p>
                                    <div class="t2025"></div>
                                </div>
                                <div class="t2021">
                                    <div class="t2022">
                                        <img src="assets/63dc17a450e26eb91620ce3033839028_1169046.svg" loading="lazy" alt="null" class="t2023">
                                    </div>
                                    <h5 class="t2027">Trisha Lion</h5>
                                    <span class="t2026">Hermes Clutch</span>
                                    <p class="t2024">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce felis tellus, malesuada vel cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</p>
                                    <div class="t2025"></div>
                                </div>
                            </div>
                        </div>
                        <div class="t2030">
                            <div class="t2031 text-38 arrow-prev">
                                <img src="assets/1e35d6a8e637664f0029c36068b6111e_616.svg" loading="lazy" alt="null" class="t2032">
                            </div>
                            <div class="t2033 text-38 arrow-next">
                                <img src="assets/8163cfb25330526757e92069310dc95c_624.svg" loading="lazy" alt="null" class="t2034">
                            </div>
                        </div>
                    </container>
                </section>
                <section dh-transform="simple-animations" dh-transform-options="a:fadeInUp|b:0|c:0|d:600" class="t2058">
                    <container class="t2059">
                        <div class="t2060">
                            <div class="t2061"></div>
                            <a class="t2072">
                                <img src="null" loading="lazy" alt="null" class="t2073">
                            </a>
                            <div class="t2062">
                                <h2 class="t2064">Tutoring Inquiries</h2>
                                <div class="t2063 dh-embed"><link rel='stylesheet' href='https://app.ligna.io/api/data/css/style.php?did=7959'>
<!-- <script id='ligna-dataform' form-id ='7959' type='text/javascript' src='https://app.ligna.io/api/data/dataforms.js' async defer></script> -->
<div id="custom-ligna-dataform"> </div></div>
                            </div>
                            <div class="t2065">
                                <div class="t2066">
                                    <h3 class="t2068">Contact Information</h3>
                                    <p class="t2067">We're happy to answer your questions and provide more information about our programs, tutors, and approach.</p>
                                    <div class="t2069">
                                        <img src="assets/a9db1fc21a1282aa16bad292dc599fda_360.svg" loading="lazy" alt="null" class="t2070">
                                        <a href="mailto:contact@perthtutorswa.com" link-type="email" class="t2071">contact@perthtutorswa.com</a>
                                    </div>
                                    <div class="t2069">
                                        <img src="assets/c93c7869d477fe958c03655dd007a56a_434.svg" loading="lazy" alt="null" class="t2070">
                                        <a href="mailto:contact@perthtutorswa.com" link-type="page" class="t2071">08:00AM - 9:00PM</a>
                                    </div>
                                    <div class="t2069">
                                        <img src="assets/2a1f23d699016aa8442ee6b1fdefaf68_733.svg" loading="lazy" alt="null" class="t2070">
                                        <a href="tel:+610863777346" link-type="phone" class="t2071">(08) 63 777 346</a>
                                    </div>
                                    <div class="t2069">
                                        <img src="assets/e22c31f2354c16206a2f27ca8f86a01c_483.svg" loading="lazy" alt="null" class="t2070">
                                        <a href="mailto:contact@perthtutorswa.com" link-type="page" class="t2071">Perth WA 6000</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </container>
                </section>
                <!-- Component: Footer-->
                <div class="t1861">
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