<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

header('Cache-Control: no-store');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

/*$origin = $_SERVER['HTTP_ORIGIN'] ?? '';

if (!is_string($origin) || !hash_equals(HM_ORIGIN, $origin)) {
    http_response_code(403);
    exit;
}*/

$raw = file_get_contents('php://input');

if ($raw === false || strlen($raw) > 2048) {
    http_response_code(413);
    exit;
}

$data = json_decode($raw, true);

if (!is_array($data)) {
    http_response_code(400);
    exit;
}

$page = $data['page'] ?? null;
$x = $data['x'] ?? null;
$y = $data['docY'] ?? null;
$w = $data['width'] ?? null;
$h = $data['height'] ?? null;
$device = $data['device'] ?? null;

$validPage = is_string($page)
    && strlen($page) <= 512
    && str_starts_with($page, '/')
    && !str_starts_with($page, '//')
    && !str_contains($page, '?')
    && !str_contains($page, '#')
    && !preg_match('/[\x00-\x1F\x7F]/', $page);

$validNumber = static function ($v): bool {
    return (is_int($v) || is_float($v) ||
            (is_string($v) && is_numeric($v)))
        && is_finite((float)$v);
};

if (
    !$validPage ||
    !$validNumber($x) || $x < 0 || $x > 1 ||
    !$validNumber($y) || $y < 0 || $y > 1000000 ||
    !$validNumber($w) || $w < 1 || $w > 10000 ||
    !$validNumber($h) || $h < 1 || $h > 10000 ||
    !in_array($device, ['mobile', 'tablet', 'desktop'], true)
) {
    http_response_code(400);
    exit;
}

// TODO before production: implement server-side rate limiting.
// The browser-side throttle is not a security control.

$stmt = hm_db()->prepare(
    'INSERT INTO heatmap_clicks
       (page_path, x_ratio, doc_y, viewport_width,
        viewport_height, device)
     VALUES (?, ?, ?, ?, ?, ?)'
);

$stmt->execute([
    $page,
    (float)$x,
    (int)$y,
    (int)$w,
    (int)$h,
    $device
]);

http_response_code(204);