<?php
include '../config/DbConnect.php' ;

$kode_matkul = $_POST['kode_matkul'];

$check = $db->frs_matkul->where("kode_matkul", $kode_matkul);

if($check->fetch()) {
  echo 0;
} else {
  echo 1;
}

?>
