<!-- File matkul_addRecord.php -->
<?php
include '../config/DbConnect.php' ;

$kode_matkul = $_POST['kode_matkul'];
$nama_matkul = $_POST['nama_matkul'];
$jml_sks = $_POST['jml_sks'];
$nama_kurikulum = $_POST['kurikulum'];

$id_kurikulum = $db->frs_kurikulum->where("nama_kurikulum", $nama_kurikulum)->fetch();
$check = $db->frs_matkul->where("kode_matkul", $kode_matkul)->where("id_kurikulum", $id_kurikulum["id_kurikulum"]);

if($check->fetch()) {
  echo 0;
} else {
  $data = array(
    'kode_matkul' => $kode_matkul,
    'nama_matkul' => $nama_matkul,
    'jml_sks' => $jml_sks,
    'id_kurikulum' =>$id_kurikulum["id_kurikulum"]
  );
  $db->frs_matkul->insert($data);
  echo 1;
}

?>
