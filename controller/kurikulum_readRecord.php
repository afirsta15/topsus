<!-- File kurikulum_readRecord.php -->
<?php
include '../config/DbConnect.php' ;

$data = '
<form class="form-inline">
  <div class="form-group">
    <label for="nama_kurikulum">Pilih Kurikulum : </label>
    <select class="form-control" name="nama_kurikulum" id="nama_kurikulum" style="width:200px">
';

$rows = count($db->frs_kurikulum());
//echo $rows;
if ($rows > 0) {
  foreach ($db->frs_kurikulum->where("is_active", "0") as $tajar) {
    $data .= '
      <option>'.$tajar["nama_kurikulum"].'</option>
    ';
  }

  $data .= '</select></div>';
  $data .= '
  <button type="button" onclick="aktifasiKurikulum()" class="btn btn-sm btn-danger">Aktifkan</button>
  ';
} else {
  $data .= '<option>Kosong</option></select></div>';
}

$data .= '</form>';

echo $data;
//echo json_encode($nama_tajar["nama_tajar"]);
?>
