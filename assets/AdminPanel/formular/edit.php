<?php
include ("../../../../mysqlverbinden.php");
include ("../../../rowforeach.php");
include ("../header.php");
if ($valid) { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bearbeiten</title>
    <link rel="stylesheet" href="../adminpanel.css">
</head>

<body>
    <select id="select">
        <?php
        foreach (srowforeach("SELECT `ueberschrift`,`id` from `ritzenbergen-formulare`;", []) as $key => $value) {
            $id = $value[1];
            $ueberschrift = $value[0];
            echo "<option value=\"" . $id . "\">" . $ueberschrift . " (ID: " . $id . ")</option>";
        }
        ?>
    </select>
    <?php
    foreach (srowforeach("SELECT `id`,`labelone`,`labeltwo`,`ueberschrift`,`link`,`minitext`,`inhalt` from `ritzenbergen-formulare`;", []) as $key => $value) {
        $id=$value[0];
        $labelone=$value[1];
        $labeltwo=$value[2];
        $ueberschrift=$value[3];
        $link=$value[4];
        $minitext=$value[5];
        $inhalt=$value[6];
        echo "
        <form action=\"update.php\" method=\"post\" id=\"table$id\" style=\"display:none;\">
            <label for=\"ueberschrift\">Überschrift:</label>
            <input value=\"$ueberschrift\" type=\"text\" name=\"ueberschrift\" id=\"ueberschrift\" placeholder=\"Überschrift eingeben\" required><br><br>
            <label for=\"datum\">Beschreibung</label>
            <textarea name=\"inhalt\" id=\"Beschreibung\" rows=\"20\" cols=\"43\" placeholder=\"Beschreibung eingeben\" required>$inhalt</textarea><br><br>
            <label for=\"datum\">Minitext <i>bsp: Bisherige Anmeldungen: 0</i></label>
            <input type=\"text\" value=\"$minitext\" name=\"minitext\" id=\"minitext\" placeholder=\"Minitext eingeben\" required><br><br>

            <label for=\"datum\">Text-Label 1</label>
            <input type=\"text\" name=\"labelone\" value=\"$labelone\" id=\"labelone\" placeholder=\"Labeltext eingeben\" required><br><br>

            <label for=\"datum\">Text-Label 2</label>
            <input type=\"text\" name=\"labeltwo\" value=\"$labeltwo\" id=\"labeltwo\" placeholder=\"Labeltext eingeben\" required><br><br>
            
            <label for=\"link\">Link</label>
            <input type=\"text\" name=\"link\" value=\"$link\" id=\"link\" placeholder=\"Link, der zu den Ergebnissen führt. Leer lassen, um keinen Link zu erstellen\">

            <div class=\"buttonArea\">
            </div>
            
            <input type=\"hidden\" name=\"username\" value=\"".$_POST["username"]."\">
            <input type=\"hidden\" name=\"password\" value=\"".$_POST["password"]."\">
            <input type=\"hidden\" name=\"id\" value=\"$id\">


            <input type=\"submit\" id=\"submit-btn\" value=\"Input-Feld hinzufügen\"/>    
        </form>
            ";
    }
    ?>
    <script src="show.js"></script>
</body>

</html>
<?php
}
include ("../footer.php");
?>