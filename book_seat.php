<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data1";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);



// Get POST data from the frontend
$seatNumber = $_POST['seatNumber'];
$busId = $_POST['busId'];
$userId = $_POST['userId'];

// Check if the seat is available
$checkSeatQuery = "SELECT * FROM seats WHERE seat_number = ? AND status = 'available' AND bus_id = ?";
$checkSeatStmt = $pdo->prepare($checkSeatQuery);
$checkSeatStmt->execute([$seatNumber, $busId]);
$seatInfo = $checkSeatStmt->fetch();

if (!$seatInfo) {
    http_response_code(404);
    echo "Seat not available";
    exit();
}

// Book the seat
$updateSeatQuery = "UPDATE seats SET status = 'booked', user_id = ? WHERE seat_number = ? AND bus_id = ?";
$updateSeatStmt = $pdo->prepare($updateSeatQuery);
if ($updateSeatStmt->execute([$userId, $seatNumber, $busId])) {
    http_response_code(200);
    echo "Seat booked successfully";
} else {
    http_response_code(500);
    echo "Error booking seat";
}
