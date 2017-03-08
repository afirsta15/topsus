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
      <script src="../js/script.js"></script>
    <script>
      // $(document).ready(function(){
      //   $("form-mhs").on("submit", function(e) {
      //     var postData = $(this).serializeArray();
      //     var formURL = $(this).attr("action");
      //     $.ajax({
      //       url: formURL,
      //       type: "POST",
      //       data: postData,
      //       success: function(data, textStatus, jqXHR) {
      //         $('#form-mhs-modal .modal-header .modal-title').html("Success");
      //         $('#form-mhs-modal .modal-body').html(data);
      //       },
      //       error: function(jqXHR, status, error) {
      //             console.log(status + ": " + error);
      //       }
      //     });
      //     e.preventDefault();
      //   });
      //   $("#submitForm").on('click', function(){
      //     $("#form-mhs").submit();
      //   });
      // });
      // $(document).ready(function(){
      //
      //   $("#submitForm").click(function(e){
      //     e.preventDefault();
      //     $.ajax({
      //       type: 'POST',
      //       url: 'mhsController.php',
      //       data: $('#form-mhs').serialize(),
      //       success: function(msg){
      //         location.reload();
      //         $('#form-mhs-modal .modal-header .modal-title').html("Success");
      //         $('#form-mhs-modal .modal-body').html(msg);
      //         $('#submitForm').hide();
      //       },
      //       error: function() {
      //         $('#form-mhs-modal').hide();
      //         alert('Error');
      //       }
      //     });
      //   });
      //
      //   $(function(){
      //     $('#datepicker').datetimepicker({
      //       format: 'DD-MM-YYYY',
      //       defaultDate: new Date()
      //     });
      //   });
      // });
    </script>
    <title>Tugas Topik Khusus</title>
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <h1>Data Mahasiswa</h1>
      </div>
      <p>
        <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#form-mhs-modal">Tambah</button>
      </p>
      <div class="records"></div>
      <!-- Form MHS Modal -->
      <div class="modal fade" id="form-mhs-modal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Form Mahasiswa</h4>
            </div>
            <div class="modal-body">
              <form id="form-mhs" action="../controller/mhsController.php" method="POST">
                <label for="nrp">NRP:</label>
                <input type="text" class="form-control" name="nrp" />
                <label for="nama_mhs">Nama Mahasiswa:</label>
                <input type="text" class="form-control" name="nama_mhs" />
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" class="form-control" name="tempat_lahir" />
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="text" class="form-control" name="tgl_lahir" id="datepicker" />
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" name="alamat" />
                <label for="dosen_wali">Dosen Wali:</label>
                <!-- <input type="text" class="form-control" name="dosen_wali" /> -->
                <select class="form-control" name="dosen_wali">
                  <?php
                    foreach ($db->frs_dosen as $dosen) {
                      echo "<option>".$dosen["nama_dosen"]."</option>";
                    }
                  ?>
                </select>
                <label for=spp>SPP:</label>
                <input type="text" class="form-control" name="spp"/>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="button" id="submitForm" class="btn btn-success">Tambah</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
