<?php
include 'database.php'; // Include the file with database connection code

if (isset($_GET['id'])) {
    $user_id = $_GET['id']; // Changed to $user_id for consistency
    $user_id = mysqli_real_escape_string($con, $user_id);

    $q = "DELETE FROM user WHERE `id` = '$user_id'";
    $query = mysqli_query($con, $q);

    if ($query) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Error: ID parameter not set";
}
?>
