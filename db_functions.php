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

function drop_table($table_name, $db)
{
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, $db);
    $sql = 'DROP table ' . $table_name;
    $location = "getTableData.php?db=" . $db;
    $result = mysqli_query($con, $sql);
    if (!$result) {
        $error = "Could not delete table: " . $table_name . mysqli_error($con);
        echo '<SCRIPT type="text/javascript">alert("' . $error . '")
        window.location.replace("' . $location . '");
        </SCRIPT>';
    } else {
        $error = "Table " . $table_name . " Deleted Successfully";
        echo '<SCRIPT type="text/javascript">alert("' . $error . '")
        window.location.replace("' . $location . '");
        </SCRIPT>';
    }
    mysqli_close($con);
}
?>
