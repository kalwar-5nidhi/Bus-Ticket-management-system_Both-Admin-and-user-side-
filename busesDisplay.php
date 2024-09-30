<!DOCTYPE html>
<html>
<head>
 <title>Buses Data</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body>

<header>
    <a href="admin_dashboard.php"><button class="btn btn-primary">Back to Dashboard</button></a>
</header>

<div class="container">
    <div class="col-lg-12">
        <br><br>
        <h1 class="text-warning text-center">Buses Data</h1>
        <br>
        <table id="tabledata" class="table table-striped table-hover table-bordered">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Bus Number</th>
                    <th>Status</th>
                    <th>Date Updated</th>
                    <th>Delete</th>
                    <th>Update</th>
                    <th>Insert</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'database.php'; // Assuming this file has the database connection code

                $q = "SELECT * FROM bus";
                $query = mysqli_query($con, $q);

                while ($res = mysqli_fetch_array($query)) {
                ?>
                    <tr class="text-center">
                        <td><?php echo $res['id']; ?></td>
                        <td><?php echo $res['name']; ?></td>
                        <td><?php echo $res['bus_number']; ?></td>
                        <td><?php echo $res['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
                        <td><?php echo $res['date_updated']; ?></td>
                        <td><button class="btn btn-danger"><a href="busesDelete.php?id=<?php echo $res['id']; ?>" class="text-white">Delete</a></button></td>
                        <td><button class="btn btn-primary"><a href="busesUpdate.php?id=<?php echo $res['id']; ?>" class="text-white">Update</a></button></td>
                        <td><button class="btn btn-primary"><a href="busesInsert.php?id=<?php echo $res['id']; ?>" class="text-white">Insert</a></button></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabledata').DataTable();
    });
</script>

</body>
</html>
