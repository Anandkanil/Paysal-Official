<?php
$did = $_GET['sid'];
include 'db_connect.php';

mysqli_query($conn,"DELETE FROM `deductions` WHERE id='$did'");
header('location:index.php?page=deductions');

?>