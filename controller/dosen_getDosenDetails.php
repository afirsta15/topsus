<?php
include '../config/DbConnect.php';

$id_dosen = $_POST['id_dosen'];

$response = $db->frs_dosen->where("id_dosen", $id_dosen);

echo json_encode($response);

?>
