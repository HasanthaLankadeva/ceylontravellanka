<?php
header('Content-Type: application/json; charset=utf-8');

include 'db.php'; // Expects $pdo instance of PDO

$month = isset($_GET['month']) ? intval($_GET['month']) : (int)date('n');
$year  = isset($_GET['year'])  ? intval($_GET['year'])  : (int)date('Y');

// Fetch tours/transfers overlapping with selected month
$startDate = sprintf('%04d-%02d-01', $year, $month);
$endDate   = date('Y-m-t', strtotime($startDate));

// Create a wildcard search pattern for transfer dates in the target month (e.g., '%"date":"2026-10-%')
$monthPrefix = sprintf('%04d-%02d-', $year, $month);
$jsonDatePattern = '%"date":"' . $monthPrefix . '%';

try {
    // Matches if:
    // 1. Main tour date range overlaps with the month OR
    // 2. Pickup date falls within the month OR
    // 3. Any transfer date in the JSON string matches the month
    $stmt = $pdo->prepare("
        SELECT id, order_number, guest_name, guest_email, guest_mobile, tour_title, driver_name, driver_mobile, tour_start_date, tour_end_date, pickup_date, transfers, status 
        FROM bookings 
        WHERE (tour_start_date <= ? AND (tour_end_date >= ? OR tour_end_date IS NULL))
           OR (pickup_date BETWEEN ? AND ?)
           OR (transfers LIKE ?)
    ");

    $stmt->execute([$endDate, $startDate, $startDate, $endDate, $jsonDatePattern]);
    $tours = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Safely decode transfers JSON
    foreach ($tours as &$tour) {
        if (!empty($tour['transfers']) && is_string($tour['transfers'])) {
            $decoded = json_decode($tour['transfers'], true);
            $tour['transfers'] = is_array($decoded) ? $decoded : [];
        } else {
            $tour['transfers'] = [];
        }
    }
    unset($tour); // Break reference

    echo json_encode(['status' => 'success', 'data' => $tours]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
exit;
?>