<?php

require_once __DIR__ . '/config/config.php';

$currentpage = 'itineraries';
$page = basename($_SERVER['PHP_SELF'], '.php');
$siteName = "Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$pageTitle =  "Sri Lanka Tour Itineraries | Custom Travel Plans | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Explore carefully crafted Sri Lanka tour itineraries. Discover beaches, culture, wildlife and tailor-made travel plans with Ceylon Travel Lanka.";
$metaKeywords = "Sri Lanka tour itineraries, travel plans Sri Lanka, Sri Lanka tours, holiday packages Sri Lanka, custom itineraries";

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

<section class="about-us pt-6 pb-6">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h1 class="mb-1">Sri Lanka Tour Itineraries</h1>
            <p>Discover the best Sri Lanka tour itineraries designed to help you experience the island’s rich culture, stunning landscapes, and unforgettable adventures. Whether you’re looking for a relaxing beach holiday, a cultural journey through ancient cities, or an exciting wildlife safari, our itineraries are carefully crafted to suit every type of traveler.</p>
            <p>At Ceylon Travel Lanka, we offer flexible travel plans that can be fully customized based on your preferences, budget, and travel duration. Explore popular destinations like Sigiriya, Kandy, Ella, and the southern beaches while enjoying a seamless and memorable travel experience.</p>
        </div>
    </div>
</section>

<!-- blog starts -->
<section class="blog pt-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pe-lg-4">
                <div class="listing-inner">
                    <div class="trending destination-list">
                        <div class="trend-full bg-white rounded box-shadow overflow-hidden mb-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-3">
                                <div class="trend-item2 rounded">
                                        <a href="tour-single.html">
                                            <img src="<?= BASE_URL ?>images/trending/trending2.jpg" alt="image" class="">
                                        </a>
                                        <div class="color-overlay"></div>
                                    </div> 
                                </div>
                                <div class="col-lg-8 col-md-9">
                                    <div class="trend-content position-relative text-md-start">
                                        <h3 class="mb-1"><a href="<?= BASE_URL ?>tour-single.html">4 Day Sri Lanka Tour Itinerary</a></h3>
                                        <h5 class="theme mb-1">Short Travel Package</h5>
                                        <p class="mt-3 mb-3"><strong>Route:</strong> Colombo → Kandy → Sigiriya → Nuwara Eliya → Ella → Bentota</p>
                                        <p class="mb-3 itinerary-highlights">Temple of the Tooth • Tea Plantations • Gregory Lake • Bentota Beach</p>
                                        <!--p class="mb-4"><a href="#"><span class="theme"> Read More →</span></a></p-->
                                        <div class="slider-button">
                                            <a href="https://wa.me/+94779177093?text=I'm%20interested%20in%20your%20services" class="nir-btn me-4" tabindex="0">Book via WhatsApp</a>
                                            <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="trend-full bg-white rounded box-shadow overflow-hidden mb-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-3">
                                <div class="trend-item2 rounded">
                                        <a href="<?= BASE_URL ?>tour-single.html">
                                            <img src="<?= BASE_URL ?>images/trending/trending2.jpg" alt="image" class="">
                                        </a>
                                        <div class="color-overlay"></div>
                                    </div> 
                                </div>
                                <div class="col-lg-8 col-md-9">
                                    <div class="trend-content position-relative text-md-start">
                                        <h3 class="mb-1"><a href="<?= BASE_URL ?>tour-single.html">6 Day Sri Lanka Tour Itinerary</a></h3>
                                        <h5 class="theme mb-1">Culture & Scenic Highlights</h5>
                                        <p class="mt-3 mb-3"><strong>Route:</strong> Colombo → Kandy → Sigiriya → Nuwara Eliya → Bentota</p>
                                        <p class="mb-3 itinerary-highlights">Temple of the Tooth • Cultural Dance Show • Sigiriya Lion Rock • Dambulla Cave Temple • Tea Estates • Gregory Lake • Bentota Beach • River Safari</p>
                                        <!--p class="mb-4"><a href="#"><span class="theme"> Read More →</span></a></p-->
                                        <div class="slider-button">
                                            <a href="https://wa.me/+94779177093?text=I'm%20interested%20in%20your%20services" class="nir-btn me-4" tabindex="0">Book via WhatsApp</a>
                                            <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="trend-full bg-white rounded box-shadow overflow-hidden mb-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-3">
                                <div class="trend-item2 rounded">
                                        <a href="<?= BASE_URL ?>tour-single.html">
                                            <img src="<?= BASE_URL ?>images/trending/trending2.jpg" alt="image" class="">
                                        </a>
                                        <div class="color-overlay"></div>
                                    </div> 
                                </div>
                                <div class="col-lg-8 col-md-9">
                                    <div class="trend-content position-relative text-md-start">
                                        <h3 class="mb-1"><a href="<?= BASE_URL ?>tour-single.html">7 Day Sri Lanka Tour Itinerary</a></h3>
                                        <h5 class="theme mb-1">Classic Island Experience</h5>
                                        <p class="mt-3 mb-3"><strong>Route:</strong> Colombo → Kandy → Sigiriya → Nuwara Eliya → Ella → Bentota</p>
                                        <p class="mb-3 itinerary-highlights">Temple of the Tooth • Sigiriya Lion Rock • Dambulla Cave Temple • Tea Estates • Ella Nine Arches Bridge • Little Adam’s Peak • Bentota Beach • Water Sports</p>
                                        <!--p class="mb-4"><a href="#"><span class="theme"> Read More →</span></a></p-->
                                        <div class="slider-button">
                                            <a href="https://wa.me/+94779177093?text=I'm%20interested%20in%20your%20services" class="nir-btn me-4" tabindex="0">Book via WhatsApp</a>
                                            <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="trend-full bg-white rounded box-shadow overflow-hidden mb-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-3">
                                <div class="trend-item2 rounded">
                                        <a href="<?= BASE_URL ?>tour-single.html">
                                            <img src="<?= BASE_URL ?>images/trending/trending2.jpg" alt="image" class="">
                                        </a>
                                        <div class="color-overlay"></div>
                                    </div> 
                                </div>
                                <div class="col-lg-8 col-md-9">
                                    <div class="trend-content position-relative text-md-start">
                                        <h3 class="mb-1"><a href="<?= BASE_URL ?>tour-single.html">10 Day Sri Lanka Tour Itinerary</a></h3>
                                        <h5 class="theme mb-1">Complete Island Journey</h5>
                                        <p class="mt-3 mb-3"><strong>Route:</strong> Colombo → Sigiriya → Anuradhapura → Kandy → Nuwara Eliya → Ella → Yala → Bentota</p>
                                        <p class="mb-3 itinerary-highlights">Sigiriya Lion Rock • Village Tour Experience • Anuradhapura Ancient City • Sri Maha Bodhi • Temple of the Tooth • Peradeniya Botanical Gardens • Tea Estates • Waterfalls • Ella Nine Arches Bridge • Little Adam’s Peak • Yala National Park Safari • Bentota Beach • Water Sports</p>
                                        <!--p class="mb-4"><a href="#"><span class="theme"> Read More →</span></a></p-->
                                        <div class="slider-button">
                                            <a href="https://wa.me/+94779177093?text=I'm%20interested%20in%20your%20services" class="nir-btn me-4" tabindex="0">Book via WhatsApp</a>
                                            <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="trend-full bg-white rounded box-shadow overflow-hidden mb-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-3">
                                <div class="trend-item2 rounded">
                                        <a href="<?= BASE_URL ?>tour-single.html">
                                            <img src="<?= BASE_URL ?>images/trending/trending2.jpg" alt="image" class="">
                                        </a>
                                        <div class="color-overlay"></div>
                                    </div> 
                                </div>
                                <div class="col-lg-8 col-md-9">
                                    <div class="trend-content position-relative text-md-start">
                                        <h3 class="mb-1"><a href="<?= BASE_URL ?>tour-single.html">15 Day Sri Lanka Tour Itinerary</a></h3>
                                        <h5 class="theme mb-1">Ultimate Sri Lanka Travel Experience</h5>
                                        <p class="mt-3 mb-3"><strong>Route:</strong> Colombo → Negombo → Anuradhapura → Sigiriya → Kandy → Nuwara Eliya → Ella → Yala → Mirissa → Galle → Bentota</p>
                                        <p class="mb-3 itinerary-highlights">Negombo Lagoon & Fish Market • Anuradhapura Ancient City & Stupas • Sigiriya Lion Rock • Dambulla Cave Temple • Temple of the Tooth • Cultural Dance Show • Tea Plantations • Ella Nine Arches Bridge • Little Adam’s Peak • Yala National Park Safari • Mirissa Whale Watching • Galle Dutch Fort • Bentota Beach • Water Sports • River Safari</p>
                                        <!--p class="mb-4"><a href="#"><span class="theme"> Read More →</span></a></p-->
                                        <div class="slider-button">
                                            <a href="https://wa.me/+94779177093?text=I'm%20interested%20in%20your%20services" class="nir-btn me-4" tabindex="0">Book via WhatsApp</a>
                                            <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- sidebar starts -->
            <div class="col-lg-4 ps-lg-4">
                <div class="sidebar-sticky">
                    <div class="list-sidebar">

                        <div class="author-news mb-4 box-shadow p-5 text-center rounded overflow-hidden border-all">
                            <div class="author-news-content">
                                <div class="author-thumb mb-2">
                                    <img src="images/logo.svg" alt="Logo - Ceylon Travel Lanka">
                                </div>
                                <div class="author-content">
                                    <h3 class="title mb-2">Ceylon Travel Lanka</h3>
                                    <p class="mb-2">We provide reliable and affordable transport services for travelers visiting Sri Lanka. From airport pickups to full island tours, we ensure a smooth and enjoyable journey.</p>
                                    <div class="header-social">
                                        <ul>
                                            <li><a href="#"><i class="rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M544.5 273.9C500.5 274 457.5 260.3 421.7 234.7L421.7 413.4C421.7 446.5 411.6 478.8 392.7 506C373.8 533.2 347.1 554 316.1 565.6C285.1 577.2 251.3 579.1 219.2 570.9C187.1 562.7 158.3 545 136.5 520.1C114.7 495.2 101.2 464.1 97.5 431.2C93.8 398.3 100.4 365.1 116.1 336C131.8 306.9 156.1 283.3 185.7 268.3C215.3 253.3 248.6 247.8 281.4 252.3L281.4 342.2C266.4 337.5 250.3 337.6 235.4 342.6C220.5 347.6 207.5 357.2 198.4 369.9C189.3 382.6 184.4 398 184.5 413.8C184.6 429.6 189.7 444.8 199 457.5C208.3 470.2 221.4 479.6 236.4 484.4C251.4 489.2 267.5 489.2 282.4 484.3C297.3 479.4 310.4 469.9 319.6 457.2C328.8 444.5 333.8 429.1 333.8 413.4L333.8 64L421.8 64C421.7 71.4 422.4 78.9 423.7 86.2C426.8 102.5 433.1 118.1 442.4 131.9C451.7 145.7 463.7 157.5 477.6 166.5C497.5 179.6 520.8 186.6 544.6 186.6L544.6 274z"></path></svg>
                                            </i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram rounded" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fab fa-facebook-f rounded" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center mt-3">
                                    <div id="TA_rated768" class="TA_rated"><ul id="gNgfhKggY44b" class="TA_links CyRJ71tCMj36"><li id="7RJuRSYmU" class="oSSui84y47"><a target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g11999643-d25571146-Reviews-Ceylon_Travel_Lanka-Minuwangoda_Western_Province.html"><img src="https://www.tripadvisor.com/img/cdsi/img2/badges/ollie-11424-2.gif" alt="TripAdvisor"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=rated&uniq=768&locationId=25571146&lang=en_US&display_version=2"></script>
                                </div>
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog Ends -->

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