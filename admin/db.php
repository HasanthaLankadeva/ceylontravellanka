<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "tour_inventory";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database Connection Failed"]));
}
?>