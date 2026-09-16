<?php
$host = "localhost";
$user = "root"; // ceylontr_admin
$pass = ""; // Hasantha@88   
$dbname = "tour_inventory"; // ceylontr_live_db / ceylontr_dev_db

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database Connection Failed"]));
}
?>