<?php
include 'database.php'; // Include the file with database connection code

if (isset($_POST['done'])) {
    // Assign values from form to variables
    $bus_id = $_POST['bus_id'];
    $bus_name = $_POST['bus_name'];
    $bus_number = $_POST['bus_number'];
    $capacity = $_POST['capacity'];
    $From = $_POST['From'];
    $To = $_POST['To'];
    $status = $_POST['status'];
    $date_updated = $_POST['date_updated'];

    // Sanitize user inputs to prevent SQL injection
    $bus_id = mysqli_real_escape_string($con, $bus_id);
    $bus_name = mysqli_real_escape_string($con, $bus_name);
    $bus_number = mysqli_real_escape_string($con, $bus_number);
    $capacity = mysqli_real_escape_string($con, $capacity);
    $From = mysqli_real_escape_string($con, $From);
    $To = mysqli_real_escape_string($con, $To);
    $status = mysqli_real_escape_string($con, $status);
    $date_updated = mysqli_real_escape_string($con, $date_updated);

    // Construct the UPDATE query
    $q = "UPDATE schedule_list SET 
            `bus_name` = '$bus_name', 
            `bus_number` = '$bus_number', 
            `capacity` = '$capacity', 
            `From` = '$From', 
            `To` = '$To', 
            `status` = '$status', 
            `availability` = '$availability', 
            `price` = '$price', 
            `date_updated` = '$date_updated' 
          WHERE `id` = '$bus_id'";

    // Execute the query
    $query = mysqli_query($con, $q);

    if ($query) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Operation</title>
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
                <h1 class="text-white text-center">Update Operation</h1>
            </div><br>
            <label>Bus ID:</label>
            <input type="text" name="bus_id" class="form-control"><br>
            <label>Bus Name:</label>
            <input type="text" name="bus_name" class="form-control"><br>
            <label>Bus Number:</label>
            <input type="text" name="bus_number" class="form-control"><br>
            <label>Capacity:</label>
            <input type="text" name="capacity" class="form-control"><br>
            <label>From:</label>
            <input type="text" name="From" class="form-control"><br>
            <label>To:</label>
            <input type="text" name="To" class="form-control"><br>
            <label>Status:</label>
            <input type="text" name="status" class="form-control"><br>
            <label>Date Updated:</label>
            <input type="text" name="date_updated" class="form-control"><br>
            <button class="btn btn-success" type="submit" name="done">Submit</button><br>
        </div>
    </form>
</div>
</body>
</html>
