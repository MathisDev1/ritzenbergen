<?php
include ("../../../../mysqlverbinden.php");
include ("../../../rowforeach.php");
include ("../headerGET.php");
if ($valid) { ?>
<?php header("Content-type: application/javascript") ?>
function openWithPassword(url,id) {
    if(!window.confirm("Möchtest du wirklich Formular Nr. "+id+" löschen?")) return;
    var password = `<?php echo $_GET["password"]; ?>`;
    var username = `<?php echo $_GET["username"]; ?>`;
    var formTag = document.createElement("form");
    formTag.action = url;
    formTag.method = "post";
    var usernameTag = document.createElement("input");
    var passwordTag = document.createElement("input");
    var idTag=document.createElement("input");
    usernameTag.type = "hidden";
    passwordTag.type = "hidden";
    idTag.type="hidden";
    usernameTag.value = username;
    passwordTag.value = password;
    idTag.value=id;
    usernameTag.name="username";
    passwordTag.name="password";
    idTag.name="id";
    formTag.appendChild(usernameTag);
    formTag.appendChild(passwordTag);
    formTag.appendChild(idTag);
    document.body.appendChild(formTag);
    formTag.submit();
}
<?php
}
include ("../footer.php");
?>