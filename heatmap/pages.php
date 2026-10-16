<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';
//require_once __DIR__ . '/auth.php';
//hm_require_admin();

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

$stmt = hm_db()->query(
    'SELECT page_path, COUNT(*) AS click_count
     FROM heatmap_clicks
     GROUP BY page_path
     ORDER BY click_count DESC
     LIMIT 500'
);

echo json_encode(
    $stmt->fetchAll(),
    JSON_THROW_ON_ERROR
);