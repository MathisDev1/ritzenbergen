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
    <h1>Anmeldeformular Konfiguration</h1>
    <form action="eintragen.php" method="post">
        <p>Anzeigen: Ja/Nein</p>
        <select name="box" id="box" size="2">
            <option value="html">Ja</option>
            <option value="text">Nein</option>

        </select><br><br>
        
        <label for="ueberschrift">Überschrift:</label>
        <input type="text" name="ueberschrift" id="ueberschrift" placeholder="Überschrift eingeben" required><br><br>
        <label for="datum">Beschreibung</label>
        <textarea name="inhalt" id="Beschreibung" rows="20" cols="43" placeholder="Beschreibung eingeben" required></textarea><br><br>
        <label for="datum">Minitext <i>bsp: Bisherige Anmeldungen: 0</i></label>
        <input type="text" name="minitext" id="minitext" placeholder="Minitext eingeben" required><br><br>

        <label for="datum">Text-Label 1</label>
        <input type="text" name="labelone" id="labelone" placeholder="Labeltext eingeben" required><br><br>

        <label for="datum">Text-Label 2</label>
        <input type="text" name="labeltwo" id="labeltwo" placeholder="Labeltext eingeben" required><br><br>

        <div class="buttonArea">
        </div>
        
        <input type="submit" id="submit-btn"/>    
    </form>


</body>
</html>
<?php } include("../footer.php"); ?>