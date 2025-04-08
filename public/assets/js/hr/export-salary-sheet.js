$(document).ready(function() {
    // Validate salary generated or not.
    $(".check").click(function() {
        var month = $("#month-salary").val();
        if (!month){
            $(".downloadSheet").addClass('d-none');
            Swal.fire({
                title: "Error!",
                text: "Please select a month!",
                icon: "error",
                confirmButtonText: "OK",
                allowOutsideClick: false
            });
            return false;
        }
        else {
            $(".downloadSheet").removeClass('d-none');
            $("span.selected-month").text(month);
        }
    });

    // Hide the download on change of month.
    $("#month-salary").change(function() {
        var previous = $("span.selected-month").text();
        if (previous != $(this).val()) {
            $(".downloadSheet").addClass('d-none');
        }
    });
});