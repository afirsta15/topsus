
function readRecords() {
    $.get("../controller/mhs/readRecord.php", {}, function (data, status) {
        $(".records").html(data);
    });
}


$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});
