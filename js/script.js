// Add Record
function addRecord() {
    // get values
    var nrp = $("#nrp").val();
    var nama_mhs = $("#nama_mhs").val();
    var tempat_lahir = $("#tempat_lahir").val();
    var datepicker = $("#datepicker").val();
    var alamat = $("#alamat").val();
    var dosen_wali = $("#dosen_wali").val();
    var spp = $("#spp").val();

    // Add record
    $.post("../controller/mhs_addRecord.php", {
        nrp: nrp,
        nama_mhs: nama_mhs,
        tempat_lahir: tempat_lahir,
        datepicker: datepicker,
        alamat: alamat,
        dosen_wali: dosen_wali,
        spp: spp
    }, function (data, status) {
        // close the popup
        $("#add-form-mhs-modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#nrp").val("");
        $("#nama_mhs").val("");
        $("#tempat_lahir").val("");
        $("#datepicker").val(new Date());
        $("#alamat").val("");
        $("#dosen_wali").val("");
        $("#spp").val("");
    });
}
function readRecords() {
    $.get("../controller/mhs_readRecord.php", {}, function (data, status) {
        $(".records").html(data);
    });
}

function GetMhsDetails(id) {
  $("#user_id").val(id);
  $.post("../controller/mhs_getMhsDetails.php", {
          user_id: id
      },
      function (data, status) {
          // PARSE json data
          var user = JSON.parse(data);
          // Assing existing values to the modal popup fields
          $("#edit_nrp").val(user[0].nrp);
          $("#edit_nama_mhs").val(user[0].nama_mhs);
          $("#edit_tempat_lahir").val(user[0].tempat_lahir);
          $("#edit_datepicker").val(moment(user[0].tgl_lahir, 'YYYY-MM-DD').format('DD-MM-YYYY'));
          $("#edit_alamat").val(user[0].alamat);
          $("#edit_dosen_wali").val(user[0].dosen_wali);
          $("#edit_spp").val(user[0].spp);
      }
  );
  // Open modal popup
  $("#edit-form-mhs-modal").modal("show");
}


$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function

    $(function(){
      $('#datepicker').datetimepicker({
        format: 'DD-MM-YYYY',
        defaultDate: new Date()
      });
    });

    $(function(){
      $('#edit_datepicker').datetimepicker({
        format: 'DD-MM-YYYY'
        //defaultDate: new Date()
      });
    });


});
