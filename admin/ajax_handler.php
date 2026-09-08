<?php
// Prevent HTML error output from corrupting the JSON response
ini_set('display_errors', 0);
error_reporting(E_ALL);

//header('Content-Type: application/json; charset=utf-8');

include 'db.php';

$action = $_GET['action'] ?? '';
//echo $action;

if ($action === 'fetch') {
    $result = $conn->query("SELECT * FROM bookings ORDER BY id DESC");
    $data = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $total_income = (float)($row['tour_charge'] ?? 0) + (float)($row['income_other'] ?? 0);
            $total_expense = (float)($row['driver_charges'] ?? 0) + (float)($row['expense_other'] ?? 0);
            $row['profit'] = $total_income - $total_expense;
            $data[] = $row;
        }
    }
    echo json_encode($data);
    exit;
}

if ($action === 'save') {
    // Correctly check if ID is present
    $id = isset($_POST['id']) && $_POST['id'] !== '' ? (int)$_POST['id'] : null;

    $order_number   = $_POST['order_number'] ?? '';
    $enquiry_date   = !empty($_POST['enquiry_date']) ? $_POST['enquiry_date'] : NULL;
    $tour_start_date= !empty($_POST['tour_start_date']) ? $_POST['tour_start_date'] : NULL;
    $tour_end_date  = !empty($_POST['tour_end_date']) ? $_POST['tour_end_date'] : NULL;
    $tour_days      = (int)($_POST['tour_days'] ?? 0);
    $guest_name     = $_POST['guest_name'] ?? '';
    $guest_mobile   = $_POST['guest_mobile'] ?? '';
    $flight         = $_POST['flight'] ?? '';
    $arrival_time   = $_POST['arrival_time'] ?? '';
    $driver_name    = $_POST['driver_name'] ?? '';
    $driver_mobile  = $_POST['driver_mobile'] ?? '';
    $agreement_link = $_POST['agreement_link'] ?? '';
    $tour_charge    = (float)($_POST['tour_charge'] ?? 0);
    $income_other   = (float)($_POST['income_other'] ?? 0);
    $income_advance = (float)($_POST['income_advance'] ?? 0);
    $driver_charges = (float)($_POST['driver_charges'] ?? 0);
    $expense_other  = (float)($_POST['expense_other'] ?? 0);
    $expense_advance= (float)($_POST['expense_advance'] ?? 0);
    $status         = $_POST['status'] ?? 'Upcoming';

    if ($id === null) {
        // Create new record
        $sql = "INSERT INTO bookings (order_number, enquiry_date, tour_start_date, tour_end_date, tour_days, guest_name, guest_mobile, flight, arrival_time, driver_name, driver_mobile, agreement_link, tour_charge, income_other, income_advance, driver_charges, expense_other, expense_advance, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssisssssssdddddds", $order_number, $enquiry_date, $tour_start_date, $tour_end_date, $tour_days, $guest_name, $guest_mobile, $flight, $arrival_time, $driver_name, $driver_mobile, $agreement_link, $tour_charge, $income_other, $income_advance, $driver_charges, $expense_other, $expense_advance, $status);
    } else {
        // Update existing record
        $sql = "UPDATE bookings SET order_number=?, enquiry_date=?, tour_start_date=?, tour_end_date=?, tour_days=?, guest_name=?, guest_mobile=?, flight=?, arrival_time=?, driver_name=?, driver_mobile=?, agreement_link=?, tour_charge=?, income_other=?, income_advance=?, driver_charges=?, expense_other=?, expense_advance=?, status=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssisssssssddddddsi", $order_number, $enquiry_date, $tour_start_date, $tour_end_date, $tour_days, $guest_name, $guest_mobile, $flight, $arrival_time, $driver_name, $driver_mobile, $agreement_link, $tour_charge, $income_other, $income_advance, $driver_charges, $expense_other, $expense_advance, $status, $id);
    }

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }
    exit;
}
?>