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

$rows = count($db->frs_frs_mhs());
//echo $rows;
if ($rows > 0) {
  $number = 0;
  $jumlah_sks = 0;
  foreach ($db->frs_frs_mhs->where("is_active", "1")->where("id_mhs","1")->where("id_tajar", "1") as $frs) {
    $number++;
    $matkul = $db->frs_matkul->where("id_matkul", $frs["id_matkul"])->fetch();
    $mhs = $db->frs_mahasiswa->where("id_mhs", $frs["id_mhs"])->fetch();
    $jumlah_sks += $matkul["jml_sks"];
    $data_mhs = '<h3 class="pull-left">' .$mhs["nama_mhs"]. '</h3><h3 class="pull-right">Jumlah SKS : '.$jumlah_sks.'</h3>';
    $data .= '<tbody><tr>
    <td>'.$number.'</td>
    <td>'.$matkul["kode_matkul"].'</td>
    <td>'.$matkul["nama_matkul"].'</td>
    <td>'.$matkul["jml_sks"].'</td>
    <td>
      <button type="button" onclick="DeleteFrs('.$frs["id_frs"].')" class="btn btn-sm btn-danger">Delete</button>
    </td>
    </tr></tbody>';
  }
} else {
  $data .= '<tbody><tr><td colspan="9">Tidak Ada Data FRS</td></tr></tbody>';
}

$data .= '</table>';

echo $data_mhs . $data;
//echo json_encode($nama_tajar["nama_tajar"]);
?>
