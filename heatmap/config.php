<?php
declare(strict_types=1);

// heatmap/config.php

const HM_DB_HOST = 'localhost';
const HM_DB_NAME = 'tour_inventory';
const HM_DB_USER = 'root';
const HM_DB_PASS = '';

// Generate a unique, long random secret before deployment.
// Example: use a password manager to generate 40+ random characters.
const HM_SETUP_KEY = 'REPLACE_WITH_A_LONG_RANDOM_SETUP_SECRET';

// Canonical website origin. Use HTTPS.
const HM_ORIGIN = 'https://ceylontravellanka.com';

function hm_db(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $pdo = new PDO(
        'mysql:host=' . HM_DB_HOST .
        ';dbname=' . HM_DB_NAME . ';charset=utf8mb4',
        HM_DB_USER,
        HM_DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );

    return $pdo;
}

function hm_session(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    // Production site should use HTTPS.
    ini_set('session.use_strict_mode', '1');
    ini_set('session.cookie_httponly', '1');

    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/heatmap/',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);

    session_start();
}

function hm_csrf_token(): string
{
    hm_session();

    if (empty($_SESSION['hm_csrf'])) {
        $_SESSION['hm_csrf'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['hm_csrf'];
}

function hm_check_csrf(): bool
{
    hm_session();

    $posted = $_POST['csrf'] ?? '';

    return is_string($posted)
        && isset($_SESSION['hm_csrf'])
        && hash_equals($_SESSION['hm_csrf'], $posted);
}