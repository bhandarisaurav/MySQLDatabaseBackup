<?php
$con=mysqli_connect("localhost","root","");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create database
$sql="CREATE DATABASE eps_nepal";
if (mysqli_query($con,$sql))
{
    echo "Database eps_nepal created successfully";
}
else
{
    echo "Error creating database: " . mysqli_error($con);
}
?>


SELECT table_schema as 'Database Name', count(1) as 'Table Count',sum( data_length + index_length ) / 1024 as 'Database Size in KB' FROM
information_schema.TABLES WHERE table_schema NOT IN ('information_schema','mysql','performance_schema','phpmyadmin')
GROUP BY table_schema  order by sum( data_length + index_length ) / 1024 desc;
