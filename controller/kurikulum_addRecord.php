<!-- File kurikulum_addRecord.php -->
<?php
include '../config/DbConnect.php' ;

$nama_kurikulum = $_POST['nama_kurikulum'];

$check = $db->frs_kurikulum->where("nama_kurikulum", $nama_kurikulum);

if($check->fetch()) {
  echo 0;
} else {
  $data = array(
    'nama_kurikulum' => $nama_kurikulum
  );
  $db->frs_kurikulum->insert($data);
  echo 1;
}

?>
