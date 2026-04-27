<?php

require_once __DIR__ . '/../config/config.php';

$currentpage = 'services';
$page = basename($_SERVER['PHP_SELF'], '.php');
$siteName = "Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$pageTitle =  "Car Rental with Driver Sri Lanka | Chauffeur Car Hire Service | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Book car rental with driver in Sri Lanka. Comfortable vehicles, professional chauffeurs, and flexible travel for tours and long-distance trips. Get a quote now.";
$metaKeywords = "colombo airport transfer, Sri Lanka airport pickup, airport taxi Sri Lanka, bandaranaike airport transfer, private driver Sri Lanka, hire car with driver Sri Lanka, Sri Lanka chauffeur service, Sri Lanka transport service, airport transfer Sri Lanka, Colombo airport transfer, car rental with driver Sri Lanka, Sri Lanka tour driver, Sri Lanka taxi service, driver hire Sri Lanka, Sri Lanka travel transport, chauffeur hire Sri Lanka";

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
            <h1 class="mb-1">Car Rental with Driver in Sri Lanka</h1>
            <p>Looking for a flexible way to travel around Sri Lanka? Our car rental with driver service offers comfortable vehicles and professional chauffeurs, allowing you to explore the island safely and conveniently.</p>
            <div class="slider-button d-flex justify-content-center mt-4">
                <a href="https://wa.me/+94779177093?text=I'm%20interested%20in%20your%20services" class="nir-btn me-4" tabindex="0">Book via WhatsApp</a>
                <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-black" tabindex="0">Get Free Quote</a>
            </div>
        </div>
    </div>
</section>

<section class="about-us">
    <div class="container">
    <!-- why us starts -->
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-12">
        <div class="about_us__ot position-relative">
            <img src="<?= BASE_URL ?>images/private_driver.webp" alt="Private Driver in Sri Lanka" class="img-fluid rounded mt-3 w-90">
        </div>
        </div>
        <div class="col-lg-6 col-md-12 pt-2">
            <div class="d-flex flex-column">
                
                <h2 class="fw-bold">Why Choose <br/>Car Rental with Driver in Sri Lanka?</h2>

                <p class="border-b mb-2 pb-2">Driving in Sri Lanka can be challenging for visitors due to road conditions and local traffic rules. Renting a car with a driver gives you the freedom to travel at your own pace without worrying about navigation, safety, or parking.</p>
                <div class="about-listing">
                    <ul class="d-flex flex-column justify-content-between gap-3">
                        <li><svg class="svg-inline--fa fa-check-circle fa-w-16 theme1 me-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg> No driving stress</li>
                        <li><svg class="svg-inline--fa fa-check-circle fa-w-16 theme1 me-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg> Local knowledge from drivers</li>
                        <li><svg class="svg-inline--fa fa-check-circle fa-w-16 theme1 me-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg> Flexible itinerary</li>
                        <li><svg class="svg-inline--fa fa-check-circle fa-w-16 theme1 me-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg> Safer than self-driving</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- why us ends -->
    </div>
    <div class="white-overlay"></div>
</section>

<section class="about-us-tv overflow-hidden">
      <div class="container">
        <!-- why us starts -->
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-12">
            <div class="about_us__ot d-flex justify-content-center position-relative mb-5 mb-lg-0">
              <img src="<?= BASE_URL ?>images/compare_1.webp" class="aa__img1" alt="Car Rental with Driver vs Private Driver">
              <img src="<?= BASE_URL ?>images/compare_2.webp" class="aa__img2" alt="Car Rental with Driver vs Private Driver">
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="d-flex flex-column">
              <h2 class="fw-bold">Car Rental with Driver vs Private Driver</h2>

              <p class="border-b mb-1 pb-2">Both services offer comfortable travel, but car rental with driver is ideal for longer trips and flexible travel plans, while private driver services are often used for daily hire or specific routes.</p>
              
              <div class="mt-1">
                <a href="#" class="nir-btn">Get Free Quote</a>
              </div>
            </div>
          </div>
        </div>

        <!-- why us ends -->
      </div>
    </section>


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
            <img src="<?= BASE_URL ?>images/plan_your_journey_with_us.webp" alt="Plan Your Journey with Us" class="right-img img-fluid w-100 h-100">
        </div>
    </div>
    </div>
</section>

<?php require_once BASE_PATH . '/includes/testimonials.php';?>

<?php require_once BASE_PATH . '/includes/footer.php';?>

</body>
</html>