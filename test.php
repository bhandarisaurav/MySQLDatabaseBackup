<?php
require_once('db_connect.php');
$sql="SELECT table_schema as 'Database Name', count(1) as 'Table Count',sum( data_length + index_length ) / 1024 as 'Database Size in KB' FROM
information_schema.TABLES WHERE table_schema NOT IN ('information_schema','mysql','performance_schema','phpmyadmin')
GROUP BY table_schema  order by sum( data_length + index_length ) / 1024 desc;";

$result = mysqli_query($con,$sql);

$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($row);
?>