<?php
// Prevent HTML error output from corrupting the JSON response
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db.php'; // Expects $pdo instance of PDO

$action = $_GET['action'] ?? '';

if ($action === 'fetch') {
    $search  = trim($_GET['search'] ?? '');
    $vehicle = trim($_GET['vehicle'] ?? '');
    $status  = trim($_GET['status'] ?? '');

    // Fetch records from database
    $sql = "SELECT * FROM bookings WHERE 1=1";
    $params = [];

    // 1. Filter by text input
    if (!empty($search)) {
        $sql .= " AND (order_number LIKE ? OR guest_name LIKE ? OR vehicle_model LIKE ? OR driver_name LIKE ? OR guest_mobile LIKE ? OR guest_email LIKE ?)";
        $searchTerm = "%" . $search . "%";
        $params = array_merge($params, [$searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm]);
    }

    // 2. Filter by vehicle type
    if (!empty($vehicle)) {
        $sql .= " AND vehicle_model = ?";
        $params[] = $vehicle;
    }

    // 3. Filter by status
    if (!empty($status)) {
        $sql .= " AND status = ?";
        $params[] = $status;
    }

    // 4. default hide PlPayment Recieved & Canceledayment 
    if (empty($search) && empty($vehicle) && empty($status) && empty($status)) {
        $sql .= " AND status NOT IN ('Payment Recieved', 'Canceled')";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    foreach ($rows as $row) {
        // Decode transfers JSON
        $transfers = !empty($row['transfers']) ? json_decode($row['transfers'], true) : [];
        $row['transfers_decoded'] = is_array($transfers) ? $transfers : [];
        $row['transfers_count'] = count($row['transfers_decoded']);

        // Calculate effective date
        $effectiveDate = getEffectiveDate($row);
        $row['effective_activity_date'] = $effectiveDate;

        // Calculate days until activity
        if ($effectiveDate) {
            $diff = (new DateTime($effectiveDate))->diff(new DateTime($today));
            $row['closest_days'] = $effectiveDate >= $today ? $diff->days : -$diff->days;
        } else {
            $row['closest_days'] = 999999;
        }

        // Remove temporary key before output
        unset($row['transfers_decoded']);

        $processedBookings[] = $row;
    }

    // Status priority mapping
    $statusPriority = [
        'Ongoing'          => 1,
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
    $today_formatted = date('Ymd');

    // Count existing bookings where created_at matches today
    $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM bookings WHERE DATE(created_at) = ?");
    $stmt->execute([$today]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $next_count = str_pad($result['total'] + 1, 2, '0', STR_PAD_LEFT);
    $generated_id = "#BKG-" . $today_formatted . $next_count;

    header('Content-Type: application/json');
    echo json_encode(["status" => "success", "order_number" => $generated_id]);
    exit;
}

if ($action === 'save') {
    try {
        $id = isset($_POST['id']) && $_POST['id'] !== '' ? (int)$_POST['id'] : null;
        $total_vehicle_cost    = $_POST['total_vehicle_cost'] ?? '';
        $order_number          = $_POST['order_number'] ?? '';
        $tour_start_date       = !empty($_POST['tour_start_date']) ? $_POST['tour_start_date'] : NULL;
        $tour_end_date         = !empty($_POST['tour_end_date']) ? $_POST['tour_end_date'] : NULL;
        $tour_days             = (int)($_POST['tour_days'] ?? 0);
        $guest_name            = $_POST['guest_name'] ?? '';
        $paging_name           = $_POST['paging_name'] ?? $guest_name;
        $adults                = $_POST['adults'] ?? '';
        $children              = $_POST['children'] ?? '';
        $guest_mobile          = $_POST['guest_mobile'] ?? '';
        $guest_email           = $_POST['guest_email'] ?? '';
        $vehicle_model         = $_POST['vehicle_model'] ?? '';
        $mileage_limit         = $_POST['mileage_limit'] ?? 0;
        $extra_mileage_charge  = $_POST['extra_mileage_charge'] ?? 0;
        $tour_title            = $_POST['tour_title'] ?? '';
        $itinerary             = $_POST['itinerary'] ?? '';
        $customer_requests     = $_POST['customer_requests'] ?? '';
        $pickup_from           = $_POST['pickup_from'] ?? '';
        $pickup_date           = $_POST['pickup_date'] ?? '';
        $arrival_time          = $_POST['arrival_time'] ?? '';
        $driver_name           = $_POST['driver_name'] ?? '';
        $driver_mobile         = $_POST['driver_mobile'] ?? '';
        $agreement_link        = $_POST['agreement_link'] ?? '';
        $tour_charge           = (float)($_POST['tour_charge'] ?? 0);
        $income_advance        = (float)($_POST['income_advance'] ?? 0);
        $driver_charges        = (float)($_POST['driver_charges'] ?? 0);
        $expense_other         = (float)($_POST['expense_other'] ?? 0);
        $expense_advance       = (float)($_POST['expense_advance'] ?? 0);
        $payment_options       = $_POST['payment_options'] ?? '';
        $special_notes         = $_POST['special_notes'] ?? '';
        $status                = $_POST['status'] ?? 'Upcoming';

        // 1. Process dynamic form inputs into a JSON string
        $dates   = $_POST['drop_date'] ?? [];
        $titles  = $_POST['drop_title'] ?? [];
        $details = $_POST['drop_details'] ?? [];
        $charges = $_POST['drop_charge'] ?? [];

        $transfers_array = [];

        for ($i = 0; $i < count($titles); $i++) {
            if (empty($titles[$i]) && empty($charges[$i])) {
                continue;
            }

            $transfers_array[] = [
                'date'    => $dates[$i] ?? '',
                'title'   => $titles[$i],
                'details' => $details[$i] ?? '',
                'charge'  => !empty($charges[$i]) ? (float)$charges[$i] : 0.00
            ];
        }

        $transfers = json_encode($transfers_array);

        $scheduleFrom   = $_POST['schedule_from'] ?? [];
        $scheduleDate  = $_POST['schedule_date'] ?? [];
        $scheduleTime = $_POST['schedule_time'] ?? [];

        $flight_details = [];

        for ($i = 0; $i < count($scheduleFrom); $i++) {
            if (empty($scheduleFrom[$i]) && empty($scheduleDate[$i])) {
                continue;
            }

            $flight_details[] = [
                'schedule_from'    => $scheduleFrom[$i] ?? '',
                'schedule_date'   => $scheduleDate[$i],
                'schedule_time' => $scheduleTime[$i] ?? '',
            ];
        }

        $flightDetailsJson = json_encode($flight_details);

        if ($id === null) {
            // Create new record
            $sql = "INSERT INTO bookings (
                        order_number, tour_start_date, tour_end_date, tour_days, guest_name, 
                        paging_name, adults, children, guest_mobile, guest_email, 
                        transfers, itinerary, customer_requests, vehicle_model, mileage_limit, extra_mileage_charge, 
                        tour_title, pickup_from, pickup_date, arrival_time, flight_details, driver_name, 
                        driver_mobile, agreement_link, tour_charge, income_advance, driver_charges, 
                        expense_other, expense_advance, payment_options, special_notes, status, 
                        total_vehicle_cost
                    ) VALUES (
                        ?, ?, ?, ?, ?, 
                        ?, ?, ?, ?, ?, 
                        ?, ?, ?, ?, ?, 
                        ?, ?, ?, ?, ?, 
                        ?, ?, ?, ?, ?, 
                        ?, ?, ?, ?, ?, 
                        ?, ?, ?
                    )";
            $params = [
                $order_number, $tour_start_date, $tour_end_date, $tour_days, $guest_name,
                $paging_name, $adults, $children, $guest_mobile, $guest_email,
                $transfers, $itinerary, $customer_requests, $vehicle_model, $mileage_limit, $extra_mileage_charge,
                $tour_title, $pickup_from, $pickup_date, $arrival_time, $flightDetailsJson, $driver_name,
                $driver_mobile, $agreement_link, $tour_charge, $income_advance, $driver_charges,
                $expense_other, $expense_advance, $payment_options, $special_notes, $status,
                $total_vehicle_cost
            ];
        } else {
            // Update existing record
            $sql = "UPDATE bookings SET 
                        tour_start_date=?, tour_end_date=?, tour_days=?, guest_name=?, paging_name=?, 
                        adults=?, children=?, guest_mobile=?, guest_email=?, transfers=?, 
                        itinerary=?, customer_requests=?, vehicle_model=?, mileage_limit=?, extra_mileage_charge=?, tour_title=?, 
                        pickup_from=?, pickup_date=?, arrival_time=?, flight_details=?, driver_name=?, driver_mobile=?, 
                        agreement_link=?, tour_charge=?, income_advance=?, driver_charges=?, expense_other=?, 
                        expense_advance=?, payment_options=?, special_notes=?, status=?, total_vehicle_cost=? 
                    WHERE id=?";
            $params = [
                $tour_start_date, $tour_end_date, $tour_days, $guest_name, $paging_name,
                $adults, $children, $guest_mobile, $guest_email, $transfers,
                $itinerary, $customer_requests, $vehicle_model, $mileage_limit, $extra_mileage_charge, $tour_title,
                $pickup_from, $pickup_date, $arrival_time, $flightDetailsJson, $driver_name, $driver_mobile,
                $agreement_link, $tour_charge, $income_advance, $driver_charges, $expense_other,
                $expense_advance, $payment_options, $special_notes, $status, $total_vehicle_cost,
                $id
            ];
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        header('Content-Type: application/json');
        echo json_encode(["status" => "success"]);
    } catch (PDOException $e) {
        header('Content-Type: application/json');
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
    exit;
}

if ($action === 'update_status') {
    $id     = (int)($_POST['id'] ?? 0);
    $status = trim($_POST['status'] ?? '');

    $allowed_statuses = ['Upcoming', 'Ongoing', 'Completed', 'Payment Recieved', 'Canceled'];

    if ($id > 0 && in_array($status, $allowed_statuses, true)) {
        try {
            $stmt = $pdo->prepare("UPDATE bookings SET status = ? WHERE id = ?");
            if ($stmt->execute([$status, $id])) {
                echo json_encode(["status" => "success"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Execution failed"]);
            }
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => $e->getMessage()]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid parameters"]);
    }
    exit;
}
?>