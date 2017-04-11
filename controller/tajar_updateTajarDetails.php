<?php
include '../config/DbConnect.php' ;

$nama_tajar = $_POST['nama_tajar'];

$current_tajar = $db->frs_tajar->where("is_active", "1");

$change_current = array(
  'is_active' => 0
);

$data = array(
  'is_active' => 1
);

$tajar = $db->frs_tajar->where("nama_tajar", "".$nama_tajar."");

if($current_tajar->fetch()) {
  $update = $current_tajar->update($change_current);
}

if($tajar->fetch()){
  $result = $tajar->update($data);
}

?>
