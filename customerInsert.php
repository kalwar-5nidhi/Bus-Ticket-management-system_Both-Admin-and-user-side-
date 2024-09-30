<?php
include 'database.php'; // Include the file with database connection code

if(isset($_POST['done'])){
    // Assign values from form to variables and sanitize them
    $full_name = mysqli_real_escape_string($con, $_POST['full_name']);
    $mobile_number = mysqli_real_escape_string($con, $_POST['mobile_number']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Construct the SQL query with properly escaped values
    $q = "INSERT INTO `user`(`full_name`, `mobile_number`, `password`) 
          VALUES ('$full_name', '$mobile_number', '$password')";

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
 <title>User Registration</title>

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
 <h1 class="text-white text-center"> User Registration </h1>
 </div><br>

 <label> Full Name: </label>
 <input type="text" name="full_name" class="form-control"> <br>

 <label> Mobile Number: </label>
 <input type="text" name="mobile_number" class="form-control"> <br>

 <label> Password: </label>
 <input type="password" name="password" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="done"> Register </button><br>

 </div>
 </form>
 </div>
</body>
</html>
