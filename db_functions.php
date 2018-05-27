<?php
function drop_db($dbname)
{
    $con = mysqli_connect('localhost', 'root', '');
    $sql = 'DROP DATABASE ' . $dbname;
    $result = mysqli_query($con, $sql);
    if (!$result) {

        $error = "Could not delete database: " . $dbname . mysqli_error($con);
        echo '<SCRIPT type="text/javascript">alert("' . $error . '")
        window.location.replace("getDBData.php");
        </SCRIPT>';
    }else{
        $error = "Database " . $dbname." Deleted Successfully";
        echo '<SCRIPT type="text/javascript">alert("' . $error . '")
        window.location.replace("getDBData.php");
        </SCRIPT>';
    }
    mysqli_close($con);
}

function drop_table($table_name)
{
    $con = mysqli_connect('localhost', 'root', '');
    $sql = 'DROP DATABASE ' . $table_name;
    $result = mysqli_query($con, $sql);
    if (!$result) {

        $error = "Could not delete database: " . $table_name . mysqli_error($con);
        echo '<SCRIPT type="text/javascript">alert("' . $error . '")
        window.location.replace("getDBData.php");
        </SCRIPT>';
    } else {
        $error = "Database " . $table_name . " Deleted Successfully";
        echo '<SCRIPT type="text/javascript">alert("' . $error . '")
        window.location.replace("getDBData.php");
        </SCRIPT>';
    }
    mysqli_close($con);
}
?>
