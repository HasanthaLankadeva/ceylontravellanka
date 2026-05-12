<header class="main_header_area">
    <div class="header-content py-1 bg-theme2">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="links">
                <ul>
                    <li>
                        <a href="mailto:contact@ceylontravellanka.com" class="white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-label="Email">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            contact@ceylontravellanka.com
                        </a>
                    </li>
                    <li>
                        <a href="tel:+94759800348" class="white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-label="Phone">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg> 
                            +94 75 980 0348</a>
                    </li>
                </ul>
            </div>
            <div class="links float-right">
                <ul>
                    <li>
                        <a href="https://www.tiktok.com/@ceylon.travel.lanka" target="_blank" class="white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 448 512" fill="currentColor" aria-label="TikTok">
                                <path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/cey78229/" target="_blank" class="white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-label="Instagram">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/ceylontravellankafanpage" target="_blank" class="white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-label="Facebook">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header_menu" id="header_menu">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-2 pt-2">

                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?= BASE_URL ?>">
                            <img src="<?= BASE_URL ?>images/logo.svg" alt="Logo - Ceylon Travel Lanka">
                        </a>
                    </div>

                    <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="responsive-menu">
                            <li class="<?php echo ($currentpage == 'home') ? 'active' : ''; ?>">
                                <a href="<?= BASE_URL ?>">Home </a>
                            </li>
                            <li class="submenu dropdown <?php echo ($currentpage == 'services') ? 'active' : ''; ?>">
                                <a href="<?= BASE_URL ?>services" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= BASE_URL ?>services/airport-transfer">Airport Transfer</a></li>
                                    <li><a href="<?= BASE_URL ?>services/private-driver-in-sri-lanka">Private Driver in Sri Lanka</a></li>
                                    <li><a href="<?= BASE_URL ?>services/car-rental-with-driver">Car Rental with Driver</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo ($currentpage == 'itineraries') ? 'active' : ''; ?>">
                                <a href="<?= BASE_URL ?>tour-itineraries">Tour Itineraries</a>
                            </li>
                            <li class="<?php echo ($currentpage == 'tailormade') ? 'active' : ''; ?>">
                                <a href="<?= BASE_URL ?>tailor-made-tours">Tailor Made Tours</a>
                            </li>
                            <li class="<?php echo ($currentpage == 'contact') ? 'active' : ''; ?>">
                                <a href="<?= BASE_URL ?>contact">Contact Us</a>
                            </li>
                        </ul>
                        <a href="#booking-form" class="nir-btn px-3 py-1 ms-3">Plan My Trip</a>
                    </div>
                    <div id="slicknav-mobile"></div>
                </div>
            </div>
        </nav>
    </div>
</header>