/* File script-set-kurikulum.js */

/*
Add New Kurikulum to frs_kurikulum table
*/
function addRecord() {
    // get values
    var nama_kurikulum = $("#add_nama_kurikulum").val();

    // Add record
    $.post("../controller/kurikulum_addRecord.php", {
        nama_kurikulum : nama_kurikulum
    }, function (data, status) {
        if (data == 0) {
          alert("Kurikulum : "+nama_kurikulum+" sudah ada!");
          readRecords();
        } else {
          // close the popup
          $("#add-form-kurikulum-modal").modal("hide");
          // read records again
          readRecords();

          // clear fields from the popup
          $("#add_nama_kurikulum").val("");
        }
    });
}

/*
Read Kurikulum Record from frs_kurikulum table
*/
function readRecords() {
    $.get("../controller/kurikulum_readRecord.php", {}, function (data, status) {
        $(".select_kurikulum").html(data);
    });
}

/*
Set Default Kurikulum to Whole FRS System
*/
function aktifasiKurikulum() {
    // Update the details by requesting to the server using ajax
    var nama_kurikulum = $('#nama_kurikulum').val();
    console.log(nama_kurikulum);
    $.post("../controller/kurikulum_updateKurikulumDetails.php", {
            nama_kurikulum : nama_kurikulum
        },
        function (data, status) {
            alert("Sukses!");
            // reload Users by using readRecords();
            readRecords();
            location.reload();
        }
    );
}

/*
Automatic Refresh : Refresh only on select_kurikulum class
*/
function StartInterval() {
  interval = setInterval(function() {
      readRecords();
      console.log("reload");
      $('#tajarTitle')}, 5000);
}

function StopInterval() {
  clearInterval(interval);
  console.log("Interval should be stoped");
}

var interval = null;

$(document).ready(function () {
    //StartInterval();
    // READ recods on page load
    readRecords(); // calling function

});
