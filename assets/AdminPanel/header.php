<?php
$valid=isset($_POST["password"])&&isset($_POST["username"]);


if($valid) $valid=srowforeach("SELECT passwort from `ritzenbergen-admin-login` where benutzername=?;",[$_POST["username"]])[0][0]==$_POST["password"];

?>