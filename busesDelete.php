<?php
include 'database.php'; // Include the file with database connection code

if (isset($_GET['id'])) {
    $bus_id = $_GET['id'];
    $bus_id = mysqli_real_escape_string($con, $bus_id);

    $q = "DELETE FROM bus WHERE `id` = '$bus_id'";
    $query = mysqli_query($con, $q);

    if ($query) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

