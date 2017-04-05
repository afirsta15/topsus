<?php
include '../config/DbConnect.php' ;

$id_matkul = $_POST['id_matkul'];


$data = array(
  'is_active' => '0',
);
$matkul = $db->frs_matkul->where("id_matkul", "".$id_matkul."");
if($matkul->fetch()){
  $result = $matkul->update($data);
}
?>
