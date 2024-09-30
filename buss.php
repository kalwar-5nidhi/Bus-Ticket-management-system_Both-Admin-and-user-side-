<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <style>
        /* Your custom CSS styles here */
    </style>
</head>
<body>
    <?php require 'admin_header.php'; ?>

    <main>
        <?php
            // Include your PHP logic here for adding, editing, and deleting buses
            // Example PHP logic for adding a bus:
            // if(isset($_POST["submit"])){
            //     $busno = $_POST["busnumber"];
            //     // Your SQL query and database operations here
            // }
        ?>

        <section id="bus">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Bus <i class="fas fa-plus"></i></button>
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Bus Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Example PHP code to fetch and display buses in the table:
                        // $resultSql = "SELECT * FROM `buses` ORDER BY bus_created DESC";
                        // $resultSqlResult = mysqli_query($conn, $resultSql);
                        // while($row = mysqli_fetch_assoc($resultSqlResult)){
                        //     echo "<tr>";
                        //     echo "<td>" . $row["id"] . "</td>";
                        //     echo "<td>" . $row["bus_no"] . "</td>";
                        //     echo "<td>";
                        //     echo '<button class="btn btn-sm btn-info">Edit</button>';
                        //     echo '<button class="btn btn-sm btn-danger">Delete</button>';
                        //     echo "</td>";
                        //     echo "</tr>";
                        // }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add A Bus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="mb-3">
                            <label for="busnumber" class="form-label">Bus Number</label>
                            <input type="text" class="form-control" id="busnumber" name="busnumber" required>
                        </div>
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Bus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this bus?</p>
                    <!-- Form to handle bus deletion -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" id="busIdToDelete" name="busIdToDelete">
                        <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript code for handling delete button clicks and passing bus IDs to the modal
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const busId = this.getAttribute('data-id');
                    document.getElementById('busIdToDelete').value = busId;
                    deleteModal.show();
                });
            });
        });
    </script>
</body>
</html>
