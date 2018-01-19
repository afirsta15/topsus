<?php
include '../config/DbConnect.php' ;

$select_mhs = explode(" - ", $_POST['select_mhs']);
$add_matkul = explode(" | ", $_POST['add_matkul']);

$kur = $db->frs_kurikulum->where("is_active", "1")->fetch();
$id_mhs = $db->frs_mahasiswa->where("is_active", "1")->where("nrp", "".$select_mhs[0]."")->fetch();
$id_matkul = $db->frs_matkul->where("is_active", "1")->where("kode_matkul", "".$add_matkul[0]."")->where("id_kurikulum", $kur["id_kurikulum"])->fetch();
$id_tajar = $db->frs_tajar->where("is_active", "1")->fetch();


// Check matkul in same tahun ajar
$check = $db->frs_frs_mhs->where("id_tajar", $id_tajar["id_tajar"])->where("id_mhs", $id_mhs["id_mhs"])->where("id_matkul", $id_matkul["id_matkul"])->where("id_kurikulum", $kur["id_kurikulum"]);

// Update matkul when user already take this matkul
// $update = $db->frs_frs_mhs->where("id_mhs", $id_mhs["id_mhs"])->where("id_matkul", $id_matkul["id_matkul"]);

if($check->fetch()) {
  echo 0;
}
// elseif($update->fetch()) {
//   $data_update = array(
//     'id_tajar' => $id_tajar["id_tajar"]
//   );
//   $update->update($data_update);
//   echo 1;
// }
else {
  $data = array(
    'id_tajar' => $id_tajar["id_tajar"],
    'id_mhs' => $id_mhs["id_mhs"],
    'id_matkul' => $id_matkul["id_matkul"]
  );
  $db->frs_frs_mhs->insert($data);
  echo 1;
}

?>
