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
    <!-- Leaflet Map CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
</head>

<body class="subpage">

<div id="preloader">
    <div id="status"></div>
</div>

<?php require_once BASE_PATH . '/includes/header.php';?>

<!-- blog starts -->
<section class="blog intro-section itineraries pt-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pe-lg-4">
                <div class="details-pane">
                    <h1 class="mb-1">4 Day Sri Lanka Tour Itinerary</h1>
                    <!-- Information Grid Widgets -->
                    <section class="facts-grid">
                        <div class="fact-card">
                            <div class="icon-box">
                                <!-- Clock SVG -->
                                <svg viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path></svg>
                            </div>
                            <div class="fact-info">
                                <p>Duration</p>
                                <p>4 Days / 3 Nights</p>
                            </div>
                        </div>
                        <div class="fact-card">
                            <div class="icon-box">
                                <!-- Car/Vehicle SVG -->
                                <svg viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1s1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1s1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.27-3.82c.14-.4.51-.68.94-.68h9.56c.43 0 .8.28.94.68L19 11H5z"></path></svg>
                            </div>
                            <div class="fact-info">
                                <p>Travel Mode</p>
                                <p>Private AC Car</p>
                            </div>
                        </div>
                        <div class="fact-card">
                            <div class="icon-box">
                                <!-- Mountain SVG -->
                                <svg viewBox="0 0 24 24"><path d="M14 6l-3.75 5 2.85 3.8c.09.12.08.28-.02.38-.1.1-.26.11-.37.01L9 12.4 5 18h14l-5-12zm-8 7h2v2H6v-2zm0-4h2v2H6V9zm0-4h2v2H6V5zm10 0h2v2h-2V5zm0 4h2v2h-2V9zm0 4h2v2h-2v-2z"></path></svg>
                            </div>
                            <div class="fact-info">
                                <p>Themes</p>
                                <p>Culture &amp; Coast</p>
                            </div>
                        </div>
                        <div class="fact-card">
                            <div class="icon-box">
                                <!-- Wallet SVG -->
                                <svg viewBox="0 0 24 24"><path d="M21 18v1c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2V5c0-1.1.89-2 2-2h14c1.1 0 2 .9 2 2v1h-9c-1.11 0-2 .9-2 2v8c0 1.1.89 2 2 2h9zm-9-2h10V8H12v8zm4-2.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"></path></svg>
                            </div>
                            <div class="fact-info">
                                <p>Price Tier</p>
                                <p>All-Inclusive</p>
                            </div>
                        </div>
                    </section>

                    <!-- Sequential Itinerary Blocks -->
                    <section class="itinerary-section">
                        <h2>Your Action-Packed Itinerary</h2>
                        <div class="timeline">
                            
                            <!-- Day 1 Segment -->
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <span class="day-label">Day 1</span>
                                <h3>Cultural Heritage in Kandy</h3>
                                <img src="<?= BASE_URL ?>images/destination/1.jpeg" alt="Temple of the Tooth Kandy" class="itinerary-img">
                                <p>Arrive in Kandy, the last royal capital of Sri Lanka. Visit the sacred <strong>Temple of the Sacred Tooth Relic</strong> (Sri Dalada Maligawa), located inside the ancient royal palace complex. Witness traditional spiritual rituals before exploring the historic city square and enjoying a sunset walk along the lake perimeter.</p>
                                
                            </div>

                            <!-- Day 2 Segment -->
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <span class="day-label">Day 2</span>
                                <h3>Nuwara Eliya Tea Country &amp; Gregory Lake</h3>
                                <div class="img-grid">
                                    <img src="http://googleusercontent.com/image_collection/image_retrieval/10042537844317601841_0" alt="Tea Plantations Nuwara Eliya">
                                    <img src="http://googleusercontent.com/image_collection/image_retrieval/2360168727552764982_0" alt="Gregory Lake Nuwara Eliya">
                                </div>
                                <p>Climb into the cool emerald mist of the high-altitude tea country. Walk through historic colonial-era <strong>tea plantations</strong> to see traditional pickers at work, tour a manufacturing plant to see production steps, and enjoy tea tasting. Spend your afternoon strolling along the waterfront paths of <strong>Gregory Lake</strong>.</p>
                                <div class="meta-tags">
                                    <span><svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path></svg> Alpine Meadow Lodge</span>
                                    <span><svg viewBox="0 0 24 24"><path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4z"></path></svg> Breakfast Included</span>
                                </div>
                            </div>

                            <!-- Day 3 Segment -->
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <span class="day-label">Day 3</span>
                                <h3>Scenic Ella Valley &amp; Mountain Gaps</h3>
                                <p>Travel south along spectacular mountain corridors into the valley village of Ella. Walk across the architectural stone marvel of the colonial-era Nine Arch Bridge wrapped deep in dense jungle, and hike up Little Adam's Peak to watch sweeping panoramas over the deep Ella Gap mountain drop-offs.</p>
                                <div class="meta-tags">
                                    <span><svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path></svg> Ella View Cabanas</span>
                                    <span><svg viewBox="0 0 24 24"><path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4z"></path></svg> Breakfast Included</span>
                                </div>
                            </div>

                            <!-- Day 4 Segment -->
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <span class="day-label">Day 4</span>
                                <h3>Coastal Finish at Bentota Beach</h3>
                                <img src="http://googleusercontent.com/image_collection/image_retrieval/17920787880872046698_0" alt="Bentota Beach Sri Lanka" class="itinerary-img">
                                <p>Descend out of the central highlands and make your way to the sandy southwestern coastline to reach <strong>Bentota Beach</strong>. Relax under leaning coconut palms, wade in the warm Indian Ocean waves, or opt for riverboat safaris along the Bentota estuary before your departure flight transfer.</p>
                                <div class="meta-tags">
                                    <span><svg viewBox="0 0 24 24"><path d="M19 5h-14V3H3v18h2v-2h14c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 12H5V7h14v10z"></path></svg> Tour Loop Concludes</span>
                                    <span><svg viewBox="0 0 24 24"><path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4z"></path></svg> Breakfast Included</span>
                                </div>
                            </div>

                        </div>
                    </section>

                    <!-- Interactive Route Map Block -->
                    <section class="map-section">
                        <h2>Interactive Route Map</h2>
                    </section>
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

                                <p class="mt-3 mb-3 white">
                                    <a href="https://www.tripadvisor.com/Attraction_Review-g11999643-d25571146-Reviews-Ceylon_Travel_Lanka-Minuwangoda_Western_Province.html" class="nir-btn-white" target="_blank" tabindex="0" style="padding: 4px 20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="40" width="60" viewBox="-25.2249 -28.885 218.6158 173.31" class="ta-image"><path fill="#000a12" d="M88.276 0c-14.668 0-27.92 3.694-38.371 10.523l-17.58.016s4.148 5.537 5.494 11.121c-3.425 4.658-5.48 10.386-5.48 16.6 0 15.48 12.6 28.053 28.085 28.053 8.847 0 16.736-4.105 21.89-10.514l5.972 8.928 6.031-9.004a27.794 27.794 0 0010.307 8.121c6.82 3.134 14.446 3.44 21.482.848 14.53-5.363 21.98-21.544 16.615-36.06a27.786 27.786 0 00-3.808-6.997c1.324-5.62 5.521-11.23 5.521-11.23l-18.734-.013C115.19 3.603 102.42 0 88.274 0zM30.444 81.868a2.235 2.235 0 00-2.23 2.233 2.23 2.23 0 004.458 0 2.236 2.236 0 00-2.228-2.233zm-23.06 1.988l-.26.094-3.378 1.158v4.41H0v2.96h3.637v9.49c0 4.521 1.54 6.363 5.31 6.363.963 0 1.879-.123 2.799-.369l.143-.041-.038-3.06-.265.085c-.736.267-1.319.393-1.774.393-1.765 0-2.427-1-2.427-3.691v-9.17h4.326v-2.96H7.385v-5.661zm38.177 5.229c-2.57 0-4.735 1.227-6.176 3.437V89.52h-3.428v26.02h3.748v-10.091c1.354 1.84 3.297 2.847 5.713 2.847 4.74 0 7.797-3.885 7.797-9.89 0-5.575-3.07-9.32-7.654-9.32zm-21.73.107c-2.173 0-3.925 1.175-5.023 3.327v-3h-3.425v18.486h3.748v-9.278c0-3.896 1.634-6.033 4.595-6.033.427 0 .847.065 1.352.207l.242.07.121-3.65-1.61-.129zm4.743.327v18.486h3.75V89.519h-3.75zm16.086 2.668c2.898 0 4.633 2.404 4.633 6.433 0 4.104-1.833 6.645-4.776 6.645-2.967 0-4.812-2.53-4.812-6.612 0-3.926 1.945-6.466 4.955-6.466z"></path><path fill="#fcc40f" d="M115.482 10.318a28.015 28.015 0 00-8.839 1.695c-7.039 2.605-12.639 7.787-15.777 14.603-1.418 3.075-2.22 6.326-2.475 9.597-1.043-14.34-12.878-25.716-27.413-26.003C69.02 6.77 78.256 4.9 88.27 4.9c10.08 0 19.18 1.817 27.213 5.418"></path><path fill="#fff" d="M60.424 15.848c-12.358 0-22.414 10.051-22.414 22.412 0 12.348 10.057 22.4 22.414 22.4 12.35 0 22.404-10.053 22.404-22.4 0-12.361-10.053-22.412-22.404-22.412zm54.389.1a22.324 22.324 0 00-7.694 1.386A22.263 22.263 0 0094.523 28.98a22.277 22.277 0 00-.66 17.137v.004A22.222 22.222 0 00105.5 58.707a22.276 22.276 0 0017.145.684c11.592-4.293 17.54-17.212 13.264-28.793-3.344-9.06-11.959-14.67-21.096-14.65z"></path><path fill="#000a12" d="M60.075 24.147c-7.655 0-13.88 6.221-13.88 13.861 0 7.644 6.225 13.869 13.88 13.869 7.635 0 13.85-6.225 13.85-13.869 0-7.64-6.215-13.861-13.85-13.861zm56.246 0c-7.648 0-13.87 6.221-13.87 13.861 0 7.644 6.222 13.869 13.87 13.869 7.642 0 13.859-6.225 13.859-13.869 0-7.64-6.217-13.861-13.86-13.861z"></path><path fill="#fff" d="M60.075 28.922c-5.023 0-9.108 4.077-9.108 9.086 0 5.011 4.085 9.098 9.108 9.098 5 0 9.072-4.087 9.072-9.098 0-5.009-4.072-9.086-9.072-9.086zm56.246 0c-5.013 0-9.092 4.077-9.092 9.086 0 5.011 4.08 9.098 9.092 9.098 5.009 0 9.082-4.087 9.082-9.098 0-5.009-4.073-9.086-9.082-9.086z"></path><path fill="#ef6a45" d="M64.72 38.006a4.675 4.675 0 01-4.666 4.669 4.67 4.67 0 01-4.667-4.669 4.667 4.667 0 019.333 0"></path><path fill="#00b087" d="M116.322 33.342a4.657 4.657 0 00-4.662 4.666 4.664 4.664 0 004.662 4.668 4.668 4.668 0 000-9.334zM87.03 80.696V92.03c-1.381-1.924-3.303-2.945-5.783-2.945-4.578 0-7.653 3.777-7.653 9.388 0 5.783 3.113 9.823 7.584 9.823 2.647 0 4.706-1.173 6.14-3.452v3.16h3.464V80.697H87.03zm28.195 1.172a2.229 2.229 0 100 4.46 2.229 2.229 0 000-4.46zm-51.06 7.217c-2.285 0-4.292.433-6.136 1.322l-.115.053.043 3.2.29-.165c1.765-.986 3.428-1.49 4.952-1.49 2.713 0 4.266 1.557 4.266 4.273v.156h-2.143c-6.167 0-9.568 2.236-9.568 6.293 0 3.257 2.452 5.532 5.96 5.532 2.582 0 4.581-1.014 6.003-2.924v2.67h3.39V96.814c0-5.124-2.331-7.729-6.941-7.729zm81.274 0c-5.635 0-9.137 3.708-9.137 9.68 0 5.967 3.502 9.673 9.137 9.673 5.659 0 9.176-3.706 9.176-9.674 0-5.97-3.517-9.68-9.176-9.68zm21.113.107c-2.165 0-3.922 1.175-5.024 3.326v-3h-3.421v18.486h3.748v-9.277c0-3.896 1.63-6.033 4.595-6.033.428 0 .844.064 1.348.207l.242.07.125-3.65-1.613-.13zm-38.26.113c-4.064 0-6.795 1.987-6.795 4.953 0 2.603 1.788 3.977 5.086 5.58 2.077 1.027 3.17 1.627 3.17 3.067 0 1.475-1.341 2.434-3.408 2.434-1.473 0-3.099-.42-4.707-1.206l-.276-.138-.123 3.26.13.052a13.06 13.06 0 004.831.918c4.586 0 7.549-2.189 7.549-5.57 0-2.823-1.879-4.249-5.125-5.764-2.38-1.114-3.38-1.775-3.38-2.955 0-1.122 1.111-1.853 2.825-1.853 1.55 0 3.065.342 4.496 1.023l.264.125.17-3.187-.145-.057c-1.562-.451-3.09-.682-4.562-.682zm-35.22.213l9.061 18.486 9.313-18.486h-3.918l-5.317 10.67-4.912-10.67h-4.226zm20.28 0v18.486h3.752V89.518h-3.752zm32.123 2.526c3.165 0 5.207 2.623 5.207 6.683 0 4.035-2.042 6.643-5.207 6.643-3.113 0-5.205-2.669-5.205-6.643 0-3.992 2.092-6.683 5.205-6.683zm-63.396.039c3.102 0 4.949 2.465 4.949 6.61 0 3.945-1.913 6.503-4.88 6.503-2.853 0-4.628-2.495-4.628-6.504 0-4.015 1.789-6.61 4.559-6.61zm-16.543 6.992h1.928v1.13c0 3.187-1.916 5.241-4.885 5.241-1.81 0-3.078-1.193-3.078-2.9 0-2.238 2.144-3.471 6.035-3.471z"></path></svg> Book with Confidence
                                    </a>
                                </p>
                                
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

<!-- Leaflet Open-Source Mapping Library JS Links -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Initialize the Map centered globally over southern/central Sri Lanka
        const map = L.map('map').setView([6.85, 80.60], 8);

        // Load open street map tiles safely without APIs keys
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Coordinates for the 4-day route
        const kandy = [7.2906, 80.6337];
        const nuwaraEliya = [6.9607, 80.7693];
        const ella = [6.8731, 81.0491];
        const bentota = [6.4188, 80.0025];

        // Add visual Pin Markers
        L.marker(kandy).addTo(map).bindPopup('<b>Day 1: Kandy</b><br>Temple of the Tooth');
        L.marker(nuwaraEliya).addTo(map).bindPopup('<b>Day 2: Nuwara Eliya</b><br>Tea Country & Lake Gregory');
        L.marker(ella).addTo(map).bindPopup('<b>Day 3: Ella</b><br>Nine Arch Bridge');
        L.marker(bentota).addTo(map).bindPopup('<b>Day 4: Bentota</b><br>Beach Coast Finish');

        // Draw the connecting path routing sequence line
        const routePoints = [kandy, nuwaraEliya, ella, bentota];
        const polyline = L.polyline(routePoints, {
            color: '#d97706', // amber-600 hex
            weight: 4,
            opacity: 0.85,
            dashArray: '5, 8' // dashed style indicating highway pathing
        }).addTo(map);

        // Automatically zoom the map to frame the full driving path perfectly
        map.fitBounds(polyline.getBounds(), { padding: [20, 20] });
    </script>
</body>
</html>