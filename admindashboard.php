<?php
// Start the session to manage user login status
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "whereto";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Define and initialize JSON variables
$bookingJson = '{"booking_id": 1, "customer_id": 1, "bus_id": 1, "seats_booked": 2}';
$routeJson = '{"route_id": 1, "route_name": "Route A"}';
$customerJson = '{"customer_id": 1, "name": "John Doe"}';
$seatJson = '{"seat_id": 1, "seat_number": "A1"}';
$busJson = '{"bus_id": 1, "bus_name": "Bus 1"}';

// Decode JSON data
$bookingData = json_decode($bookingJson, true);
$routeData = json_decode($routeJson, true);
$customerData = json_decode($customerJson, true);
$seatData = json_decode($seatJson, true);
$busData = json_decode($busJson, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link href="../assets/styles/admin.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./booking.php">
                                Bookings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./bus.php">
                                Buses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./route.php">
                                Routes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./seat.php">
                                Seats
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./customer.php">
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#admin">
                                Admins
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Page Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="container">
                    <section id="dashboard">
                        <!-- Content here -->
                        <div id="status">
                            <div id="Booking" class="info-box status-item">
                                <div class="heading">
                                    <h5>Bookings</h5>
                                    <div class="info">
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                </div>
                                <div class="info-content">
                                    <p>Total Bookings</p>
                                    <p class="num">
                                        <?php echo count($bookingData); ?>
                                    </p>
                                </div>
                                <a href="./booking.php">View More <i class="fas fa-arrow-right"></i></a>
                            </div>
                            <!-- Other status items here -->
                        </div>
                        <!-- User section here -->
                    </section>
                </div>
            </main>
        </div>
    </div>

    <footer class="fixed-bottom">
        <p>
            <i class="far fa-copyright"></i> <?php echo date('Y');?> - Simple Bus Ticket Booking System
        </p>
    </footer>

    <!-- Bootstrap JS and custom scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/scripts/admin_dashboard.js"></script>
</body>
</html>

