<?php
include '../config/DbConnect.php' ;

$old_matkul = $_POST['old_matkul'];
$new_matkul = $_POST['new_matkul'];

$id_old_matkul = $db->frs_matkul->where("nama_matkul", $old_matkul)->fetch();
$id_new_matkul = $db->frs_matkul->where("nama_matkul", $new_matkul)->fetch();

$check = $db->frs_matrikulasi->where("id_matkul_old", $id_old_matkul["id_matkul"])->where("id_matkul_new", $id_new_matkul["id_matkul"]);

if($check->fetch()) {
  echo 0;
} else {
  $data = array(
    'id_matkul_old' => $id_old_matkul["id_matkul"],
    'id_matkul_new' => $id_new_matkul["id_matkul"]
  );
  $db->frs_matrikulasi->insert($data);
  echo 1;
}

?>
