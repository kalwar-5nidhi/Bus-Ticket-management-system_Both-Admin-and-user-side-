<?php
// Start the session to manage user login status
session_start();

// Database connection details
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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Get the input from the login form
    $input_mobile_number = $_POST["mobile_number"];
    $input_password = $_POST["password"];

    // Define an array to hold the roles and corresponding tables
    $roles = array(
        "admin" => "admin",
        "user" => "user",
    );

    // Loop through the roles array to check credentials in each table
    foreach ($roles as $role => $table) {
        // Prepare a SQL statement to check for matching credentials
        $stmt = $conn->prepare("SELECT id, full_name, mobile_number, password FROM $table WHERE mobile_number = ?");
        if (!$stmt) {
            die("Error preparing SQL statement for $role: " . $conn->error);
        }
        $stmt->bind_param("s", $input_mobile_number);

        // Execute the SQL statement
        $stmt->execute();
        if ($stmt->errno) {
            die("Error executing SQL query for $role: " . $stmt->error);
        }

        // Get the result of the executed SQL statement
        $result = $stmt->get_result();
        if (!$result) {
            die("Error getting result for $role: " . $stmt->error);
        }

        // Check if there is a matching user in this table
        if ($result->num_rows == 1) {
            // Fetch the user's data
            $row = $result->fetch_assoc();
            $stored_password = $row["password"];

            // Compare the input password with the stored password
            if ($input_password == $stored_password) {
                // Password matches, set session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $row["id"];
                $_SESSION["full_name"] = $row["full_name"];
                $_SESSION["mobile_number"] = $row["mobile_number"];
                $_SESSION["role"] = $role;

                // Redirect to the appropriate dashboard based on user's role
                if ($role == "admin") {
                    header("Location: admin_dashboard.php");
                    exit;
                } elseif ($role == "user") {
                    header("Location: userdashboard.php");
                    exit;
                }
            } else {
                // Password doesn't match, show error message
                echo "Invalid password.";
                exit;
            }
        } else {
            // No user found in this role, continue checking other roles
            continue;
        }
    }

    // If the loop completes without finding a matching user, show error message
    echo "User not found.";
}

$conn->close();
?>
