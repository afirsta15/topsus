<?php
// class DbConnect {
//   require '../vendor/autoload.php';
//   private $con;
//   function __construct(){}
//
//   function connectDB() {
//     include_once dirname(__FILE__) . '/constants.php';
//     try {
//       $this->pdo = new PDO('mysql:host=localhost;dbname=topsus_frs', DB_UNAME, DB_PASS);
//       $this->con = new NotORM($this->pdo);
//       return $this->con;
//     } catch (PDOException $e) {
//       echo $e;
//       die();
//     }
//
//   }
// }
include_once dirname(__FILE__) . '/constants.php';
include '../lib/NotORM.php';
$pdo = new PDO('mysql:host=localhost;dbname=topsus_frs', DB_UNAME, DB_PASS);
$db = new NotORM($pdo);
//echo $db;
?>
