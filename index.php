<?php

require_once __DIR__ . '/config/config.php';

$currentpage = 'home';
$page = basename($_SERVER['PHP_SELF'], '.php');
$siteName = "Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$pageTitle = "Private Driver Sri Lanka | Airport Transfers & Tour Packages | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Book private driver services in Sri Lanka. Reliable airport transfers, tour packages, and custom travel with experienced drivers. Affordable & 24/7 service.";
$metaKeywords = "Sri Lanka private driver, Sri Lanka transport service, airport transfer Colombo, hire car with driver Sri Lanka, Sri Lanka tours, Sri Lanka taxi service";

$OGTitle = "Private Driver Sri Lanka | Airport Transfers & Tours | " . $siteName;
$OGdescription = "Reliable private drivers, airport transfers, and Sri Lanka tour packages. Book safe and comfortable travel with local experts.";

$preloadBanner = BASE_URL . "images/videos/hero.mp4";
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
                            <video width="320" height="240" preload autoplay loop muted playsinline>
                                <source src="<?= BASE_URL ?>images/videos/hero.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="swiper-content">
                            <h1 class="mb-2">Private Driver & Transport Services in Sri Lanka</h1>
                            <p class="white mb-4">Book airport transfers, private drivers, and comfortable travel across Sri Lanka with trusted local experts.</p>
                            <div class="slider-button d-flex justify-content-center">
                                <a href="https://wa.me/+94779177093?text=I'm%20interested%20in%20your%20services" class="nir-btn me-4">Book via WhatsApp</a>
                                <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-white">Get Free Quote</a>
                            </div>
                        </div>
                        <div class="dot-overlay"></div>
                    </div>
                </div>
                
                <!--div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="slide-image">
                            <img src="<?= BASE_URL ?>images/banners/tour-itineraries.webp" width="1815" height="630" fetchpriority="high" decoding="async" alt="Travel hero image">
                        </div>
                        <div class="swiper-content">
                            <h1 class="mb-2">Explore Sri Lanka with Custom Tour Packages</h1>
                            <p class="white mb-4">Discover beaches, mountains, and cultural sites with flexible itineraries and experienced drivers.</p>
                            <div class="slider-button d-flex justify-content-center">
                                <a href="<?= BASE_URL ?>/tour-itineraries.html" class="nir-btn me-4">View Tour Itineraries</a>
                            </div>
                        </div>
                        <div class="dot-overlay"></div>
                    </div>
                </div-->
               
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
                    <a href="<?= BASE_URL ?>services/airport-transfer.php">
                        <h5>Airport Transfers</h5>
                        <p>Safe and on-time pickup from Colombo Airport →</p>
                    </a>
                </div>
              </div>
              <div class="feature-box d-flex justify-content-start align-items-center flex-row-reverse gap-3 text-end bg-lyellow mt-3 px-3 py-2">
                <div>
                    <a href="<?= BASE_URL ?>tour-itineraries.php">
                        <h5>Custom Tours</h5>
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
                    <a href="<?= BASE_URL ?>services/private-driver-in-sri-lanka.php">
                        <h5>Private Driver Hire</h5>
                        <p>Flexible travel with experienced local drivers →</p>
                    </a>
                </div>
              </div>
              <div class="feature-box d-flex justify-content-start align-items-center gap-3 bg-lgreen mt-3 px-4 py-2">
                <div>
                    <a href="<?= BASE_URL ?>services">
                        <h5>Comfortable Vehicles</h5>
                        <p>Clean, air-conditioned cars for long journeys →</p>
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
    <div class="white-overlay"></div>
</section>

<section class="trending pb-0 pt-0">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h2 class="mb-3">Popular Routes with Private Drivers</h2>
            <p>Our <a href="<?= BASE_URL ?>services/private-driver-in-sri-lanka.php" class="underline">private drivers</a> cover all major tourist routes in Sri Lanka, making it easy to travel between destinations.</p>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4">
                <div class="trend-item1">
                    <div class="trend-image position-relative rounded">
                        <img src="<?= BASE_URL ?>images/destination/a_1.webp" alt="Route - Colombo to Sigiriya Rock Fortress">
                        <div class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                            <div class="trend-content-title">
                                <h3 class="mb-0 white"><!--a href="tour-grid.html" class="white"-->Colombo to Sigiriya<!--/a--></h3>
                            </div>

                        </div>
                        <div class="color-overlay"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="trend-item1">
                            <div class="trend-image position-relative rounded">
                                <img src="<?= BASE_URL ?>images/destination/a_2.webp" alt="Route - Kandy to Ella">
                                <div class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                                    <div class="trend-content-title">
                                        <h3 class="mb-0 white"><!--a href="tour-grid.html" class="white"-->Kandy to Ella<!--/a--></h3>
                                    </div>
                                </div>
                                <div class="color-overlay"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="trend-item1">
                            <div class="trend-image position-relative rounded">
                                <img src="<?= BASE_URL ?>images/destination/a_3.webp" alt="Route - Ella to Yala">
                                <div class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                                    <div class="trend-content-title">
                                        <h3 class="mb-0 white"><!--a href="tour-grid.html" class="white"-->Ella to Yala<!--/a--></h3>
                                    </div>
                                </div>
                                <div class="color-overlay"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="trend-item1">
                            <div class="trend-image position-relative rounded">
                                <img src="<?= BASE_URL ?>images/destination/colombo-kandy.webp" alt="Route - Colombo to Kandy">
                                <div class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100">
                                    <div class="trend-content-title">
                                        <h3 class="mb-0 white"><!--a href="tour-grid.html" class="white"-->Colombo to Kandy<!--/a--></h3>
                                    </div>
                                </div>
                                <div class="color-overlay"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="trend-item1">
                            <div class="trend-image position-relative rounded">
                                <img src="<?= BASE_URL ?>images/destination/colombo-galle.webp" alt="Route - Colombo to Galle">
                                <div class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                                    <div class="trend-content-title">
                                        <h3 class="mb-0 white"><!--a href="tour-grid.html" class="white"-->Colombo to Galle<!--/a--></h3>
                                    </div>
                                </div>
                                <div class="color-overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--div class="col-lg-12 text-center">
        <a href="tour-grid.html" class="nir-btn">View All Attractions</a>
    </div-->
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
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <h3 class="mb-1 itinerary-title"><a href="<?= BASE_URL ?>tour-itineraries.php">4 Day Sri Lanka Tour Itinerary</a></h3>
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
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <h3 class="mb-1 itinerary-title"><a href="<?= BASE_URL ?>tour-itineraries.php">6 Day Sri Lanka Tour Itinerary</a></h3>
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
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <h3 class="mb-1 itinerary-title"><a href="<?= BASE_URL ?>tour-itineraries.php">7 Day Sri Lanka Tour Itinerary</a></h3>
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
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <h3 class="mb-1 itinerary-title"><a href="<?= BASE_URL ?>tour-itineraries.php">10 Day Sri Lanka Tour Itinerary</a></h3>
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
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <h3 class="mb-1 itinerary-title"><a href="<?= BASE_URL ?>tour-itineraries.php">15 Day Sri Lanka Tour Itinerary</a></h3>
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
        <a href="<?= BASE_URL ?>tour-itineraries.php" class="nir-btn">View All Itineraries</a>
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
                                    <button type="button" class="play-btn js-video-button" data-video-id="152879427" data-channel="vimeo"><i class="fa fa-play bg-blue"></i></button>
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

<section class="pt-9">
    <div class="container">
    <div class="row offer-banner shadow-lg">
        <!-- Left Content -->
        <div class="col-md-6 d-flex align-items-center bg-map">
        <div class="offer-text w-100">
            <h2 class="fw-bold theme1 mb-1">Book Your Sri Lanka <br/>Transport Today</h2>
            <p class="mb-4">Contact us now for airport transfers, private drivers, or customized tour packages.</p>
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

<?php require_once BASE_PATH . '/includes/footer.php';?>

</body>
</html>