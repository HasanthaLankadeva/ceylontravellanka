<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18163798890"></script>
<script async src="<?= BASE_URL ?>js/gtags.js"></script>
<script async src="<?= BASE_URL ?>js/gtagswa.js?v=1"></script>

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
<link rel="manifest" href="/site.webmanifest" crossorigin="use-credentials">
<meta name="theme-color" content="#ffffff">

<!-- ===================== OPEN GRAPH (FACEBOOK / WHATSAPP) ===================== -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?= $OGTitle; ?>">
<meta property="og:description" content="<?= $OGdescription; ?>">
<meta property="og:url" content="<?= $canonical; ?>">
<meta property="og:image" content="https://ceylontravellanka.com/images/og-image.jpg">

<!-- ===================== PRELOAD (OPTIONAL SPEED BOOST) ===================== -->
<link rel="preload" as="image" href="<?= $preloadBanner; ?>" fetchpriority="high">
<link rel="preload" href="<?= BASE_URL ?>css/fonts/poppins-v21-latin-700.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?= BASE_URL ?>css/fonts/poppins-v21-latin-400.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?= BASE_URL ?>css/fonts/playfair-display-v37-latin-700.woff2" as="font" type="font/woff2" crossorigin>

<!-- ===================== STRUCTURED DATA (SEO POWER BOOST) ===================== -->
 
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": ["TravelAgency", "TourOperator"],
  "@id": "https://ceylontravellanka.com/#organization",
  "name": "Ceylon Travel Lanka",
  "url": "https://ceylontravellanka.com/",
  "logo": {
    "@type": "ImageObject",
    "url": "https://ceylontravellanka.com/images/logo.svg"
  },
  "image": "https://ceylontravellanka.com/images/og-image.jpg",
  "description": "Private driver services, airport transfers, and customizable Sri Lanka tours, including multi-day itineraries.",
  "telephone": "+94759800348",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "83/D Weliya North",
    "addressLocality": "Minuwangoda",
    "addressRegion": "Western Province",
    "postalCode": "11550",
    "addressCountry": "LK"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+94759800348",
    "contactType": "customer service",
    "availableLanguage": ["en"],
    "areaServed": {
      "@type": "Country",
      "name": "Sri Lanka"
    }
  },
  "areaServed": {
    "@type": "Country",
    "name": "Sri Lanka"
  },
  "knowsAbout": [
    "Private driver services in Sri Lanka",
    "Airport transfers in Sri Lanka",
    "Tailor-made Sri Lanka tours",
    "Chauffeur-driven vehicles",
    "Sri Lanka tour itineraries"
  ],
  "priceRange": "$$"
}
</script>

<?php
$baseUrl = rtrim(BASE_URL, '/') . '/';
$canonical = rtrim($canonical, '/');
$orgId = $baseUrl . '#organization';
$websiteId = $baseUrl . '#website';
print_r($page);
$schema = [
    '@context' => 'https://schema.org'
];

$webPage = [
    '@type' => 'WebPage',
    '@id' => $canonical . '#webpage',
    'url' => $canonical,
    'name' => $pageTitle,
    'isPartOf' => [
        '@id' => $websiteId
    ],
    'about' => [
        '@id' => $orgId
    ],
    'inLanguage' => 'en'
];

switch ($currentpage) {

    case 'home':

        $schema['@graph'] = [
            [
                '@type' => 'WebSite',
                '@id' => $websiteId,
                'url' => $baseUrl,
                'name' => $siteName,
                'publisher' => [
                    '@id' => $orgId
                ],
                'inLanguage' => 'en'
            ],
            array_merge($webPage, [
                'name' => 'Private Driver Sri Lanka | Tours & Airport Transfers',
                'description' => 'Explore Sri Lanka with private driver services, airport transfers, and customized tour itineraries.',
                'mainEntity' => [
                    '@id' => $orgId
                ]
            ])
        ];

        break;

    case 'services':

        $schema['@graph'] = [
            array_merge($webPage, [
                '@type' => 'CollectionPage',
                'name' => 'Sri Lanka Travel Services',
                'description' => 'Explore private drivers, airport transfers, vehicle hire, and private tours in Sri Lanka.',
                'mainEntity' => [
                    '@id' => $canonical . '#service-collection'
                ]
            ]),
            [
                '@type' => 'ItemList',
                '@id' => $canonical . '#service-collection',
                'name' => 'Sri Lanka Travel Services',
                'itemListOrder' => 'https://schema.org/ItemListUnordered',
                'numberOfItems' => 4,
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Private Driver Services in Sri Lanka'
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'Sri Lanka Airport Transfers'
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 3,
                        'name' => 'Tailor-Made Sri Lanka Tours'
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 4,
                        'name' => 'Chauffeur-Driven Vehicle Hire'
                    ]
                ]
            ]
        ];

        break;

    case 'contact':

        $schema = array_merge($schema, $webPage, [
            '@type' => 'ContactPage',
            'name' => 'Contact Ceylon Travel Lanka',
            'description' => 'Contact Ceylon Travel Lanka for private driver services, airport transfers, and customized tours.',
            'mainEntity' => [
                '@id' => $orgId
            ]
        ]);

        break;

    case 'sri-lanka-tours':

        $schema = array_merge($schema, $webPage, [
            '@type' => 'CollectionPage',
            'name' => 'Sri Lanka Tour Itineraries',
            'description' => 'Discover Sri Lanka tour itineraries for different trip durations, destinations, and travel styles.'
        ]);

        break;

    case 'tailor-made-tours':

        $schema = array_merge($schema, $webPage, [
            '@type' => 'WebPage',
            'mainEntity' => [
                '@type' => 'Service',
                '@id' => $canonical . '#service',
                'name' => 'Tailor-Made Sri Lanka Tours',
                'serviceType' => 'Customized private tours',
                'url' => $canonical,
                'description' => 'Customized Sri Lanka tours planned around travelers’ interests, schedules, and preferences.',
                'provider' => [
                    '@id' => $orgId
                ],
                'areaServed' => [
                    '@type' => 'Country',
                    'name' => 'Sri Lanka'
                ]
            ]
        ]);

        break;

    case 'our-fleet':

        $schema = array_merge($schema, $webPage, [
            '@type' => 'WebPage',
            'mainEntity' => [
                '@type' => 'Service',
                '@id' => $canonical . '#service',
                'name' => 'Chauffeur-Driven Cars and Vans in Sri Lanka',
                'serviceType' => 'Private vehicle hire with driver',
                'url' => $canonical,
                'description' => 'Explore available vehicles for private tours and transportation in Sri Lanka.',
                'provider' => [
                    '@id' => $orgId
                ],
                'areaServed' => [
                    '@type' => 'Country',
                    'name' => 'Sri Lanka'
                ]
            ]
        ]);

        break;

    default:

        $schema = array_merge($schema, $webPage);

        break;
}

$json = json_encode(
    $schema,
    JSON_UNESCAPED_SLASHES
    | JSON_UNESCAPED_UNICODE
    | JSON_PRETTY_PRINT
    | JSON_INVALID_UTF8_SUBSTITUTE
);

if ($json !== false) {
    echo '<script type="application/ld+json">' . "\n";
    echo $json;
    echo "\n</script>";
}

?>


<!-- Preconnect for fonts -->
<!--link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet"-->
<!--link rel="stylesheet" href="<?= BASE_URL ?>/css/fonts.css?v=20260514"-->
<link rel="stylesheet" href="<?= BASE_URL ?>css/main.min.css?v=20260520">