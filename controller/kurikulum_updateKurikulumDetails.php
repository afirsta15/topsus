<!-- File kurikulum_updateKurikulumDetail.php -->
<?php
include '../config/DbConnect.php' ;

$nama_kurikulum = $_POST['nama_kurikulum'];

$current_kurikulum = $db->frs_kurikulum->where("is_active", "1");

$change_current = array(
  'is_active' => 0
);

$data = array(
  'is_active' => 1
);

$kurikulum = $db->frs_kurikulum->where("nama_kurikulum", "".$nama_kurikulum."");

if($current_kurikulum->fetch()) {
  $update = $current_kurikulum->update($change_current);
}

if($kurikulum->fetch()){
  $result = $kurikulum->update($data);
}

?>
