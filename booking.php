<?php
    require '../assets/partials/_admin-check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    <!-- Include necessary CSS and JS files -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/admin.css">
</head>
<body>
    <?php require '../assets/partials/_admin-header.php';?>

    <?php
    if($loggedIn && $_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["submit"])) {
            // Code for adding bookings
        }
        elseif(isset($_POST["edit"])) {
            // Code for editing bookings
        }
        elseif(isset($_POST["delete"])) {
            // Code for deleting bookings
        }
    }
    ?>

    <?php
    $resultSql = "SELECT * FROM `bookings` ORDER BY booking_created DESC";                         
    $resultSqlResult = mysqli_query($conn, $resultSql);

    if(!mysqli_num_rows($resultSqlResult)) { ?>
        <div class="container mt-4">
            <div id="noCustomers" class="alert alert-dark" role="alert">
                <h1 class="alert-heading">No Bookings Found!!</h1>
                <p class="fw-light">Be the first person to add one!</p>
                <hr>
                <div id="addCustomerAlert" class="alert alert-success" role="alert">
                    Click on <button id="add-button" class="button btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addModal">ADD <i class="fas fa-plus"></i></button> to add a booking!
                </div>
            </div>
        </div>
    <?php } else { ?>   
        <section id="booking">
            <!-- Booking table -->
        </section>
    <?php } ?> 

    <?php require '../assets/partials/_getJSON.php';?>

    <!-- Modals for adding and deleting bookings -->
    <div class="modal fade" id="addModal">
        <!-- Add booking modal content -->
    </div>

    <div class="modal fade" id="deleteModal">
        <!-- Delete booking modal content -->
    </div>

    <script src="../assets/scripts/admin_booking.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
