<?php
if (isset($_GET['db'])) {
    $dbname = $_GET['db'];


    header("Content-type: text/plain");

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';

//    $backup_file = $dbname . date("Y-m-d-H-i-s") . '.sql';
    if (isset($_GET['table'])) {
        $table = $_GET['table'];
        $backup_file = $dbname . '_' . $table . '.sql';
        header("Content-Disposition: attachment; filename={$backup_file}");
        $command = "mysqldump --opt -h $dbhost -u $dbuser $dbpass " . $dbname . " " . $table . " > $backup_file";
    } else {
        $backup_file = $dbname . '.sql';
        header("Content-Disposition: attachment; filename={$backup_file}");
        $command = "mysqldump --opt -h $dbhost -u $dbuser $dbpass " . $dbname . " > $backup_file";
    }

//    echo $command;
    system($command);
    echo file_get_contents($backup_file);

//to drop all the backup files after the export is complete
//    array_map('unlink', glob("backup/*.*"));
//    rmdir("backup");


    if (!is_dir('backup')) {
        mkdir('backup', 0777, true);
    }
    rename($backup_file, "backup/" . $backup_file);
} else {
    echo "<SCRIPT type='text/javascript'>
        alert('Cannot Export Database');
        window.location.replace('getDBData.php');
        </SCRIPT>";
}

?>