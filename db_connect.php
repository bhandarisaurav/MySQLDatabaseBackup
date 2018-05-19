<?php
$host = $_POST['hostname'];
$user = $_POST['username'];
$pass = $_POST['password'];
$con=mysqli_connect($host,$user,$pass);
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
    echo "<SCRIPT type='text/javascript'>
    alert('MySql Connection Successful');
    window.location.replace('1.php');
</SCRIPT>";
}
