<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bearbeiten</title>
    <link rel="stylesheet" href="../adminpanel.css">
</head>
<body>
    <select>
        <option value="kuchenspende24">kuchenspende24 bearbeiten</option>
    </select>
    <form action="eintragen.php" method="post">
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
        
        <input type="submit" id="submit-btn" value="Input-Feld hinzufügen"/>    
    </form>
</body>
</html>