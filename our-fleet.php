<?php

require_once __DIR__ . '/config/config.php';

$currentpage = 'itineraries';
$page = basename($_SERVER['PHP_SELF'], '.php');
$siteName = "Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$pageTitle =  "Our Fleet | Chauffeur Driven Cars & Vans in Sri Lanka | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Explore Sri Lanka in comfort. Choose from our premium fleet of chauffeur-driven cars, SUVs, luxury vans. Transparent pricing and expert local drivers.";
$metaKeywords = "Sri Lanka car rental with driver, hire van in Sri Lanka, Ceylon Travel Lanka fleet, luxury tourist transport Sri Lanka, private chauffeur tour Sri Lanka, rent a car Colombo";

$OGTitle = "Sri Lanka Tour Itineraries | " . $siteName;
$OGdescription = "Browse our expertly designed Sri Lanka itineraries or create your own custom travel plan.";

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

<section class="intro-section about-us pt-6 pb-6">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h1 class="mb-1">Our Fleet: Travel Sri Lanka in Comfort & Style</h1>
            <p>Whether you are navigating the winding roads of the Hill Country, heading out on an epic wildlife safari, or cruising down the Southern Expressway to the beach, the right vehicle makes all the difference.</p>
            <p>At Ceylon Travel Lanka, we provide a diverse, modern fleet of meticulously maintained vehicles to match your travel style, budget, and group size. Every rental comes with a professional, English-speaking chauffeur-driver who doubles as your local guide—ensuring a safe, stress-free, and deeply authentic journey through our beautiful island.</p>
        </div>
    </div>
</section>

<section class="trending pt-6 bg-lgrey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="trend-item rounded box-shadow">
                            <div class="trend-image position-relative">
                                <img src="images/cars/1.avif" alt="image" class="">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content1 position-relative p-4 bg-white">
                                <h3 class="mb-2 border-b pb-2">Honda Fit / Honda Jazz</h3>
                                <ul class="featured-meta border-b pb-2 mb-2 d-flex align-items-center justify-content-between">
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><circle cx="12" cy="8" r="4" /><path d="M12 14c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5z" /></svg> 2–3 Passengers</li>
                                </ul>
                                <div class="slider-button">
                                    <a href="https://wa.me/+94759800348?text=Hi%20Ceylon%20Travel%20Lanka,%20I'm%20interested%20in%20booking%20the%20Honda%20Fit%20/%20Jazz%20for%20my%20trip" class="nir-btn me-4" tabindex="0" target="_blank" rel="noopener noreferrer">Book via WhatsApp</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="trend-item rounded box-shadow">
                            <div class="trend-image position-relative">
                                <img src="images/cars/2.avif" alt="image" class="">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content1 position-relative p-4 bg-white">
                                <h3 class="mb-2 border-b pb-2">Honda Vezel</h3>
                                <ul class="featured-meta border-b pb-2 mb-2 d-flex align-items-center justify-content-between">
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><circle cx="12" cy="8" r="4" /><path d="M12 14c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5z" /></svg> 3 Passengers</li>
                                </ul>
                                <div class="slider-button">
                                    <a href="https://wa.me/+94759800348?text=Hi%20Ceylon%20Travel%20Lanka,%20I'm%20interested%20in%20booking%20the%20Honda%20Vezel%20SUV%20for%20my%20trip." class="nir-btn me-4" tabindex="0" target="_blank" rel="noopener noreferrer">Book via WhatsApp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="trend-item rounded box-shadow">
                            <div class="trend-image position-relative">
                                <img src="images/cars/3.avif" alt="image" class="">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content1 position-relative p-4 bg-white">
                                <h3 class="mb-2 border-b pb-2">Honda Fit Shuttle</h3>
                                <ul class="featured-meta border-b pb-2 mb-2 d-flex align-items-center justify-content-between">
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><circle cx="12" cy="8" r="4" /><path d="M12 14c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5z" /></svg> 3 Passengers</li>
                                </ul>
                                <div class="slider-button">
                                    <a href="https://wa.me/+94759800348?text=Hi%20Ceylon%20Travel%20Lanka,%20I'm%20interested%20in%20booking%20the%20Honda%20Fit%20Shuttle%20for%20my%20trip." class="nir-btn me-4" tabindex="0" target="_blank" rel="noopener noreferrer">Book via WhatsApp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="trend-item rounded box-shadow">
                            <div class="trend-image position-relative">
                                <img src="images/cars/4.avif" alt="image" class="">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content1 position-relative p-4 bg-white">
                                <h3 class="mb-2 border-b pb-2">Toyota KDH (Flat Roof)</h3>
                                <ul class="featured-meta border-b pb-2 mb-2 d-flex align-items-center justify-content-between">
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><circle cx="12" cy="8" r="4" /><path d="M12 14c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5z" /></svg> 5–7 Passengers</li>
                                </ul>
                                <div class="slider-button">
                                    <a href="https://wa.me/+94759800348?text=Hi%20Ceylon%20Travel%20Lanka,%20I'm%20interested%20in%20booking%20the%20Toyota%20KDH%20(Flat%20Roof)%20van%20for%20our%20group." class="nir-btn me-4" tabindex="0" target="_blank" rel="noopener noreferrer">Book via WhatsApp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="trend-item rounded box-shadow">
                            <div class="trend-image position-relative">
                                <img src="images/cars/5.avif" alt="image" class="">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content1 position-relative p-4 bg-white">
                                <h3 class="mb-2 border-b pb-2">Toyota Axio</h3>
                                <ul class="featured-meta border-b pb-2 mb-2 d-flex align-items-center justify-content-between">
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><circle cx="12" cy="8" r="4" /><path d="M12 14c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5z" /></svg> 2–3 Passengers</li>
                                </ul>
                                <div class="slider-button">
                                    <a href="https://wa.me/+94759800348?text=Hi%20Ceylon%20Travel%20Lanka,%20I'm%20interested%20in%20booking%20the%20Toyota%20Axio%20sedan%20for%20my%20trip." class="nir-btn me-4" tabindex="0" target="_blank" rel="noopener noreferrer">Book via WhatsApp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="trend-item rounded box-shadow">
                            <div class="trend-image position-relative">
                                <img src="images/cars/6.avif" alt="image" class="">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content1 position-relative p-4 bg-white">
                                <h3 class="mb-2 border-b pb-2">Toyota KDH (High Roof)</h3>
                                <ul class="featured-meta border-b pb-2 mb-2 d-flex align-items-center justify-content-between">
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><circle cx="12" cy="8" r="4" /><path d="M12 14c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5z" /></svg> 7–10 Passengers</li>
                                </ul>
                                <div class="slider-button">
                                    <a href="https://wa.me/+94759800348?text=Hi%20Ceylon%20Travel%20Lanka,%20I'm%20interested%20in%20booking%20the%20Toyota%20KDH%20(High%20Roof)%20van%20for%20our%20group." class="nir-btn me-4" tabindex="0" target="_blank" rel="noopener noreferrer">Book via WhatsApp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
    
<section class="featured-counter featured-fleet pb-10">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="section-title mb-5">
                    <h2 class="">Your Comfortable Journey With Us</h2>
                    <p class="mb-0 ">The Ceylon Travel Lanka Promise: All our vehicles are fully air-conditioned, strictly compliant with comprehensive tourist insurance, and deep-cleaned before every journey.</p>
                </div>
            </div>
        </div>
        <div class="car-image">
            <picture>
                <source
                    media="(max-width: 738px)"
                    srcset="<?= BASE_URL ?>images/cars/fleet_mobile.avif"
                >
                <img
                    src="<?= BASE_URL ?>images/cars/fleet.avif"
                    alt="International travelers enjoying Sri Lanka tour"
                    width="1295"
                    height="466"
                >
            </picture>
        </div>
    </div>
</section>

<section class="about-us-intro pb-0 pt-0">
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

<?php require_once BASE_PATH . '/includes/testimonials.php';?>

<?php require_once BASE_PATH . '/includes/footer.php';?>

</body>
</html>