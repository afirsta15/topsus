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
        } else if (data == 1) {
          alert("Anda mengulang mata kuliah dengan kode : "+add_matkul);
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

function cetakFrs(id) {
  var doc = new jsPDF();
  var header = "Formulir Rencana Studi";
  var nama_mhs = $("#nama-mhs").html();
  var jml_sks = $("#jml-sks").html();
  var tajar = $("#tajar").html();
  var sks = jml_sks.split(" ");
  var tj = tajar.split(" ");
  doc.text(header, 75, 30);
  doc.setFontSize(8);
  var nm = doc.splitTextToSize(nama_mhs);
  doc.text("Nama Mahasiswa", 83, 40);
  doc.text(":", 108, 40);
  doc.text(nm, 110, 40);
  doc.text("Jumlah SKS", 83, 45);
  doc.text(":", 108, 45);
  doc.text(sks[3] + " SKS", 110, 45);
  doc.text("Tahun Ajar", 83, 50);
  doc.text(":", 108, 50);
  doc.text(tj[4], 110, 50);
  //doc.text(jml_sks, 155, 40);
  var elem = document.getElementById("records_matkul");
  var clone = elem.cloneNode(true);
  $(clone).attr("id", "clone")
  document.getElementById("table-holder").appendChild(clone);
  $('#clone tr').find('th:last-child, td:last-child').remove();


  // Print to PDF
  var res = doc.autoTableHtmlToJson(clone);
  doc.autoTable(res.columns, res.data, {
    startY: 55,
    tableWidth: 100,
    margin: 55,
    styles: {
      cellPadding: 1.0,
      fontSize: 10,
      halign: 'center',
      valign: 'middle',
      columnWidth: 'auto'
    }
  });
  doc.save('table.pdf');
  clone.remove();
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
