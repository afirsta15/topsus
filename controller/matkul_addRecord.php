<?php
include '../config/DbConnect.php' ;

$kode_matkul = $_POST['kode_matkul'];
$nama_matkul = $_POST['nama_matkul'];
$jml_sks = $_POST['jml_sks'];

$check = $db->frs_matkul->where("kode_matkul", $kode_matkul);

if($check->fetch()) {
  echo 0;
} else {
  $data = array(
    'kode_matkul' => $kode_matkul,
    'nama_matkul' => $nama_matkul,
    'jml_sks' => $jml_sks
  );
  $db->frs_matkul->insert($data);
  echo 1;
}

?>
