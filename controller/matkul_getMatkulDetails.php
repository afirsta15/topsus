<?php
include '../config/DbConnect.php';

$id_matkul = $_POST['id_matkul'];

$is_edit = $db->frs_matkul->select("is_edit")->where("id_matkul", $id_matkul)->fetch();

if($is_edit['is_edit'] == 1) {
  echo 1;
} else {
  $data = array(
    'is_edit' => '1',
  );
  $matkul = $db->frs_matkul->where("id_matkul", "".$id_matkul."");
  if($matkul->fetch()){
    $result = $matkul->update($data);
  }
  $response = $db->frs_matkul->where("id_matkul", $id_matkul);
  echo json_encode($response);
}

?>
