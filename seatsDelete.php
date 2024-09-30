<?php
include 'database.php';

$seat_id = $_GET['seat_id'];

// Use prepared statement to prevent SQL injection
$q = "DELETE FROM seats WHERE seat_id = ?";

// Prepare the statement
$stmt = mysqli_prepare($con, $q);
if ($stmt) {
    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, 'i', $seat_id);

    // Execute the statement
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        header('location: seatsDisplay.php'); // Redirect after successful deletion
        exit(); // Ensure script execution stops after redirect
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing statement: " . mysqli_error($con);
}

// Close the connection
mysqli_close($con);
?>
