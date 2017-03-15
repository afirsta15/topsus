<?php
include '../config/DbConnect.php' ;

$id_dosen = $_POST['id_dosen'];

$data = array(
  'is_edit' => '0'
);
$dosen = $db->frs_dosen->where("id_dosen", "".$id_dosen."");
if($dosen->fetch()){
  $result = $dosen->update($data);
}
?>
