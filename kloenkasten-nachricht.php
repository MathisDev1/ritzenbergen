<?php
include("../mysqlverbinden.php");

if(isset($_POST["msg"])) $msg=$_POST["msg"];
else die("POST msg fehlt");

if(isset($_POST["name"])) $name=$_POST["name"];
else die("POST name fehlt");

if(isset($_POST["email"])) $email=$_POST["email"];
else die("POST email fehlt");

mysqli_execute_query($db_id, "INSERT INTO `ritzenbergen-kloenkasten` (`name`,`email`,`message`) VALUES (?,?,?);",[$name,$email,$msg]);

?>