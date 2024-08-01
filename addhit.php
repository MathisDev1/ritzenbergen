<?php

include ("../mysqlverbinden.php");
include ("rowforeach.php");

$ip = $_SERVER['REMOTE_ADDR'];
mysqli_execute_query($db_id, "DELETE FROM `ritzenbergen-hits` WHERE `timestamp` < NOW() - INTERVAL 1 DAY");
if (count(srowforeach("SELECT `id` FROM `ritzenbergen-hits` where `ip`=?;", [$ip])) < 1) {

    mysqli_execute_query($db_id, "INSERT INTO `ritzenbergen-hits` (`ip`) VALUES (?);", [$ip]);

    $file1 = fopen("hits.txt", "r");
    $hits = fread($file1, 99999);
    fclose($file1);
    $file2 = fopen("hits.txt", "w");
    $hits += 1;
    fwrite($file2, $hits);
    fclose($file2);
}
?>