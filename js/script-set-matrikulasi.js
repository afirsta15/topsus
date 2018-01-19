// Add Record
function addRecord() {
    // get values
    var old_matkul = $("#old_matkul").val();
    var new_matkul = $("#new_matkul").val();

    // Add record
    $.post("../controller/matrikulasi_addRecord.php", {
        old_matkul: old_matkul,
        new_matkul: new_matkul
    }, function (data, status) {
        if (data == 0) {
          // close the popup
          //$("#add-form-mhs-modal").modal("hide");
          alert("Mata Kuliah dengan Kode : "+old_matkul+" sudah pernah diganti dengan "+new_matkul+" !");
          readRecords();
        } else {
          // close the popup
          $("#add-form-matrikulasi-modal").modal("hide");
          // read records again
          readRecords();
        }
    });
}
function readRecords() {
    $.get("../controller/matrikulasi_readRecord.php", {}, function (data, status) {
        $(".records_matrikulasi").html(data);
    });
}

function GetMatkulDetails(id) {
  StopInterval();
  $("#id_matkul").val(id);
  $.post("../controller/matkul_getMatkulDetails.php", {
          id_matkul: id
      },
      function (data, status) {
          if(data == 1) {
            alert("Data Sedang di Sunting!");
            StartInterval();
          } else {
            // PARSE json data
            var user = JSON.parse(data);
            console.log(user);
            // Assing existing values to the modal popup fields
            $("#edit_kode_matkul").val(user[0].kode_matkul);
            $("#edit_nama_matkul").val(user[0].nama_matkul);
            $("#edit_jml_sks").val(user[0].jml_sks);
            $("#edit_kurikulum").val(user[0].id_kurikulum);

            // Open modal popup
            $("#edit-form-matkul-modal").modal("show");
          }
      }
  );

}

function UpdateMatkulDetails() {
    // get values
    var kode_matkul = $("#edit_kode_matkul").val();
    var nama_matkul = $("#edit_nama_matkul").val();
    var jml_sks = $("#edit_jml_sks").val();
    var kurikulum = $("#edit_kurikulum").val();

    // get hidden field value
    var id = $("#id_matkul").val();

    // Update the details by requesting to the server using ajax
    $.post("../controller/matkul_updateMatkulDetails.php", {
            id_matkul : id,
            kode_matkul: kode_matkul,
            nama_matkul: nama_matkul,
            jml_sks: jml_sks,
            kurikulum: kurikulum
        },
        function (data, status) {
            // hide modal popup
            $("#edit-form-matkul-modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
            StartInterval();
        }
    );
}

function DeleteMatkul(id) {
    var conf = confirm("Apakah Anda yakin ingin menghapus data mata kuliah ini ?");
    if (conf == true) {
        $.post("../controller/matkul_deleteMatkul.php", {
                id_matkul : id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

// function filterRecord() {
//   // Declare variables
//   var input, filter, table, tr, td, i;
//   input = document.getElementById("recordFilter");
//   filter = input.value.toUpperCase();
//   table = document.getElementById("records_matkul");
//   tr = table.getElementsByTagName("tr");
//
//   // Loop through all table rows, and hide those who don't match the search query
//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[2];
//     if (td) {
//       if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     }
//   }
// }
//
// function ResetIsEdit() {
//     StartInterval();
//     // get values
//     var id = $("#id_matkul").val();
//
//     // Update the details by requesting to the server using ajax
//     $.post("../controller/matkul_resetIsEdit.php", {
//             id_matkul : id
//         },
//         function (data, status) {
//             // hide modal popup
//             $("#edit-form-matkul-modal").modal("hide");
//             // reload Users by using readRecords();
//             readRecords();
//         }
//     );
// }

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

// function checkKODE() {
//   $('#kode_matkul').bind('input propertychange', function() {
//     var kode_matkul = $('#kode_matkul').val();
//     console.log(kode_matkul);
//     $.post("../controller/matkul_isExist.php", {
//             kode_matkul : kode_matkul
//         },
//         function (data, status) {
//             console.log("Data : " + data);
//             if(data == 0) {
//               alert("Mata Kuliah dengan Kode : "+kode_matkul+" sudah ada!");
//               $('#kode_matkul').val('');
//             }
//         }
//     );
//   });
// }
//
// function doubleCheckKODE() {
//   var kode_matkul = $('#kode_matkul').val();
//   console.log(kode_matkul);
//   $.post("../controller/matkul_isExist.php", {
//           kode_matkul : kode_matkul
//       },
//       function (data, status) {
//           console.log("Data : " + data);
//           if(data == 0) {
//             alert("Mata Kuliah dengan Kode : "+kode_matkul+" sudah ada!");
//             $('#kode_matkul').val('');
//           }
//       }
//   );
// }

$(document).ready(function () {
    StartInterval();
    // READ recods on page load
    readRecords(); // calling function
    //checkKODE();

    // $(function(){
    //   $('#datepicker').datetimepicker({
    //     format: 'DD-MM-YYYY',
    //     defaultDate: new Date()
    //   });
    // });
    //
    // $(function(){
    //   $('#edit_datepicker').datetimepicker({
    //     format: 'DD-MM-YYYY'
    //     //defaultDate: new Date()
    //   });
    // });

});
