<?php

use TechStore\Classes\Models\Admin;

require_once("../../app.php");

$ad=new Admin;
$ad->logout($session);

$request->aredierct("login.php");





?>