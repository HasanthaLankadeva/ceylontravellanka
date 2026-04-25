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

$preloadBanner = "images/banners/tour-itineraries.webp";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php require_once 'includes/head.php';?>
    
</head>

<body>

<div id="preloader">
    <div id="status"></div>
</div>

<?php require_once 'includes/header.php';?>

<section class="banner overflow-hidden">
    <div class="slider top50">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="slide-image">
                            <img src="images/banners/tour-itineraries.webp" width="1815" height="630" fetchpriority="high" decoding="async" alt="Travel hero image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url(images/bg/bg1.jpg);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(images/shape8.png);"></div>
    <!--div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">Tour Itineraries</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="https://htmldesigntemplates.com/html/travelin/car-grid.html#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tour Itineraries</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div-->
    <div class="dot-overlay"></div>
</section>

<section class="about-us pb-6 pt-6" style="background-image:url(images/shape4.png); background-position:center;">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            <!--h4 class="mb-1 theme1">3 Step of The Perfect Tour</h4-->
            <h1 class="mb-1">Explore the Island Your Way</h1>
            <p>Discover carefully crafted Sri Lanka tour itineraries designed to showcase the island’s rich culture, breathtaking landscapes, wildlife, and golden beaches. Whether you’re planning a cultural tour, adventure holiday, honeymoon, or relaxing beach getaway, our itineraries offer flexible, authentic travel experiences across Sri Lanka—tailored to your interests, time, and travel style.</p>
        </div>
    </div>
</section>

<section class="trending pt-6 pb-0 bg-lgrey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="trend-item rounded box-shadow">
                            <div class="trend-image position-relative">
                                <img src="images/trending/trending2.jpg" alt="image" class="">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content p-4 pt-5 position-relative">
                                <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                    <div class="entry-author">
                                        <i class="icon-calendar"></i>
                                        <span class="fw-bold"> 7 Days Tours</span>
                                    </div>
                                </div>
                                <!--h5 class="theme mb-1"><i class="flaticon-location-pin"></i> Croatia</h5-->
                                <h3 class="mb-1"><a href="tour-single.html">7-Day Sri Lanka Tour</a></h3>
                                <div class="rating-main d-flex align-items-center pb-2">
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                    <span class="ms-2">(12)</span>
                                </div>
                                <p class=" border-b pb-2 mb-2">Colombo → Kandy → Sigiriya → Nuwara Eliya → Ella → Bentota</p>
                                <p><b>Kandy:</b> Cultural sites, Temple of Tooth
                                <p><b>Sigiriya:</b> Lion Rock, Dambulla Cave Temple</p>
                                <p><b>Nuwara Eliya:</b> Tea estates, cool climate</p>
                                <p><b>Ella:</b> Nine Arches Bridge, Little Adam’s Peak</p>
                                <p><b>Bentota:</b> Beach, water sports</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="trend-item box-shadow rounded">
                            <div class="trend-image position-relative">
                                <img src="images/trending/trending3.jpg" alt="image">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content p-4 pt-5 position-relative">
                                <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                    <div class="entry-author">
                                        <i class="icon-calendar"></i>
                                        <span class="fw-bold"> 4 Days Tours</span>
                                    </div>
                                </div>
                                <h3 class="mb-1"><a href="tour-single.html">4 days Sri Lanka Tour</a></h3>
                                <div class="rating-main d-flex align-items-center pb-2">
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                    <span class="ms-2">(38)</span>
                                </div>
                                <p class=" border-b pb-2 mb-2">Colombo → Kandy → Nuwara Eliya → Bentota</p>
                                <p>Colombo to Kandy: Temple of the Tooth, city tour</p>
                                <p>Kandy to Nuwara Eliya: Tea plantations, Gregory Lake</p>
                                <p>Nuwara Eliya to Bentota: Beach relaxation</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="trend-item box-shadow rounded">
                            <div class="trend-image position-relative">
                                <img src="images/trending/trending4.jpg" alt="image">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content p-4 pt-5 position-relative">
                                <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                    <div class="entry-author">
                                        <i class="icon-calendar"></i>
                                        <span class="fw-bold"> 7 Days Tours</span>
                                    </div>
                                </div>
                                <h3 class="mb-1"><a href="tour-single.html">7-Day Sri Lanka Tour</a></h3>
                                <div class="rating-main d-flex align-items-center pb-2">
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                    <span class="ms-2">(18)</span>
                                </div>
                                <p class=" border-b pb-2 mb-2">Colombo → Kandy → Sigiriya → Nuwara Eliya → Ella → Bentota</p>
                                <p>Kandy: Cultural sites, Temple of Tooth</p>
                                <p>Sigiriya: Lion Rock, Dambulla Cave Temple</p>
                                <p>Nuwara Eliya: Tea estates, cool climate</p>
                                <p>Ella: Nine Arches Bridge, Little Adam’s Peak</p>
                                <p>Bentota: Beach, water sports</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-4">
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
                                <h5 class="theme mb-1"><i class="flaticon-location-pin"></i> Greece</h5>
                                <h3 class="mb-1"><a href="tour-single.html">Santorini, Oia</a></h3>
                                <div class="rating-main d-flex align-items-center pb-2">
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                    <span class="ms-2">(38)</span>
                                </div>
                                <p class=" border-b pb-2 mb-2">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</p>    
                            </div>
                        </div>                        
                    </div>
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="trend-item rounded box-shadow">
                            <div class="trend-image position-relative">
                                <img src="images/trending/trending2.jpg" alt="image" class="">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content p-4 pt-5 position-relative">
                                <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                    <div class="entry-author">
                                        <i class="icon-calendar"></i>
                                        <span class="fw-bold"> 9 Days Tours</span>
                                    </div>
                                </div>
                                <h5 class="theme mb-1"><i class="flaticon-location-pin"></i> Croatia</h5>
                                <h3 class="mb-1"><a href="tour-single.html">Piazza Castello</a></h3>
                                <div class="rating-main d-flex align-items-center pb-2">
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                    <span class="ms-2">(12)</span>
                                </div>
                                <p class=" border-b pb-2 mb-2">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-4">
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
                            <h5 class="theme mb-1"><i class="flaticon-location-pin"></i> Greece</h5>
                            <h3 class="mb-1"><a href="tour-single.html">Santorini, Oia</a></h3>
                            <div class="rating-main d-flex align-items-center pb-2">
                                <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <span class="ms-2">(38)</span>
                            </div>
                            <p class=" border-b pb-2 mb-2">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php';?>

</body>
</html>