/* File script-transkrip.js */

// Read Transkrip
function readRecords() {
  var select_mhs = $("#select-mhs").val();
  console.log(select_mhs);
  $.get("../controller/transkrip_readRecord.php", {
    select_mhs : select_mhs
  }, function (data, status) {
        $(".records_transkrip").html(data);
  });
}

// Cetak FRS
function cetakFrs(id) {
  console.log("masuk");
  var doc = new jsPDF();
  var header = "TRANSKRIP";
  var nama_mhs = $("#nama-mhs").html();
  var jml_sks = $("#jml-sks").html();
  var sks = jml_sks.split(" ");
  doc.text(header, 85, 30);
  doc.setFontSize(8);
  var nm = doc.splitTextToSize(nama_mhs);
  doc.text("Nama Mahasiswa", 83, 40);
  doc.text(":", 108, 40);
  doc.text(nm, 110, 40);
  doc.text("Jumlah SKS", 83, 45);
  doc.text(":", 108, 45);
  doc.text(sks[3] + " SKS", 110, 45);

  var elem = document.getElementById("records_transkrip");
  var clone = elem.cloneNode(true);
  $(clone).attr("id", "clone")
  document.getElementById("table-holder").appendChild(clone);
  //$('#clone tr').find('th:last-child, td:last-child').remove();


  // Print to PDF
  var res = doc.autoTableHtmlToJson(clone);
  doc.autoTable(res.columns, res.data, {
    startX: 10,
    startY: 55,
    tableWidth: 200,
    margin: 5,
    styles: {
      cellPadding: 0.5,
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

$(document).ready(function () {
    //StartInterval();
    // READ recods on page load
    //readRecords(); // calling function
    //checkKODE();

});
