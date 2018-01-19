<?php include '../config/DbConnect.php';
$aktif = $db->frs_tajar->where("is_active", "1")->fetch();
$kur = $db->frs_kurikulum->where("is_active", "1")->fetch();
$mhs = $db->frs_mahasiswa->where("is_active", "1");
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="../bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <title>Tugas Topik Khusus | Formulir Rencana Studi</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">FRS Online</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="../app/index.php">Home</a></li>
            <li class="active"><a href="../app/frs_view.php">FRS</a></li>
            <li><a href="../app/transkrip_view.php">Transkrip</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master Data <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../app/index.php">Master Mahasiswa</a></li>
                <li><a href="../app/dosen_view.php">Master Dosen</a></li>
                <li><a href="../app/matkul_view.php">Master Mata Kuliah</a></li>
                <li><a href="../app/tajar_view.php">Master Tahun Ajar</a></li>
                <li><a href="../app/kurikulum_view.php">Master Kurikulum</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="page-header">
        <h1>Data KRSM</h1>
      </div>

      <div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="pull-left">
            <form class="form-inline">
              <div class="form-group">
                <select class="form-control" name="select-mhs" id="select-mhs" style="width:300px">
                  <?php
                    foreach ($mhs as $m) {
                      echo "<option>".$m["nrp"]." - ".$m["nama_mhs"]."</option>";
                    }
                  ?>
                </select>
              </div>
              <button type="button" class="btn btn-success" onclick="readRecords()">Pilih</button>
            </form>
          </div>
          <div class="pull-right">
            <label for="tajar" id="tajar">Tahun Ajar Aktif : <?php echo $aktif["nama_tajar"]; ?></label>
            <label hidden for="Kurikulum" id="kurikulum"><?php echo $kur["nama_kurikulum"]; ?></label>
          </div>
          <div id="table-holder">
            <div class="records_frs" style="margin-top:50px; margin-bottom:50px;"></div>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.0/jspdf.plugin.autotable.js"></script>
    <script src="../js/script-frs.js"></script>
  </body>
</html>
