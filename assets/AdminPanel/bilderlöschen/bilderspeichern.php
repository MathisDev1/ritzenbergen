<?php
include ("../../../../mysqlverbinden.php");
include ("../../../rowforeach.php");
include ("../header.php");
if ($valid) { ?>
<?php

$whitelistpath=$_POST["whitelistpath"];
if(isset($_POST["bilder"])) $bilder=$_POST["bilder"];
else $bilder=[];
$file=fopen($whitelistpath,"w");
fwrite($file,implode("\r\n",$bilder));
fclose($file);

?>

<?php
}
include ("../footer.php");
?>