<?php
$host = "localhost";
if (isset($_POST['username'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $var = 0;
} else {
    $user = "root";
    $pass = "";
    $var = 1;
}

$con = mysqli_connect($host, $user, $pass);
// Check connection
if (mysqli_connect_errno()) {
    $error = "Error Code: " . mysqli_connect_errno() . ", Failed to connect to MySQL: " . mysqli_connect_error();
    echo '<SCRIPT type="text/javascript">alert("' . $error . '")
        window.location.replace("index.php");
</SCRIPT>';
} else {
    echo "<SCRIPT type='text/javascript'>
    if ($var===0){
        alert('MySql Connection Successful');
        window.location.replace('getDBData.php');
    }
</SCRIPT>";
}
