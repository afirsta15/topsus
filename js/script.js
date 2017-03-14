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
        if (data == 0) {
          // close the popup
          //$("#add-form-mhs-modal").modal("hide");
          alert("Mahasiswa dengan NRP : "+nrp+" sudah ada!");
          readRecords();
        } else {
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
        }
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
          id_mhs: id
      },
      function (data, status) {
          if(data == 1) {
            alert("Data Sedang di Sunting!");
          } else {
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

            // Open modal popup
            $("#edit-form-mhs-modal").modal("show"); 
          }
      }
  );
}

function UpdateMhsDetails() {
    // get values
    var nrp = $("#edit_nrp").val();
    var nama_mhs = $("#edit_nama_mhs").val();
    var tempat_lahir = $("#edit_tempat_lahir").val();
    var datepicker = $("#edit_datepicker").val();
    var alamat = $("#edit_alamat").val();
    var dosen_wali = $("#edit_dosen_wali").val();
    var spp = $("#edit_spp").val();

    // get hidden field value
    var id_mhs = $("#user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("../controller/mhs_updateMhsDetails.php", {
            id_mhs: id_mhs,
            nrp: nrp,
            nama_mhs: nama_mhs,
            tempat_lahir: tempat_lahir,
            datepicker: datepicker,
            alamat: alamat,
            dosen_wali: dosen_wali,
            spp: spp
        },
        function (data, status) {
            // hide modal popup
            $("#edit-form-mhs-modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

function DeleteMhs(id) {
    var conf = confirm("Apakah Anda yakin ingin menghapus data mahasiswa ini ?");
    if (conf == true) {
        $.post("../controller/mhs_deleteMhs.php", {
                id_mhs: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function filterRecord() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("recordFilter");
  filter = input.value.toUpperCase();
  table = document.getElementById("records");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
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
