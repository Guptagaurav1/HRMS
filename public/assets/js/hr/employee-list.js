$(document).ready(function() {

    // Mark all checkboxes as checked.
    $("#markAllEmployee").click(function() {
        if ($(this).is(':checked')) {
            $("input[type=checkbox]").prop('checked', true);
            $("#send-credential").removeAttr('disabled');
        }
        else {
            $("#send-credential").attr('disabled', 'disabled');
            $("input[type=checkbox]").prop('checked', false);
        }
    });

    // Enable/disable the send credential button based on the selection of employees.
    $(".emp_check").click(function() {
        var atLeastOne = false;
        $(".emp_check").each(function() {
            if ($(this).is(':checked')) {
                atLeastOne = true;
                return false;
            }
        });

        if (atLeastOne) {
            $("#send-credential").removeAttr('disabled');
        }
        else {
            $("#send-credential").attr('disabled', 'disabled');
        }
    });

    // Display a confirmation message when the send credential button is clicked.
    $("#send-credential").click(function() {
        var employeeNames = [];
        var atLeastOne = false;
        $(".emp_check").each(function() {
            if ($(this).is(':checked')) {
                atLeastOne = true;
                employeeNames.push($(this).data('name'));
            }
        });
        
        if (!atLeastOne) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Kindly select at least one employee",
            });
        }
        else {
            Swal.fire({
                title: "Are you sure?",
                text: "You want to send credentials",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, send credentials!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire(
                    //     "Credentials sent!",
                    //     "Credentials have been sent to ",
                    //     "success"
                    // );
                }
            });
        }
    });
});