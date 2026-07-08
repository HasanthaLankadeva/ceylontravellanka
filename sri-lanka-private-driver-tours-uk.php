<?php

require_once __DIR__ . '/config/config.php';

$currentpage = 'home';
$page = basename($_SERVER['PHP_SELF'], '.php');
$siteName = "Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$pageTitle = "Private Driver Sri Lanka | Custom Tour Packages & Chauffeur | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Hire a premium private driver in Sri Lanka. 100% custom tour packages, all-inclusive rates & expert chauffeurs. Best for Indian families. Get your free quote!";
$metaKeywords = "private driver sri lanka, sri lanka tour packages from india, car hire with driver sri lanka, chauffeur service sri lanka, custom sri lanka tours, ramayana trail sri lanka, sri lanka chauffeur guide.";

$OGTitle = "Your Private Driver in Sri Lanka | 100% Custom Tour Packages | " . $siteName;
$OGdescription = "Experience Sri Lanka with a professional private driver. All-inclusive rates, flexible itineraries, and pure-veg food stops. Plan your dream custom tour now!";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once BASE_PATH . '/includes/landing/head.php';?>
</head>
<body>

    <?php require_once BASE_PATH . '/includes/landing/header.php';?>

    <section class="hero">
        <div class="image-wrapper">
            <picture>
                <source
                    media="(max-width: 738px)"
                    srcset="<?= BASE_URL ?>images/campaign/Sri-Lanka-beaches-February-scaled-mobile.avif"
                >
                <img
                    src="<?= BASE_URL ?>images/campaign/Sri-Lanka-beaches-February-scaled.avif"
                    alt="International travelers enjoying Sri Lanka tour"
                    width="1815"
                    height="615"
                    fetchpriority="high"
                    loading="eager"
                    decoding="async"
                >
            </picture>
            <!--img src="<?= BASE_URL ?>images/campaign/campaign_banner.webp" alt="International travelers enjoying Sri Lanka tour"-->
        </div>
        <div class="container">
            <h1>Explore Sri Lanka Your Way <br/> Premium Private Chauffeur & Tailored Tours</h1>
            <p>Experience the ultimate comfort of a dedicated, English-speaking local driver. Custom itineraries covering Negombo, Weligama, Unawatuna, Ahangama, and beyond—all with transparent, fixed pricing and absolutely no hidden fees.</p>
           <div class="hero-ctas">
                <a href="#booking-form" class="btn nir-btn px-3 py-1 ms-3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"></path></svg>
                Get a Free Quote
                </a>
                <a href="https://wa.me/94771234567?text=Hi%20Ceylon%20Ride!%20I%20need%20a%20tuk-tuk%20or%20scooter" target="_blank" rel="noopener" class="btn btn-secondary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.967-.94 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.445-.521.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.521-.075-.149-.67-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.297-.01-.47-.01-.172 0-.445.063-.678.313-.222.25-.86.84-.86 2.05 0 1.21.882 2.38 1.005 2.545.123.165 1.735 2.65 4.205 3.715.587.254 1.045.405 1.402.518.59.187 1.127.16 1.552.097.473-.07 1.758-.718 2.007-1.413.25-.694.25-1.29.174-1.414-.074-.123-.272-.198-.57-.347z"></path><path d="M12.004 2.003c-5.52 0-10 4.48-10 10 0 1.76.46 3.42 1.26 4.88L2 22l5.26-1.38A9.94 9.94 0 0012 22c5.52 0 10-4.48 10-10s-4.48-10-9.996-10z" fill="none" stroke="currentColor" stroke-width="1.5"></path></svg>
                WhatsApp Us
                </a>
            </div>
    </section>

    <section class="container">
        <h2>Your Journey, Managed by True Local Experts</h2>
        <p class="intro-text">Navigating a long-haul holiday shouldn't involve transit stress. We bridge the gap between premium western expectations and authentic Sri Lankan hospitality.</p>
        
        <div class="grid">
            <div class="card">
                <i>🗺️</i>
                <h3>Tailored Experiences</h3>
                <p>Don't settle for rigid, cookie-cutter tour packages. We help you design a <b>tailored Sri Lanka itinerary</b> that matches your exact pace, interests, and style—whether you want boutique beach escapes, wildlife safaris, or cultural treks.</p>
            </div>
            <div class="card">
                <i>🤝</i>
                <h3>Local Insider Access</h3>
                <p>Skip the tourist traps. Our English-speaking drivers act as your local guides, connecting you with <b>authentic culinary experiences</b>, hidden viewpoints, and cultural insights you won't find in standard guidebooks.</p>
            </div>
            <div class="card">
                <i>🛡️</i>
                <h3>Transparent & Reliable</h3>
                <p>Travel with total confidence. Our <b>chauffeur-driven private tours</b> feature fixed, transparent pricing with no hidden costs, comprehensive vehicle insurance, and professional, vetted drivers dedicated to your safety.</p>
            </div>
        </div>
    </section>

    <section class="video-section">
        <div class="container">
            <h2 class="video-section-title">Glimpses of Sri Lanka</h2>
            <p class="video-section-subtitle">Watch our guests experiencing the ultimate private tours</p>
            
            <div class="video-grid">
                
                <!-- Card 1 -->
                <div class="video-card js-video-card" data-video-id="FmlcNbNJl1s">
                    <div class="video-overlay-gradient"></div>
                    
                    <div class="video-card-header">
                        <div class="brand-avatar"><img src="<?= BASE_URL ?>images/logo.svg"></div>
                        <div class="header-text-container">
                            <h3 class="video-card-title">Best affordable private driver in Sri Lanka</h3>
                            <p class="video-card-author">CeylonTravelLanka</p>
                        </div>
                    </div>
                    
                    <div class="custom-play-btn">
                        <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </div>
                    
                    <!-- Verbatim asset pointer to your verified media reference file -->
                    <img src="<?= BASE_URL ?>images/campaign/video_1.avif" class="video-thumbnail" alt="Best affordable private driver in Sri Lanka">
                    
                    <div class="video-card-footer">
                        <div class="share-circle-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8M16 6l-4-4-4 4M12 2v13"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="video-card js-video-card" data-video-id="V_a2WBlf3Zw">
                    <div class="video-overlay-gradient"></div>
                    
                    <div class="video-card-header">
                        <div class="brand-avatar"><img src="<?= BASE_URL ?>images/logo.svg"></div>
                        <div class="header-text-container">
                            <h3 class="video-card-title">Immersive culture & happy clients with the Ceylon Travel team</h3>
                            <p class="video-card-author">CeylonTravelLanka</p>
                        </div>
                    </div>
                    
                    <div class="custom-play-btn">
                        <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </div>
                    
                    <img src="<?= BASE_URL ?>images/campaign/video_2.avif" class="video-thumbnail" alt="Immersive culture & happy clients with the Ceylon Travel team">
                    
                    <div class="video-card-footer">
                        <div class="share-circle-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8M16 6l-4-4-4 4M12 2v13"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="video-card js-video-card" data-video-id="iSB7CwT3ftA">
                    <div class="video-overlay-gradient"></div>
                    
                    <div class="video-card-header">
                        <div class="brand-avatar"><img src="<?= BASE_URL ?>images/logo.svg"></div>
                        <div class="header-text-container">
                            <h3 class="video-card-title">The ultimate spiritual escape in Sri Lanka</h3>
                            <p class="video-card-author">CeylonTravelLanka</p>
                        </div>
                    </div>
                    
                    <div class="custom-play-btn">
                        <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </div>
                    
                    <img src="<?= BASE_URL ?>images/campaign/video_3.avif" class="video-thumbnail" alt="The ultimate spiritual escape in Sri Lanka">
                    
                    <div class="video-card-footer">
                        <div class="share-circle-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8M16 6l-4-4-4 4M12 2v13"/></svg>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-light">
        <div class="container">
            <h2>Internationally Trusted Service</h2>
            <p class="intro-text">Ceylon Travel Lanka is proud to maintain <strong>global standards of excellence</strong>. We are the preferred choice for travelers from Europe and the UK, recognized for our punctuality, clean vehicles, and professional hospitality.</p>
            
            <div class="gallery-grid mobile-slider1">
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/1.webp" alt="Internationally Trusted Service - Ceylon Travel Lanka" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/2.webp" alt="Internationally Trusted Service - Ceylon Travel Lanka" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/3.webp" alt="Internationally Trusted Service - Ceylon Travel Lanka" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/4.webp" alt="Internationally Trusted Service - Ceylon Travel Lanka" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/5.webp" alt="Internationally Trusted Service - Ceylon Travel Lanka" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/6.webp" alt="Internationally Trusted Service - Ceylon Travel Lanka" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/7.webp" alt="Internationally Trusted Service - Ceylon Travel Lanka" loading="lazy"></div>
                <div class="gallery-item"><img src="<?= BASE_URL ?>images/campaign/8.webp" alt="Internationally Trusted Service - Ceylon Travel Lanka" loading="lazy"></div>
            </div>
        </div>
    </section>

    <section class="container ta-container">
        <!-- Left Side: Copy & Endorsement -->
        <div class="ta-content">
            <p class="ta-sub">Globally Recognized Excellence</p>
            <h2 class="ta-title">Don't Just Take Our Word For It</h2>
            <p class="ta-text">We are incredibly proud to maintain a flawless <strong>5.0-star rating</strong> backed by the independent reviews from international travelers. From punctual airport pickups to breathtaking coastal routes, our commitment to safety, transparency, and hospitality is fully verified by the world’s largest travel platform.</p>
            <div class="ta-features">
                <div class="ta-feature-item">⭐ 100% Verified Guest Feedback</div>
                <div class="ta-feature-item">🏅 Certificate of Excellence Standard</div>
            </div>
        </div>
        <div class="ta-widget-box">
            <div class="ta-widget-placeholder">
                <div id="TA_selfserveprop182" class="TA_selfserveprop"><ul id="1OFxOJRZa" class="TA_links WfJpbdXWV8Y9"><li id="40uEybYvtJFT" class="URsjmO0aYV"><a target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g11999643-d25571146-Reviews-Ceylon_Travel_Lanka-Minuwangoda_Western_Province.html"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/v2/Tripadvisor_lockup_horizontal_secondary_registered-11900-2.svg" alt="TripAdvisor"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=182&amp;locationId=25571146&amp;lang=en_US&amp;rating=true&amp;nreviews=4&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=true&amp;border=true&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
            </div>
        </div>
    </section>

    <section id="booking-form" class="bg-light">
        <div class="container">
            <h2>Start Planning Your Dream Trip</h2>
            <div class="form-box">
                <div id="success-message" style="display:none; text-align:center; padding: 2rem; background: #e7f3ef; border-radius: 8px; border: 1px solid #28a745; margin-bottom: 2rem;">
                    <h3 class="inquiry-success">Inquiry Sent Successfully!</h3>
                    <p>Thank you for choosing Ceylon Travel Lanka. Our team will contact you via WhatsApp shortly.</p>
                </div>

                <form id="tour-inquiry-form" class="contact-form">
                    <div class="input-group">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter your full name" required>
                        <input type="hidden" name="campaign" id="campaign" value="UkOne">
                    </div>
                    <div class="input-group">
                        <label for="phone">WhatsApp Number</label>
                        <input type="tel" name="phone" id="phone" placeholder="+44..." required>
                    </div>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter your Email" required>
                    </div>
                    <div class="flex-group input-group">
                        <div class="wrap date-wrap">
                            <label for="arrivaldate">Arrival Date</label>
                            <input type="date" name="arrivaldate" id="arrivaldate">
                        </div>
                        <div class="wrap adult-wrap">
                            <label for="adults">Adults</label>
                            <input type="number" name="adults" id="adults" value="2" min="1">
                        </div>
                        <div class="wrap child-wrap">
                            <label for="children">Children</label>
                            <input type="number" name="children" id="children" value="0" min="0">
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="message">Tell us about your custom tour plan</label>
                        <textarea name="message" id="message" rows="4" placeholder="E.g. We want to visit Kandy, Nuwara Eliya and Ella over 6 days..."></textarea>
                    </div>
                    <button type="submit" id="submit-btn" class="nir-btn me-4 submit-btn">Request My Free Plan</button>
                </form>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            <h2 class="section-title">Book Your Private Driver</h2>
            <p class="intro-text">Get in touch with us 24/7 to plan your perfect Sri Lanka itinerary</p>
            
            <div class="contact-grid">
                
                <a href="tel:+94759800348" class="contact-block call">
                    <div class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="32" height="32">
                            <path d="M6.62 10.79a15.15 15.15 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.11-.27c1.12.37 2.33.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.26 1.12l-2.2 2.2z"/>
                        </svg>
                    </div>
                    <h3>Call Us</h3>
                    <p>Speak directly with our travel experts for immediate booking queries.</p>
                    <span class="contact-btn">+94 75 980 0348</span>
                </a>

                <a href="https://wa.me/+94759800348?text=Hi%20Ceylon%20Travel%20Lanka,%20I'm%20interested%20in%20booking%20a%20private%20driver%20tour." target="_blank" class="contact-block w-app">
                    <div class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="32" height="32">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397 0 11.966 0c3.184.001 6.177 1.242 8.43 3.496 2.253 2.253 3.491 5.247 3.491 8.434 0 6.566-5.338 11.912-11.906 11.912-2.003-.001-3.972-.505-5.716-1.465L0 24zm6.59-4.846c1.66.986 3.296 1.503 4.81 1.504 5.325 0 9.658-4.325 9.661-9.643a9.553 9.553 0 0 0-2.813-6.822A9.563 9.563 0 0 0 11.584 1.41c-5.332 0-9.667 4.327-9.67 9.646-.001 1.636.43 3.232 1.251 4.646l-.997 3.638 3.729-.978zm11.332-6.52c-.314-.157-1.859-.918-2.143-1.022-.284-.105-.49-.157-.696.157-.206.314-.798.994-.978 1.199-.18.206-.36.232-.674.075-.314-.157-1.327-.489-2.528-1.561-.933-.833-1.564-1.862-1.747-2.177-.18-.314-.019-.484.138-.64.141-.141.314-.367.472-.55.157-.184.21-.314.314-.524.105-.21.052-.393-.026-.55-.078-.157-.696-1.678-.954-2.299-.25-.603-.505-.522-.696-.532-.18-.009-.386-.011-.592-.011-.206 0-.541.078-.824.386-.284.307-1.082 1.058-1.082 2.581s1.108 2.997 1.262 3.207c.154.21 2.181 3.33 5.285 4.671.738.319 1.315.509 1.765.652.742.236 1.417.203 1.95.123.595-.089 1.859-.759 2.118-1.454.258-.696.258-1.293.18-1.414-.078-.122-.284-.197-.598-.355z"/>
                        </svg>
                    </div>
                    <h3>WhatsApp</h3>
                    <p>Chat instantly with us. Send itineraries, custom requests, and map destinations.</p>
                    <span class="contact-btn">Chat On WhatsApp</span>
                </a>

                <a href="mailto:contact@ceylontravellanka.com?subject=Sri%20Lanka%20Private%20Tour%20Inquiry" class="contact-block email">
                    <div class="contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="32" height="32">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </div>
                    <h3>Email Us</h3>
                    <p>Send your detailed requirements and receive a customized quote within hours.</p>
                    <span class="contact-btn">Send an Email</span>
                </a>

            </div>
        </div>
    </section>

    <?php require_once BASE_PATH . '/includes/landing/footer.php';?>

</body>
</html>