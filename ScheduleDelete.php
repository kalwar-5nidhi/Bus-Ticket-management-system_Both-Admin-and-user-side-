<?php

include 'database.php';

$id = $_GET['id'];

$q = " DELETE FROM `schedule_list` WHERE id = $id ";

mysqli_query($con, $q);

header('location:routesDisplay.php');

?>