<?php
include ("../../../mysqlverbinden.php");
include ("../../rowforeach.php");
include ("header.php");
if ($valid) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ritzenbergen.de - AdminPanel</title>
        <link rel="stylesheet" href="./adminpanel.css">
    </head>

    <body>
        <h1>RITZENBERGEN.DE | ADMINONLY</h1><br><br>
        <script>
            function openWithPassword(url) {
                var password = `<?php echo $_POST["password"]; ?>`;
                var username = `<?php echo $_POST["username"]; ?>`;
                var formTag = document.createElement("form");
                formTag.action = url;
                formTag.method = "post";
                var usernameTag = document.createElement("input");
                var passwordTag = document.createElement("input");
                usernameTag.type = "hidden";
                passwordTag.type = "hidden";
                usernameTag.value = username;
                passwordTag.value = password;
                usernameTag.name="username";
                passwordTag.name="password";
                formTag.appendChild(usernameTag);
                formTag.appendChild(passwordTag);
                document.body.appendChild(formTag);
                formTag.submit();
            }
        </script>
        <a href="#" class="weiterleitung" onclick="openWithPassword('TermineNeuigkeiten/termineNeuigkeiten.php');">Termine & Neuigkeiten</a><br>
        <a href="#" class="weiterleitung" onclick="openWithPassword('hitcounter/hitcounter.php');">Besucheranzahl</a><br>
        <a href="#" class="weiterleitung" onclick="openWithPassword('bilderlöschen/index.php');">Random Bilder löschen</a><br>
        <a href="#" class="weiterleitung" onclick="openWithPassword('buli-user/index.php');">BuLi-Tipp Benutzer registrieren</a><br>
        <a href="#" class="weiterleitung" onclick="openWithPassword('formular/index.php');">Anmeldeformular</a>


    </body>

    </html>
    <?php
}
include ("footer.php");
?>