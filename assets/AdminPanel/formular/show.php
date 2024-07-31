<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ergebnisse ausgeben</title>
    <style>
        td{
            border: 1px solid black;
            padding: 10px;
            margin: 10px;
        }
    </style>
</head>
<table>
    <select id="select">
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
    <?php
    foreach (srowforeach("SELECT `id`,`labelone`,`labeltwo` from `ritzenbergen-formulare`;",[]) as $key => $value) {
        $id=$value[0];
        $labelone=$value[1];
        $labeltwo=$value[2];
        
        echo "
            <table id=\"table".$id."\" style=\"display: none;\">
                <tr>
                    <td>".$labelone."</td>
                    <td>".$labeltwo."</td>
                    <td>Datum</td>
                </tr>";
        foreach(srowforeach("SELECT `labelone`,`labeltwo`,`timestamp` from `ritzenbergen-formular-ergebnisse` where `formularid`=?;",[$id]) as $key => $value){
            $textone=$value[0];
            $texttwo=$value[1];
            $timestamp=$value[2];
            echo "<tr>
                <td>".$textone."</td>
                <td>".$texttwo."</td>
                <td>".$timestamp."</td>
            </tr>";
        }
        echo "</table>";
    }
    ?>
    <script src="show.js"></script>
</body>
</html>