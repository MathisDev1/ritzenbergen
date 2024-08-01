<?php
include ("../../../../mysqlverbinden.php");
include ("../../../rowforeach.php");
include ("../header.php");
if ($valid) { ?>
<?php

if(isset($_POST["id"])) $id=$_POST["id"];
else die("POST id fehlt");

mysqli_execute_query($db_id,"DELETE FROM `ritzenbergen-formulare` where `id`=?;",[$id]);
mysqli_execute_query($db_id,"DELETE FROM `ritzenbergen-formular-ergebnisse` where `formularid`=?;",[$id]);

echo "Formular gelöscht";
?>
<?php
}
include ("../footer.php");
?>