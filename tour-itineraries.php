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

<section class="intro-section about-us pt-6 pb-6">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h1 class="mb-1">Sri Lanka Tour Itineraries</h1>
            <p>Discover the best Sri Lanka tour itineraries designed to help you experience the island’s rich culture, stunning landscapes, and unforgettable adventures. Whether you’re looking for a relaxing beach holiday, a cultural journey through ancient cities, or an exciting wildlife safari, our itineraries are carefully crafted to suit every type of traveler.</p>
            <p>At Ceylon Travel Lanka, we offer flexible travel plans that can be fully customized based on your preferences, budget, and travel duration. Explore popular destinations like Sigiriya, Kandy, Ella, and the southern beaches while enjoying a seamless and memorable travel experience.</p>
        </div>
    </div>
</section>

<!-- blog starts -->
<section class="blog itineraries pt-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pe-lg-4">
                <div class="listing-inner">
                    <div class="trending destination-list">
                        <div class="trend-full bg-white rounded box-shadow overflow-hidden mb-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-3">
                                <div class="trend-item trend-item2 rounded">
                                        <a href="#">
                                            <img src="<?= BASE_URL ?>images/it_l_1.webp" alt="image" class="" alt="4 Day Sri Lanka Tour Itinerary">
                                        </a>
                                        <div class="color-overlay"></div>
                                    </div> 
                                </div>
                                <div class="col-lg-8 col-md-9">
                                    <div class="trend-content position-relative text-md-start">
                                        <h3 class="mb-1"><a href="#">4 Day Sri Lanka Tour Itinerary</a></h3>
                                        <h5 class="theme mb-1">Short Travel Package</h5>
                                        <p class="mt-3 mb-3"><strong>Route:</strong> Kandy → Nuwara Eliya → Ella → Bentota</p>
                                        <p class="mb-3 itinerary-highlights">Temple of the Tooth • Tea Plantations • Gregory Lake • Bentota Beach</p>
                                        <p class="mb-3">Explore the cultural capital and scenic hill country before relaxing on the coast in this essential 4-day escape.</p>
                                        <!--p class="mb-4"><a href="#"><span class="theme"> Read More →</span></a></p-->
                                        <div class="slider-button">
                                            <a href="https://wa.me/+94759800348?text=I'm%20interested%20in%204%20Day%20Sri%20Lanka%20Tour%20Itinerary" class="nir-btn me-4" tabindex="0" target="_blank" rel="noopener noreferrer">Book via WhatsApp</a>
                                            <a href="mailto:contact@ceylontravellanka.com?subject=Inquiry: 4 Day Sri Lanka Tour Itinerary" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="trend-full bg-white rounded box-shadow overflow-hidden mb-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-3">
                                <div class="trend-item trend-item2 rounded">
                                        <a href="#">
                                            <img src="<?= BASE_URL ?>images/it_1_2.webp" alt="image" class="" alt="6 Day Sri Lanka Tour Itinerary">
                                        </a>
                                        <div class="color-overlay"></div>
                                    </div> 
                                </div>
                                <div class="col-lg-8 col-md-9">
                                    <div class="trend-content position-relative text-md-start">
                                        <h3 class="mb-1"><a href="#">6 Day Sri Lanka Tour Itinerary</a></h3>
                                        <h5 class="theme mb-1">Culture & Scenic Highlights</h5>
                                        <p class="mt-3 mb-3"><strong>Route:</strong> Colombo → Sigiriya → Kandy → Nuwara Eliya → Bentota</p>
                                        <p class="mb-3 itinerary-highlights">Dambulla Cave Temple • Sigiriya Lion Rock • Temple of the Tooth • Cultural Dance Show • Tea Estates • Gregory Lake • Bentota Beach • River Safari</p>
                                        <p class="mb-3">Experience the perfect blend of majestic heritage sites, lush highlands, and coastal relaxation in one immersive week.</p>
                                        <!--p class="mb-4"><a href="#"><span class="theme"> Read More →</span></a></p-->
                                        <div class="slider-button">
                                            <a href="https://wa.me/+94759800348?text=I'm%20interested%20in%206%20Day%20Sri%20Lanka%20Tour%20Itinerary" class="nir-btn me-4" tabindex="0" target="_blank" rel="noopener noreferrer">Book via WhatsApp</a>
                                            <a href="mailto:contact@ceylontravellanka.com?subject=Inquiry: 6 Day Sri Lanka Tour Itinerary" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="trend-full bg-white rounded box-shadow overflow-hidden mb-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-3">
                                <div class="trend-item trend-item2 rounded">
                                        <a href="#">
                                            <img src="<?= BASE_URL ?>images/it_l_3.webp" alt="image" class="" alt="7 Day Sri Lanka Tour Itinerary">
                                        </a>
                                        <div class="color-overlay"></div>
                                    </div> 
                                </div>
                                <div class="col-lg-8 col-md-9">
                                    <div class="trend-content position-relative text-md-start">
                                        <h3 class="mb-1"><a href="#">7 Day Sri Lanka Tour Itinerary</a></h3>
                                        <h5 class="theme mb-1">Classic Island Experience</h5>
                                        <p class="mt-3 mb-3"><strong>Route:</strong> Sigiriya → Habarana → Polonnaruwa → Trincomalee → Colombo</p>
                                        <p class="mb-3 itinerary-highlights">Dambulla Cave Temple • Sigiriya Lion Rock • Polonnaruwa Ancient City • Minneriya Elephant Safari • Trincomalee Hindu Kovils • Nilaveli Beach • Colombo City Tour & Shopping</p>
                                        <p class="mb-3">Discover historic landmarks and majestic wildlife before heading to the beautiful beaches of Trincomalee.</p>
                                        <!--p class="mb-4"><a href="#"><span class="theme"> Read More →</span></a></p-->
                                        <div class="slider-button">
                                            <a href="https://wa.me/+94759800348?text=I'm%20interested%20in%207%20Day%20Sri%20Lanka%20Tour%20Itinerary" class="nir-btn me-4" tabindex="0" target="_blank" rel="noopener noreferrer">Book via WhatsApp</a>
                                            <a href="mailto:contact@ceylontravellanka.com?subject=Inquiry: 7 Day Sri Lanka Tour Itinerary" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="trend-full bg-white rounded box-shadow overflow-hidden mb-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-3">
                                <div class="trend-item trend-item2 rounded">
                                        <a href="#">
                                            <img src="<?= BASE_URL ?>images/it_1_4.webp" alt="image" class="" alt="10 Day Sri Lanka Tour Itinerary">
                                        </a>
                                        <div class="color-overlay"></div>
                                    </div> 
                                </div>
                                <div class="col-lg-8 col-md-9">
                                    <div class="trend-content position-relative text-md-start">
                                        <h3 class="mb-1"><a href="#">10 Day Sri Lanka Tour Itinerary</a></h3>
                                        <h5 class="theme mb-1">Complete Island Journey</h5>
                                        <p class="mt-3 mb-3"><strong>Route:</strong> Colombo → Anuradhapura → Sigiriya → Kandy → Nuwara Eliya → Ella → Yala → Tangalle → Bentota</p>
                                        <p class="mb-3 itinerary-highlights">Sigiriya Lion Rock • Village Tour Experience • Anuradhapura Ancient City • Sri Maha Bodhi • Temple of the Tooth • Peradeniya Botanical Gardens • Tea Estates • Waterfalls • Ella Nine Arches Bridge • Little Adam’s Peak • Yala National Park Safari • Bentota Beach • Water Sports</p>
                                        <p class="mb-3">A comprehensive journey through the heart of the island, featuring world-class wildlife, sacred cities, and southern beaches.</p>
                                        <!--p class="mb-4"><a href="#"><span class="theme"> Read More →</span></a></p-->
                                        <div class="slider-button">
                                            <a href="https://wa.me/+94759800348?text=I'm%20interested%20in%2010%20Day%20Sri%20Lanka%20Tour%20Itinerary" class="nir-btn me-4" tabindex="0" target="_blank" rel="noopener noreferrer">Book via WhatsApp</a>
                                            <a href="mailto:contact@ceylontravellanka.com?subject=Inquiry: 10 Day Sri Lanka Tour Itinerary" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="trend-full bg-white rounded box-shadow overflow-hidden mb-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-3">
                                <div class="trend-item trend-item2 rounded">
                                        <a href="#">
                                            <img src="<?= BASE_URL ?>images/it_1_5.webp" alt="image" class="" alt="15 Day Sri Lanka Tour Itinerary">
                                        </a>
                                        <div class="color-overlay"></div>
                                    </div> 
                                </div>
                                <div class="col-lg-8 col-md-9">
                                    <div class="trend-content position-relative text-md-start">
                                        <h3 class="mb-1"><a href="#">15 Day Sri Lanka Tour Itinerary</a></h3>
                                        <h5 class="theme mb-1">Ultimate Sri Lanka Travel Experience</h5>
                                        <p class="mt-3 mb-3"><strong>Route:</strong> Negombo → Anuradhapura → Sigiriya → Kandy → Haputhale → Ella → Yala → Mirissa → Galle → Hikkaduwa → Bentota → Colombo</p>
                                        <p class="mb-3 itinerary-highlights">Negombo Lagoon & Fish Market • Anuradhapura Ancient City & Stupas • Sigiriya Lion Rock • Dambulla Cave Temple • Temple of the Tooth • Cultural Dance Show • Tea Plantations • Ella Nine Arches Bridge • Little Adam’s Peak • Yala National Park Safari • Mirissa Whale Watching • Galle Dutch Fort • Bentota Beach • Water Sports • River Safari</p>
                                        <p class="mb-3">Experience the soul of Sri Lanka in this 15-day odyssey featuring history, nature, mountains, and the entire southern coastline.</p>
                                        <!--p class="mb-4"><a href="#"><span class="theme"> Read More →</span></a></p-->
                                        <div class="slider-button">
                                            <a href="https://wa.me/+94759800348?text=I'm%20interested%20in%2015%20Day%20Sri%20Lanka%20Tour%20Itinerary" class="nir-btn me-4" tabindex="0" target="_blank" rel="noopener noreferrer">Book via WhatsApp</a>
                                            <a href="mailto:contact@ceylontravellanka.com?subject=Inquiry: 15 Day Sri Lanka Tour Itinerary" class="nir-btn-black" tabindex="0">Get Free Quote</a>
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
                                            <li>
                                                <a href="https://www.tiktok.com/@ceylon.travel.lanka" target="_blank">
                                                    <i class="rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 448 512" fill="currentColor" aria-label="TikTok">
                                                            <path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/>
                                                        </svg>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/cey78229/" target="_blank">
                                                    <i class="fab fa-instagram rounded" aria-hidden="true">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-label="Instagram">
                                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                        </svg>
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.facebook.com/ceylontravellankafanpage" target="_blank">
                                                    <i class="fab fa-facebook-f rounded" aria-hidden="true">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-label="Facebook">
                                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                                        </svg>
                                                    </i>
                                                </a>
                                            </li>
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