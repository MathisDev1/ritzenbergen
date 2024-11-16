<?php
$valid=count(srowforeach("SELECT * from `buli-user` where `username`=? AND `password`=?;",[$user,$pass]))>0;

