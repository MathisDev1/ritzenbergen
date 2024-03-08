<?php
/**
 * GET
 * Argumente: 
 *      path: Der Pfad zu den Bildern
 */

if(!isset($_GET["path"])) echo "Bitte gebe path an!";

$path=$_GET["path"];
$blacklist=[];
$file_ext=["jpg","png","gif"];

foreach(scandir($path) as $value){
    if(in_array($value,$blacklist)) continue;
    if (is_dir($path."/".$value)) continue;
    if(!in_array(pathinfo($path."/".$value,PATHINFO_EXTENSION),$file_ext)) continue;
    echo $value."<br>";
    
} 