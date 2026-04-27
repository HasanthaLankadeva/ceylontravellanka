<?php

require_once __DIR__ . '/../config/config.php';

$currentpage = 'services';
$page = basename($_SERVER['PHP_SELF'], '.php');
$siteName = "Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$pageTitle =  "Sri Lanka Travel Services | Airport Transfer, Private Driver & Tours | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Explore our Sri Lanka travel services including airport transfers, private drivers, car rental with driver, and day tours. Reliable and customized travel solutions.";
$metaKeywords = "Sri Lanka travel services, airport transfer Sri Lanka, private driver Sri Lanka, car rental with driver, Sri Lanka day tours";

$OGTitle = "Sri Lanka Travel Services | " . $siteName;
$OGdescription = "Discover reliable travel services including transfers, private drivers, and day tours in Sri Lanka.";

$preloadBanner = BASE_URL . "images/slider/1.webp";
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

<section class="intro-section about-us pt-6 pb-6 mpb-0">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h1 class="mb-1">Sri Lanka Travel Services</h1>
            <p>Discover a full range of professional travel services in Sri Lanka designed to make your journey smooth, comfortable, and unforgettable. From airport transfers and private drivers to customized tours and day excursions, we provide reliable and flexible travel solutions tailored to your needs.</p>
            <p>At Ceylon Travel Lanka, we combine local expertise with personalized service to ensure every part of your trip is seamless. Whether you're planning a short visit or a long holiday, our services are designed to give you complete peace of mind.</p>
        </div>
    </div>
</section>

<!-- about-us starts -->
<section class="services pb-0">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h2 class="mb-1">Our Travel Services</h2>
            <p>We provide a variety of travel services across Sri Lanka, including airport transfers, private drivers, car rental with driver, and day tours, all designed for comfort, flexibility, and convenience.</p>
        </div>

        <!-- why us starts -->
        <div class="row justify-content-center">
            <div class="col-md-4 step-card mb-6">
                <img src="<?= BASE_URL ?>images/s_1.webp" alt="Search Destination" class="step-icon mb-3">
                <h3><a href="<?= BASE_URL ?>services/airport-transfer.php">Airport Transfer</a></h3>
                <p class="mb-2">Safe and reliable airport pickup and drop-off services across Sri Lanka with professional drivers.</p>
                <p class="mb-0"><a class="theme" href="<?= BASE_URL ?>services/airport-transfer.php">Read More →</a></p>
            </div>
            <div class="col-md-4 step-card mb-6">
                <img src="<?= BASE_URL ?>images/s_2.webp" alt="Search Destination" class="step-icon mb-3">
                <h3><a href="<?= BASE_URL ?>services/private-driver-sri-lanka.php">Private Driver in Sri Lanka</a></h3>
                <p class="mb-2">Hire a private driver for flexible and comfortable travel around the island at your own pace.</p>
                <p class="mb-0"><a class="theme" href="<?= BASE_URL ?>services/airport-transfer.php">Read More →</a></p>
            </div>
            <div class="col-md-4 step-card mb-6">
                <img src="<?= BASE_URL ?>images/s_3.webp" alt="Search Destination" class="step-icon mb-3">
                <h3><a href="<?= BASE_URL ?>services/car-rental-with-driver.php">Car Rental with Driver</a></h3>
                <p class="mb-2">Choose from a range of vehicles with experienced drivers for a smooth travel experience.</p>
                <p class="mb-0"><a class="theme" href="<?= BASE_URL ?>services/airport-transfer.php">Read More →</a></p>
            </div>
        </div>
    </div>
</section>
<!-- about-us ends -->

<!-- about-us starts -->
<section class="about-us-intro pb-0">
    <div class="container">
    <div class="section-title mb-6 w-50 mx-auto text-center">
        <h2 class="mb-1">Why Choose Our Travel Services?</h2>
    </div>

    <!-- why us starts -->
    <div class="why-us">
        <div class="why-us-box">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="why-us-item p-4 pt-4 pb-4 border rounded bg-white">
                <div class="why-us-content">
                    <h4>Experienced and Professional Drivers</h4>
                    <p>Our drivers are knowledgeable, friendly, and experienced, ensuring a safe and comfortable journey.</p>
                </div>
            </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="why-us-item p-4 pt-4 pb-4 border rounded bg-white">
                <div class="why-us-content">
                    <h4>Flexible Travel Options</h4>
                    <p>We offer customizable services that adapt to your schedule, destinations, and travel preferences.</p>
                </div>
            </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="why-us-item p-4 pt-4 pb-4 border rounded bg-white">
                <div class="why-us-content">
                    <h4>Comfortable Vehicles</h4>
                    <p class="mb-2">Our vehicles are clean, reliable, and suited for different group sizes and travel styles.</p>
                </div>
            </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="why-us-item p-4 pt-4 pb-4 border rounded bg-white">
                <div class="why-us-content">
                    <h4>Local Expertise</h4>
                    <p class="mb-2">We provide valuable local insights to help you discover the best places and hidden gems in Sri Lanka.</>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- why us ends -->
    </div>
</section>
<!-- about-us ends -->

<section class="pt-9">
    <div class="container">
    <div class="row offer-banner shadow-lg">
        <!-- Left Content -->
        <div class="col-md-6 d-flex align-items-center bg-map">
        <div class="offer-text w-100">
            <h2 class="fw-bold theme1 mb-1">Plan Your Journey with Us</h2>
            <p class="mb-4">Contact us today to book your travel service or customize your Sri Lanka itinerary. Our team is ready to assist you with the best options for your trip.</p>
            <div class="slider-button d-flex">
                <a href="https://wa.me/+94779177093?text=I'm%20interested%20in%20your%20services" class="nir-btn me-4" tabindex="0">Book via WhatsApp</a>
                <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-white" tabindex="0">Get Free Quote</a>
            </div>
        </div>
        </div>

        <!-- Right Image -->
        <div class="col-md-6 p-0">
            <img src="<?= BASE_URL ?>images/bg6.webp" alt="Book Your Sri Lanka Transport Today" class="right-img img-fluid w-100 h-100">
        </div>
    </div>
    </div>
</section>

<?php require_once BASE_PATH . '/includes/testimonials.php';?>

<?php require_once BASE_PATH . '/includes/footer.php';?>

</body>
</html>