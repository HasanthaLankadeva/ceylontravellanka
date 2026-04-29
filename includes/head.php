<!-- ===================== BASIC META ===================== -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?= $pageTitle; ?></title>
<meta name="description" content="<?= $metaDescription; ?>">
<meta name="keywords" content="<?= $metaKeywords; ?>">
<meta name="robots" content="index, follow">

<link rel="canonical" href="<?= $canonical; ?>">

<!-- ===================== FAVICON ===================== -->
<link rel="icon" href="/favicon.ico" sizes="32x32">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="manifest" href="/manifest.json">
<meta name="theme-color" content="#ffffff">

<!-- ===================== OPEN GRAPH (FACEBOOK / WHATSAPP) ===================== -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?= $OGTitle; ?>">
<meta property="og:description" content="<?= $OGdescription; ?>">
<meta property="og:url" content="<?= $canonical; ?>">
<meta property="og:image" content="https://ceylontravellanka.com/images/og-image.jpg">

<!-- ===================== PRELOAD (OPTIONAL SPEED BOOST) ===================== -->
<link rel="preload" as="image" href="<?= $preloadBanner; ?>">

<!-- ===================== STRUCTURED DATA (SEO POWER BOOST) ===================== -->
    <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": ["TravelAgency", "TourOperator"],
    "name": "Ceylon Travel Lanka",
    "url": "https://ceylontravellanka.com",
    "logo": "https://ceylontravellanka.com/images/logo.svg",
    "image": "https://ceylontravellanka.com/images/logo.svg",
    "description": "Private driver and transport services in Sri Lanka including airport transfers and tour packages.",
    "areaServed": "Sri Lanka",
    "serviceType": [
        "Airport Transfer",
        "Private Driver Hire",
        "Tour Packages"
    ],
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+94759800348",
        "contactType": "customer service",
        "availableLanguage": ["English"]
    }
}
</script>
<script type="application/ld+json">
<?php
$schema = [];

switch ($page) {

    case "index":
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "WebSite",
            "name" => $siteName,
            "url" => $baseUrl
        ];
        break;
    
    case "services":
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "CollectionPage",
            "name" => "Sri Lanka Travel Services",
            "description" => "Explore a range of travel services including airport transfers, private drivers, car rental, and day tours in Sri Lanka.",
            "url" => $canonical
        ];
        break;

    case "contact":
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "ContactPage",
            "name" => "Contact Ceylon Travel Lanka",
            "description" => "Contact us to book private driver services, airport transfers, and tours in Sri Lanka.",
            "url" => $canonical
        ];
        break;

    case "tour-itineraries":
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "CollectionPage",
            "name" => "Sri Lanka Tour Itineraries",
            "description" => "Explore a variety of Sri Lanka tour itineraries for different durations and travel styles.",
            "url" => $canonical
        ];
        break;

    case "tailor-made-tours":
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "name" => "Tailor-Made Sri Lanka Tours",
            "description" => "Custom Sri Lanka tours designed based on your preferences, travel style, and budget.",
            "provider" => [
                "@type" => "TravelAgency",
                "name" => $siteName
            ],
            "areaServed" => "Sri Lanka",
            "url" => $canonical
        ];
        break;

    default:
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "WebPage",
            "name" => $pageTitle,
            "url" => $canonical
        ];
}

echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
</script>

<!-- Preconnect for fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL ?>css/main.min.css">
<link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">