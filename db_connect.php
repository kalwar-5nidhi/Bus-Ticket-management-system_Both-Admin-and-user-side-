<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'website');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to check if a user exists
if (!function_exists('exist_user')) {
    function exist_user($conn, $username) {
        $stmt = $conn->prepare("SELECT * FROM `user` WHERE user_name = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $exists = $result->num_rows > 0;
        $stmt->close();
        return $exists;
    }
}

// Function to check if a route exists
if (!function_exists('exist_routes')) {
    function exist_routes($conn, $viaCities, $depdate, $deptime) {
        $stmt = $conn->prepare("SELECT id FROM `routes` WHERE route_cities = ? AND route_dep_date = ? AND route_dep_time = ?");
        $stmt->bind_param("sss", $viaCities, $depdate, $deptime);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row ? $row["id"] : false;
    }
}

// Function to check if a customer exists
if (!function_exists('exist_customers')) {
    function exist_customers($conn, $name, $phone) {
        $stmt = $conn->prepare("SELECT customer_id FROM `customers` WHERE customer_name = ? AND customer_phone = ?");
        $stmt->bind_param("ss", $name, $phone);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row ? $row["customer_id"] : false;
    }
}

// Function to check if a bus exists
if (!function_exists('exist_buses')) {
    function exist_buses($conn, $busno) {
        $stmt = $conn->prepare("SELECT id FROM `bus` WHERE bus_no = ?");
        $stmt->bind_param("s", $busno);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row ? $row["id"] : false;
    }
}

// Function to check if a booking exists
if (!function_exists('exist_booking')) {
    function exist_booking($conn, $customer_id, $route_id) {
        $stmt = $conn->prepare("SELECT id FROM `booked` WHERE customer_id = ? AND route_id = ?");
        $stmt->bind_param("ii", $customer_id, $route_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row ? $row["id"] : false;
    }
}

// Function to mark a bus as assigned
if (!function_exists('bus_assign')) {
    function bus_assign($conn, $busno) {
        $stmt = $conn->prepare("UPDATE bus SET bus_assigned = 1 WHERE bus_no = ?");
        $stmt->bind_param("s", $busno);
        $stmt->execute();
        $stmt->close();
    }
}

// Function to mark a bus as free
if (!function_exists('bus_free')) {
    function bus_free($conn, $busno) {
        $stmt = $conn->prepare("UPDATE bus SET bus_assigned = 0 WHERE bus_no = ?");
        $stmt->bind_param("s", $busno);
        $stmt->execute();
        $stmt->close();
    }
}

// Function to get bus number from route ID
if (!function_exists('busno_from_routeid')) {
    function busno_from_routeid($conn, $id) {
        $stmt = $conn->prepare("SELECT bus_no FROM routes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row ? $row["bus_no"] : false;
    }
}

// Function to get a value from a table
if (!function_exists('get_from_table')) {
    function get_from_table($conn, $table, $primaryKey, $pKeyValue, $toget) {
        $stmt = $conn->prepare("SELECT $toget FROM $table WHERE $primaryKey = ?");
        $stmt->bind_param("s", $pKeyValue);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row ? $row[$toget] : false;
    }
}
?>
