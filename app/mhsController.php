<?php
include '../config/DbConnect.php';
$nrp = $_POST['nrp'];
$nama_mhs = $_POST['nama_mhs'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$id_wali = $_POST['id_wali'];
$spp = $_POST['spp'];

$data = array(
  'nrp' => $nrp,
  'nama_mhs' => $nama_mhs,
  'tgl_lahir' => $tgl_lahir,
  'alamat' => $alamat,
  'spp' => $spp,
  'id_wali' => $id_wali
);

$db->frs_mahasiswa()->insert($data);
echo "Mahasiswa ".$nama_mhs." berhasil ditambahkan!";
?>
