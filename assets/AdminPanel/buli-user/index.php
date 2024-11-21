<?php
include("../../../../mysqlverbinden.php");
include("../../../rowforeach.php");
include("../header.php");
if ($valid) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ritzenbergen.de - AdminPanel</title>
        <link rel="stylesheet" href="./adminpanel.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    </head>

    <body>
        <h1>RITZENBERGEN.DE | BULI-TIPP BENUTZER REGISTRIERUNG</h1><br><br>
        <script>
            var password = `<?php echo $_POST["password"]; ?>`;
            var username = `<?php echo $_POST["username"]; ?>`;

            function openWithPassword(url) {
                var formTag = document.createElement("form");
                formTag.action = url;
                formTag.method = "post";
                var usernameTag = document.createElement("input");
                var passwordTag = document.createElement("input");
                usernameTag.type = "hidden";
                passwordTag.type = "hidden";
                usernameTag.value = username;
                passwordTag.value = password;
                usernameTag.name = "username";
                passwordTag.name = "password";
                formTag.appendChild(usernameTag);
                formTag.appendChild(passwordTag);
                document.body.appendChild(formTag);
                formTag.submit();
            }
        </script>
        <section class="add">
            <form action="add.php" method="post" id="loginform" onsubmit="return false;">
                <input type="hidden" name="username" value="<?php echo $_POST["username"]; ?>">
                <input type="hidden" name="password" value="<?php echo $_POST["password"]; ?>">
                <input type="text" name="newusername" placeholder="Neuer Benutzername"><br>
                <input type="password" name="newpassword" id="password-input" placeholder="Neues Passwort"><br>
                <input type="password" name="newpassword2" id="password-input2"
                    placeholder="Neues Passwort wiederholen"><br>
                <br>
                <input type="submit" value="BuLi-Benutzer erstellen">
            </form>
        </section>
        <br><br>
        <section class="delete">
            <?php
            foreach (srowforeach("SELECT `id`, `username` from `buli-user`;", []) as $key => $value) {
                $id = $value[0];
                $username = $value[1];
                ?>

                <button class="removeButtons" data-id="<?php echo $id; ?>"><span><?php echo $username; ?></span> löschen</button><br>

                <?php
            }

            ?>
        </section>

        <script src="main.js"></script>
    </body>

    </html>
    <?php
}
include("../footer.php");
?>