<?php
include '../config/DbConnect.php' ;

$nama_tajar = $_POST['nama_tajar'];

$check = $db->frs_tajar->where("nama_tajar", $nama_tajar);

if($check->fetch()) {
  echo 0;
} else {
  $data = array(
    'nama_tajar' => $nama_tajar
  );
  $db->frs_tajar->insert($data);
  echo 1;
}

?>
