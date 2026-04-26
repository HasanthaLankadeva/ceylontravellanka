<?php

require_once __DIR__ . '/config/config.php';

$currentpage = 'contact';
$page = basename($_SERVER['PHP_SELF'], '.php');
$siteName = "Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$pageTitle =  "Contact Us | Book Private Driver Sri Lanka & Transport Services | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Contact us to book a private driver in Sri Lanka. Fast response via WhatsApp for airport transfers, tours, and transport services across Sri Lanka.";
$metaKeywords = "tailor made Sri Lanka tours, custom Sri Lanka itinerary, private tours Sri Lanka, Sri Lanka travel packages, personalized tours";

$OGTitle = "Contact Us | Private Driver Sri Lanka | " . $siteName;
$OGdescription = "Book your Sri Lanka transport easily via WhatsApp. Contact us for private drivers, airport transfers, and tours. Fast response guaranteed.";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php require_once BASE_PATH . '/includes/head.php';?>
    
</head>

<body class="subpage">

<div id="preloader">
    <div id="status"></div>
</div>

<?php require_once BASE_PATH . '/includes/header.php';?>

<section class="about-us pt-6 pb-6">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h1 class="mb-1">Contact Us – Book Your Sri Lanka Transport</h1>
            <p>Ready to plan your trip in Sri Lanka? Contact us to book a private driver, arrange airport transfers, or customize your travel itinerary. We respond quickly and help you plan your journey with ease.</p>
        </div>
    </div>
</section>

<section class="contact-main pt-6 pb-60">
    <div class="container">
        <div class="contact-info-main mt-0">
            <div class="row">
                <div class="col-lg-10 col-offset-lg-1 mx-auto">
                    <div class="contact-info bg-white">

                        <div class="contact-info-content row mb-1">
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                    <div class="info-icon mb-2">
                                        <i class="fa fa-map-marker-alt theme"></i>
                                    </div>
                                    <div class="info-content">
                                        <h3>Office Location</h3>
                                        <p class="m-0">83 / D Weliya North, Minuwangoda 11550, Sri Lanka</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                    <div class="info-icon mb-2">
                                        <i class="fa fa-phone theme"></i>
                                    </div>
                                    <div class="info-content">
                                        <h3>Phone Number</h3>
                                        <p class="m-0"><a href="tel:+94759800348">+94 75 980 0348</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 mb-4">
                                <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                    <div class="info-icon mb-2">
                                        <i class="fa fa-envelope theme"></i>
                                    </div>
                                    <div class="info-content ps-4">
                                        <h3>Email Address</h3>
                                        <p class="m-0"><a href="mailto:contact@ceylontravellanka.com">contact@ceylontravellanka.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="contact-form1" class="contact-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="map rounded overflow-hiddenb rounded mb-md-4">
                                        <div style="width: 100%">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d18782.950170347263!2d79.9420624!3d7.1668673!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2e5ae19112ee5%3A0xbc3a5706a90a3f2d!2sCeylon%20Travel%20Lanka!5e1!3m2!1sen!2sfi!4v1777222455514!5m2!1sen!2sfi" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once BASE_PATH . '/includes/footer.php';?>

</body>
</html>