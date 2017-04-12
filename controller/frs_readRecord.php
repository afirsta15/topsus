<?php
include '../config/DbConnect.php' ;

$get_mhs = $_REQUEST["select_mhs"];
$raw_mhs = explode(" - ", $get_mhs);

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

$id_tajar_aktif = $db->frs_tajar->where("is_active", "".$status."")->fetch();
$id_mhs = $db->frs_mahasiswa->where("nrp", "".$raw_mhs[0]."")->fetch();
$list_matkul = $db->frs_matkul->where("is_active", "".$status."");

$rows = count($db->frs_frs_mhs());
//echo $rows;
if ($rows > 0) {
  $number = 0;
  $jumlah_sks = 0;
  foreach ($db->frs_frs_mhs->where("is_active", "".$status."")->where("id_mhs","".$id_mhs["id_mhs"]."")->where("id_tajar", "".$id_tajar_aktif["id_tajar"]."") as $frs) {
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

$add_matkul = '
<div>
  <form class="form-inline pull-right">
    <div class="form-group">
      <select class="form-control" name="add-matkul" id="add-matkul">
';

if (count($list_matkul) > 0) {
  foreach ($list_matkul as $lm) {
    $add_matkul .= '<option>' .$lm["kode_matkul"]. ' | ' .$lm["nama_matkul"]. ' | ' .$lm["jml_sks"]. '</option>';
  }
}

$add_matkul .= '</select></div><button type="button" class="btn btn-success" style="margin-left:10px;" onclick="addRecord()">Tambah</button></form></div>';

echo $data_mhs . $data . $add_matkul;
//echo count($list_matkul);
?>
