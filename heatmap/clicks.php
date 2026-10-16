<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';
//require_once __DIR__ . '/auth.php';
//hm_require_admin();

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

$page = $_GET['page'] ?? '';
$device = $_GET['device'] ?? 'all';
$from = $_GET['from'] ?? date('Y-m-d', strtotime('-7 days'));
$to = $_GET['to'] ?? date('Y-m-d');

function validDate($value): bool
{
    if (!is_string($value)) return false;

    $d = DateTimeImmutable::createFromFormat('!Y-m-d', $value);

    return $d !== false && $d->format('Y-m-d') === $value;
}

if (
    !is_string($page) ||
    strlen($page) > 512 ||
    !str_starts_with($page, '/') ||
    str_starts_with($page, '//') ||
    str_contains($page, '?') ||
    str_contains($page, '#') ||
    !validDate($from) ||
    !validDate($to) ||
    $from > $to ||
    (strtotime($to) - strtotime($from)) > 366 * 86400 ||
    !in_array($device, ['all', 'mobile', 'tablet', 'desktop'], true)
) {
    http_response_code(400);
    exit(json_encode(['error' => 'Invalid filters']));
}

$sql = 'SELECT x_ratio, doc_y, viewport_width,
               viewport_height, device
        FROM heatmap_clicks
        WHERE page_path = :page
          AND event_time >= :start
          AND event_time < :end';

$params = [
    ':page' => $page,
    ':start' => $from . ' 00:00:00',
    ':end' => (new DateTimeImmutable($to))
        ->modify('+1 day')->format('Y-m-d') . ' 00:00:00'
];

if ($device !== 'all') {
    $sql .= ' AND device = :device';
    $params[':device'] = $device;
}

// Keep the first version manageable. For larger volumes,
// build aggregated spatial buckets server-side.
$sql .= ' ORDER BY id DESC LIMIT 20000';

$stmt = hm_db()->prepare($sql);
$stmt->execute($params);

echo json_encode(
    ['clicks' => $stmt->fetchAll()],
    JSON_THROW_ON_ERROR
);