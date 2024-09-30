<?php
include 'database.php'; // Include the file with database connection code

if(isset($_POST['done'])){
    // Assign values from form to variables
    $route_name = $_POST['route_name'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $status = $_POST['status'];
    $date_updated= $_POST['date_updated'];

    // Construct the SQL query
    $q = "INSERT INTO `schedule_list`(`route_name`, `city`, `state`, `status`, `date_updated`) 
          VALUES ('$route_name', '$city', '$state', '$status', '$date_updated')";

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
 <title>Insert schedule</title>

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
 <h1 class="text-white text-center">  Insert Route </h1>
 </div><br>


 <label> Route Name: </label>
 <input type="text" name="route_name" class="form-control"> <br>

 <label> City: </label>
 <input type="text" name="city" class="form-control"> <br>

 <label> State: </label>
 <input type="text" name="state" class="form-control"> <br>

 <label> Status: </label>
 <input type="text" name="status" class="form-control"> <br>

 <label> Date Updated: </label>
 <input type="text" name="date_updated" class="form-control"> <br>


 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
