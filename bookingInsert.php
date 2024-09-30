<?php
include 'database.php'; // Include the file with database connection code

if(isset($_POST['done'])){
    // Assign values from form to variables
    $schedule_id = $_POST['schedule_id'];
    $ref_no = $_POST['ref_no'];
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $date_updated = $_POST['date_updated'];
    $status = $_POST['status'];

    // Prepare and execute the SELECT statement with prepared statements
    $check_query = mysqli_prepare($con, "SELECT * FROM booked WHERE schedule_id = ?");
    mysqli_stmt_bind_param($check_query, "s", $schedule_id);
    mysqli_stmt_execute($check_query);
    $result = mysqli_stmt_get_result($check_query);

    if ($result && mysqli_num_rows($result) > 0) {
        // $schedule_id exists in the 'booked' table, proceed with insertion
        // Prepare and execute the INSERT statement with prepared statements for sanitization
        $insert_query = mysqli_prepare($con, "INSERT INTO booked (schedule_id, ref_no, name, qty, date_updated, status) 
                                             VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($insert_query, "ssssss", $schedule_id, $ref_no, $name, $qty, $date_updated, $status);
        $success = mysqli_stmt_execute($insert_query);

        if ($success) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . mysqli_error($con);
        }

        // Close the prepared statement
        mysqli_stmt_close($insert_query);
    } else {
        echo "Error: Schedule ID not found in the 'booked' table";
    }

    // Close the prepared statement
    mysqli_stmt_close($check_query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-lg-6 m-auto">
    <form method="post">
        <br><br>
        <div class="card">
            <div class="card-header bg-dark">
                <h1 class="text-white text-center">Insert Booking</h1>
            </div><br>
            <label>Schedule ID:</label>
            <input type="text" name="schedule_id" class="form-control"><br>
            <label>Ref No:</label>
            <input type="text" name="ref_no" class="form-control"><br>
            <label>Name:</label>
            <input type="text" name="name" class="form-control"><br>
            <label>qty:</label>
            <input type="text" name="qty" class="form-control"><br>
            <label>date_updated:</label>
            <input type="text" name="date_updated" class="form-control"><br>
            <label>status:</label>
            <input type="text" name="status" class="form-control"><br>
            <div class="form-group">
                <label for="booking_date">Booking Date:</label>
                <input type="date" class="form-control" id="booking_date" name="booking_date" required>
            </div>
            <button class="btn btn-success" type="submit" name="done">Submit</button><br>
        </div>
    </form>
</div>
</body>
</html>

