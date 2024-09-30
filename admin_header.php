<?php

require 'db_connect.php';

// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Debugging: Check session variables
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

// Getting user details
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    // Prepare the SQL statement
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $full_name = $row["full_name"];
        // $user_name = $row["user_name"];
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Handle the case where the id is not set in the session
    echo 'Session ID is not set. Please log in again.';
    // Redirect to login page or handle the error appropriately
    header('Location: login.php');
    exit();
}
?>

<!-- Rest of your HTML/PHP code -->
                </li>
                <li class="nav-item">
                    <img class="adminDp" src="../assets/img/admin_pic.jpg" alt="Admin Profile Pic" width="22px" height="22px">
                </li>
            </ul>
        </nav>
    </header> 
    <main id="container">
        <div id="sidebar">
            <h4><i class="logoo.png"></i> WhereTo?</h4>
            <div>
                <img class="adminDp" src="../assets/img/userav-min.png" height="125px" alt="Admin Profile Pic">
                <p>Admin</p>
            </div>
            <ul id="options">
                <li class="option <?php if($page=='admindashboard'){ echo 'active';}?>"> 
                    <a href="./admindashboard.php">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                
               
                <li class="option <?php if($page=='buss'){ echo 'active';}?>">
                    <a href="./buss.php">
                    <i class="fas fa-bus"></i> Buses
                    </a>
                </li>
                <li class="option <?php if($page=='route'){ echo 'active';}?>">
                    <a href="./route.php">
                    <i class="fas fa-road"></i> Routes    
                    </a>
                </li>
                
                <li class="option <?php if($page=='customer'){ echo 'active';}?>">
                    <a href="./customer.php">
                    <i class="fas fa-users"></i> Customers
                    </a>
                </li>
                <li class="option <?php if($page=='booking'){ echo 'active';}?>">
                    <a href="./booking.php">
                    <i class="fas fa-ticket-alt"></i> Bookings
                    </a>
                </li>
                <li class="option <?php if($page=='seat'){ echo 'active';}?>">
                    <a href="./seat.php">
                    <i class="fas fa-th"></i> Seats
                    </a>
                </li>
            </ul>
        </div>
        <div id="main-content">
            <section id="welcome">
                <ul>
                    <li class="welcome-item">Welcome, 
                        <span id="USER">
                            <?php echo isset($user_name) ? htmlspecialchars($user_name) : 'Guest'; ?>
                        </span>
                    </li>
                    <li class="welcome-item">
                        <button id="logout" class="btn-sm">
                            <a href="logout.php">LOGOUT</a>
                        </button>
                    </li>
                </ul>
            </section>
