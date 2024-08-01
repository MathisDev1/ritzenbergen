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
    <title>Formulare</title>
</head>

<body>
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
            usernameTag.name = "username";
            passwordTag.name = "password";
            formTag.appendChild(usernameTag);
            formTag.appendChild(passwordTag);
            document.body.appendChild(formTag);
            formTag.submit();
        }
    </script>

    <a href="#" class="weiterleitung" onclick="openWithPassword('add.php');">Formular hinzufügen</a><br>
    <a href="#" class="weiterleitung" onclick="openWithPassword('remove.php');">Formular entfernen</a><br>
    <a href="#" class="weiterleitung" onclick="openWithPassword('show.php');">Ergebnisse ansehen</a><br>
    <a href="#" class="weiterleitung" onclick="openWithPassword('edit.php');">Formular ändern</a><br>

</body>
</html>
<?php
}
include ("../footer.php");
?>