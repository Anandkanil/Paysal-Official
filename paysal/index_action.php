<?php
var_dump($_POST);
$conn= new mysqli('localhost','root','','payroll_db')or die("Could not connect to mysql".mysqli_error($con));
$username=$_POST['username'];
$password=$_POST['password'];
$query="SELECT * from `users` where username='$username' and password='$password'";
$exe=mysqli_query($conn,$query);
if(mysqli_num_rows($exe))
{
    echo"Login SUCESSFULL!!!!";
    $row=mysqli_fetch_array($exe);
    $type=$row['type'];
    echo $type;
    if($type==0)
    {
        header('Location:employee/index.php');
    }
    else if($type==1)
    {
        header('Location:admin/index.php');
    }
}
else
{
    header('Location:index.php?show=invalid username/password');
}


?>
