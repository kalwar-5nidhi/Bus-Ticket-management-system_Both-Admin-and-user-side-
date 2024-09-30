<?php
include 'database.php';

if (isset($_POST['done'])) {
    $seat_id = $_GET['seat_id']; // Assuming 'seat_id' is passed in the URL as a parameter
    $bus_id = $_POST['bus_number'];
    $seat_number = $_POST['seat_number'];
    $is_booked = $_POST['is_booked'];

    // Update query with prepared statement
    $q = "UPDATE seats SET bus_id=?, seat_number=?, is_booked=? WHERE seat_id=?";

    // Prepare the statement
    $stmt = mysqli_prepare($con, $q);
    if ($stmt) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, 'iiii', $bus_id, $seat_number, $is_booked, $seat_id);

        // Execute the statement
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            header('location: seatsDisplay.php'); // Redirect after successful update
            exit(); // Ensure script execution stops after redirect
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Seat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Update Seat</h2>
        <form method="post" action="update.php?id=<?php echo $_GET['id']; ?>">
            <div class="form-group">
                <label for="bus_id">Bus ID:</label>
                <input type="text" class="form-control" id="bus_id" name="bus_id" required>
            </div>
            <div class="form-group">
                <label for="seat_number">Seat Number:</label>
                <input type="text" class="form-control" id="seat_number" name="seat_number" required>
            </div>
            <div class="form-group">
                <label for="is_booked">Is Booked:</label>
                <input type="text" class="form-control" id="is_booked" name="is_booked" required>
            </div>
            <button type="submit" class="btn btn-primary" name="done">Submit</button>
        </form>
    </div>
</body>
</html>
