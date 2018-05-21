<?php
if (isset($_GET['db'])) {
    $dbname = $_GET['db'];

    $backup_file = $dbname . '.sql';
    header("Content-type: text/plain");
    header("Content-Disposition: attachment; filename='{$backup_file}'");
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';

//    $backup_file = $dbname . date("Y-m-d-H-i-s") . '.sql';

    $command = "mysqldump --opt -h $dbhost -u $dbuser $dbpass " . $dbname . " > $backup_file";
//    echo $command;
    system($command);
    echo file_get_contents($backup_file);
    if (!is_dir('backup')) {
        mkdir('backup', 0777, true);
    }
    rename($backup_file, "backup/" . $backup_file);
} else {
    echo "<SCRIPT type='text/javascript'>
        alert('Cannot Export Database');
        window.location.replace('1.php');
        </SCRIPT>";
}

?>