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
        $id=$value[0];
        $ueberschrift=$value[1];
        echo "<button class=\"remove-button\" onclick=\"openWithPassword('remove2.php',".$id.");\">".$ueberschrift." (ID: ".$id.")</button><br><br>";
    }
    
    ?>
    <script src="remove.js.php"></script>
</body>
</html>