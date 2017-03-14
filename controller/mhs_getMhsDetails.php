<?php
include '../config/DbConnect.php';

$id_mhs = $_POST['id_mhs'];

$is_edit = $db->frs_mahasiswa->select("is_edit")->where("id_mhs", $id_mhs)->fetch();

if($is_edit['is_edit'] == 1) {
  echo 1;
} else {
  $data = array(
    'is_edit' => '1',
  );
  $mhs = $db->frs_mahasiswa->where("id_mhs", "".$id_mhs."");
  if($mhs->fetch()){
    $result = $mhs->update($data);
  }
  $response = $db->frs_mahasiswa->where("id_mhs", $id_mhs);
  echo json_encode($response);
}

?>
