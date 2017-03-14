<?php
include '../config/DbConnect.php' ;

$nip = $_POST['nip'];
$nama_dosen = $_POST['nama_dosen'];
// $tempat_lahir = $_POST['tempat_lahir'];
// $tgl_lahir = $_POST['datepicker'];
// $tgl_lahir = date('Y-m-d', strtotime($tgl_lahir));
$alamat = $_POST['alamat'];
// $dosen_wali = $_POST['dosen_wali'];
// $spp = $_POST['spp'];

$check = $db->frs_dosen->where("nip", $nip);

if($check->fetch()) {
  echo 0;
} else {
  $data = array(
    'nip' => $nip,
    'nama_dosen' => $nama_dosen,
    // 'tempat_lahir' => $tempat_lahir,
    // 'tgl_lahir' => $tgl_lahir,
    'alamat' => $alamat
    // 'dosen_wali' => $dosen_wali,
    // 'spp' => $spp
  );
  $db->frs_dosen->insert($data);
  echo 1;
}

?>
