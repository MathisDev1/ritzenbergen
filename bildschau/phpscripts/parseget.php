<?php
function parseGet($getArgs){
    $endString="?";
    $first=true;
    foreach ($getArgs as $key1 => $value1) {
        if($first==false){
            $endString=$endString."&";
        } 
        $endString=$endString.$key1."=".$value1;
        $first=false;
    }
    return $endString;
}
?>