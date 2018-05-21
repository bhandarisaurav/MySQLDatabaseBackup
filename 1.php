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
        a:hover
        {
            color:#00A0C6;
            text-decoration:none;
            /*cursor:pointer;*/
            cursor: progress;
        }
        a:active{
            color: green;
        }
    </style>
</head>

<body>

<?php include 'db_connect.php';

$sql = "SELECT table_schema as 'Database Name', count(1) as 'Table Count',round(sum( data_length + index_length ) / 1024 ,1) as 'Database Size in KB',
    MAX(create_time) as 'Date Created', MAX(update_time) as 'Date Updated' FROM 
    information_schema.TABLES WHERE table_schema NOT IN ('information_schema','mysql','performance_schema','phpmyadmin') 
    GROUP BY table_schema  order by sum( data_length + index_length ) / 1024 desc;";

$result = mysqli_query($con, $sql);
?>

<h1 style='text-align: center;'>Database Details</h1>
<table class="rwd-table">
    <tr>
        <th>ID</th>
        <th>Database Name</th>
        <th>Table Count</th>
        <th>Database Size</th>
        <th>Date Created</th>
        <th>Date Updated</th>
        <th>Action</th>
    </tr>

    <!--    Getting Data from Database-->
    <?php include 'db_functions.php';

    if (isset($_GET['db'])) {
            drop_db($_GET['db']);
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
              <td>{$row['Database Name']}</td>
              <td style='text-align: center;'>{$row['Table Count']}</td>
              <td style='text-align: center;'>{$row['Database Size in KB']} KB</td>
              <td style='text-align: center;'>$date_created</td>
              <td style='text-align: center;'>$date_updated</td>
              <td style='font-size:1.1em;'>
                  <a href='db_export.php?db={$row['Database Name']}'>
                        <i class='fas fa-cloud-download-alt'></i>
                  </a>
                  &nbsp;
                  <a onclick=\"return confirm('Are you sure you want to delete this Database?');\" 
                  href='1.php?db={$row['Database Name']}'>
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
