<?php
//$sql="SELECT table_schema as 'Database Name', count(1) as 'Table Count',sum( data_length + index_length ) / 1024 as 'Database Size in KB' FROM
//information_schema.TABLES WHERE table_schema NOT IN ('information_schema','mysql','performance_schema','phpmyadmin')
//GROUP BY table_schema  order by sum( data_length + index_length ) / 1024 desc;";
//
//$result = mysqli_query($con,$sql);
//
//$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
//echo json_encode($row);
$con = mysqli_connect("localhost", "root", "", "share_market");
$fields = array();
$res = mysqli_query($con, "SHOW COLUMNS FROM migrations");
while ($x = mysqli_fetch_assoc($res)) {
    $val = $x['Field'];
    if (strtolower($val) == "id")
        $val = "ID";
    $fields[] = ucfirst($val);

}
foreach ($fields as $f) {
    echo "<br>Field name: " . $f;
}

//print_r($fields)

?>

<?php
$result = mysqli_query($con, "select * FROM migrations");
if (!$result)
    die(mysqli_error($con));

while ($row = mysqli_fetch_array($result)) {
    $i = 0;
    $count = sizeof($fields);
    while ($count > 0) {
        echo "<br>" . "================";
        echo "Val:" . $row[strtolower($fields[$i])];
        $i++;
        $count--;
    }
    echo "<br>" . "================";

//    echo "<pre>";
//    echo $i;
//    print_r ($row);
//    echo "</pre>";
//    $i++;
}

echo "<pre>";
// Prints $r as array
//print_r ($field);
echo "</pre>";
?>



