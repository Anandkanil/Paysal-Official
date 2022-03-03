<?php
include('db_connect.php');
$deptid=$_GET['dept'];
mysqli_query($conn,"DELETE FROM `department` WHERE id='$deptid'");
header('Location:index.php?page=department');
?>