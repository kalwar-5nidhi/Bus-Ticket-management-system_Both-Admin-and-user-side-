<!DOCTYPE html>
<html>
<head>
 <title> Data</title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>

<header>
    <a href="admin_dashboard.php"><button class="btn btn-primary">Back to Dashboard</button></a>
</header>

<body>

 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center">Schedule Data </h1>
 <br>
 <table id="tabledata" class="table table-striped table-hover table-bordered">
 
 <thead class="bg-dark text-white text-center">
    <tr>
        <th>Id</th>
        <th>Terminal Name</th>
        <th>City</th>
        <th>State</th>
        <th>Status</th>
        <th>Date Updated</th>
        <th>Delete</th>
        <th>Update</th>
        <th>Insert</th>
    </tr>
 </thead>

 <tbody>
 <?php
 include 'database.php'; 
 $q = "SELECT * FROM schedule_list";

 $query = mysqli_query($con, $q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
    <td><?php echo $res['id']; ?></td>
    <td><?php echo $res['terminal_name']; ?></td>
    <td><?php echo $res['city']; ?></td> 
    <td><?php echo $res['state']; ?></td>
    <td><?php echo $res['status']; ?></td>
    <td><?php echo $res['date_updated']; ?></td>
    <td><button class="btn btn-danger"><a href="scheduleDelete.php?id=<?php echo $res['id']; ?>" class="text-white">Delete</a></button></td>
    <td><button class="btn btn-primary"><a href="scheduUpdate.php?id=<?php echo $res['id']; ?>" class="text-white">Update</a></button></td>
    <td><button class="btn btn-primary"><a href="scheduleInsert.php?id=<?php echo $res['id']; ?>" class="text-white">Insert</a></button></td>
 </tr>

 <?php 
 }
  ?>
 </tbody>
 
 </table>  

 </div>
 </div>

 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#tabledata').DataTable();
    });
 </script>

</body>
</html>
