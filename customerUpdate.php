<?php
include 'database.php'; // Include the file with database connection code

if (isset($_POST['done'])) {
    // Assign values from form to variables and sanitize them
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $mobile_number = $_POST['mobile_number'];
    $password = $_POST['password'];

    // Sanitize user inputs to prevent SQL injection
    $id = mysqli_real_escape_string($con, $id);
    $full_name = mysqli_real_escape_string($con, $full_name);
    $mobile_number = mysqli_real_escape_string($con, $mobile_number);
    $password = mysqli_real_escape_string($con, $password);


    // Construct the UPDATE query
    $q = "UPDATE user SET 
            `full_name` = '$full_name', 
            `mobile_number` = '$mobile_number', 
            `password` = '$password',  
          WHERE `id` = '$id'";

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
    <title>Customer</title>
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
                <h1 class="text-white text-center">Customer Update</h1>
            </div><br>
            <label>User ID:</label>
            <input type="text" name="id" class="form-control"><br>
            <label>Full Name:</label>
            <input type="text" name="full_name" class="form-control"><br>
            <label>Mobile Number:</label>
            <input type="text" name="mobile_number" class="form-control"><br>
            <label>Password:</label>
            <input type="password" name="password" class="form-control"><br>
            <button class="btn btn-success" type="submit" name="done">Update</button><br>
        </div>
    </form>
</div>
</body>
</html>
