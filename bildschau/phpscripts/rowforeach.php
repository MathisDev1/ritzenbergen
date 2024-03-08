<?php
function rowforeach($query){
    global $db_id;
    $result=mysqli_query($db_id, $query);
    $rows = array();
    while ($row = $result->fetch_row()) {
        array_push($rows,$row);
    }

    return $rows;
}
function srowforeach($query, array $args){
    global $db_id;
    $result=mysqli_execute_query($db_id, $query, $args);
    $rows = array();
    while ($row = $result->fetch_row()) {
        array_push($rows,$row);
    }

    return $rows;
}
?>