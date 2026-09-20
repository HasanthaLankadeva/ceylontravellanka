<?php
header('Content-Type: application/json');

include 'db.php';

$month = isset($_GET['month']) ? intval($_GET['month']) : date('n');$year  = isset($_GET['year'])  ? intval($_GET['year'])  : date('Y');

// Fetch tours overlapping with selected month
$startDate = sprintf('%04d-%02d-01', $year,$month);
$endDate   = date('Y-m-t', strtotime($startDate));

// Selected extra contact columns (guest_email, guest_mobile, transfers)
$stmt =$conn->prepare("
    SELECT id, order_number, guest_name, guest_email, guest_mobile, tour_title, driver_name, tour_start_date, tour_end_date, transfers, status 
    FROM bookings 
    WHERE tour_start_date <= ? AND tour_end_date >= ?
");

if (!$stmt) {
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
    exit;
}

$stmt->bind_param("ss", $endDate, $startDate);$stmt->execute();

$result =$stmt->get_result();
$tours  =$result->fetch_all(MYSQLI_ASSOC);

// Decode transfers JSON if stored as JSON string in database
foreach ($tours as &$tour) {
    if (!empty($tour['transfers']) && is_string($tour['transfers'])) {
        $tour['transfers'] = json_decode($tour['transfers'], true);
    } elseif (empty($tour['transfers'])) {$tour['transfers'] = [];
    }
}

echo json_encode(['status' => 'success', 'data' => $tours]);