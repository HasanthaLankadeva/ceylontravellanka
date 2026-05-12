<?php

require_once __DIR__ . '/config/config.php';

$currentpage = 'home';
$page = basename($_SERVER['PHP_SELF'], '.php');
$siteName = "Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$pageTitle = "Private Driver Sri Lanka | Best Custom Tour & Chauffeur Service | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Book a premium private driver in Sri Lanka. Custom tour packages with all-inclusive pricing. Trusted by international travelers for safety and flexibility.";
$metaKeywords = "";

$OGTitle = "Private Driver Sri Lanka | Airport Transfers & Tours | " . $siteName;
$OGdescription = "Reliable private drivers, airport transfers, and Sri Lanka tour packages. Book safe and comfortable travel with local experts.";

$preloadBanner = BASE_URL . "images/campaign/banner.webp";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once BASE_PATH . '/includes/landing/head.php';?>
</head>
<body>

    <?php require_once BASE_PATH . '/includes/landing/header.php';?>

    <section class="hero">
        <div class="container">
            <h1>Premium Private Driver in Sri Lanka for Custom Tours</h1>
            <p>Experience the ultimate freedom with the best chauffeur service in Sri Lanka. From the cool hills of Nuwara Eliya to the pristine Southern beaches, enjoy a 100% customized holiday package with a professional local driver.</p>
            <div class="slider-button d-flex justify-content-center">
                <a href="#price" class="nir-btn me-4" tabindex="0">Check Prices</a>
                <a href="https://www.tripadvisor.com/Attraction_Review-g11999643-d25571146-Reviews-Ceylon_Travel_Lanka-Minuwangoda_Western_Province.html" class="nir-btn-white" target="_blank" class="nir-btn-white" tabindex="0">
                    <svg xmlns="http://www.w3.org/2000/svg" height="40" width="60" viewBox="-25.2249 -28.885 218.6158 173.31" class="ta-image"><path fill="#000a12" d="M88.276 0c-14.668 0-27.92 3.694-38.371 10.523l-17.58.016s4.148 5.537 5.494 11.121c-3.425 4.658-5.48 10.386-5.48 16.6 0 15.48 12.6 28.053 28.085 28.053 8.847 0 16.736-4.105 21.89-10.514l5.972 8.928 6.031-9.004a27.794 27.794 0 0010.307 8.121c6.82 3.134 14.446 3.44 21.482.848 14.53-5.363 21.98-21.544 16.615-36.06a27.786 27.786 0 00-3.808-6.997c1.324-5.62 5.521-11.23 5.521-11.23l-18.734-.013C115.19 3.603 102.42 0 88.274 0zM30.444 81.868a2.235 2.235 0 00-2.23 2.233 2.23 2.23 0 004.458 0 2.236 2.236 0 00-2.228-2.233zm-23.06 1.988l-.26.094-3.378 1.158v4.41H0v2.96h3.637v9.49c0 4.521 1.54 6.363 5.31 6.363.963 0 1.879-.123 2.799-.369l.143-.041-.038-3.06-.265.085c-.736.267-1.319.393-1.774.393-1.765 0-2.427-1-2.427-3.691v-9.17h4.326v-2.96H7.385v-5.661zm38.177 5.229c-2.57 0-4.735 1.227-6.176 3.437V89.52h-3.428v26.02h3.748v-10.091c1.354 1.84 3.297 2.847 5.713 2.847 4.74 0 7.797-3.885 7.797-9.89 0-5.575-3.07-9.32-7.654-9.32zm-21.73.107c-2.173 0-3.925 1.175-5.023 3.327v-3h-3.425v18.486h3.748v-9.278c0-3.896 1.634-6.033 4.595-6.033.427 0 .847.065 1.352.207l.242.07.121-3.65-1.61-.129zm4.743.327v18.486h3.75V89.519h-3.75zm16.086 2.668c2.898 0 4.633 2.404 4.633 6.433 0 4.104-1.833 6.645-4.776 6.645-2.967 0-4.812-2.53-4.812-6.612 0-3.926 1.945-6.466 4.955-6.466z"/><path fill="#fcc40f" d="M115.482 10.318a28.015 28.015 0 00-8.839 1.695c-7.039 2.605-12.639 7.787-15.777 14.603-1.418 3.075-2.22 6.326-2.475 9.597-1.043-14.34-12.878-25.716-27.413-26.003C69.02 6.77 78.256 4.9 88.27 4.9c10.08 0 19.18 1.817 27.213 5.418"/><path fill="#fff" d="M60.424 15.848c-12.358 0-22.414 10.051-22.414 22.412 0 12.348 10.057 22.4 22.414 22.4 12.35 0 22.404-10.053 22.404-22.4 0-12.361-10.053-22.412-22.404-22.412zm54.389.1a22.324 22.324 0 00-7.694 1.386A22.263 22.263 0 0094.523 28.98a22.277 22.277 0 00-.66 17.137v.004A22.222 22.222 0 00105.5 58.707a22.276 22.276 0 0017.145.684c11.592-4.293 17.54-17.212 13.264-28.793-3.344-9.06-11.959-14.67-21.096-14.65z"/><path fill="#000a12" d="M60.075 24.147c-7.655 0-13.88 6.221-13.88 13.861 0 7.644 6.225 13.869 13.88 13.869 7.635 0 13.85-6.225 13.85-13.869 0-7.64-6.215-13.861-13.85-13.861zm56.246 0c-7.648 0-13.87 6.221-13.87 13.861 0 7.644 6.222 13.869 13.87 13.869 7.642 0 13.859-6.225 13.859-13.869 0-7.64-6.217-13.861-13.86-13.861z"/><path fill="#fff" d="M60.075 28.922c-5.023 0-9.108 4.077-9.108 9.086 0 5.011 4.085 9.098 9.108 9.098 5 0 9.072-4.087 9.072-9.098 0-5.009-4.072-9.086-9.072-9.086zm56.246 0c-5.013 0-9.092 4.077-9.092 9.086 0 5.011 4.08 9.098 9.092 9.098 5.009 0 9.082-4.087 9.082-9.098 0-5.009-4.073-9.086-9.082-9.086z"/><path fill="#ef6a45" d="M64.72 38.006a4.675 4.675 0 01-4.666 4.669 4.67 4.67 0 01-4.667-4.669 4.667 4.667 0 019.333 0"/><path fill="#00b087" d="M116.322 33.342a4.657 4.657 0 00-4.662 4.666 4.664 4.664 0 004.662 4.668 4.668 4.668 0 000-9.334zM87.03 80.696V92.03c-1.381-1.924-3.303-2.945-5.783-2.945-4.578 0-7.653 3.777-7.653 9.388 0 5.783 3.113 9.823 7.584 9.823 2.647 0 4.706-1.173 6.14-3.452v3.16h3.464V80.697H87.03zm28.195 1.172a2.229 2.229 0 100 4.46 2.229 2.229 0 000-4.46zm-51.06 7.217c-2.285 0-4.292.433-6.136 1.322l-.115.053.043 3.2.29-.165c1.765-.986 3.428-1.49 4.952-1.49 2.713 0 4.266 1.557 4.266 4.273v.156h-2.143c-6.167 0-9.568 2.236-9.568 6.293 0 3.257 2.452 5.532 5.96 5.532 2.582 0 4.581-1.014 6.003-2.924v2.67h3.39V96.814c0-5.124-2.331-7.729-6.941-7.729zm81.274 0c-5.635 0-9.137 3.708-9.137 9.68 0 5.967 3.502 9.673 9.137 9.673 5.659 0 9.176-3.706 9.176-9.674 0-5.97-3.517-9.68-9.176-9.68zm21.113.107c-2.165 0-3.922 1.175-5.024 3.326v-3h-3.421v18.486h3.748v-9.277c0-3.896 1.63-6.033 4.595-6.033.428 0 .844.064 1.348.207l.242.07.125-3.65-1.613-.13zm-38.26.113c-4.064 0-6.795 1.987-6.795 4.953 0 2.603 1.788 3.977 5.086 5.58 2.077 1.027 3.17 1.627 3.17 3.067 0 1.475-1.341 2.434-3.408 2.434-1.473 0-3.099-.42-4.707-1.206l-.276-.138-.123 3.26.13.052a13.06 13.06 0 004.831.918c4.586 0 7.549-2.189 7.549-5.57 0-2.823-1.879-4.249-5.125-5.764-2.38-1.114-3.38-1.775-3.38-2.955 0-1.122 1.111-1.853 2.825-1.853 1.55 0 3.065.342 4.496 1.023l.264.125.17-3.187-.145-.057c-1.562-.451-3.09-.682-4.562-.682zm-35.22.213l9.061 18.486 9.313-18.486h-3.918l-5.317 10.67-4.912-10.67h-4.226zm20.28 0v18.486h3.752V89.518h-3.752zm32.123 2.526c3.165 0 5.207 2.623 5.207 6.683 0 4.035-2.042 6.643-5.207 6.643-3.113 0-5.205-2.669-5.205-6.643 0-3.992 2.092-6.683 5.205-6.683zm-63.396.039c3.102 0 4.949 2.465 4.949 6.61 0 3.945-1.913 6.503-4.88 6.503-2.853 0-4.628-2.495-4.628-6.504 0-4.015 1.789-6.61 4.559-6.61zm-16.543 6.992h1.928v1.13c0 3.187-1.916 5.241-4.885 5.241-1.81 0-3.078-1.193-3.078-2.9 0-2.238 2.144-3.471 6.035-3.471z"/></svg> Book with Confidence
                </a>
            </div>
        </div>
    </section>

    <section class="container">
        <h2>Your Trusted Sri Lanka Holiday Partner</h2>
        <p style="text-align: center; max-width: 850px; margin: 0 auto 3rem;">Planning a <strong>Sri Lanka holiday from India</strong>? Skip the crowded tour buses. Our <strong>private car hire with driver</strong> service offers you the luxury of a personalized schedule. Whether you are seeking a <strong>Ramayana Trail tour</strong>, a romantic honeymoon, or a fun-filled family vacation, we provide modern, air-conditioned vehicles and expert drivers who speak English and understand your needs.</p>
        
        <div class="grid">
            <div class="card">
                <i>🗺️</i>
                <h3>Custom Itineraries</h3>
                <p>Don't settle for fixed plans. We help you build a <strong>custom Sri Lanka tour itinerary</strong> that fits your pace, interests, and budget perfectly.</p>
            </div>
            <div class="card">
                <i>🍛</i>
                <h3>Indian Food Friendly</h3>
                <p>Our drivers are experts at finding the best **Pure Veg and Indian restaurants** across Sri Lanka, ensuring you feel at home throughout your trip.</p>
            </div>
            <div class="card">
                <i>🛡️</i>
                <h3>Safety & Reliability</h3>
                <p>Travel with peace of mind. All our <strong>chauffeur-driven car rentals</strong> include comprehensive insurance, verified professional drivers, and 24/7 support.</p>
            </div>
        </div>
    </section>

    <section class="bg-light">
        <div class="container">
            <h2>Internationally Trusted Service</h2>
            <p style="text-align: center; max-width: 850px; margin: 0 auto 3rem;">Ceylon Travel Lanka is proud to maintain <strong>global standards of excellence</strong>. We are the preferred choice for travelers from Europe, the UK, and India, recognized for our punctuality, clean vehicles, and professional hospitality.</p>
            
            <div class="gallery-grid">
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/1.webp" alt="International travelers enjoying Sri Lanka tour" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/2.webp" alt="Modern private vehicle in Sri Lanka" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/3.webp" alt="Happy couple with private chauffeur" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/4.webp" alt="Clean and comfortable car interior" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/5.webp" alt="Clean and comfortable car interior" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/6.webp" alt="Clean and comfortable car interior" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/7.webp" alt="Clean and comfortable car interior" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/8.webp" alt="Clean and comfortable car interior" loading="lazy"></div>
            </div>
        </div>
    </section>

    <section id="price" class="container">
        <h2>Transparent Private Car Hire Price</h2>
        <p style="text-align: center; max-width: 850px; margin: 0 auto 3rem;">No hidden fees. Our all-inclusive daily rates cover fuel, highway tolls, and driver accommodation.</p>
        
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Vehicle Category</th>
                        <th>Max Capacity</th>
                        <th>Daily Rate (5+ Days)</th>
                        <th>Ideal For</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Standard Sedan</strong> (Axio/Grace)</td>
                        <td>3 Pax + Bags</td>
                        <td>$55 - $65</td>
                        <td>Couples / Small Families</td>
                    </tr>
                    <tr>
                        <td><strong>Luxury SUV</strong> (Prado)</td>
                        <td>4 Pax + Bags</td>
                        <td>$85 - $110</td>
                        <td>Premium Comfort</td>
                    </tr>
                    <tr>
                        <td><strong>Commuter Van</strong> (KDH)</td>
                        <td>6-9 Pax + Bags</td>
                        <td>$75 - $90</td>
                        <td>Family Groups</td>
                    </tr>
                    <tr>
                        <td><strong>Large Mini-Bus</strong></td>
                        <td>10-14 Pax</td>
                        <td>$100 - $130</td>
                        <td>Large Groups</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p style="text-align: center; font-size: 0.9rem; color: #777;">*Standard daily rates include 100km. Excess mileage charged at $0.45 - $0.55 per km.</p>
    </section>

    <section id="booking-form" class="bg-light">
        <div class="container">
            <h2>Start Planning Your Dream Trip</h2>
            <div class="form-box">
                <form action="YOUR_APPS_SCRIPT_URL" method="POST">
                    <div class="input-group">
                        <label>Your Name</label>
                        <input type="text" name="u_name" placeholder="Enter your full name" required>
                    </div>
                    <div class="input-group">
                        <label>WhatsApp Number</label>
                        <input type="tel" name="u_phone" placeholder="+91..." required>
                    </div>
                    <div style="display: flex; gap: 1rem;" class="input-group">
                        <div style="flex:1">
                            <label>Arrival Date</label>
                            <input type="date" name="u_date">
                        </div>
                        <div style="flex:1">
                            <label>Travelers</label>
                            <input type="number" name="u_pax" value="2" min="1">
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Tell us about your custom tour plan</label>
                        <textarea name="u_msg" rows="4" placeholder="E.g. We want to visit Kandy, Nuwara Eliya and Ella over 6 days..."></textarea>
                    </div>
                    <button type="submit" class="nir-btn me-4" style="width:100%">Request My Custom Quote</button>
                </form>
            </div>
        </div>
    </section>

    <?php require_once BASE_PATH . '/includes/landing/footer.php';?>

</body>
</html>