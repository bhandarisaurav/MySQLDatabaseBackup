<?php
$con = mysqli_connect('localhost', 'root', '');
function drop_db($dbname)
{
    global $con;
    $sql = 'DROP DATABASE ' . $dbname;
    echo $sql;
    $result = mysqli_query($con, $sql);
    if (!$result) {

        $error = "Could not delete database: " . $dbname . mysqli_error($con);
        echo '<SCRIPT type="text/javascript">alert("' . $error . '")
        window.location.replace("1.php");
        </SCRIPT>';
    }else{
        $error = "Database " . $dbname." Deleted Successfully";
        echo '<SCRIPT type="text/javascript">alert("' . $error . '")
        window.location.replace("1.php");
        </SCRIPT>';
    }
    mysqli_close($con);
}
?>
