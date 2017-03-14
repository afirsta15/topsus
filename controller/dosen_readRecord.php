<?php
include '../config/DbConnect.php' ;

$status = 1;

$data = '
<table class="table" id="records_dosen">
  <thead>
    <tr>
      <th>No.</th>
      <th>NIP</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th></th>
    </tr>
  </thead>
';

$rows = count($db->frs_dosen());
//echo $rows;
if ($rows > 0) {
  $number = 0;
  foreach ($db->frs_dosen->where("is_active", "".$status."") as $dosen) {
    // $convertDate = date('d-m-Y', strtotime($mhs["tgl_lahir"]));
    $number++;
    $data .= '<tbody><tr>
    <td>'.$number.'</td>
    <td>'.$dosen["nip"].'</td>
    <td>'.$dosen["nama_dosen"].'</td>
    <td>'.$dosen["alamat"].'</td>
    <td>
      <button type="button" onclick="GetDosenDetails('.$dosen["id_dosen"].')" class="btn btn-sm btn-warning">Edit</button>
      <button type="button" onclick="DeleteDosen('.$dosen["id_dosen"].')" class="btn btn-sm btn-danger">Delete</button>
    </td>
    </tr></tbody>';
  }
} else {
  $data .= '<tbody><tr><td colspan="9">Tidak Ada Data Dosen</td></tr></tbody>';
}

$data .= '</table>';

echo $data;
?>
