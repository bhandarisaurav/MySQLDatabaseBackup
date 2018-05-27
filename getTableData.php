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

<?php include 'db_connect.php';
if (isset($_GET["db"])) {
    $db = $_GET["db"];
    $sql = "SELECT table_name AS 'Table Name',table_rows AS 'Row Count', ROUND( (data_length + index_length) /1024, 2 ) AS 'Table Size in KB',
                create_time as 'Date Created', UPDATE_TIME as 'Date Updated'
                FROM information_schema.TABLES WHERE information_schema.TABLES.table_schema = '$db';";
    $result = mysqli_query($con, $sql);
} else {
    echo "<SCRIPT type='text/javascript'>
        alert('Database Not Found');
        window.location.replace('getDBData.php');
</SCRIPT>";
}
?>

<h1 style='text-align: center;'>Table Details of Database : <?php echo($_GET['db']) ?></h1>
<table class="rwd-table">
    <tr>
        <th>ID</th>
        <th>Table Name</th>
        <th>Row Count</th>
        <th>Table Size</th>
        <th>Date Created</th>
        <th>Date Updated</th>
        <th>Action</th>
    </tr>

    <!--    Getting Data from Database-->
    <?php include 'db_functions.php';

    if (isset($_GET['table'])) {
        drop_table($_GET['table'], $_GET['db']);
    }
    $i = 0;

    while ($row = mysqli_fetch_assoc($result)) {
//        $temp = (int)$row['Database Size in KB'];
//        $size = round($temp);
        $date_updated = $row['Date Updated'];
        $date_created = substr($row['Date Created'], 0, -9);
        if (is_null($date_updated)) {
            $date_updated = "-";
        }
        $i++;
        echo
        "<tr>
              <td style='width:1%'>$i</td>
              <td>{$row['Table Name']}</td>
              <td style='text-align: center;'>{$row['Row Count']}</td>
              <td style='text-align: center;'>{$row['Table Size in KB']} KB</td>
              <td style='text-align: center;'>$date_created</td>
              <td style='text-align: center;'>$date_updated</td>
              <td style='font-size:1.1em;'>
                  <a href='db_export.php?db=$db&table={$row['Table Name']}'>
                        <i class='fas fa-cloud-download-alt'></i>
                  </a>
                  &nbsp;
                  <a onclick=\"return confirm('Are you sure you want to delete this Table?');\" 
                  href='getTableData.php?db=$db&table={$row['Table Name']}'>
                        <i class='fa fa-trash-alt fa-warning'></i>
                  </a>
              </td>
						  
			  </td>			  
            </tr>\n";
    }
    ?>
    <!--    Getting Data from Database-->
</table>


</body>

</html>
