<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Display Table Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

<header>

<header>
    <a href="admin_dashboard.php"><button class="btn btn-primary">Back to Dashboard</button></a>
</header>

</header>

<div class="container mt-4">
    <h1 class="text-center text-warning mb-4">Seats Data</h1>
    <div class="table-responsive">
        <table id="tabledata" class="table table-striped table-hover table-bordered">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th>Seat ID</th>
                    <th>Bus ID</th>
                    <th>Seat Number</th>
                    <th>Is Booked</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'database.php'; // Assuming this file has the database connection code

                $q = "SELECT * FROM seats";
                $query = mysqli_query($con, $q);
                while ($res = mysqli_fetch_array($query)) {
                ?>
                    <tr class="text-center">
                        <td><?php echo $res['seat_id']; ?></td>
                        <td><?php echo isset($res['is_booked']) ? $res['is_booked'] : ''; ?></td>
                        <td><?php echo $res['seat_number']; ?></td>
                        <td><?php echo $res['is_booked']; ?></td>
                        <td>
                            <a href="seatsDelete.php?id=<?php echo $res['seat_id']; ?>" class="btn btn-danger">Delete</a>
                            <a href="seatsUpdate.php?id=<?php echo $res['seat_id']; ?>" class="btn btn-primary">Update</a>
                            <a href="seatsInsert.php?id=<?php echo $res['seat_id']; ?>" class="btn btn-primary">Insert</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabledata').DataTable();
    });
</script>

</body>
</html>
