<!-- matkul_updateMatkulDetails.php -->
<?php
include '../config/DbConnect.php' ;

$id_matkul = $_POST['id_matkul'];
$kode_matkul = $_POST['kode_matkul'];
$nama_matkul = $_POST['nama_matkul'];
$jml_sks = $_POST['jml_sks'];
$nama_kurikulum = $_POST['kurikulum'];

$id_kurikulum = $db->frs_kurikulum->where("nama_kurikulum", $nama_kurikulum)->fetch();

$data = array(
  'kode_matkul' => $kode_matkul,
  'nama_matkul' => $nama_matkul,
  'jml_sks' => $jml_sks,
  'id_kurikulum' => $id_kurikulum["id_kurikulum"],
  'is_edit' => '0'
);
$matkul = $db->frs_matkul->where("id_matkul", "".$id_matkul."");
if($matkul->fetch()){
  $result = $matkul->update($data);
}
?>
