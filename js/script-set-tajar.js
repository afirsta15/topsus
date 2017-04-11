// Add Record
function addRecord() {
    // get values
    var periode_tajar = $("#periode_tajar").val();
    var tahun_tajar = $("#tahun_tajar").val();

    var p = ""; //Hold prefix GS for Gasal or GN for Genap

    if (periode_tajar == "Gasal") {
      periode = "GS";
    } else {
      periode = "GN";
    }

    var nama_tajar = periode + tahun_tajar;

    // Add record
    $.post("../controller/tajar_addRecord.php", {
        nama_tajar : nama_tajar
    }, function (data, status) {
        if (data == 0) {
          alert("Tajar : "+nama_tajar+" sudah ada!");
          readRecords();
        } else {
          // close the popup
          $("#add-form-tajar-modal").modal("hide");
          // read records again
          readRecords();

          // clear fields from the popup
          $("#tahun_tajar").val("");
        }
    });
}
function readRecords() {
    $.get("../controller/tajar_readRecord.php", {}, function (data, status) {
        $(".select_tajar").html(data);
    });
}

function aktifasiTajar() {
    // Update the details by requesting to the server using ajax
    var nama_tajar = $('#nama_tajar').val();
    console.log(nama_tajar);
    $.post("../controller/tajar_updateTajarDetails.php", {
            nama_tajar : nama_tajar
        },
        function (data, status) {
            alert("Sukses!");
            // reload Users by using readRecords();
            readRecords();
            location.reload();
            //$('#tajarTitle').load("tajar_view.php");
        }
    );
}

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
