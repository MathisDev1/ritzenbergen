<?php
include("../../../../mysqlverbinden.php");
include("../../../rowforeach.php");
include("../header.php");
if ($valid) { ?>
    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ritzenbergen.de AdminPanel</title>
        <link rel="stylesheet" href="../adminpanel.css">
    </head>
    <?php
    $id = isset($_POST["id"]) ? $_POST["id"] : die("id nicht gesetzt"); 
    $event=srowforeach("SELECT `eventname`,`datum`,`type`,`content`,`link`,`foto` from `ritzenbergen-events` where `id`=?;",[$id])[0];
    list($eventname, $datum, $type, $content, $link, $foto) = $event;
    ?>
    <body>
        <h1>Termine & Neuigkeiten</h1>
        <form action="update.php" method="post">
            <select name="box" id="box" size="5">
                <option value="html"<?php echo ($type=="html")?" selected":""; ?>>PHP- oder HTML-Datei</option>
                <option value="text"<?php echo ($type=="text")?" selected":""; ?>>Text</option>
                <option value="link"<?php echo ($type=="link")?" selected":""; ?>>Link</option>
                <option value="dlink"<?php echo ($type=="dlink")?" selected":""; ?>>Link (Download)</option>
                <option value="fotos"<?php echo ($type=="fotos")?" selected":""; ?>>Fotos</option>
            </select>
            <br><br>

            <label for="ueberschrift">Überschrift:</label>
            <input type="text" name="ueberschrift" id="ueberschrift" placeholder="Überschrift eingeben" required value="<?php echo $eventname; ?>"><br><br>
            <label for="datum">Datum:</label>
            <input type="date" name="datum" id="datum" value="<?php echo $datum; ?>" required><br><br>
            <label for="inhalt">Inhalt, Vorschau oder Pfad zur HTML- oder PHP-Datei:</label>

            <div class="buttonArea">
                <textarea name="inhalt" id="inhalt" rows="20" cols="43" placeholder="Inhalt eingeben"
                    required><?php echo $content; ?></textarea><br><br>
                <input class="linkinput" type="text" name="link" id="link" placeholder="Link" value="<?php echo $link; ?>"><br><br>
                <input type="text" name="foto" id="fotoinput" placeholder="Pfad zum Foto (vom Ordner bilder aus)" value="<?php echo $foto; ?>">
            </div>
            <input type="hidden" name="username" value="<?php echo $_POST["username"]; ?>">
            <input type="hidden" name="password" value="<?php echo $_POST["password"]; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <input type="submit" id="submit-btn" />
        </form>


    </body>

    </html>
<?php }
include("../footer.php"); ?>