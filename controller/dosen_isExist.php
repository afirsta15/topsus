<?php
include '../config/DbConnect.php' ;

$nip = $_POST['nip'];

$check = $db->frs_dosen->where("nip", $nip);

if($check->fetch()) {
  echo 0;
} else {
  echo 1;
}

?>
