<?php
$backup_file = "Read.txt";
$file_name = "README.md";
$data = file_get_contents($file_name);
header("Content-Disposition: attachment; filename='{$backup_file}'");
echo $data;
?>