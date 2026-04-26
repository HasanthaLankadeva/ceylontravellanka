<header class="main_header_area">
    <div class="header-content py-1 bg-theme2">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="links">
                <ul>
                    <li>
                        <a href="mailto:contact@ceylontravellanka.com" class="white"><i class="fa fa-envelope white"></i> contact@ceylontravellanka.com</a>
                    </li>
                    <li>
                        <a href="tel:+94759800348" class="white"><i class="fa fa-phone white"></i> +94 75 980 0348</a>
                    </li>
                </ul>
            </div>
            <div class="links float-right">
                <ul>
                    <li><a href="#" class="white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="white"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="white"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
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
                                <a href="<?= BASE_URL ?>services/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= BASE_URL ?>services/airport-transfer.php">Airport Transfer</a></li>
                                    <li><a href="<?= BASE_URL ?>services/private-driver-in-sri-lanka.php">Private Driver in Sri Lanka</a></li>
                                    <li><a href="<?= BASE_URL ?>services/car-rental-with-driver.php">Car Rental with Driver</a></li>
                                </ul>
                            </li>
                            <!--li class="<?php echo ($currentpage == 'routes') ? 'active' : ''; ?>">
                                <a href="<?= BASE_URL ?>routes.php">Routes</a>
                            </li-->
                            <li class="<?php echo ($currentpage == 'itineraries') ? 'active' : ''; ?>">
                                <a href="<?= BASE_URL ?>tour-itineraries.php">Tour Itineraries</a>
                            </li>
                            <li class="<?php echo ($currentpage == 'tailormade') ? 'active' : ''; ?>">
                                <a href="<?= BASE_URL ?>tailor-made-tours.php">Tailor Made Tours</a>
                            </li>
                            <li class="<?php echo ($currentpage == 'contact') ? 'active' : ''; ?>">
                                <a href="<?= BASE_URL ?>contact.php">Contact Us</a>
                            </li>
                        </ul>
                        <a href="<?= BASE_URL ?>services/private-driver-in-sri-lanka.php" class="nir-btn px-3 py-1 ms-3">Hire a Driver</a>
                    </div>
                    <div id="slicknav-mobile"></div>
                </div>
            </div>
        </nav>
    </div>

</header>