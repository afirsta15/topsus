<?php
include '../config/DbConnect.php' ;

$id_matkul = $_POST['id_matkul'];
$kode_matkul = $_POST['kode_matkul'];
$nama_matkul = $_POST['nama_matkul'];
$jml_sks = $_POST['jml_sks'];

$data = array(
  'kode_matkul' => $kode_matkul,
  'nama_matkul' => $nama_matkul,
  'jml_sks' => $jml_sks,
  'is_edit' => '0'
);
$matkul = $db->frs_matkul->where("id_matkul", "".$id_matkul."");
if($matkul->fetch()){
  $result = $matkul->update($data);
}
?>
