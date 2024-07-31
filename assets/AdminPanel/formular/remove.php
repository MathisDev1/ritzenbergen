<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formular entfernen</title>
</head>
<body>
    <?php
    include("../../../../mysqlverbinden.php");
    include("../../../rowforeach.php");
    foreach (srowforeach("SELECT `id`,`ueberschrift` from `ritzenbergen-formulare`",[]) as $key => $value) {
        echo "<button></button>";
    }
    
    ?>
</body>
</html>