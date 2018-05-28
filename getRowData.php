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
//    echo "SHOW COLUMNS FROM " . $table;
    if (!$res) {
        $location = "getTableData.php?db=" . $db;
        $error = mysqli_error($con);
        echo '<SCRIPT type="text/javascript">alert("' . $error . '")
        window.location.replace("' . $location . '");
        </SCRIPT>';
    }
    while ($x = mysqli_fetch_assoc($res)) {
        $val = $x['Field'];
//        if (strtolower($val) == "id")
//            $val = "ID";
        $fields[] = $val;

    }
} else {
    echo "<SCRIPT type='text/javascript'>
        alert('Error Occurred While Getting Data');
        window.location.replace('getDBData.php');
</SCRIPT>";
}
//foreach ($fields as $f) { echo "<br>Field name: ".$f; }
$sql = "SELECT * from " . $table;
//echo $sql;
$result = mysqli_query($con, $sql);
if (!$result) {
    $location = "getTableData.php?db=" . $db;
    $error = mysqli_error($con);
    echo '<SCRIPT type="text/javascript">alert("' . $error . '")
        window.location.replace("' . $location . '");
        </SCRIPT>';
}
?>

<h1 style='text-align: center;'>Row Details of <b><a href="getTableData.php?db=<?php echo($_GET['db']) ?>">Table</a></b>
    : <?php echo($_GET['table']) ?></h1>
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
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        $i = 0;
        $count = sizeof($fields);
        while ($count > 0) {
            $val = $row[($fields[$i])];
            echo "<td>$val</td>";
            $i++;
            $count--;
        }
        echo "</tr>";
    }
    ?>
    <!--    Getting Data from Database-->
</table>


</body>

</html>
