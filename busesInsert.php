<?php
include 'database.php'; // Include the file with database connection code

if(isset($_POST['done'])){
    // Assign values from form to variables and sanitize them
    $bus_name = mysqli_real_escape_string($con, $_POST['bus_name']);
    $bus_number = mysqli_real_escape_string($con, $_POST['bus_number']);
    $status = (int)$_POST['status']; // Assuming 0 or 1 will be selected from a dropdown for status
    $date_updated = date('Y-m-d H:i:s'); // Current date and time

    // Construct the SQL query with properly escaped values
    $q = "INSERT INTO `bus`(`name`, `bus_number`, `status`, `date_updated`) 
          VALUES ('$bus_name', '$bus_number', $status, '$date_updated')";

    // Execute the query
    $query = mysqli_query($con, $q);

    if ($query) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
 <title>Insert Operation</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Insert Operation </h1>
 </div><br>

 <label> Bus Name: </label>
 <input type="text" name="bus_name" class="form-control"> <br>

 <label> Bus Number: </label>
 <input type="text" name="bus_number" class="form-control"> <br>

 <label> Status (0 = Inactive, 1 = Active): </label>
 <select name="status" class="form-control">
     <option value="0">Inactive</option>
     <option value="1">Active</option>
 </select><br>

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
