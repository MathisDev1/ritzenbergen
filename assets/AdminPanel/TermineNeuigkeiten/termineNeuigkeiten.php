<?php 
include("../../../../mysqlverbinden.php");
include("../../../rowforeach.php");
include("../header.php"); if($valid){ ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ritzenbergen.de AdminPanel</title>
    <link rel="stylesheet" href="../adminpanel.css">
</head>
<body>
    <h1>Termine & Neuigkeiten</h1>
    <form action="eintragen.php" method="post">
        <select name="box" id="box" size="5">
            <option value="html">PHP- oder HTML-Datei</option>
            <option value="text">Text</option>
            <option value="link">Link</option>
            <option value="dlink">Link (Download)</option>
            <option value="fotos">Fotos</option>
        </select><br><br>
        
        <label for="ueberschrift">Überschrift:</label>
        <input type="text" name="ueberschrift" id="ueberschrift" placeholder="Überschrift eingeben" required><br><br>
        <label for="datum">Datum:</label>
        <input type="date" name="datum" id="datum" required><br><br>
        <label for="inhalt">Inhalt, Vorschau oder Pfad zur HTML- oder PHP-Datei:</label>

        <div class="buttonArea">
            <textarea name="inhalt" id="inhalt" rows="20" cols="43" placeholder="Inhalt eingeben" required></textarea><br><br>
            <input class="linkinput" type="text" name="link" id="link" placeholder="Link"><br><br>
            <input type="text" name="foto" id="fotoinput" placeholder="Pfad zum Foto (vom Ordner bilder aus)">
        </div>
        
        <input type="submit" id="submit-btn"/>    
    </form>


</body>
</html>
<?php } include("../footer.php"); ?>