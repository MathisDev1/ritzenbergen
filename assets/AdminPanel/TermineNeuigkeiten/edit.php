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
    <title>Bearbeiten</title>
</head>
<body>
    <?php
    $event=srowforeach("SELECT `eventname`,`datum`,`type`,`content`,`link`,`foto` from `ritzenbergen-events`;",[])[0];
    list($eventname, $datum, $type, $content, $link, $foto) = $event;
    ?>
    <script>
            function openWithPassword(url, id) {
                var password = `<?php echo $_POST["password"]; ?>`;
                var username = `<?php echo $_POST["username"]; ?>`;
                var formTag = document.createElement("form");
                formTag.action = url;
                formTag.method = "post";
                var usernameTag = document.createElement("input");
                var passwordTag = document.createElement("input");
                var idTag = document.createElement("input");
                usernameTag.type = "hidden";
                passwordTag.type = "hidden";
                idTag.type = "hidden";
                usernameTag.value = username;
                passwordTag.value = password;
                idTag.value = id;
                usernameTag.name="username";
                passwordTag.name="password";
                idTag.name="id";
                formTag.appendChild(usernameTag);
                formTag.appendChild(passwordTag);
                formTag.appendChild(idTag);
                document.body.appendChild(formTag);
                formTag.submit();
            }
        </script>
    <?php
    foreach (srowforeach("SELECT `id`, `eventname`,`datum`,`type`,`content`,`link`,`foto` from `ritzenbergen-events`;",[]) as $key => $value) {
        list($id,$eventname, $datum, $type, $content, $link, $foto) = $value;
        if (mb_strlen($content) > 20) {
          $content = mb_substr($content, 0, 17) . "...";
        }
    ?>

        <a href="#" onclick="openWithPassword('edit2.php',<?php echo $id; ?>);"><?php echo $id; ?> - <?php echo $eventname; ?> - <?php echo $datum; ?> - <?php echo $content; ?></a> <br>
      
        <?php } ?>
    </body>
</html>
<?php }
include("../footer.php"); ?>