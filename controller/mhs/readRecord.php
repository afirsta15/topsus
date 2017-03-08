<?php
include '../../config/DbConnect.php';

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

foreach ($db->frs_mahasiswa->where("is_active", "1") as $mhs) {
  $data .= '<tbody><tr>
  <td>'.$mhs["nrp"].'</td>
  <td>'.$mhs["nama_mhs"].'</td>
  <td>'.$mhs["tempat_lahir"].'</td>
  <td>'.$mhs["tgl_lahir"].'</td>
  <td>'.$mhs["alamat"].'</td>
  <td>'.$mhs["dosen_wali"].'</td>
  <td>'.$mhs["spp"].'</td>
  <td>
    <button type="button" class="btn btn-sm btn-info">Edit</button>
    <button type="button" class="btn btn-sm btn-danger">Delete</button>
  </td>
  </tr></tbody>';
}

$data .= '</table>';

echo $data;
?>
