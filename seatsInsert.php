<?php
include 'database.php'; // Include your database connection file

if (isset($_POST['done'])) {
    $bus_id = $_POST['bus_id'];
    $seat_number = $_POST['seat_number'];
    $is_booked = $_POST['is_booked'];

    // Check if the bus_id exists in the buses table
    $check_query = "SELECT * FROM buses WHERE bus_id = ?";
    $check_stmt = mysqli_prepare($con, $check_query);
    mysqli_stmt_bind_param($check_stmt, 'i', $bus_id);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        // Bus ID exists, proceed with insertion
        $insert_query = "INSERT INTO seats (bus_id, seat_number, is_booked) VALUES (?, ?, ?)";
        $insert_stmt = mysqli_prepare($con, $insert_query);
        mysqli_stmt_bind_param($insert_stmt, 'isi', $bus_id, $seat_number, $is_booked);

        if (mysqli_stmt_execute($insert_stmt)) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . mysqli_error($con);
        }

        mysqli_stmt_close($insert_stmt);
    } else {
        echo "Error: Bus ID does not exist in the buses table.";
    }

    mysqli_stmt_close($check_stmt);
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Seat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Insert Seat</h2>
        <form method="post" action="seatsInsert.php"> <!-- Assuming this file is named seatsInsert.php -->
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
