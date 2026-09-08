<?php
header('Content-Type: application/json');
$xmlFilePath = __DIR__ . '/data.xml';
if (file_exists($xmlFilePath)) {
    $xml = simplexml_load_file($xmlFilePath);
    
    $vehicles = [];
    foreach ($xml->vehicles->vehicle as $v) {
        $name = (string)$v['name'];
        $vehicles[$name] = [
            'daily_rate' => (float)$v->daily_rate,
            'extra_mileage_rate' => (float)$v->extra_mileage_rate,
            'bata' => (float)$v->bata,
            'accommodation' => (float)$v->accommodation
        ];
    }

    $exchange_rates = [
        'USD' => (float)$xml->exchange_rates->usd,
        'GBP' => (float)$xml->exchange_rates->gbp
    ];

    echo json_encode([
        'status' => 'success',
        'vehicles' => $vehicles,
        'exchange_rates' => $exchange_rates
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'XML file not found']);
}
?>