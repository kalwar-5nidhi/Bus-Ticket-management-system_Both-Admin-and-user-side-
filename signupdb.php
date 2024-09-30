<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Establish connection to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['signup_submit'])) {
    // Retrieve and sanitize form data
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sign_in_as = $_POST['sign_in_as'];

    // Determine which table to use based on sign_in_as option
    $table_name = '';
    switch ($sign_in_as) {
        case 'user':
            $table_name = 'user';
            break;

        case 'admin':
            $table_name = 'admin';
            break;
        default:
            echo "Invalid sign-in option";
            exit();
    }

    // Prepare and execute SQL statement to insert data into the appropriate table
    $stmt = $conn->prepare("INSERT INTO $table_name (id, full_name, mobile_number, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $id, $full_name, $mobile_number, $password);

    // Set the ID value to '0' for new records
    $id = 0;

    // Execute the insert statement
    if ($stmt->execute() === TRUE) {
        // Close statement
        $stmt->close();

        // Start session and store user information
        session_start();
        $_SESSION['user_role'] = $sign_in_as; // Store user role in session

        // Redirect to the dashboard based on the user's role
        switch ($sign_in_as) {
            case 'user':
                header("Location: userdashboard.php"); // Redirect to user dashboard
                break;
            case 'admin':
                header("Location: admin_dashboard.php"); // Redirect to admin dashboard
                break;
        }
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Close connection
$conn->close();
?>
