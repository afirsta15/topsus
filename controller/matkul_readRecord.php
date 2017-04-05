<?php
include '../config/DbConnect.php' ;

$status = 1;

$data = '
<table class="table" id="records_matkul">
  <thead>
    <tr>
      <th>No.</th>
      <th>Kode</th>
      <th>Nama</th>
      <th>Jumlah SKS</th>
      <th></th>
    </tr>
  </thead>
';

$rows = count($db->frs_matkul());
//echo $rows;
if ($rows > 0) {
  $number = 0;
  foreach ($db->frs_matkul->where("is_active", "".$status."") as $matkul) {
    // $convertDate = date('d-m-Y', strtotime($mhs["tgl_lahir"]));
    $number++;
    $data .= '<tbody><tr>
    <td>'.$number.'</td>
    <td>'.$matkul["kode_matkul"].'</td>
    <td>'.$matkul["nama_matkul"].'</td>
    <td>'.$matkul["jml_sks"].'</td>
    <td>
      <button type="button" onclick="GetMatkulDetails('.$matkul["id_matkul"].')" class="btn btn-sm btn-warning">Edit</button>
      <button type="button" onclick="DeleteMatkul('.$matkul["id_matkul"].')" class="btn btn-sm btn-danger">Delete</button>
    </td>
    </tr></tbody>';
  }
} else {
  $data .= '<tbody><tr><td colspan="9">Tidak Ada Data Mata Kuliah</td></tr></tbody>';
}

$data .= '</table>';

echo $data;
?>
