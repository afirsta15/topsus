<?php
include '../config/DbConnect.php';
$kurikulum = $db->frs_kurikulum->where("is_active", "1")->fetch();
$old_kurikulum = $kurikulum["id_kurikulum"] - 1;
$old = $db->frs_matkul->where("is_active", "1")->where("id_kurikulum", $old_kurikulum);
$new = $db->frs_matkul->where("is_active", "1")->where("id_kurikulum", $kurikulum["id_kurikulum"]);
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
    <title>Tugas Topik Khusus | Kurikulum Aktif</title>
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
            <li><a href="../app/frs_view.php">FRS</a></li>
            <li><a href="../app/transkrip_view.php">Transkrip</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master Data <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../app/index.php">Master Mahasiswa</a></li>
                <li><a href="../app/dosen_view.php">Master Dosen</a></li>
                <li><a href="../app/matkul_view.php">Master Mata Kuliah</a></li>
                <li><a href="../app/tajar_view.php">Master Tahun Ajar</a></li>
                <li><a href="../app/kurikulum_view.php">Master Kurikulum</a></li>
                <li><a href="../app/matrikulasi_view.php">Master Matrikulasi</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="page-header">
        <h1 id="kurikulumTitle">Matrikulasi Mata Kuliah Kurikulum : <?php echo $kurikulum["nama_kurikulum"]; ?></h1>
      </div>

      <div class="col-md-4" style="margin-bottom:20px">
        <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#add-form-matrikulasi-modal">Matrikulasi</button>
      </div>
      <div class="records_matrikulasi"></div>

      <!-- Add Form Matrikulasi Modal -->
      <div class="modal fade" id="add-form-matrikulasi-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Lakukan Matrikulasi</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="kurikulum">Mata Kuliah Lama:</label>
                <select class="form-control" name="old_matkul" id="old_matkul">
                  <?php
                    $rows = count($db->frs_matkul());
                    //echo $rows;
                    if ($rows > 0) {
                      foreach ($old as $old_matkul) {
                        $data = '<option>'.$old_matkul["nama_matkul"].'</option>';
                        echo $data;
                      }
                    } else {
                        echo '<option>Kosong</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="kurikulum">Mata Kuliah Baru:</label>
                <select class="form-control" name="new_matkul" id="new_matkul">
                  <?php
                    $rows = count($db->frs_matkul());
                    //echo $rows;
                    if ($rows > 0) {
                      foreach ($new as $new_matkul) {
                        $data = '<option>'.$new_matkul["nama_matkul"].'</option>';
                        echo $data;
                      }
                    } else {
                        echo '<option>Kosong</option>';
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-success" onclick="addRecord()">Tambah</button>
            </div>
          </div>
        </div>
      </div>

    </div>

    <script src="../js/script-set-matrikulasi.js"></script>
  </body>
</html>
