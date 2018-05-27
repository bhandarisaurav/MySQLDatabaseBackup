<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Responsive Table</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
            type="text/javascript"></script>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="assets/css/style_table.css">
    <link rel="stylesheet" href="assets/css/style_button.css">


    <style>

        html {
            display: table;
            margin: auto;
        }

        body {
            display: table-cell;
            vertical-align: middle;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        a:hover {
            color: #00A0C6;
            text-decoration: none;
            /*cursor:pointer;*/
            cursor: progress;
        }

        a:active {
            color: green;
        }
    </style>
</head>

<body>

<?php
if (isset($_GET["db"]) && isset($_GET["table"])) {
    $db = $_GET["db"];
    $table = $_GET["table"];
    $con = mysqli_connect("localhost", "root", "", $db);
    $fields = array();
    $res = mysqli_query($con, "SHOW COLUMNS FROM " . $table);
    if (!$res) {
        $location = "getTableData.php?db=" . $db;
        $error = mysqli_error($con);
        echo '<SCRIPT type="text/javascript">alert("' . $error . '")
        window.location.replace("' . $location . '");
        </SCRIPT>';
    }
    while ($x = mysqli_fetch_assoc($res)) {
        $val = $x['Field'];
        if (strtolower($val) == "id")
            $val = "ID";
        $fields[] = ucfirst($val);

    }
} else {
    echo "<SCRIPT type='text/javascript'>
        alert('Error Occurred While Getting Data');
        window.location.replace('getDBData.php');
</SCRIPT>";
}
//foreach ($fields as $f) { echo "<br>Field name: ".$f; }
$sql = "SELECT table_name AS 'Table Name',table_rows AS 'Row Count', ROUND( (data_length + index_length) /1024, 2 ) AS 'Table Size in KB',
                create_time as 'Date Created', UPDATE_TIME as 'Date Updated'
                FROM information_schema.TABLES WHERE information_schema.TABLES.table_schema = '$db';";
$result = mysqli_query($con, $sql);
if (!$result) {
    $location = "getTableData.php?db=" . $db;
    $error = mysqli_error($con);
    echo '<SCRIPT type="text/javascript">alert("' . $error . '")
        window.location.replace("' . $location . '");
        </SCRIPT>';
}
?>

<h1 style='text-align: center;'>Table Details of <b><a href="getDBData.php">Database</a></b>
    : <?php echo($_GET['db']) ?></h1>
<table class="rwd-table">
    <tr>
        <?php
        foreach ($fields as $f) {
            echo "<th>";
            echo $f;
            echo "</th>";
        }
        ?>
        <th>Action</th>
    </tr>

    <!--    Getting Data from Database-->

    <!--    Getting Data from Database-->
</table>


</body>

</html>
