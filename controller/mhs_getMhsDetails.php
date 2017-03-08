<?php
include '../config/DbConnect.php';

$id_mhs = $_POST['id_mhs'];

$response = $db->frs_mahasiswa->where("id_mhs", $id_mhs);

echo json_encode($response);

?>
