<?php
include '../config/DbConnect.php' ;

$id_mhs = $_POST['id_mhs'];


$data = array(
  'is_active' => '0',
);
$mhs = $db->frs_mahasiswa->where("id_mhs", "".$id_mhs."");
if($mhs->fetch()){
  $result = $mhs->update($data);
}
?>
