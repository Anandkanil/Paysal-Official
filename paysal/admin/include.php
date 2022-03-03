<?php
include 'db_connect.php'; 
if(isset($_POST['submit']))
{
$employee_no=145;
$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];
$department_id=$_POST['department_id'];
$position_id=1;
$salary=$_POST['salary'];
$allowance_id=$_POST['allowance_id'];
var_dump($_POST);
 $query="INSERT INTO `employee`(`employee_no`,`name`, `username`, `password`, `department_id`, `position_id`, `salary`) VALUES ('$employee_no','$name','$username','$password','$department_id','$position_id','$salary')";
$exe=mysqli_query($conn,$query);
if($exe)
{
    
    $employee_no=$employee_no+1;
    header('Location:index.php?page=employee');
}
else{
    echo("Unsecuessfulll");
}
}
?>