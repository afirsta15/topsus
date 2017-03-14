<?php
include '../config/DbConnect.php' ;

$id_dosen = $_POST['id_dosen'];
$nip = $_POST['nip'];
$nama_dosen = $_POST['nama_dosen'];
// $tempat_lahir = $_POST['tempat_lahir'];
// $tgl_lahir = $_POST['datepicker'];
// $tgl_lahir = date('Y-m-d', strtotime($tgl_lahir));
$alamat = $_POST['alamat'];
// $dosen_wali = $_POST['dosen_wali'];
// $spp = $_POST['spp'];

$data = array(
  'nip' => $nip,
  'nama_dosen' => $nama_dosen,
  // 'tempat_lahir' => $tempat_lahir,
  // 'tgl_lahir' => $tgl_lahir,
  'alamat' => $alamat,
  'is_edit' => 0
  // 'dosen_wali' => $dosen_wali,
  // 'spp' => $spp
);
$dosen = $db->frs_dosen->where("id_dosen", "".$id_dosen."");
if($dosen->fetch()){
  $result = $dosen->update($data);
}
?>
