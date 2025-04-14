<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "liondea1_user", "Kalka@12345#", "liondea1_sevenheave");

if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

$result = $conn->query("SELECT * FROM sevenheave ORDER BY id DESC");

$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

// final pure JSON response
echo json_encode(["success" => true, "data" => $orders]);
?>
