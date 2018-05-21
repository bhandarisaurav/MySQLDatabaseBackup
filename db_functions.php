<?php
function drop_db($dbname)
{
    $con = mysqli_connect('localhost', 'root', '');
    $sql = 'DROP DATABASE ' . $dbname;
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
