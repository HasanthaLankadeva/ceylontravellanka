<?php
    require_once __DIR__ . '/config/config.php';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceylon Travel Lanka - Private Driver & Tour Services Sri Lanka</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        tealbrand: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            400: '#2dd4bf',
                            500: '#14b8a6',
                            600: '#0d9488',
                            700: '#0f766e',
                            800: '#115e59',
                            900: '#134e4a',
                        },
                        navydark: '#0b1329',
                        navycard: '#131e3a',
                        navysub: '#1e293b'
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .logo-wrapper{
            display: block;
            max-width: 60px;
        }
        .top-bar .flex-wrap a{
            align-items: flex-end;
        }
        .hero-mesh-bg {
            background-color: #ffffff;
            background-image: linear-gradient(rgba(11, 19, 41, 0.65), rgba(11, 19, 41, 0.75)), url(https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=2000&auto=format&fit=crop);
            background-size: cover;
            background-position: center;
        }
        .hero-float-card {
            box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.08);
        }
        .hero-float-card .iframe-wrapper{
            height: 16rem;
        }
        .iframe-wrapper iframe{
            width: 100%;
            aspect-ratio: 16 / 9;
            height: auto;
        }
        .hero-mesh-bg .floating-stat-badge {
            top: -2.8rem;
        }
        .hero-mesh-bg h1 .text-tealbrand-600{
            color: rgb(143 255 218);
        }
    </style>
</head>
<body class="bg-white font-sans text-slate-800 antialiased selection:bg-tealbrand-500 selection:text-white">

    <!-- TOP ANNOUNCEMENT BAR -->
    <div class="top-bar bg-tealbrand-900 text-white text-xs sm:text-sm py-2 px-4 border-b border-tealbrand-800/50">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-4 flex-wrap justify-center sm:justify-start">
                <a href="mailto:contact@ceylontravellanka.com" class="flex items-center gap-1.5 hover:text-tealbrand-100 transition"><i class="fa-regular fa-envelope text-tealbrand-500"></i> contact@ceylontravellanka.com</a>
                <span class="hidden md:inline text-tealbrand-700">|</span>
                <a href="tel:+94759800348" class="flex items-center gap-1.5 hover:text-tealbrand-100 transition"><i class="fa-solid fa-phone text-tealbrand-500"></i> +94 75 980 0348</a>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-3 border-r border-tealbrand-800 pr-4">
                    <a href="#" class="hover:text-tealbrand-500 transition"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#" class="hover:text-tealbrand-500 transition"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="hover:text-tealbrand-500 transition"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN STICKY NAVBAR -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- LOGO -->
                <a href="<?= BASE_URL ?>" class="flex items-center gap-3 group logo-wrapper">
                    <img src="<?= BASE_URL ?>images/logo.svg" alt="Logo - Ceylon Travel Lanka">
                </a>

                <!-- DESKTOP NAVIGATION LINKS -->
                <nav class="hidden lg:flex items-center gap-8 text-xs font-bold tracking-wider uppercase">
                    <a href="#home" class="nav-link text-tealbrand-600 hover:text-tealbrand-600 transition py-2 border-b-2 border-tealbrand-600">HOME</a>
                    <a href="#services" class="nav-link text-slate-600 hover:text-tealbrand-600 transition py-2 border-b-2 border-transparent">SERVICES</a>
                    <a href="#reviews" class="nav-link text-slate-600 hover:text-tealbrand-600 transition py-2 border-b-2 border-transparent">REVIEWS</a>
                    <a href="#tours" class="nav-link text-slate-600 hover:text-tealbrand-600 transition py-2 border-b-2 border-transparent">SRI LANKA TOURS</a>
                    <a href="#tailor-made" class="nav-link text-slate-600 hover:text-tealbrand-600 transition py-2 border-b-2 border-transparent">TAILOR MADE TOURS</a>
                    <a href="#contact" class="nav-link text-slate-600 hover:text-tealbrand-600 transition py-2 border-b-2 border-transparent">CONTACT US</a>
                </nav>

                <!-- HEADER ACTION CTA BUTTON -->
                <div class="hidden lg:flex items-center gap-3">
                    <button onclick="openBookingModal('Header CTA')" class="bg-tealbrand-600 hover:bg-tealbrand-700 text-white font-bold text-xs uppercase px-5 py-3 rounded-lg shadow-md hover:shadow-lg transition duration-200">
                        Hire A Driver
                    </button>
                </div>

                <!-- MOBILE MENU TOGGLE -->
                <button id="mobileMenuBtn" class="lg:hidden text-slate-700 hover:text-tealbrand-600 p-2 text-2xl focus:outline-none">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- MOBILE DROPDOWN NAVIGATION MENU -->
        <div id="mobileMenu" class="hidden lg:hidden bg-white border-b border-slate-200 px-4 pt-2 pb-6 space-y-3">
            <a href="#home" class="mobile-nav-link block py-2 text-sm font-bold text-tealbrand-600">HOME</a>
            <a href="#services" class="mobile-nav-link block py-2 text-sm font-bold text-slate-700 hover:text-tealbrand-600">SERVICES</a>
            <a href="#reviews" class="mobile-nav-link block py-2 text-sm font-bold text-slate-700 hover:text-tealbrand-600">REVIEWS</a>
            <a href="#tours" class="mobile-nav-link block py-2 text-sm font-bold text-slate-700 hover:text-tealbrand-600">SRI LANKA TOURS</a>
            <a href="#tailor-made" class="mobile-nav-link block py-2 text-sm font-bold text-slate-700 hover:text-tealbrand-600">TAILOR MADE TOURS</a>
            <a href="#contact" class="mobile-nav-link block py-2 text-sm font-bold text-slate-700 hover:text-tealbrand-600">CONTACT US</a>
            <button onclick="openBookingModal('Mobile Menu')" class="w-full mt-2 bg-tealbrand-600 text-white py-3 rounded-lg font-bold text-sm">
                HIRE A DRIVER
            </button>
        </div>
    </header>

    <!-- SECTION 1: HERO / HOME SECTION (100% NEW ASYMMETRIC LIGHT BANNER) -->
    <section id="home" class="hero-mesh-bg py-16 lg:py-24 border-b border-slate-100 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                
                <!-- LEFT COLUMN: CONTENT & CALL TO ACTION -->
                <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
                    
                    <!-- Pill Tag -->
                    <div class="inline-flex items-center gap-2.5 bg-tealbrand-50 border border-tealbrand-200/80 text-tealbrand-700 font-bold px-4 py-2 rounded-full text-xs uppercase tracking-wider">
                        <i class="fa-solid fa-award text-tealbrand-600"></i> #1 Rated Tourist Chauffeur Service
                    </div>

                    <!-- Main Headline -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-[1.12] text-white">
                        Explore Sri Lanka with <br class="hidden sm:block">
                        <span class="text-tealbrand-600 relative">
                            a Private Driver
                            <svg class="absolute -bottom-2 left-0 w-full h-3 text-tealbrand-200 -z-10" viewBox="0 0 100 20" preserveAspectRatio="none"><path d="M0 15 Q 50 0 100 15" stroke="currentColor" stroke-width="8" fill="none"/></svg>
                        </span>
                    </h1>

                    <!-- Description -->
                    <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0 font-normal text-white">
                        Sit back and relax while our licensed, English-speaking personal chauffeurs guide you across Sri Lanka. From CMB airport pickups to customized island-wide itineraries.
                    </p>

                    <!-- CTAs & Direct Contact -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <button onclick="openBookingModal('Hero Split Banner')" class="w-full sm:w-auto bg-tealbrand-600 hover:bg-tealbrand-700 text-white font-bold text-sm uppercase tracking-wider px-8 py-4 rounded-xl shadow-lg hover:shadow-tealbrand-600/30 hover:-translate-y-0.5 transition duration-200 flex items-center justify-center gap-3">
                            <i class="fa-solid fa-car-side text-lg"></i> Hire A Driver Now
                        </button>
                        
                        <a href="https://wa.me/94759800348" target="_blank" class="w-full sm:w-auto bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm uppercase tracking-wider px-8 py-4 rounded-xl shadow-md transition duration-200 flex items-center justify-center gap-3">
                            <i class="fa-brands fa-whatsapp text-lg"></i> WhatsApp Quick Quote
                        </a>
                    </div>

                    <!-- Mini Feature Badges -->
                    <div class="pt-6 border-t border-slate-200/80 grid grid-cols-3 gap-4 text-left">
                        <div>
                            <span class="block text-xl sm:text-2xl font-extrabold text-slate-900 text-white">5 ★</span>
                            <span class="text-xs text-slate-500 font-medium text-white">TripAdvisor Rated</span>
                        </div>
                        <div>
                            <span class="block text-xl sm:text-2xl font-extrabold text-slate-900 text-white">100%</span>
                            <span class="text-xs text-slate-500 font-medium text-white">Fixed Flat Rates</span>
                        </div>
                        <div>
                            <span class="block text-xl sm:text-2xl font-extrabold text-slate-900 text-white">24/7</span>
                            <span class="text-xs text-slate-500 font-medium text-white">Islandwide Support</span>
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN: VISUAL COMPONENT & FLOATING STAT CARDS -->
                <div class="lg:col-span-5 relative">
                    <div class="relative mx-auto max-w-md lg:max-w-none">
                        
                        <!-- Main Visual Showcase Box -->
                        <div class="hero-float-card bg-white border border-slate-200/80 rounded-3xl p-4 sm:p-5 relative z-10">
                            <div class="iframe-wrapper relative h-64 sm:h-80 rounded-2xl overflow-hidden mb-4">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/eVwSfGC4QAc?si=yHqgbLZTox6FINK-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>

                            <!-- Vehicle / Fast Select Pill Option Bar -->
                            <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-700">
                                <span class="flex items-center gap-2"><i class="fa-solid fa-check-circle text-tealbrand-600"></i> Air-Conditioned Fleet</span>
                                <span class="text-tealbrand-700 font-bold">Sedans • Vans • Buses</span>
                            </div>
                        </div>

                        <!-- Floating Stat Badge 1 (Top Right) -->
                        <div class="floating-stat-badge absolute -top-6 -right-6 z-20 bg-white border border-slate-200 shadow-xl rounded-2xl p-4 hidden sm:flex items-center gap-3">
                            <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-xl font-bold">
                                <i class="fa-solid fa-user-shield"></i>
                            </div>
                            <div>
                                <span class="block text-xs font-bold text-slate-900">Verified Chauffeur</span>
                                <span class="block text-[10px] text-slate-500">Tourism Board Certified</span>
                            </div>
                        </div>

                        <!-- Floating Stat Badge 2 (Bottom Left) -->
                        <!--div class="absolute -bottom-6 -left-6 z-20 bg-white border border-slate-200 shadow-xl rounded-2xl p-4 hidden sm:flex items-center gap-3">
                            <div class="w-10 h-10 bg-tealbrand-100 text-tealbrand-600 rounded-xl flex items-center justify-center text-xl font-bold">
                                <i class="fa-solid fa-route"></i>
                            </div>
                            <div>
                                <span class="block text-xs font-bold text-slate-900">10,000+ Journeys</span>
                                <span class="block text-[10px] text-slate-500">Safe & Comfortable</span>
                            </div>
                        </div-->

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 2: WHY CHOOSE US / PARTNER HIGHLIGHTS -->
    <section class="py-16 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Your Trusted Sri Lanka Holiday Partner</h2>
                <div class="w-16 h-1 bg-tealbrand-500 mx-auto my-4 rounded-full"></div>
                <p class="text-slate-600 text-sm sm:text-base">We prioritize your safety, comfort, and preferences so you can sit back, relax, and savor the breathtaking views of Sri Lanka.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl p-8 text-center border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="w-16 h-16 bg-tealbrand-50 text-tealbrand-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl shadow-inner">
                        <i class="fa-solid fa-route"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-3">Custom Itineraries</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Tailored day-by-day travel routes catered specifically to your budget, preferred pace, and favorite attractions across Sri Lanka.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-2xl p-8 text-center border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl shadow-inner">
                        <i class="fa-solid fa-utensils"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-3">Indian Food Friendly</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Specialized guides who know authentic North & South Indian vegetarian, Jain, and non-veg restaurant spots along every travel corridor.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-2xl p-8 text-center border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl shadow-inner">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-3">Safety & Reliability</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Fully insured vehicles, verified English-speaking tourist chauffeurs, and transparent flat pricing without hidden extra charges.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: SERVICES SECTION -->
    <section id="services" class="py-20 bg-slate-50 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-tealbrand-600 font-bold uppercase tracking-wider text-xs">What We Offer</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-2">Comprehensive Tour & Transport Services</h2>
                <div class="w-16 h-1 bg-tealbrand-500 mx-auto my-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Service 1 -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-lg transition">
                    <div class="w-12 h-12 rounded-xl bg-tealbrand-50 text-tealbrand-600 flex items-center justify-center text-xl mb-4">
                        <i class="fa-solid fa-plane-arrival"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Airport Pickups & Transfers</h3>
                    <p class="text-slate-600 text-sm mb-4">Punctual pickup from CMB Airport directly to any hotel or resort island-wide with flight tracking.</p>
                    <button onclick="openBookingModal('Airport Transfer Service')" class="text-tealbrand-600 font-bold text-xs hover:underline inline-flex items-center gap-1">
                        Book Transfer <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>

                <!-- Service 2 -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-lg transition">
                    <div class="w-12 h-12 rounded-xl bg-tealbrand-50 text-tealbrand-600 flex items-center justify-center text-xl mb-4">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Private Tourist Chauffeur</h3>
                    <p class="text-slate-600 text-sm mb-4">Experienced, English-speaking driver-guides for multi-day tours with vehicle fuel and driver stay included.</p>
                    <button onclick="openBookingModal('Private Chauffeur Service')" class="text-tealbrand-600 font-bold text-xs hover:underline inline-flex items-center gap-1">
                        Hire Chauffeur <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>

                <!-- Service 3 -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-lg transition">
                    <div class="w-12 h-12 rounded-xl bg-tealbrand-50 text-tealbrand-600 flex items-center justify-center text-xl mb-4">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Round Island Tour Packages</h3>
                    <p class="text-slate-600 text-sm mb-4">Complete holiday itineraries covering Kandy, Ella, Sigiriya, Mirissa, Yala, and Colombo seamlessly.</p>
                    <button onclick="openBookingModal('Round Island Package')" class="text-tealbrand-600 font-bold text-xs hover:underline inline-flex items-center gap-1">
                        View Packages <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>

                <!-- Service 4 -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-lg transition">
                    <div class="w-12 h-12 rounded-xl bg-tealbrand-50 text-tealbrand-600 flex items-center justify-center text-xl mb-4">
                        <i class="fa-solid fa-bus"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Group & Event Transport</h3>
                    <p class="text-slate-600 text-sm mb-4">Spacious mini-buses and large luxury coaches equipped with AC for family groups or corporate retreats.</p>
                    <button onclick="openBookingModal('Group Transport Service')" class="text-tealbrand-600 font-bold text-xs hover:underline inline-flex items-center gap-1">
                        Inquire Vehicle <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: REVIEWS & TESTIMONIALS SECTION -->
    <section id="reviews" class="py-20 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-tealbrand-600 font-bold uppercase tracking-wider text-xs">Verified Traveler Feedback</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-2">What Our Guests Say</h2>
                <div class="w-16 h-1 bg-tealbrand-500 mx-auto my-4 rounded-full"></div>
                <p class="text-slate-600 text-sm sm:text-base">Rated 5.0 Stars by travelers across TripAdvisor, Google, and direct bookings.</p>
            </div>

            <!-- TRIPADVISOR SUMMARY BANNER -->
            <div class="bg-tealbrand-50/60 border border-tealbrand-100 rounded-2xl p-6 mb-12 flex flex-col md:flex-row items-center justify-between gap-6 max-w-4xl mx-auto">
                <div class="flex items-center gap-4 text-center md:text-left">
                    <div class="w-16 h-16 bg-emerald-500 text-white rounded-2xl flex items-center justify-center text-3xl shadow-md">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-lg">Top Rated Chauffeur Service in Sri Lanka</h3>
                        <div class="flex items-center gap-1 text-amber-400 my-1 justify-center md:justify-start">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span class="text-slate-700 text-xs font-bold ml-2">5.0 / 5.0 Excellent</span>
                        </div>
                        <p class="text-xs text-slate-500">Based on over 250+ verified guest reviews</p>
                    </div>
                </div>
                <a href="#tailor-made" class="bg-tealbrand-600 hover:bg-tealbrand-700 text-white font-bold text-xs uppercase px-6 py-3 rounded-xl transition shadow">
                    Book Your Tour
                </a>
            </div>

            <!-- REVIEWS GRID -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition relative flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-1 text-amber-400">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full"><i class="fa-solid fa-circle-check"></i> TripAdvisor</span>
                        </div>
                        <h4 class="font-bold text-slate-900 text-base mb-2">"Flawless 8-Day Island Tour!"</h4>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6 italic">
                            "Our driver Prabash was punctual, polite, and extremely knowledgeable about local history and wildlife. He made sure we felt safe everywhere we went. Highly recommended!"
                        </p>
                    </div>
                    <div class="flex items-center gap-3 border-t border-slate-100 pt-4">
                        <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-700 text-sm">
                            DM
                        </div>
                        <div>
                            <span class="block font-bold text-slate-900 text-sm">David & Sarah Miller</span>
                            <span class="block text-slate-400 text-xs">United Kingdom</span>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition relative flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-1 text-amber-400">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full"><i class="fa-solid fa-circle-check"></i> Verified Guest</span>
                        </div>
                        <h4 class="font-bold text-slate-900 text-base mb-2">"Great Indian Veg Food Spots!"</h4>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6 italic">
                            "Traveling with elderly parents who only eat pure vegetarian food was easy thanks to Ceylon Travel Lanka. The van was very comfortable and super clean!"
                        </p>
                    </div>
                    <div class="flex items-center gap-3 border-t border-slate-100 pt-4">
                        <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-700 text-sm">
                            AS
                        </div>
                        <div>
                            <span class="block font-bold text-slate-900 text-sm">Amit & Priya Sharma</span>
                            <span class="block text-slate-400 text-xs">India</span>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition relative flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-1 text-amber-400">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full"><i class="fa-solid fa-circle-check"></i> Google Review</span>
                        </div>
                        <h4 class="font-bold text-slate-900 text-base mb-2">"Punctual Airport Transfer & Tour"</h4>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6 italic">
                            "Everything was arranged seamlessly via WhatsApp before our flight. Driver was waiting with a clear sign at CMB airport. Transparent fixed rates without surprises."
                        </p>
                    </div>
                    <div class="flex items-center gap-3 border-t border-slate-100 pt-4">
                        <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-700 text-sm">
                            EL
                        </div>
                        <div>
                            <span class="block font-bold text-slate-900 text-sm">Emma Lindqvist</span>
                            <span class="block text-slate-400 text-xs">Finland</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5: VIDEO REELS / GLIMPSES OF SRI LANKA -->
    <section class="py-20 bg-slate-50 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900">Glimpses of Sri Lanka</h2>
                <div class="w-16 h-1 bg-tealbrand-500 mx-auto my-4 rounded-full"></div>
                <p class="text-slate-600 text-sm sm:text-base">Watch real video clips captured during custom client journeys around Sri Lanka.</p>
            </div>

            <!-- 3 VIDEO REEL CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Reel 1 -->
                <div class="relative group rounded-3xl overflow-hidden shadow-lg border border-slate-200 h-[480px] cursor-pointer" onclick="alert('Playing Reel: Beach and Coconut Moments')">
                    <img src="https://images.unsplash.com/photo-1512100356356-de1b84283e18?q=80&w=800&auto=format&fit=crop" alt="Beach Travel Reel" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute top-4 left-4 right-4 flex justify-between items-center text-white text-xs">
                        <span class="bg-black/40 backdrop-blur-md px-3 py-1 rounded-full"><i class="fa-brands fa-instagram"></i> @ceylontravellanka</span>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-16 h-16 bg-red-600/90 text-white rounded-full flex items-center justify-center text-2xl shadow-xl group-hover:scale-110 transition">
                            <i class="fa-solid fa-play ml-1"></i>
                        </div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6 text-white">
                        <p class="font-bold text-base mb-1">Let Us Handle Your Journey 🌴</p>
                        <p class="text-xs text-slate-300">Southern Beach Coastlines & Sunset Drives</p>
                    </div>
                </div>

                <!-- Reel 2 -->
                <div class="relative group rounded-3xl overflow-hidden shadow-lg border border-slate-200 h-[480px] cursor-pointer" onclick="alert('Playing Reel: Ella Mountain & Waterfall Safari')">
                    <img src="https://images.unsplash.com/photo-1546708973-b339540b5162?q=80&w=800&auto=format&fit=crop" alt="Mountain Reel" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute top-4 left-4 right-4 flex justify-between items-center text-white text-xs">
                        <span class="bg-black/40 backdrop-blur-md px-3 py-1 rounded-full"><i class="fa-brands fa-tiktok"></i> @ceylontravellanka</span>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-16 h-16 bg-red-600/90 text-white rounded-full flex items-center justify-center text-2xl shadow-xl group-hover:scale-110 transition">
                            <i class="fa-solid fa-play ml-1"></i>
                        </div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6 text-white">
                        <p class="font-bold text-base mb-1">Incredible Nature & Lush Ella Views ☕</p>
                        <p class="text-xs text-slate-300">Hill Country Train & Nine Arch Bridge Sightseeing</p>
                    </div>
                </div>

                <!-- Reel 3 -->
                <div class="relative group rounded-3xl overflow-hidden shadow-lg border border-slate-200 h-[480px] cursor-pointer" onclick="alert('Playing Reel: Temple & Cultural Heritage')">
                    <img src="https://images.unsplash.com/photo-1588598198321-9735fd52455b?q=80&w=800&auto=format&fit=crop" alt="Cultural Reel" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute top-4 left-4 right-4 flex justify-between items-center text-white text-xs">
                        <span class="bg-black/40 backdrop-blur-md px-3 py-1 rounded-full"><i class="fa-brands fa-instagram"></i> @ceylontravellanka</span>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-16 h-16 bg-red-600/90 text-white rounded-full flex items-center justify-center text-2xl shadow-xl group-hover:scale-110 transition">
                            <i class="fa-solid fa-play ml-1"></i>
                        </div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6 text-white">
                        <p class="font-bold text-base mb-1">The Ultimate Cultural Safari 🛕</p>
                        <p class="text-xs text-slate-300">Explore Sigiriya Fortress, Polonnaruwa & Temple Sites</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 6: INTERNATIONALLY TRUSTED SERVICE PHOTO GALLERY -->
    <section class="py-20 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900">Internationally Trusted Service</h2>
                <div class="w-16 h-1 bg-tealbrand-500 mx-auto my-4 rounded-full"></div>
                <p class="text-slate-600 text-sm sm:text-base">Happy smiles from travelers around the world who explored Sri Lanka with Ceylon Travel Lanka.</p>
            </div>

            <!-- 8-PHOTO GRID -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="rounded-xl overflow-hidden h-48 border border-slate-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1539635278303-d4002c07eae3?q=80&w=500&auto=format&fit=crop" alt="Happy Tourists" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="rounded-xl overflow-hidden h-48 border border-slate-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?q=80&w=500&auto=format&fit=crop" alt="Driver with Guests" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="rounded-xl overflow-hidden h-48 border border-slate-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=500&auto=format&fit=crop" alt="Coastal Tour" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="rounded-xl overflow-hidden h-48 border border-slate-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?q=80&w=500&auto=format&fit=crop" alt="Sigiriya Tour" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="rounded-xl overflow-hidden h-48 border border-slate-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=500&auto=format&fit=crop" alt="Mountain View" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="rounded-xl overflow-hidden h-48 border border-slate-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1476514525535-ce74f45814ce?q=80&w=500&auto=format&fit=crop" alt="Boating Tour" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="rounded-xl overflow-hidden h-48 border border-slate-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1530789253388-582c481c54b0?q=80&w=500&auto=format&fit=crop" alt="Tea Plantation" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="rounded-xl overflow-hidden h-48 border border-slate-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?q=80&w=500&auto=format&fit=crop" alt="Heritage Sites" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 7: SRI LANKA TOURS -->
    <section id="tours" class="py-20 bg-slate-50 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-tealbrand-600 font-bold uppercase tracking-wider text-xs">Featured Itineraries</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-2">Popular Sri Lanka Tour Packages</h2>
                <div class="w-16 h-1 bg-tealbrand-500 mx-auto my-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Tour 1 -->
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl transition">
                    <div class="relative h-52">
                        <img src="https://images.unsplash.com/photo-1588598198321-9735fd52455b?q=80&w=800&auto=format&fit=crop" alt="Cultural Tour" class="w-full h-full object-cover">
                        <span class="absolute top-4 left-4 bg-tealbrand-600 text-white text-xs font-bold px-3 py-1 rounded-full">5 Days / 4 Nights</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Cultural Triangle Highlights</h3>
                        <p class="text-slate-600 text-sm mb-4">Explore Sigiriya Rock, Dambulla Cave Temple, Kandy Tooth Relic Temple, and Spice Gardens.</p>
                        <div class="border-t border-slate-100 pt-4 flex justify-between items-center">
                            <span class="text-slate-500 text-xs">Pickup: Colombo / Airport</span>
                            <button onclick="openBookingModal('Cultural Triangle 5D4N')" class="bg-tealbrand-50 text-tealbrand-700 hover:bg-tealbrand-600 hover:text-white font-bold text-xs px-4 py-2 rounded-lg transition">
                                Inquire Tour
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tour 2 -->
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl transition">
                    <div class="relative h-52">
                        <img src="https://images.unsplash.com/photo-1546708973-b339540b5162?q=80&w=800&auto=format&fit=crop" alt="Hill Country" class="w-full h-full object-cover">
                        <span class="absolute top-4 left-4 bg-tealbrand-600 text-white text-xs font-bold px-3 py-1 rounded-full">7 Days / 6 Nights</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Hill Country & Scenic Train</h3>
                        <p class="text-slate-600 text-sm mb-4">Travel through tea plantations in Nuwara Eliya, iconic Ella Scenic Train journey, and Little Adam's Peak.</p>
                        <div class="border-t border-slate-100 pt-4 flex justify-between items-center">
                            <span class="text-slate-500 text-xs">Pickup: Colombo / Kandy</span>
                            <button onclick="openBookingModal('Scenic Hill Country 7D6N')" class="bg-tealbrand-50 text-tealbrand-700 hover:bg-tealbrand-600 hover:text-white font-bold text-xs px-4 py-2 rounded-lg transition">
                                Inquire Tour
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tour 3 -->
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl transition">
                    <div class="relative h-52">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop" alt="Wildlife & Beaches" class="w-full h-full object-cover">
                        <span class="absolute top-4 left-4 bg-tealbrand-600 text-white text-xs font-bold px-3 py-1 rounded-full">10 Days / 9 Nights</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Grand Island Wildlife & Beach</h3>
                        <p class="text-slate-600 text-sm mb-4">Full round island route covering Sigiriya, Kandy, Nuwara Eliya, Yala Leopard Safari & Mirissa Beaches.</p>
                        <div class="border-t border-slate-100 pt-4 flex justify-between items-center">
                            <span class="text-slate-500 text-xs">Pickup: Airport / Any Hotel</span>
                            <button onclick="openBookingModal('Grand Island Tour 10D9N')" class="bg-tealbrand-50 text-tealbrand-700 hover:bg-tealbrand-600 hover:text-white font-bold text-xs px-4 py-2 rounded-lg transition">
                                Inquire Tour
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 8: BOOK YOUR PRIVATE DRIVER (CONTACT CHANNELS) -->
    <section class="py-16 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl font-extrabold text-slate-900">Book Your Private Driver</h2>
                <div class="w-16 h-1 bg-tealbrand-500 mx-auto my-3 rounded-full"></div>
                <p class="text-slate-600 text-sm">Reach out directly via Call, WhatsApp, or Email for immediate pricing and assistance.</p>
            </div>

            <!-- 3 DIRECT ACTION CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Direct Call -->
                <div class="bg-white p-8 rounded-2xl border border-slate-200 text-center shadow-sm">
                    <div class="w-14 h-14 bg-teal-100 text-tealbrand-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <h3 class="font-bold text-lg text-slate-900 mb-1">Call Us</h3>
                    <p class="text-slate-500 text-xs mb-6">Speak with our booking agent for instant availability</p>
                    <a href="tel:+94759800348" class="inline-block bg-tealbrand-600 hover:bg-tealbrand-700 text-white font-bold text-xs uppercase px-6 py-3 rounded-lg w-full transition">
                        Call Now
                    </a>
                </div>

                <!-- WhatsApp -->
                <div class="bg-white p-8 rounded-2xl border border-slate-200 text-center shadow-sm">
                    <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <h3 class="font-bold text-lg text-slate-900 mb-1">WhatsApp</h3>
                    <p class="text-slate-500 text-xs mb-6">Fastest response for quotes, itineraries & photos</p>
                    <a href="https://wa.me/94759800348" target="_blank" class="inline-block bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs uppercase px-6 py-3 rounded-lg w-full transition">
                        Chat On WhatsApp
                    </a>
                </div>

                <!-- Email Us -->
                <div class="bg-white p-8 rounded-2xl border border-slate-200 text-center shadow-sm">
                    <div class="w-14 h-14 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <h3 class="font-bold text-lg text-slate-900 mb-1">Email Us</h3>
                    <p class="text-slate-500 text-xs mb-6">Send detailed tour requests and multi-day plans</p>
                    <a href="mailto:contact@ceylontravellanka.com" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-bold text-xs uppercase px-6 py-3 rounded-lg w-full transition">
                        Send Email
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 9: TAILOR MADE TOURS & PLANNING FORM -->
    <section id="tailor-made" class="py-20 bg-slate-50 border-b border-slate-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900">Start Planning Your Dream Trip</h2>
                <div class="w-16 h-1 bg-tealbrand-500 mx-auto my-4 rounded-full"></div>
                <p class="text-slate-600 text-sm">Fill in your travel details and let our local tour specialists design the perfect itinerary for you.</p>
            </div>

            <!-- FORM CARD -->
            <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-xl">
                <form id="tripPlannerForm" onsubmit="handlePlannerSubmit(event)" class="space-y-6">
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Your Full Name *</label>
                        <input type="text" required placeholder="John Doe" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-tealbrand-500">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-700 mb-2">WhatsApp / Phone *</label>
                            <input type="tel" required placeholder="+1 234 567 8900" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-tealbrand-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Email Address *</label>
                            <input type="email" required placeholder="john@example.com" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-tealbrand-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Pickup Location / Hotel</label>
                            <select class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-tealbrand-500">
                                <option>CMB Colombo Airport</option>
                                <option>Colombo City Hotel</option>
                                <option>Negombo Beach</option>
                                <option>Kandy City</option>
                                <option>Galle / Southern Beach</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Dropoff Destination</label>
                            <select class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-tealbrand-500">
                                <option>Round Island Multi-Day Tour</option>
                                <option>CMB Colombo Airport</option>
                                <option>Kandy / Nuwara Eliya</option>
                                <option>Ella / Sigiriya</option>
                                <option>Mirissa / Bentota Beach</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Arrival Date</label>
                            <input type="date" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-tealbrand-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Number of Passengers</label>
                            <input type="number" min="1" max="50" value="2" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-tealbrand-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Tell us about your travel plans / Special Requests</label>
                        <textarea rows="4" placeholder="Mention places you want to visit, preference for Indian food, kids traveling, etc." class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-tealbrand-500"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-tealbrand-600 hover:bg-tealbrand-700 text-white font-bold py-4 rounded-xl text-sm uppercase tracking-wider transition shadow-lg">
                        Submit My Tour Route Request
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- SECTION 10: CONTACT US & FOOTER SECTION -->
    <footer id="contact" class="bg-navydark text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- INSTAGRAM THUMBNAILS HORIZONTAL BANNER -->
            <div class="relative bg-navycard border border-slate-800 rounded-2xl p-4 mb-16 shadow-2xl">
                <div class="grid grid-cols-4 sm:grid-cols-8 gap-3">
                    <img src="https://images.unsplash.com/photo-1539635278303-d4002c07eae3?q=80&w=300&auto=format&fit=crop" class="w-full h-20 object-cover rounded-lg">
                    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?q=80&w=300&auto=format&fit=crop" class="w-full h-20 object-cover rounded-lg">
                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=300&auto=format&fit=crop" class="w-full h-20 object-cover rounded-lg">
                    <img src="https://images.unsplash.com/photo-1546708973-b339540b5162?q=80&w=300&auto=format&fit=crop" class="w-full h-20 object-cover rounded-lg">
                    <img src="https://images.unsplash.com/photo-1588598198321-9735fd52455b?q=80&w=300&auto=format&fit=crop" class="w-full h-20 object-cover rounded-lg">
                    <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=300&auto=format&fit=crop" class="w-full h-20 object-cover rounded-lg">
                    <img src="https://images.unsplash.com/photo-1476514525535-ce74f45814ce?q=80&w=300&auto=format&fit=crop" class="w-full h-20 object-cover rounded-lg">
                    <img src="https://images.unsplash.com/photo-1530789253388-582c481c54b0?q=80&w=300&auto=format&fit=crop" class="w-full h-20 object-cover rounded-lg">
                </div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <a href="https://instagram.com" target="_blank" class="bg-white text-slate-900 font-bold text-xs px-6 py-2.5 rounded-full shadow-2xl hover:bg-tealbrand-500 hover:text-white transition">
                        Follow on Instagram
                    </a>
                </div>
            </div>

            <!-- FOOTER THREE COLUMN LAYOUT -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16 border-b border-slate-800/80 pb-12">
                <!-- COL 1: LOGO & ABOUT -->
                <div>
                    <a href="<?= BASE_URL ?>" class="flex items-center gap-3 group logo-wrapper mb-4">
                        <img src="<?= BASE_URL ?>images/logo.svg" alt="Logo - Ceylon Travel Lanka">
                    </a>
                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed mb-6">
                        We provide reliable and affordable transport services for travelers visiting Sri Lanka. From airport pickups to full island tours, we ensure a smooth and enjoyable journey.
                    </p>
                    <div class="d-flex mt-3">
                        <div id="TA_rated768" class="TA_rated"><ul id="gNgfhKggY44b" class="TA_links CyRJ71tCMj36"><li id="7RJuRSYmU" class="oSSui84y47"><a target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g11999643-d25571146-Reviews-Ceylon_Travel_Lanka-Minuwangoda_Western_Province.html"><img src="https://www.tripadvisor.com/img/cdsi/img2/badges/ollie-11424-2.gif" alt="TripAdvisor"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=rated&uniq=768&locationId=25571146&lang=en_US&display_version=2"></script>
                    </div>
                </div>

                <!-- COL 2: QUICK LINKS -->
                <div>
                    <h3 class="text-lg font-bold text-white mb-6 underline decoration-tealbrand-500 underline-offset-8">Quick Link</h3>
                    <ul class="space-y-3 text-sm text-slate-400">
                        <li><a href="#contact" class="hover:text-tealbrand-500 transition">Contact Us</a></li>
                        <li><a href="#services" class="hover:text-tealbrand-500 transition">Services</a></li>
                        <li><a href="#reviews" class="hover:text-tealbrand-500 transition">Reviews</a></li>
                        <li><a href="#tours" class="hover:text-tealbrand-500 transition">Sri Lanka Tours</a></li>
                        <li><a href="#" class="hover:text-tealbrand-500 transition">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- COL 3: CONTACT US DETAILS -->
                <div>
                    <h3 class="text-lg font-bold text-white mb-6 underline decoration-tealbrand-500 underline-offset-8">Contact Us</h3>
                    <ul class="space-y-4 text-xs sm:text-sm text-slate-400">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot text-tealbrand-500 mt-1"></i>
                            <span><strong class="text-white">Location:</strong> 83 / D Weliya North, Minuwangoda 11550, Sri Lanka</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-envelope text-tealbrand-500"></i>
                            <span><strong class="text-white">Email:</strong> contact@ceylontravellanka.com</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-phone text-tealbrand-500"></i>
                            <span><strong class="text-white">Phone:</strong> +94 75 980 0348</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- FOOTER BOTTOM COPYRIGHT & SOCIALS -->
            <div class="flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 gap-4">
                <p>© <?php echo date("Y") ?> Ceylon Travel Lanka. All rights reserved.</p>
                <div class="flex items-center gap-4 text-sm text-slate-400">
                    <a href="#" class="hover:text-white transition"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- FLOATING WHATSAPP WIDGET -->
    <a href="https://wa.me/94759800348" target="_blank" class="fixed bottom-6 right-6 z-50 bg-emerald-500 text-white w-14 h-14 rounded-full flex items-center justify-center text-3xl shadow-2xl hover:bg-emerald-600 hover:scale-110 transition duration-300">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- BOOKING MODAL -->
    <div id="bookingModal" class="fixed inset-0 z-50 hidden bg-black/70 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-8 relative shadow-2xl">
            <button onclick="closeBookingModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-700 text-2xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <h3 class="text-2xl font-extrabold text-slate-900 mb-2">Hire A Driver Request</h3>
            <p id="modalSubtext" class="text-xs text-slate-500 mb-6">Enter details for instant pricing & availability.</p>

            <form onsubmit="handleModalSubmit(event)" class="space-y-4">
                <input type="text" id="modalSubject" readonly class="hidden">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Your Name</label>
                    <input type="text" required placeholder="Full name" class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">WhatsApp Phone Number</label>
                    <input type="tel" required placeholder="+94 7X XXX XXXX" class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Pickup Date</label>
                        <input type="date" required class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Passengers</label>
                        <input type="number" min="1" value="2" class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Pickup & Destination Details</label>
                    <textarea rows="3" placeholder="e.g. Airport pickup to Kandy hotel..." class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm"></textarea>
                </div>
                <button type="submit" class="w-full bg-tealbrand-600 hover:bg-tealbrand-700 text-white font-bold py-3.5 rounded-xl text-sm uppercase">
                    Confirm Inquiry
                </button>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        // MOBILE MENU TOGGLE
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // CLOSE MOBILE MENU ON LINK CLICK
        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

        // MODAL TOGGLES
        function openBookingModal(serviceName = 'General Inquiry') {
            document.getElementById('modalSubject').value = serviceName;
            document.getElementById('modalSubtext').innerText = 'Inquiry for: ' + serviceName;
            document.getElementById('bookingModal').classList.remove('hidden');
        }

        function closeBookingModal() {
            document.getElementById('bookingModal').classList.add('hidden');
        }

        function handlePlannerSubmit(e) {
            e.preventDefault();
            alert('Thank you! Your tour route request has been sent successfully. Our representative will contact you via WhatsApp shortly.');
            e.target.reset();
        }

        function handleModalSubmit(e) {
            e.preventDefault();
            alert('Your booking request has been submitted. We will reach out to confirm driver assignment.');
            closeBookingModal();
            e.target.reset();
        }

        // ACTIVE NAVIGATION HIGHLIGHT ON SCROLL
        const sections = document.querySelectorAll('section, footer');
        const navLinks = document.querySelectorAll('.nav-link');

        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                if (pageYOffset >= sectionTop) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('text-tealbrand-600', 'border-tealbrand-600');
                link.classList.add('text-slate-600', 'border-transparent');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('text-tealbrand-600', 'border-tealbrand-600');
                    link.classList.remove('text-slate-600', 'border-transparent');
                }
            });
        });
    </script>
</body>
</html>