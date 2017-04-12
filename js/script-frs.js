// Add Record
function addRecord() {
    // get values
    var select_mhs = $("#select-mhs").val();
    var add_matkul = $("#add-matkul").val();

    // Add record
    $.post("../controller/frs_addRecord.php", {
        select_mhs: select_mhs,
        add_matkul: add_matkul
    }, function (data, status) {
        if (data == 0) {
          // close the popup
          //$("#add-form-mhs-modal").modal("hide");
          alert("Mata Kuliah dengan Kode : "+add_matkul+" sudah ada dalam KRS!");
          readRecords();
        } else {
          // read records again
          readRecords();
        }
    });
}
function readRecords() {
  var select_mhs = $("#select-mhs").val();
  $.get("../controller/frs_readRecord.php", {
    select_mhs : select_mhs
  }, function (data, status) {
        $(".records_frs").html(data);
  });
}

function DeleteFrs(id) {
    var conf = confirm("Apakah Anda yakin ingin membatalakan mata kuliah ini ?");
    if (conf == true) {
        $.post("../controller/frs_deleteMatkul.php", {
                id_frs : id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function StartInterval() {
  interval = setInterval(function() {
      readRecords();
      console.log("reload");
      $('#records_matkul')}, 5000);
}

function StopInterval() {
  clearInterval(interval);
  console.log("Interval should be stoped");
}

var interval = null;

//TODO: Run refresh metode (interval) if #recodes_matkul element exist in html document

$(document).ready(function () {
    //StartInterval();
    // READ recods on page load
    //readRecords(); // calling function
    //checkKODE();

});
