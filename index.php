<?php

require_once __DIR__ . '/config/config.php';

$currentpage = 'home';

$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($path === '' || $path === 'index.php') {
    $page = 'index';
} else {
    $page = basename($path);
}

$siteName = "Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$pageTitle = "Private Driver Sri Lanka | Tours & Airport Transfers | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Explore Sri Lanka with a private driver, airport transfers and customized tours. Discover popular itineraries and request a personalized quote from Ceylon Travel Lanka.";
$metaKeywords = "private driver Sri Lanka, Sri Lanka private tours, Sri Lanka airport transfers, Sri Lanka private driver, Sri Lanka transport service, airport transfer Colombo, hire car with driver Sri Lanka, Sri Lanka tours, Sri Lanka taxi service";

$OGTitle = "Private Driver Sri Lanka | Airport Transfers & Tours | " . $siteName;
$OGdescription = "Reliable private drivers, airport transfers, and Sri Lanka tour packages. Book safe and comfortable travel with local experts.";

$preloadBanner = BASE_URL . "images/videos/poster.webp";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php require_once BASE_PATH . '/includes/head.php';?>
    
</head>
<body>

<!--div id="preloader">
    <div id="status"></div>
</div-->

<?php require_once BASE_PATH . '/includes/header.php';?>

<section class="banner overflow-hidden">
    <div class="slider top50">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="slide-image">
                            <video width="320" height="240" autoplay loop muted playsinline preload="auto" poster="<?= BASE_URL ?>images/videos/poster.webp">
                                <source src="<?= BASE_URL ?>images/videos/hero.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="swiper-content">
                            <h1 class="mb-2">Private Tours and Driver Hire in Sri Lanka</h1>
                            <p class="white mb-4">Explore Sri Lanka your way with a trusted local driver, comfortable private transportation, and personalized tour itineraries designed around your travel plans.</p>
                            <div class="slider-button d-flex justify-content-center">
                                <a href="mailto:contact@ceylontravellanka.com" class="nir-btn me-4">Plan My Sri Lanka Tour</a>
                                <a href="https://wa.me/+94759800348?text=I'm%20interested%20in%20your%20services" class="nir-btn-white">WhatsApp Us</a>
                            </div>
                        </div>
                        <div class="dot-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div-->
</section>
 
<section class="about-us pb-10 pt-10">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h2 class="mb-3">Your Trusted <br/>Travel Partner in Sri Lanka</h2>
            <p>We provide reliable and affordable transport services for travelers visiting Sri Lanka. From airport pickups to full island tours, we ensure a smooth and enjoyable journey.</p>
        </div>
        
        <div class="row justify-content-center align-items-start">
          <div class="col-md-4">
            <div class="d-flex flex-column gap-5">
              <div class="feature-box fbox-one d-flex justify-content-start align-items-center flex-row-reverse gap-3 text-end bg-lblue mb-3 px-4 py-2">
                <div>
                    <a href="<?= BASE_URL ?>services/airport-transfer">
                        <h5>Sri Lanka Airport Transfers</h5>
                        <p>Safe and on-time pickup from Colombo Airport →</p>
                    </a>
                </div>
              </div>
              <div class="feature-box d-flex justify-content-start align-items-center flex-row-reverse gap-3 text-end bg-lyellow mt-3 px-3 py-2">
                <div>
                    <a href="<?= BASE_URL ?>sri-lanka-tours/">
                        <h5>Tailor-Made Sri Lanka Tours</h5>
                        <p>Tailored itineraries based on your preferences →</p>
                    </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 d-flex justify-content-center">
            <img src="<?= BASE_URL ?>images/girl-1.webp" alt="Specialties" class="traveler-img w-75">
          </div>
          <div class="col-md-4">
            <div class="d-flex flex-column gap-5">
              <div class="feature-box fbox-three d-flex justify-content-start align-items-center gap-3 bg-lyellow mb-3 px-4 py-2">
                <div>
                    <a href="<?= BASE_URL ?>services/private-driver-in-sri-lanka">
                        <h5>Private Driver Hire in Sri Lanka</h5>
                        <p>Flexible travel with experienced local drivers →</p>
                    </a>
                </div>
              </div>
              <div class="feature-box d-flex justify-content-start align-items-center gap-3 bg-lgreen mt-3 px-4 py-2">
                <div>
                    <a href="<?= BASE_URL ?>services">
                        <h5>Private Car, Van or Bus Hire</h5>
                        <p>Clean, air-conditioned vehicles for long journeys →</p>
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
    <div class="white-overlay"></div>
</section>

<section class="featured-counter featured-fleet pb-6">
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
        <div class="col-lg-12 text-center pt-6">
            <a href="<?= BASE_URL ?>our-fleet" class="nir-btn">View Full Fleet</a>
        </div>
    </div>
</section>

<section class="trending pb-10">
    <div class="container">
        <div class="row align-items-center justify-content-between mb-6 ">
            <div class="col-lg-7">
                <div class="section-title text-center text-lg-start">
                    <h2 class="mb-3">Popular Sri Lanka Tour Itineraries</h2>
                    <p>Choose from our most popular travel plans or customize your own itinerary.</p>
                </div>
            </div>
            <div class="col-lg-5">
            </div>
        </div>
        <div class="trend-box">
            <div class="row item-slider">
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="trend-item rounded box-shadow">
                        <div class="trend-image position-relative">
                            <img src="<?= BASE_URL ?>images/it_1.webp" alt="4 Day Sri Lanka Tour Itinerary" class>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <h3 class="mb-1 itinerary-title"><a href="<?= BASE_URL ?>sri-lanka-tours/">4 Day Sri Lanka Tour Itinerary</a></h3>
                            <p class=" border-b pb-2 mb-2"><strong>Route:</strong> Kandy → Nuwara Eliya → Ella → Bentota</p>
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center mb-3">A perfect snapshot of the island featuring sacred Kandy, misty tea trails in Ella, and the golden shores of Bentota.</div>
                                <div class="slider-button">
                                    <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="trend-item box-shadow rounded">
                        <div class="trend-image position-relative">
                            <img src="<?= BASE_URL ?>images/it_2.webp" alt="image">
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <h3 class="mb-1 itinerary-title"><a href="<?= BASE_URL ?>sri-lanka-tours/">6 Day Sri Lanka Tour Itinerary</a></h3>
                            <p class=" border-b pb-2 mb-2"><strong>Route:</strong> Colombo → Sigiriya → Kandy → Nuwara Eliya → Bentota</p>
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center mb-3">Journey through ancient fortresses and tea-covered mountains toward a tropical beach finale.</div>
                                <div class="slider-button">
                                    <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="trend-item box-shadow rounded">
                        <div class="trend-image position-relative">
                            <img src="<?= BASE_URL ?>images/it_3.webp" alt="image">
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <h3 class="mb-1 itinerary-title"><a href="<?= BASE_URL ?>sri-lanka-tours/">7 Day Sri Lanka Tour Itinerary</a></h3>
                            <p class=" border-b pb-2 mb-2"><strong>Route:</strong> Sigiriya → Habarana → Polonnaruwa → Trincomalee → Colombo</p>
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center mb-3">Dive deep into the Cultural Triangle and unwind on the pristine white sands of the East Coast.</div>
                                <div class="slider-button">
                                    <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="trend-item box-shadow rounded">
                        <div class="trend-image position-relative">
                            <img src="<?= BASE_URL ?>images/it_4.webp" alt="image">
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <h3 class="mb-1 itinerary-title"><a href="<?= BASE_URL ?>sri-lanka-tours/">10 Day Sri Lanka Tour Itinerary</a></h3>
                            <p class=" border-b pb-2 mb-2"><strong>Route:</strong> Colombo → Anuradhapura → Sigiriya → Kandy → Nuwara Eliya → Ella → Yala → Tangalle → Bentota</p>
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center mb-3">The ultimate cross-country adventure covering ancient ruins, mountain peaks, and wild safari plains.</div>
                                <div class="slider-button">
                                    <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="trend-item box-shadow rounded">
                        <div class="trend-image position-relative">
                            <img src="<?= BASE_URL ?>images/it_5.webp" alt="image">
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <h3 class="mb-1 itinerary-title"><a href="<?= BASE_URL ?>sri-lanka-tours/">15 Day Sri Lanka Tour Itinerary</a></h3>
                            <p class=" border-b pb-2 mb-2"><strong>Route:</strong> Negombo → Anuradhapura → Sigiriya → Kandy → Haputhale → Ella → Yala → Mirissa → Galle → Hikkaduwa → Bentota → Colombo</p>
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center mb-3">Our most complete grand tour—covering every iconic destination from the north to the south coast.</div>
                                <div class="slider-button">
                                    <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-black" tabindex="0">Get Free Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 text-center">
        <a href="<?= BASE_URL ?>sri-lanka-tours/" class="nir-btn">View All Itineraries</a>
    </div>
</section>

<section class="discount-action front-video-wrapper dc__action mx-5 text-center rounded overflow-visible mb-2">
    <div class="section-shape section-shape1 top-inherit bottom-0"></div>
        <div class="container">
            <div class="call-banner rounded pt-10 pb-14">
                <div class="call-banner-inner w-75 mx-auto text-center px-5">
                    <div class="trend-content-main">
                        <div class="trend-content mb-5 pb-2 px-5">
                            <h2 class="white">Experience Sri Lanka with Us</h2>
                            <h3 class="white">We help travelers explore Sri Lanka comfortably and safely.</h3>
                        </div>
                        <div class="video-button text-center position-relative">
                            <div class="call-button text-center">
                                <a href="<?= BASE_URL ?>images/videos/popup_video.mp4" data-fancybox data-width="940" data-height="528">
                                    <button type="button" class="play-btn js-video-button" data-video-id="152879427" data-channel="vimeo">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="60px" height="60px" fill="currentColor">
                                            <path d="M7 5.41v13.18a1 1 0 0 0 1.53.85l10.54-6.59a1 1 0 0 0 0-1.7L8.53 4.56A1 1 0 0 0 7 5.41z"></path>
                                        </svg>
                                    </button>
                                </a>
                        </div>
                        <div class="video-figure"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dot-overlay rounded"></div>
</section>

<?php require_once BASE_PATH . '/includes/testimonials.php';?>

<!-- Faq starts-->
<section class="faq-main pb-6 pt-6">
    <div class="container">
        <div class="section-title mb-6 text-center w-75 mx-auto">
            <h2 class="mb-1">FAQ About Sri Lanka Private Tours</h2>
        </div>
        <div class="faq-accordian">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion1">
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h5>Why should I choose Ceylon Travel Lanka for my Sri Lanka tour?</h5>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Ceylon Travel Lanka offers reliable private transportation and personalized tour experiences for travelers exploring Sri Lanka. We provide private driver services, airport transfers, and customized itineraries designed around your interests, travel dates, and budget. Our air-conditioned vehicles and experienced local drivers help you explore Sri Lanka comfortably, from ancient cultural sites and scenic hill country to beautiful beaches and wildlife destinations. Whether you are traveling as a couple, family, or group, we help make your Sri Lanka holiday convenient and memorable.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h5>Do you provide private driver services in Sri Lanka?</h5>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Yes! We provide private driver services in Sri Lanka for individuals, couples, families, and groups. You can hire a private driver for day trips, airport transfers, or multi-day tours around the island. Our service allows you to travel at your own pace, visit the destinations you prefer, and enjoy a more flexible alternative to group tours and public transportation. Contact us with your itinerary and travel dates so we can recommend a suitable vehicle and service option.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h5>Do you offer airport transfers from Airport (CMB)?</h5>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Yes, Ceylon Travel Lanka provides airport pickup and transfer services from Bandaranaike International Airport (CMB), near Negombo. We can arrange transportation to your hotel, resort, or preferred destination in Sri Lanka. To organize your pickup, please share your flight number, arrival date and time, passenger count, luggage requirements, and destination. We recommend booking in advance so we can coordinate your arrival and transfer arrangements.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion ">
                            <div class="accrodion-title">
                                <h5>Can I customize my Sri Lanka tour itinerary?</h5>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Absolutely! We can help you plan a customized Sri Lanka tour based on your travel duration, interests, preferred destinations, and budget. You can combine cultural attractions such as Sigiriya and Kandy with the scenic hill country, tea plantations, Ella, wildlife safaris, and southern coastal destinations. Whether you need a short getaway or a longer island tour, share your preferences with us and we will help you plan a suitable itinerary.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion ">
                            <div class="accrodion-title">
                                <h5>How much does it cost to hire a private driver in Sri Lanka?</h5>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>The cost of hiring a private driver in Sri Lanka depends on your travel dates, trip duration, destinations, vehicle type, passenger count, and total distance. Airport transfers, day trips, and multi-day tours may have different pricing structures. At Ceylon Travel Lanka, you can request a personalized quotation based on your travel plans. To receive an accurate estimate, please share your itinerary, arrival and departure dates, number of travelers, and preferred vehicle type. We recommend confirming all inclusions and exclusions before booking.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion2">
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h5>What is included in your Sri Lanka tour packages?</h5>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>The inclusions depend on the tour and transportation option you choose. Depending on your quotation, your service may include a private air-conditioned vehicle, driver service, fuel, and agreed transfers or journeys. Accommodation, meals, attraction entrance tickets, safari fees, and other expenses should be confirmed separately unless specifically included in your package. Before confirming your booking with Ceylon Travel Lanka, we will clarify the applicable inclusions and exclusions so you can plan your travel budget with confidence.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion ">
                            <div class="accrodion-title">
                                <h5>Is Sri Lanka safe for tourists traveling with a private driver?</h5>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Traveling with a private driver can make getting around Sri Lanka more convenient, particularly when visiting several destinations during one trip. A local driver can help with route planning, transfers, and navigating unfamiliar roads. Ceylon Travel Lanka emphasizes comfortable transportation and professional service, with air-conditioned vehicles and tourist insurance as described on our website. We also recommend following local guidance, securing your belongings, and checking current travel advice before your journey.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h5>What are the best places to visit in Sri Lanka on a private tour?</h5>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Sri Lanka offers a wonderful mix of cultural landmarks, mountains, wildlife, and beaches. Popular destinations include Sigiriya for its iconic rock fortress, Kandy for its cultural heritage, Nuwara Eliya for tea plantations, Ella for scenic mountain views, Yala for wildlife safaris, and Galle for its historic fort and coastal atmosphere. You can also explore destinations such as Anuradhapura, Polonnaruwa, Mirissa, Bentota, and Trincomalee. We can help you combine destinations into an itinerary that matches your available time and interests.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion ">
                            <div class="accrodion-title">
                                <h5>How many days do I need to explore Sri Lanka?</h5>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>The ideal duration depends on how many places you want to visit and how relaxed you would like your trip to be. A 4–6 day tour can cover a selection of major highlights, while 7–10 days allows more time for cultural sites, the hill country, and selected coastal destinations. A 12–15 day itinerary can offer a more extensive island experience with additional stops and activities. These are general guidelines, and travel times between destinations should be considered when planning your route. Ceylon Travel Lanka can help tailor your itinerary to your schedule.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion ">
                            <div class="accrodion-title">
                                <h5>How Do I Book a Tour or Airport Transfer?</h5>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Booking with Ceylon Travel Lanka is simple. Contact us through our website, email, or WhatsApp and share your arrival date, departure date, number of travelers, preferred destinations, and transportation requirements. Our team can review your plans and provide a quotation based on your requested service. Once you have reviewed and agreed to the itinerary, price, and booking terms, we can coordinate the next steps for your reservation. For assistance, email <a href="mailto:contact@ceylontravellanka.com">contact@ceylontravellanka.com</a> or call/WhatsApp <a href="tel:+94759800348" title="Call">+94 75 980 0348</a>.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-9">
    <div class="container">
    <div class="row offer-banner shadow-lg">
        <!-- Left Content -->
        <div class="col-md-6 d-flex align-items-center bg-map">
        <div class="offer-text w-100">
            <h2 class="fw-bold theme1 mb-1">Book Your Sri Lanka <br/>Transport Today</h2>
            <p class="mb-4">Tell us your travel plans, and let us help you create a comfortable, personalized journey around Sri Lanka.</p>
            <div class="slider-button d-flex">
                <a href="https://wa.me/+94759800348?text=I'm%20interested%20in%20your%20services" class="nir-btn me-4" tabindex="0">Chat on WhatsApp</a>
                <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-white" tabindex="0">Plan Your Tour</a>
            </div>
        </div>
        </div>

        <!-- Right Image -->
        <div class="col-md-6 p-0">
        <img src="<?= BASE_URL ?>images/plan_your_journey_with_us_3.avif" alt="Book Your Sri Lanka Transport Today" class="right-img img-fluid w-100 h-100">
        </div>
    </div>
    </div>
</section>

<?php require_once BASE_PATH . '/includes/footer.php';?>

</body>
</html>