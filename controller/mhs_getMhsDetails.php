<?php
include '../config/DbConnect.php';

$user_id = $_POST['user_id'];

$response = $db->frs_mahasiswa->where("id_mhs", $user_id);

echo json_encode($response);

?>
