<?php
include '../config/DbConnect.php' ;

$get_mhs = $_REQUEST["select_mhs"];
$raw_mhs = explode(" - ", $get_mhs);

$status = 1;

$data = '
<table class="table" id="records_transkrip">
  <thead>
    <tr id="table-header">
      <th>No.</th>
      <th>Kode</th>
      <th>Nama</th>
      <th>Jumlah SKS</th>
      <th>Tahun Ajar</th>
    </tr>
  </thead>
';

$id_mhs = $db->frs_mahasiswa->where("nrp", "".$raw_mhs[0]."")->fetch();
$list_matkul = $db->frs_matkul->where("is_active", "".$status."");

$rows = count($db->frs_frs_mhs());
//echo $rows;
if ($rows > 0) {
  $number = 0;
  $jumlah_sks = 0;
  foreach ($db->frs_frs_mhs->where("is_active", "".$status."")->where("id_mhs","".$id_mhs["id_mhs"]."")->order("id_matkul")->order("id_tajar") as $transkrip) {
    $number++;
    $matkul = $db->frs_matkul->where("id_matkul", $transkrip["id_matkul"])->fetch();
    $mhs = $db->frs_mahasiswa->where("id_mhs", $transkrip["id_mhs"])->fetch();
    $jumlah_sks += $matkul["jml_sks"];
    $tajar = $db->frs_tajar->where("id_tajar", $transkrip["id_tajar"])->fetch();
    $data_mhs = '<h3 class="pull-left" id="nama-mhs">' .$mhs["nama_mhs"]. '</h3><h3 class="pull-right" id="jml-sks">Jumlah SKS : '.$jumlah_sks.'</h3>';
    $data .= '<tbody><tr>
    <td>'.$number.'</td>
    <td>'.$matkul["kode_matkul"].'</td>
    <td>'.$matkul["nama_matkul"].'</td>
    <td>'.$matkul["jml_sks"].'</td>
    <td>'.$tajar["nama_tajar"].'</td>
    </tr></tbody>';
  }
} else {
  $data .= '<tbody><tr><td colspan="9">Tidak Ada Data FRS</td></tr></tbody>';
}

$data .= '</table>';

$cetak_matkul = '
<div class="col-md-12">
  <div class="pull-right">
    <button type="button" class="btn btn-warning" onclick="cetakFrs('.$transkrip["id_frs"].')">Cetak</button>
  </div>
</div>
';

echo $data_mhs . $data . $cetak_matkul;
?>
