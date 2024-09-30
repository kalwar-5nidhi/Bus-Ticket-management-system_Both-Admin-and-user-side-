<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

<header>
    <a href="admin_dashboard.php"><button class="btn btn-primary">Back to Dashboard</button></a>
</header>

<div class="container mt-4">
    <h1 class="text-center text-warning mb-4">Users Data</h1>
    <div class="table-responsive">
        <table id="tabledata" class="table table-striped table-hover table-bordered">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Mobile Number</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'database.php'; // Assuming this file has the database connection code

                $q = "SELECT * FROM user";
                $query = mysqli_query($con, $q);

                while ($res = mysqli_fetch_array($query)) {
                ?>
                    <tr class="text-center">
                        <td><?php echo $res['id']; ?></td>
                        <td><?php echo $res['full_name']; ?></td>
                        <td><?php echo $res['mobile_number']; ?></td>
                        <td><?php echo $res['password']; ?></td>
                        <td>
                            <a href="customerDelete.php?id=<?php echo $res['id']; ?>" class="btn btn-danger">Delete</a>
                            <a href="customerUpdate.php?id=<?php echo $res['id']; ?>" class="btn btn-primary">Update</a>
                            <a href="customerInsert.php?id=<?php echo $res['id']; ?>" class="btn btn-primary">Insert</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tabledata').DataTable();
    });
</script>

</body>
</html>
