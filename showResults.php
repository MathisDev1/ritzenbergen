<?php

include ("../mysqlverbinden.php");
include ("rowforeach.php");

if (!isset($_GET["id"]))
    die("GET id fehlt");
else
    $id = $_GET["id"];

$labels=srowforeach("SELECT `labelone`, `labeltwo`,`link` FROM `ritzenbergen-formulare` where id=?;",[$id])[0];
$labelone = $labels[0];
$labeltwo = $labels[1];
$link=$labels[2];
if($link==null) die("PermissionError");

echo "
    <table>
        <tr>
            <td>" . $labelone . "</td>
            <td>" . $labeltwo . "</td>
            <td>Datum</td>
        </tr>";
foreach (srowforeach("SELECT `labelone`,`labeltwo`,`timestamp` from `ritzenbergen-formular-ergebnisse` where `formularid`=?;", [$id]) as $key => $value) {
    $textone = $value[0];
    $texttwo = $value[1];
    $timestamp = $value[2];
    echo "<tr>
                <td>" . $textone . "</td>
                <td>" . $texttwo . "</td>
                <td>" . $timestamp . "</td>
            </tr>";
}
echo "</table>";
?>