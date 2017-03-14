<?php
include '../config/DbConnect.php';

$id_dosen = $_POST['id_dosen'];

$is_edit = $db->frs_dosen->select("is_edit")->where("id_dosen", $id_dosen)->fetch();

if($is_edit['is_edit'] == 1) {
  echo 1;
} else {
  $data = array(
    'is_edit' => '1',
  );
  $dosen = $db->frs_dosen->where("id_dosen", "".$id_dosen."");
  if($dosen->fetch()){
    $result = $dosen->update($data);
  }
  $response = $db->frs_dosen->where("id_dosen", $id_dosen);
  echo json_encode($response);
}

?>
