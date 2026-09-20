<?php
// Prevent HTML error output from corrupting the JSON response
ini_set('display_errors', 1);
error_reporting(E_ALL);

//header('Content-Type: application/json; charset=utf-8');

include 'db.php';

$action = $_GET['action'] ?? '';
//echo $action;

if ($action === 'fetch') {
    $search  = trim($_GET['search'] ?? '');
    $vehicle = trim($_GET['vehicle'] ?? '');
    $status  = trim($_GET['status'] ?? '');

    // Fetch records from database
    $sql = "SELECT * FROM bookings WHERE 1=1";
    $params = [];
    $types = "";

    // 1. Filter by text input
    if (!empty($search)) {
        $sql .= " AND (order_number LIKE ? OR guest_name LIKE ? OR vehicle_model LIKE ? OR driver_name LIKE ?)";
        $searchTerm = "%" . $search . "%";
        $params = array_merge($params, [$searchTerm, $searchTerm, $searchTerm, $searchTerm]);
        $types .= "ssss";
    }

    // 2. Filter by vehicle type
    if (!empty($vehicle)) {
        $sql .= " AND vehicle_model = ?";
        $params[] = $vehicle;
        $types .= "s";
    }

    // 3. Filter by status
    if (!empty($status)) {
        $sql .= " AND status = ?";
        $params[] = $status;
        $types .= "s";
    }

    $stmt = $conn->prepare($sql);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $today = date('Y-m-d');

    // Helper function to extract earliest activity date
    function getEffectiveDate($booking) {

        $today = date('Y-m-d');
        $candidateDates = [];

        // Tour start date
        if (!empty($booking['tour_start_date'])) {
            $tourStart = date('Y-m-d', strtotime($booking['tour_start_date']));

            if ($tourStart >= $today) {
                $candidateDates[] = $tourStart;
            }
        }

        // Transfer dates
        $transfers = $booking['transfers_decoded'] ?? [];

        if (is_array($transfers)) {

            foreach ($transfers as $transfer) {

                $dateVal = $transfer['date'] ?? null;

                if (empty($dateVal)) {
                    continue;
                }

                $pickupDate = date('Y-m-d', strtotime($dateVal));

                // Ignore past dates
                if ($pickupDate >= $today) {
                    $candidateDates[] = $pickupDate;
                }
            }
        }

        // No future dates found
        if (empty($candidateDates)) {
            return null;
        }

        sort($candidateDates);

        return $candidateDates[0]; // nearest future date
    }

    $processedBookings = [];

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            // Decode transfers JSON
            $transfers = !empty($row['transfers']) ? json_decode($row['transfers'], true) : [];
            $row['transfers_decoded'] = is_array($transfers) ? $transfers : [];
            $row['transfers_count'] = count($row['transfers_decoded']);

            // Calculate effective date
            $effectiveDate = getEffectiveDate($row);
            $row['effective_activity_date'] = $effectiveDate;

            // Optional: Calculate days until activity
            if ($effectiveDate) {
                $diff = (new DateTime($effectiveDate))->diff(new DateTime($today));
                $row['closest_days'] = $effectiveDate >= $today ? $diff->days : -1 * $diff->days;
            } else {
                $row['closest_days'] = 999999;
            }

            // Remove temporary key before output
            unset($row['transfers_decoded']);

            $processedBookings[] = $row;
        }
    }

    // Status priority mapping
    $statusPriority = [
        'On Going'         => 1,
        'Upcoming'         => 2,
        'Completed'        => 3,
        'Payment Received' => 4,
    ];

    // Sort in PHP by Status Priority ASC -> Effective Date ASC -> ID DESC
    usort($processedBookings, function($a, $b) use ($statusPriority) {
        $pA = $statusPriority[$a['status']] ?? 5;
        $pB = $statusPriority[$b['status']] ?? 5;

        if ($pA !== $pB) {
            return $pA <=> $pB;
        }

        $dateA = $a['effective_activity_date'] ?? '9999-12-31';
        $dateB = $b['effective_activity_date'] ?? '9999-12-31';

        if ($dateA !== $dateB) {
            return strcmp($dateA, $dateB);
        }

        return $b['id'] <=> $a['id'];
    });

    header('Content-Type: application/json');
    echo json_encode($processedBookings);
    exit;
}

if ($action === 'get_next_order_number') {
    $today = date('Y-m-d');
    $today_formatted = date('Ymd'); // Output: 20260909

    // Count existing bookings where enquiry_date OR created_at matches today
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM bookings WHERE DATE(created_at) = ?");
    $stmt->bind_param("s", $today);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    
    $next_count = str_pad($result['total'] + 1, 2, '0', STR_PAD_LEFT); // Format as 01, 02, 03...
    $generated_id = "#BKG-" . $today_formatted . $next_count;

    echo json_encode(["status" => "success", "order_number" => $generated_id]);
    exit;
}

if ($action === 'save') {
    // Correctly check if ID is present
    $id = isset($_POST['id']) && $_POST['id'] !== '' ? (int)$_POST['id'] : null;

    $order_number           = $_POST['order_number'] ?? '';
    $tour_start_date        = !empty($_POST['tour_start_date']) ? $_POST['tour_start_date'] : NULL;
    $tour_end_date          = !empty($_POST['tour_end_date']) ? $_POST['tour_end_date'] : NULL;
    $tour_days              = (int)($_POST['tour_days'] ?? 0);
    $guest_name             = $_POST['guest_name'] ?? '';
    $paging_name            = $_POST['paging_name'] ?? $guest_name;
    $adults                 = $_POST['adults'] ?? 0;
    $children               = $_POST['children'] ?? 0;
    $guest_mobile           = $_POST['guest_mobile'] ?? '';
    $guest_email            = $_POST['guest_email'] ?? '';
    $vehicle_model          = $_POST['vehicle_model'] ?? '';
    $mileage_limit          = $_POST['mileage_limit'] ?? 0;
    $extra_mileage_charge   = $_POST['extra_mileage_charge'] ?? 0;
    $tour_title             = $_POST['tour_title'] ?? '';
    $itinerary              = $_POST['itinerary'] ?? '';
    $pickup_from            = $_POST['pickup_from'] ?? '';
    $pickup_date           = $_POST['pickup_date'] ?? '';
    $arrival_time           = $_POST['arrival_time'] ?? '';
    $driver_name            = $_POST['driver_name'] ?? '';
    $driver_mobile          = $_POST['driver_mobile'] ?? '';
    $agreement_link         = $_POST['agreement_link'] ?? '';
    $tour_charge            = (float)($_POST['tour_charge'] ?? 0);
    $income_advance         = (float)($_POST['income_advance'] ?? 0);
    $driver_charges         = (float)($_POST['driver_charges'] ?? 0);
    $expense_other          = (float)($_POST['expense_other'] ?? 0);
    $expense_advance        = (float)($_POST['expense_advance'] ?? 0);
    $payment_options        = $_POST['payment_options'] ?? '';
    $special_notes          = $_POST['special_notes'] ?? '';
    $status                 = $_POST['status'] ?? 'Upcoming';

    // 1. Process dynamic form inputs into a JSON string
    $dates  = $_POST['drop_date'] ?? [];
    $titles  = $_POST['drop_title'] ?? [];
    $details = $_POST['drop_details'] ?? [];
    $charges = $_POST['drop_charge'] ?? [];

    $transfers_array = [];

    for ($i = 0; $i < count($titles); $i++) {
        // Skip empty rows
        if (empty($titles[$i]) && empty($charges[$i])) {
            continue;
        }

        $transfers_array[] = [
            'date'   => $dates[$i],
            'title'   => $titles[$i],
            'details' => $details[$i] ?? '',
            'charge'  => !empty($charges[$i]) ? (float)$charges[$i] : 0.00
        ];
    }

    // Convert array to JSON (stores as string in DB)
    $transfers = json_encode($transfers_array);

    if ($id === null) {
        // Create new record
        $sql = "INSERT INTO bookings (order_number, tour_start_date, tour_end_date, tour_days, guest_name, paging_name, adults, children, guest_mobile, guest_email, transfers, itinerary, vehicle_model, mileage_limit, extra_mileage_charge, tour_title, pickup_from, pickup_date, arrival_time, driver_name, driver_mobile, agreement_link, tour_charge, income_advance, driver_charges, expense_other, expense_advance, payment_options, special_notes, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssissiisssssiisssssssdddddsss", $order_number, $tour_start_date, $tour_end_date, $tour_days, $guest_name, $paging_name, $adults, $children, $guest_mobile, $guest_email, $transfers, $itinerary, $vehicle_model, $mileage_limit, $extra_mileage_charge, $tour_title, $pickup_from, $pickup_date, $arrival_time, $driver_name, $driver_mobile, $agreement_link, $tour_charge, $income_advance, $driver_charges, $expense_other, $expense_advance, $payment_options, $special_notes, $status);
    } else {
        // Update existing record
        $sql = "UPDATE bookings SET tour_start_date=?, tour_end_date=?, tour_days=?, guest_name=?, paging_name=?, adults=?, children=?, guest_mobile=?, guest_email=?, transfers=?, itinerary=?, vehicle_model=?, mileage_limit=?, extra_mileage_charge=?, tour_title=?, pickup_from=?, pickup_date=?, arrival_time=?, driver_name=?, driver_mobile=?, agreement_link=?, tour_charge=?, income_advance=?, driver_charges=?, expense_other=?, expense_advance=?, payment_options=?, special_notes=?, status=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssissiisssssiisssssssdddddsssi", $tour_start_date, $tour_end_date, $tour_days, $guest_name, $paging_name, $adults, $children, $guest_mobile, $guest_email, $transfers, $itinerary, $vehicle_model, $mileage_limit, $extra_mileage_charge, $tour_title, $pickup_from, $pickup_date, $arrival_time, $driver_name, $driver_mobile, $agreement_link, $tour_charge, $income_advance, $driver_charges, $expense_other, $expense_advance, $payment_options, $special_notes, $status, $id);
    }

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }
    exit;
}

if ($action === 'update_status') {
    $id     = (int)($_POST['id'] ?? 0);
    $status = trim($_POST['status'] ?? '');

    $allowed_statuses = ['Upcoming', 'On Going', 'Completed', 'Payment Recieved', 'Canceled'];

    if ($id > 0 && in_array($status, $allowed_statuses, true)) {
        $stmt = $conn->prepare("UPDATE bookings SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => $stmt->error]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid parameters"]);
    }
    exit;
}
?>