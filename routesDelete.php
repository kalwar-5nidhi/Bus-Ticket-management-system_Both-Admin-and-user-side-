<?php

include 'database.php';

$id = $_GET['id'];

$q = " DELETE FROM `location` WHERE id = $id ";

mysqli_query($con, $q);

header('location:routesDisplay.php');

?>