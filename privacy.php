<?php

require_once __DIR__ . '/config/config.php';

$currentpage = 'privacy';
$page = basename($_SERVER['PHP_SELF'], '.php');
$siteName = "Ceylon Travel Lanka";
$baseUrl = "https://ceylontravellanka.com";

$pageTitle =  "Privacy Policy | " . $siteName;

$canonical = "https://ceylontravellanka.com" . $_SERVER['REQUEST_URI'];

$metaDescription = "Book private driver services in Sri Lanka. Reliable airport transfers, tour packages, and custom travel with experienced drivers. Affordable & 24/7 service.";
$metaKeywords = "";

$OGTitle = "Private Driver Sri Lanka | Airport Transfers & Tours | " . $siteName;
$OGdescription = "Reliable private drivers, airport transfers, and Sri Lanka tour packages. Book safe and comfortable travel with local experts.";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php require_once BASE_PATH . '/includes/head.php';?>
    
</head>

<body class="subpage">

<div id="preloader">
    <div id="status"></div>
</div>

<?php require_once BASE_PATH . '/includes/header.php';?>

<section class="intro-section privacy-section  pt-6 pb-6">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto">
            <h1 class="mb-3">Privacy Policy</h1>
            
            <h2 class="mb-1">1. Introduction</h2>
            <p class="mb-3">Welcome to Ceylon Travel Lanka. We value your privacy and are committed to protecting your personal data. This policy explains how we handle the information you provide through our contact forms.</p>
            
            <h2 class="mb-1">2. Data We Collect</h2>
            <p class="mb-3">When you fill out our form, we collect the following personal information:</p>
            <p>● Identity Data: First Name and Last Name.</p>
            <p>● Contact Data: Email Address and Mobile Number.</p>
            <p>● Location Data: Country.</p>
            
            <h2 class="mt-3 mb-1">3. How We Use Your Data</h2>
            <p class="mb-3">We use the information collected through our form strictly for the following purposes:</p>
            <p>● To respond to your inquiries or provide the services requested.</p>
            <p>● To communicate with you regarding your submission.</p>
            <p>● To improve our website and user experience.</p>

            <h2 class="mt-3 mb-1">4. Data Storage and Security</h2>
            <p class="mb-3">We implement standard security measures to ensure your data is safe. We do not sell, rent, or trade your personal information to third parties. Your data is only stored for as long as necessary to fulfill the purposes outlined above.</p>

            <h2 class="mb-1">5. Third-Party Services</h2>
            <p class="mb-3">We may use third-party tools to help process your data (for example, an email service provider or a database host). These providers only have access to your data to perform specific tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>

            <h2 class="mb-1">6. Your Rights</h2>
            <p class="mb-3">Depending on your location, you may have the right to:</p>
            <p>● Access the personal data we hold about you.</p>
            <p>● Request that we correct or delete your personal data.</p>
            <p>● Withdraw your consent for us to contact you.</p>

            <h2 class="mt-3 mb-1">7. Contact Us</h2>
            <p class="mb-3">If you have any questions about this Privacy Policy or wish to exercise your data rights, please contact us at:
            <p class="mb-1"><b>Email:</b> <a href="mailto:contact@ceylontravellanka.com" target="_blank">contact@ceylontravellanka.com</a></p>
            <p class="mb-1"><b>Website:</b> <a href="https://ceylontravellanka.com/">ceylontravellanka.com</a></p>
        </div>
    </div>
</section>

<?php require_once BASE_PATH . '/includes/footer.php';?>

</body>
</html>