<?php
include_once dirname(__FILE__) . '/constants.php';
include '../lib/NotORM.php';
$pdo = new PDO('mysql:host=127.0.0.1;dbname=topsus_frs', DB_UNAME, DB_PASS);
$db = new NotORM($pdo);
//echo $db;
?>
