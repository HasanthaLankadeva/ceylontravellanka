<?php

require_once __DIR__ . '/../config/config.php';

$currentpage = 'services';
$page = basename($_SERVER['PHP_SELF'], '.php');
$siteName = "Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$pageTitle =  "Colombo Airport Transfer | Sri Lanka Airport Pickup & Drop Service | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Book Colombo airport transfer in Sri Lanka. Reliable airport pickup & drop with private drivers. Fixed prices, 24/7 service. Book now via WhatsApp.";
$metaKeywords = "colombo airport transfer, Sri Lanka airport pickup, airport taxi Sri Lanka, bandaranaike airport transfer, private driver Sri Lanka, hire car with driver Sri Lanka, Sri Lanka chauffeur service, Sri Lanka transport service, airport transfer Sri Lanka, Colombo airport transfer, car rental with driver Sri Lanka, Sri Lanka tour driver, Sri Lanka taxi service, driver hire Sri Lanka, Sri Lanka travel transport, chauffeur hire Sri Lanka";

$OGTitle = "Colombo Airport Transfer | Private Pickup & Drop Service | " . $siteName;
$OGdescription = "Book reliable airport transfers in Sri Lanka. Private pickup from Bandaranaike International Airport with fixed prices and 24/7 service.";

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
            <h1 class="mb-1">Colombo Airport Transfer Service in Sri Lanka</h1>
            <p>Book a reliable airport transfer from Bandaranaike International Airport to any destination in Sri Lanka. Our professional drivers ensure safe, comfortable, and on-time pickups and drop-offs.</p>
            <div class="slider-button d-flex justify-content-center mt-4">
                <a href="https://wa.me/+94779177093?text=I'm%20interested%20in%20your%20services" class="nir-btn me-4" tabindex="0">Book via WhatsApp</a>
                <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-black" tabindex="0">Get Free Quote</a>
            </div>
        </div>
    </div>
</section>

<section class="about-us pt-1">
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
                
                <h2 class="fw-bold">Why Choose Our <br/>Colombo Airport Transfer?</h2>

                <p class="border-b mb-2 pb-2">Arriving in a new country can be stressful. Our airport transfer service in Sri Lanka ensures a smooth and hassle-free experience from the moment you land. Avoid taxi queues and travel comfortably with a trusted private driver.</p>
                <div class="about-listing">
                    <ul class="d-flex flex-column justify-content-between gap-3">
                    <li><svg class="svg-inline--fa fa-check-circle fa-w-16 theme1 me-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg> Driver waiting with name board</li>
                    <li><svg class="svg-inline--fa fa-check-circle fa-w-16 theme1 me-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg> No waiting or delays</li>
                    <li><svg class="svg-inline--fa fa-check-circle fa-w-16 theme1 me-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg> Direct hotel drop-off</li>
                    <li><svg class="svg-inline--fa fa-check-circle fa-w-16 theme1 me-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg> Safe and professional drivers</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- why us ends -->
    </div>
    <div class="white-overlay"></div>
</section>

<section class="how-it-works pb-0">
    <div class="container">
    <div class="section-title mb-6 w-50 mx-auto text-center">
        <h2 class="mb-1">How Our Airport Pickup Works</h2>
        <p>Booking your airport transfer in Sri Lanka is quick and easy. Our simple process ensures a smooth experience from the moment you land at the airport to your final destination.</p>
    </div>

    <!-- why us starts -->
    <div class="why-us">
        <div class="why-us-box">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                <div class="why-us-content">
                <div class="why-us-icon mb-1">
                    <i class="icon-flag theme"></i>
                </div>
                <h4>Send your flight details</h4>
                <p class="mb-2">Share your flight number, arrival time, and destination with us via WhatsApp or our booking form.</p>
                </div>
            </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                <div class="why-us-content">
                <div class="why-us-icon mb-1">
                    <i class="icon-location-pin theme"></i>
                </div>
                <h4>Driver tracks your arrival</h4>
                <p class="mb-2">Our driver monitors your flight in real time to adjust for any delays and ensure timely pickup.</p>
                </div>
            </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                <div class="why-us-content">
                <div class="why-us-icon mb-1">
                    <i class="icon-directions theme"></i>
                </div>
                <h4>Meet at airport with name board</h4>
                <p class="mb-2">Your driver will be waiting at the arrivals area with a name board, making it easy to find them after landing.</p>
                </div>
            </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                <div class="why-us-content">
                <div class="why-us-icon mb-1">
                    <i class="icon-compass theme"></i>
                </div>
                <h4>Travel directly to your destination</h4>
                <p class="mb-2">Sit back and relax as you are driven directly from the airport to your hotel or destination in comfort.</p>
                </div>
            </div>
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