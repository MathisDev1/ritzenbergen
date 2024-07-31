<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ergebnisse ausgeben</title>
</head>
<body>
    <select>
        <?php
            include("../../../../mysqlverbinden.php");
            include("../../../rowforeach.php");
            foreach (srowforeach("SELECT `ueberschrift`,`id` from `ritzenbergen-formulare`;",[]) as $key => $value) {
                $id=$value[1];
                $ueberschrift=$value[0];
                echo "<option value=\"".$id."\">".$ueberschrift." (ID: ".$id.")</option>";
            }
        ?>
    
    </select>
    <table>
        <tr>
            <td>Formular</td>
            <td>Form1</td>
            <td>Form2</td>
        </tr>
    </table>
</body>
</html>