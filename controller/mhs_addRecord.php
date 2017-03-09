<?php
include '../config/DbConnect.php' ;

$nrp = $_POST['nrp'];
$nama_mhs = $_POST['nama_mhs'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['datepicker'];
$tgl_lahir = date('Y-m-d', strtotime($tgl_lahir));
$alamat = $_POST['alamat'];
$dosen_wali = $_POST['dosen_wali'];
$spp = $_POST['spp'];

$check = $db->frs_mahasiswa->where("nrp", $nrp);

if($check->fetch()) {
  echo 0;
} else {
  $data = array(
    'nrp' => $nrp,
    'nama_mhs' => $nama_mhs,
    'tempat_lahir' => $tempat_lahir,
    'tgl_lahir' => $tgl_lahir,
    'alamat' => $alamat,
    'dosen_wali' => $dosen_wali,
    'spp' => $spp
  );
  $db->frs_mahasiswa->insert($data);
  echo 1;
}

?>
