<?php
$valid=isset($_GET["password"])&&isset($_GET["username"]);


if($valid) $valid=srowforeach("SELECT passwort from `ritzenbergen-admin-login` where benutzername=?;",[$_GET["username"]])[0][0]==$_GET["password"];

?>