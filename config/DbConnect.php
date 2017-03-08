<?php
include_once dirname(__FILE__) . '/constants.php';
include '../lib/NotORM.php';
$pdo = new PDO('mysql:host=localhost;dbname=topsus_frs', DB_UNAME, DB_PASS);
$db = new NotORM($pdo);
//echo $db;
?>
