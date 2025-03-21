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
                employeeNames.push($(this).val());
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
                    Swal.fire({
                        title: "Sending...",
                        didOpen: () => {
                          Swal.showLoading();
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    });
                    $.ajax({
                        url: SITE_URL + "/hr/employee/send-credentials",
                        type: "POST",
                        dataType: "json",
                        data: {
                            '_token' : $("meta[name=csrf-token]").attr('content'),
                            employees: employeeNames
                        },
                        success: function(response) {
                            Swal.hideLoading();
                            if(response.success){
                                Swal.fire({
                                    icon: "success",
                                    title: "Credentials sent!",
                                    text: response.message,
                                    allowOutsideClick: () => !Swal.isLoading()
                                })
                                .then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                                
                            }
                            else if(response.error){
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: response.message,
                                    allowOutsideClick: () => !Swal.isLoading()
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error:", error);
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong!",
                            });
                        }
                    });
                }
            });
        }
    });

    // Send letter.
    $(".send-letter").click(function(){
        var employeeId = $(this).data('id');
        if (employeeId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Send it!",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Sending...",
                        didOpen: () => {
                          Swal.showLoading();
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    });

                    $.ajax({
                        url : SITE_URL + '/hr/employee/send-appointment-letter',
                        type : 'POST',
                        dataType : 'json',
                        data : {
                            '_token' : $("meta[name=csrf-token]").attr('content'),
                            employee_id : employeeId
                        },
                        success : function(response) {
                            Swal.hideLoading();
                            if(response.success){
                                Swal.fire({
                                    icon: "success",
                                    title: "Appointment Letter sent!",
                                    text: response.message,
                                    allowOutsideClick: () => !Swal.isLoading()
                                })
                               .then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            }
                            else if(response.error){
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: response.message,
                                    allowOutsideClick: () => !Swal.isLoading()
                                });
                            }
                        }
                    });
                }
            });
        }
    });

    // Export csv handling button.
    $("form.export-csv").submit(function(event) {
        $(this).find('button[type=submit]').attr('disabled', 'disabled');
    });

});