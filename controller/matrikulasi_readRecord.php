<?php
include '../config/DbConnect.php' ;

$status = 1;

$data = '
<table class="table" id="records_matkul">
  <thead>
    <tr>
      <th>No.</th>
      <th>Kode Matkul Lama</th>
      <th>Nama Matkul Lama</th>
      <th>Kurikulum Matkul Lama</th>
      <th>Kode Matkul Baru</th>
      <th>Nama Matkul Baru</th>
      <th>Kurikulum Matkul Baru</th>
    </tr>
  </thead>
';

$rows = count($db->frs_matrikulasi());
//echo $rows;
if ($rows > 0) {
  $number = 0;
  foreach ($db->frs_matrikulasi() as $matrikulasi) {
    // $convertDate = date('d-m-Y', strtotime($mhs["tgl_lahir"]));
    $old_name = $db->frs_matkul->where("id_matkul", $matrikulasi["id_matkul_old"])->fetch();
    $new_name = $db->frs_matkul->where("id_matkul", $matrikulasi["id_matkul_new"])->fetch();
    $old_kur = $db->frs_kurikulum->where("id_kurikulum", $old_name["id_kurikulum"])->fetch();
    $new_kur = $db->frs_kurikulum->where("id_kurikulum", $new_name["id_kurikulum"])->fetch();
    $number++;
    $data .= '<tbody><tr>
    <td>'.$number.'</td>
    <td>'.$old_name["kode_matkul"].'</td>
    <td>'.$old_name["nama_matkul"].'</td>
    <td>'.$old_kur["nama_kurikulum"].'</td>
    <td>'.$new_name["kode_matkul"].'</td>
    <td>'.$new_name["nama_matkul"].'</td>
    <td>'.$new_kur["nama_kurikulum"].'</td>
    </tr></tbody>';
  }
} else {
  $data .= '<tbody><tr><td colspan="9">Tidak Ada Data Matrikulasi</td></tr></tbody>';
}

$data .= '</table>';

echo $data;
?>
