<?php
$aid = $_GET['sid'];
include 'db_connect.php';

mysqli_query($conn,"DELETE FROM `allowances` WHERE id='$aid'");
header('location:index.php?page=allowances');

?>