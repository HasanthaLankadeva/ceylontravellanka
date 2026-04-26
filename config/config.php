<?php
// Detect protocol
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';

// Host (localhost or live domain)
$host = $_SERVER['HTTP_HOST'];

// Detect local environment
$isLocal = strpos($host, 'localhost') !== false || strpos($host, '127.0.0.1') !== false;

// Base folder (only for local)
$baseFolder = $isLocal ? '/ceylontravellanka/' : '/';

// URL for browser (CSS, images, links)
define('BASE_URL', $protocol . $host . $baseFolder);

// Absolute path for includes
define('BASE_PATH', realpath(__DIR__ . '/../'));

?>