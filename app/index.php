<?php include '../config/DbConnect.php'; ?>
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
    <title>Tugas Topik Khusus</title>
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <h1>Data Mahasiswa</h1>
      </div>
      <form class="form-inline">
        <div class="form-group">
          <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#add-form-mhs-modal">Tambah</button>
        </div>
        <div class="form-group pull-right">
          <input type="text" class="form-control pull-right" id="recordFilter" onkeyup="filterRecord()" placeholder="Cari Nama . . . " />
        </div>
      </form>

      <div class="records"></div>


    </div>

    <!-- Add Form MHS Modal -->
    <div class="modal fade" id="add-form-mhs-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah Mahasiswa</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="nrp">NRP:</label>
              <input type="text" class="form-control" name="nrp" id="nrp" />
            </div>
            <div class="form-group">
              <label for="nama_mhs">Nama Mahasiswa:</label>
              <input type="text" class="form-control" name="nama_mhs" id="nama_mhs" />
            </div>
            <div class="form-group">
              <label for="tempat_lahir">Tempat Lahir:</label>
              <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" />
            </div>
            <div class="form-group">
              <label for="tgl_lahir">Tanggal Lahir:</label>
              <input type="text" class="form-control" name="tgl_lahir" id="datepicker" />
            </div>
            <div class="form-group">
              <label for="alamat">Alamat:</label>
              <input type="text" class="form-control" name="alamat" id="alamat" />
            </div>
            <div class="form-group">
              <label for="dosen_wali">Dosen Wali:</label>
              <select class="form-control" name="dosen_wali" id="dosen_wali">
                <?php
                  foreach ($db->frs_dosen as $dosen) {
                    echo "<option>".$dosen["nama_dosen"]."</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for=spp>SPP:</label>
              <input type="text" class="form-control" name="spp" id="spp"/>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-success" onclick="addRecord()">Tambah</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Form Mhs Modal -->
    <div class="modal fade" id="edit-form-mhs-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Update Data Mahasiswa</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="nrp">NRP:</label>
              <input type="text" class="form-control" name="nrp" id="edit_nrp" />
            </div>
            <div class="form-group">
              <label for="nama_mhs">Nama Mahasiswa:</label>
              <input type="text" class="form-control" name="nama_mhs" id="edit_nama_mhs" />
            </div>
            <div class="form-group">
              <label for="tempat_lahir">Tempat Lahir:</label>
              <input type="text" class="form-control" name="tempat_lahir" id="edit_tempat_lahir" />
            </div>
            <div class="form-group">
              <label for="tgl_lahir">Tanggal Lahir:</label>
              <input type="text" class="form-control" name="tgl_lahir" id="edit_datepicker" />
            </div>
            <div class="form-group">
              <label for="alamat">Alamat:</label>
              <input type="text" class="form-control" name="alamat" id="edit_alamat" />
            </div>
            <div class="form-group">
              <label for="dosen_wali">Dosen Wali:</label>
              <select class="form-control" name="dosen_wali" id="edit_dosen_wali">
                <?php
                  foreach ($db->frs_dosen as $dosen) {
                    echo "<option>".$dosen["nama_dosen"]."</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for=spp>SPP:</label>
              <input type="text" class="form-control" name="spp" id="edit_spp"/>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-success" onclick="UpdateMhsDetails()">Update</button>
            <input type="hidden" id="user_id" />
          </div>
        </div>
      </div>
    </div>



    <script src="../js/script.js"></script>
  </body>
</html>
