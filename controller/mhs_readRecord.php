<?php
include '../config/DbConnect.php' ;

$status = 1;

$data = '
<table class="table">
  <thead>
    <tr>
      <th>NRP</th>
      <th>Nama</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Alamat</th>
      <th>Wali</th>
      <th>SPP</th>
      <th></th>
    </tr>
  </thead>
';

foreach ($db->frs_mahasiswa->where("is_active", "".$status."") as $mhs) {
  $convertDate = date('d-m-Y', strtotime($mhs["tgl_lahir"]));
  $data .= '<tbody><tr>
  <td>'.$mhs["nrp"].'</td>
  <td>'.$mhs["nama_mhs"].'</td>
  <td>'.$mhs["tempat_lahir"].'</td>
  <td>'.$convertDate.'</td>
  <td>'.$mhs["alamat"].'</td>
  <td>'.$mhs["dosen_wali"].'</td>
  <td>'.$mhs["spp"].'</td>
  <td>
    <button type="button" onclick="GetMhsDetails('.$mhs["id_mhs"].')" class="btn btn-sm btn-warning">Edit</button>
    <button type="button" onclick="DeleteMhs('.$mhs["id_mhs"].')" class="btn btn-sm btn-danger">Delete</button>
  </td>
  </tr></tbody>';
}

$data .= '</table>';

echo $data;
?>
