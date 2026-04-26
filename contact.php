<?php
$currentpage = 'contact';
$page = basename($_SERVER['PHP_SELF'], '.php');
$siteName = "Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$pageTitle =  "Tailor-Made Sri Lanka Tours | Custom Travel Packages | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Create your perfect Sri Lanka holiday with our tailor-made tours. Fully customizable itineraries, private drivers, and personalized travel experiences.";
$metaKeywords = "tailor made Sri Lanka tours, custom Sri Lanka itinerary, private tours Sri Lanka, Sri Lanka travel packages, personalized tours";

$OGTitle = "Tailor-Made Sri Lanka Tours | Custom Travel Packages | " . $siteName;
$OGdescription = "Plan your perfect Sri Lanka trip with fully customized tours designed just for you.";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php require_once 'includes/head.php';?>
    
</head>

<body class="subpage">

<div id="preloader">
    <div id="status"></div>
</div>

<?php require_once 'includes/header.php';?>

<section class="about-us pt-6 pb-6">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h1 class="mb-1">Tailor-Made Sri Lanka Tours</h1>
            <p>Create your perfect journey with our tailor-made Sri Lanka tours, designed entirely around your preferences, travel style, and budget. Whether you dream of exploring ancient cultural sites, relaxing on pristine beaches, discovering wildlife, or experiencing scenic hill country, we craft personalized itineraries to match your expectations.</p>
            <p>At Ceylon Travel Lanka, we specialize in flexible travel planning with private drivers, handpicked accommodations, and carefully curated experiences. Your trip is fully customizable, ensuring a unique and unforgettable Sri Lanka holiday.</p>
        </div>
    </div>
</section>

<section class="contact-main pt-6 pb-60">
    <div class="container">
        <div class="contact-info-main mt-0">
            <div class="row">
                <div class="col-lg-10 col-offset-lg-1 mx-auto">
                    <div class="contact-info bg-white">

                        <div class="contact-info-content row mb-1">
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                    <div class="info-icon mb-2">
                                        <i class="fa fa-map-marker-alt theme"></i>
                                    </div>
                                    <div class="info-content">
                                        <h3>Office Location</h3>
                                        <p class="m-0">445 Mount Eden Road, Mt Eden Basundhara Chakrapath</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                    <div class="info-icon mb-2">
                                        <i class="fa fa-phone theme"></i>
                                    </div>
                                    <div class="info-content">
                                        <h3>Phone Number</h3>
                                        <p class="m-0">977-444-666-888</p>
                                        <p class="m-0">977-444-222-000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 mb-4">
                                <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                    <div class="info-icon mb-2">
                                        <i class="fa fa-envelope theme"></i>
                                    </div>
                                    <div class="info-content ps-4">
                                        <h3>Email Address</h3>
                                        <p class="m-0">info@realshield.com</p>
                                        <p class="m-0">help@realshield.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="contact-form1" class="contact-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="map rounded overflow-hiddenb rounded mb-md-4">
                                        <div style="width: 100%">
                                            <iframe height="500" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+(mangal%20bazar)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
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