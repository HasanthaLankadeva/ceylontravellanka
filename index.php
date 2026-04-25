<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
$pageTitle = ucwords(str_replace(['-', '_'], ' ', $page));
$siteName = "Private Driver Sri Lanka | Airport Transfers & Tour Packages - Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$finalTitle = ($page === "index")
    ? $siteName
    : $pageTitle . " | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Book private driver services in Sri Lanka. Reliable airport transfers, tour packages, and custom travel with experienced drivers. Affordable & 24/7 service.";
$metaKeywords = "Sri Lanka private driver, Sri Lanka transport service, airport transfer Colombo, hire car with driver Sri Lanka, Sri Lanka tours, Sri Lanka taxi service";

$OGTitle = "Private Driver Sri Lanka | Airport Transfers & Tours";
$OGdescription = "Reliable private drivers, airport transfers, and Sri Lanka tour packages. Book safe and comfortable travel with local experts.";

$preloadBanner = "images/slider/1.webp";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php require_once 'includes/head.php';?>
    
</head>
<body>

<!--div id="preloader">
    <div id="status"></div>
</div-->

<?php require_once 'includes/header.php';?>

<section class="banner overflow-hidden">
    <div class="slider top50">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="slide-image">
                            <img src="images/slider/1.webp" width="1815" height="630" fetchpriority="high" decoding="async" alt="Travel hero image">
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
                
                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="slide-image">
                            <img src="images/slider/2.webp" width="1815" height="630" fetchpriority="high" decoding="async" alt="Travel hero image">
                        </div>
                        <div class="swiper-content">
                            <h1 class="mb-2">Explore Sri Lanka with Custom Tour Packages</h1>
                            <p class="white mb-4">Discover beaches, mountains, and cultural sites with flexible itineraries and experienced drivers.</p>
                            <div class="slider-button d-flex justify-content-center">
                                <a href="/tour-itineraries.html" class="nir-btn me-4">View Tour Itineraries</a>
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
                  <h5>Airport Transfers</h5>
                  <p>Safe and on-time pickup from Colombo Airport</p>
                </div>
              </div>
              <div class="feature-box d-flex justify-content-start align-items-center flex-row-reverse gap-3 text-end bg-lyellow mt-3 px-3 py-2">
                <div>
                  <h5>Custom Tours</h5>
                  <p>Tailored itineraries based on your preferences</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 d-flex justify-content-center">
            <img src="images/girl-1.webp" alt="Specialties" class="traveler-img w-75">
          </div>
          <div class="col-md-4">
            <div class="d-flex flex-column gap-5">
              <div class="feature-box fbox-three d-flex justify-content-start align-items-center gap-3 bg-lyellow mb-3 px-4 py-2">
                <div>
                  <h5>Private Driver Hire</h5>
                  <p>Flexible travel with experienced local drivers</p>
                </div>
              </div>
              <div class="feature-box d-flex justify-content-start align-items-center gap-3 bg-lgreen mt-3 px-4 py-2">
                <div>
                  <h5>Comfortable Vehicles</h5>
                  <p>Clean, air-conditioned cars for long journeys</p>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
    <div class="white-overlay"></div>
</section>

<section class="trending pb-5 pt-0">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h2 class="mb-3">Popular Routes with Private Drivers</h2>
            <p>Our private drivers cover all major tourist routes in Sri Lanka, making it easy to travel between destinations.</p>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4">
                <div class="trend-item1">
                    <div class="trend-image position-relative rounded">
                        <img src="images/destination/a_1.webp" alt="Route - Colombo to Sigiriya Rock Fortress">
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
                                <img src="images/destination/a_2.webp" alt="Route - Kandy to Ella">
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
                                <img src="images/destination/a_3.webp" alt="Route - Ella to Yala">
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
                                <img src="images/destination/colombo-kandy.webp" alt="Route - Colombo to Kandy">
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
                                <img src="images/destination/colombo-galle.webp" alt="Route - Colombo to Galle">
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

<section class="trending pb-0">
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
                            <img src="images/trending/trending2.jpg" alt="image" class>
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <i class="icon-calendar"></i>
                                    <span class="fw-bold"> 9 Days Tours</span>
                                </div>
                            </div>
                            <h5 class="theme1 mb-1"><i class="flaticon-location-pin"></i> Croatia</h5>
                            <h3 class="mb-1"><a href="tour-grid.html">Piazza Castello</a></h3>
                            <p class=" border-b pb-2 mb-2">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</p>
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="trend-item box-shadow rounded">
                        <div class="trend-image position-relative">
                            <img src="images/trending/trending3.jpg" alt="image">
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <i class="icon-calendar"></i>
                                    <span class="fw-bold"> 9 Days Tours</span>
                                </div>
                            </div>
                            <h5 class="theme1 mb-1"><i class="flaticon-location-pin"></i> Greece</h5>
                            <h3 class="mb-1"><a href="tour-grid.html">Santorini, Oia</a></h3>
                            <p class=" border-b pb-2 mb-2">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</p>
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="trend-item box-shadow rounded">
                        <div class="trend-image position-relative">
                            <img src="images/trending/trending4.jpg" alt="image">
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <i class="icon-calendar"></i>
                                    <span class="fw-bold"> 9 Days Tours</span>
                                </div>
                            </div>
                            <h5 class="theme1 mb-1"><i class="flaticon-location-pin"></i> Maldives</h5>
                            <h3 class="mb-1"><a href="tour-grid.html">Hurawalhi Island</a></h3>
                            <p class=" border-b pb-2 mb-2">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</p>
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="trend-item box-shadow rounded">
                        <div class="trend-image position-relative">
                            <img src="images/trending/trending1.jpg" alt="image">
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <i class="icon-calendar"></i>
                                    <span class="fw-bold"> 5 Days Tours</span>
                                </div>
                            </div>
                            <h5 class="theme1 mb-1"><i class="flaticon-location-pin"></i> Greece</h5>
                            <h3 class="mb-1"><a href="tour-grid.html">Santorini, Oia</a></h3>
                            <p class=" border-b pb-2 mb-2">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</p>
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 text-center">
        <a href="/tour-itineraries.html" class="nir-btn">View All Packages</a>
    </div>
</section>

<section class="discount-action pt-6">
    <div class="section-shape section-shape1 top-inherit bottom-0"></div>
        <div class="container">
            <div class="call-banner rounded pt-10 pb-14">
                <div class="call-banner-inner w-75 mx-auto text-center px-5">
                    <div class="trend-content-main">
                        <div class="trend-content mb-5 pb-2 px-5">
                            <h2>Experience Sri Lanka with Us</h2>
                            <p>Watch how we help travelers explore Sri Lanka comfortably and safely.</p>
                        </div>
                        <div class="video-button text-center position-relative">
                            <div class="call-button text-center">
                                <a href="images/videos/popup_video.mp4" data-fancybox data-width="940" data-height="528">
                                    <button type="button" class="play-btn js-video-button" data-video-id="152879427" data-channel="vimeo"><i class="fa fa-play bg-blue"></i></button>
                                </a>
                        </div>
                        <div class="video-figure"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="white-overlay"></div>
</section>

<section class="testimonial pt-9">
    <div class="container">
        <div class="section-title mb-6 text-center w-75 mx-auto">
            <h2 class="mb-3">What Our Customers Say</h2>
        </div>
        <div class="row align-items-center">

            <div class="col-lg-7 ps-4">
                <div class="row review-slider">
                    <div class="col-sm-4 item">
                        <div class="testimonial-item1 rounded">
                            <div class="author-info d-flex align-items-center mb-4">
                                <img src="images/testimonial/img1.jpg" alt>
                                <div class="author-title ms-3">
                                    <h5 class="m-0 theme">Jared Erondu</h5>
                                    <span>Supervisor</span>
                                </div>
                            </div>
                            <div class="details">
                                <p class="m-0"><i class="fa fa-quote-left me-2 fs-1"></i>Lorem Ipsum is simply dummy text of the printing andypesetting industry. Lorem ipsum a simple Lorem Ipsum has been the industry's standard dummy hic et quidem. Dignissimos maxime velit unde inventore quasi vero dolorem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 item">
                        <div class="testimonial-item1 rounded">
                            <div class="author-info d-flex align-items-center mb-4">
                                <img src="images/testimonial/img1.jpg" alt>
                                <div class="author-title ms-3">
                                    <h5 class="m-0 theme">Jared Erondu</h5>
                                    <span>Supervisor</span>
                                </div>
                            </div>
                            <div class="details">
                                <p class="m-0"><i class="fa fa-quote-left me-2 fs-1"></i>Lorem Ipsum is simply dummy text of the printing andypesetting industry. Lorem ipsum a simple Lorem Ipsum has been the industry's standard dummy hic et quidem. Dignissimos maxime velit unde inventore quasi vero dolorem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 pe-4">
                <div class="testimonial-image">
                    <img src="images/travel2.webp" alt>
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
            <p class="mb-4">Contact us now for airport transfers, private drivers, or customized tour packages.</p>
            <div class="slider-button d-flex">
                <a href="https://wa.me/+94779177093?text=I'm%20interested%20in%20your%20services" class="nir-btn me-4" tabindex="0">Book via WhatsApp</a>
                <a href="mailto:contact@ceylontravellanka.com" class="nir-btn-white" tabindex="0">Get Free Quote</a>
            </div>
        </div>
        </div>

        <!-- Right Image -->
        <div class="col-md-6 p-0">
        <img src="images/bg6.webp" alt="Book Your Sri Lanka Transport Today" class="right-img img-fluid w-100 h-100">
        </div>
    </div>
    </div>
</section>

<?php require_once 'includes/footer.php';?>

</body>
</html>