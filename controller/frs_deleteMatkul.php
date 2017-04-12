<?php
include '../config/DbConnect.php' ;

$id_frs = $_POST['id_frs'];

$get_id = $db->frs_frs_mhs->where("id_frs", $id_frs);

if($get_id->fetch()){
  $result = $get_id->delete();
}
?>
