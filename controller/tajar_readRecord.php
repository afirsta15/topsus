<?php
include '../config/DbConnect.php' ;

$data = '
<form class="form-inline">
  <div class="form-group">
    <label for="nama_tajar">Pilih Tahun Ajar : </label>
    <select class="form-control" name="nama_tajar" id="nama_tajar" style="width:200px">
';

$rows = count($db->frs_tajar());
//echo $rows;
if ($rows > 0) {
  foreach ($db->frs_tajar->where("is_active", "0") as $tajar) {
    $data .= '
      <option>'.$tajar["nama_tajar"].'</option>
    ';
  }

  $data .= '</select></div>';
  $data .= '
  <button type="button" onclick="aktifasiTajar()" class="btn btn-sm btn-danger">Aktifkan</button>
  ';
} else {
  $data .= '<option>Kosong</option></select></div>';
}

$data .= '</form>';

echo $data;
//echo json_encode($nama_tajar["nama_tajar"]);
?>
