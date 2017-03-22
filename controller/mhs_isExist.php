<?php
include '../config/DbConnect.php' ;

$nrp = $_POST['nrp'];

$check = $db->frs_mahasiswa->where("nrp", $nrp);

if($check->fetch()) {
  echo 0;
} else {
  echo 1;
}

?>
