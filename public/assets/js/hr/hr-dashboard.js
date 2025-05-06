// Declare globally in this scope

$(document).ready(function() {

    // Initialize CKEditor 5
    editor1 = ClassicEditor
        .create(document.querySelector('#employeebirthday'))
        .then(newEditor => {

            editor1 = newEditor; // Save instance for later use
        })
        .catch(error => {
            console.error(error);
        });

    // Handle modal and editor content

    $('.modal-happy-birthday').click(function() {
        $('#birthdayMailModal').modal('show');
        var employe_first_email = $(this).data('bs-whatever');
        var emp_name = $(this).data('bs-name');
        $('#emp_mail').val(employe_first_email);

        var message = "Dear " + emp_name + "," + "<br><br>";
        var message1 = "Happy Birthday! May this year bring you everything you've ever wished for"

        if (editor1) {
            editor1.setData("<p>" + message + message1 + "</p>");
        }
    });

    // send mail


    $("form.send-birthday").submit(function(e) {
        e.preventDefault(); // Prevent form submission
        var form = $(this);
        form.find("btn.sendbutton").attr('disabled', 'disabled');
        Swal.fire({
            title: "Sending birthday wishing mail...",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        $.ajax({
            type: "POST",
            url: SITE_URL + "/hr/birthday-wishes-mail",
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Close modal after successful send.
                    $('#birthdayMailModal').modal('hide');
                    Swal.hideLoading();
                    Swal.fire({
                            title: "Congratulations!",
                            text: response.message,
                            icon: "success",
                            allowOutsideClick: () => false
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                } else if (response.error) {
                    Swal.hideLoading();
                    form.find("btn.sendbutton").removeAttr('disabled');
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.message,
                        allowOutsideClick: () => false
                    });
                }

            },
            error: function(xhr, status, error) {
                // Handle error
                // console.error(xhr.responseText);
            }
        });
    });


    // marrige Anniversary send mail code 
    //=========================================================


    // Initialize CKEditor 5
    editor2 = ClassicEditor
        .create(document.querySelector('#employeemarriage'))
        .then(newEditor => {

            editor2 = newEditor; // Save instance for later use
        })
        .catch(error => {
            console.error(error);
        });

    // Handle modal and editor content
    $('.modal-marriage-anniversary').click(function() {
        $('#MarriageMailModal').modal('show');

        var employe_first_email = $(this).data('bs-whatever');
        var emp_name = $(this).data('bs-name');

        $('#emp_mail_marriage').val(employe_first_email);

        var message = "Dear " + emp_name + "," + "<br><br>";
        var message1 = "Happy Marriage Anniversary ! May this year bring you everything you've ever wished for"

        if (editor2) {
            editor2.setData("<p>" + message + message1 + "</p>");
        }
    });

    // send mail marriage Anniversary


    $("form.send-marriage-anniversery").submit(function(e) {
        e.preventDefault(); // Prevent form submission
        var form = $(this);
        form.find("btn.sendbutton").attr('disabled', 'disabled');
        Swal.fire({
            title: "Sending marriage wishing mail...",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        $.ajax({
            type: "POST",
            url: SITE_URL + "/hr/anniversary-wishes-mail",
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Close modal after successful send.
                    $('#MarriageMailModal').modal('hide');
                    Swal.hideLoading();
                    Swal.fire({
                            title: "Congratulations!",
                            text: response.message,
                            icon: "success",
                            allowOutsideClick: () => false
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                } else if (response.error) {
                    Swal.hideLoading();
                    form.find("btn.sendbutton").removeAttr('disabled');
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.message,
                        allowOutsideClick: () => false
                    });
                }

            },
            error: function(xhr, status, error) {
                // Handle error
                // console.error(xhr.responseText);
            }
        });
    });



    // Employee work Anniversary
    //=========================================================================

    // Initialize CKEditor 5
    editor3 = ClassicEditor
        .create(document.querySelector('#employeeworkanniversary'))
        .then(newEditor => {
            editor3 = newEditor; // Save instance for later use
        })
        .catch(error => {
            console.error(error);
        });

    // Handle modal and editor content
    $('.modal-work-anniversary').click(function() {
        $('#WorkAnniversaryMailModal').modal('show');
        var employe_first_email = $(this).data('bs-whatever');
        var emp_name = $(this).data('bs-name');
        $('#emp_mail_work').val(employe_first_email);

        var message = "Dear " + emp_name + "," + "<br><br>";
        var message1 = "Happy Work Anniversary ! May this year bring you everything you've ever wished for"

        if (editor3) {
            editor3.setData("<p>" + message + message1 + "</p>");
        }
    });

    // send mail marriage Anniversary


    $("form.send-work-anniversery").submit(function(e) {
        e.preventDefault(); // Prevent form submission
        var form = $(this);
        form.find("btn.sendbutton").attr('disabled', 'disabled');
        Swal.fire({
            title: "Sending Work Anniversary wishing mail...",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        $.ajax({
            type: "POST",
            url: SITE_URL + "/hr/work-anniversary-wishes-mail",
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Close modal after successful send.
                    $('#WorkAnniversaryMailModal').modal('hide');
                    Swal.hideLoading();
                    Swal.fire({
                            title: "Congratulations!",
                            text: response.message,
                            icon: "success",
                            allowOutsideClick: () => false
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                } else if (response.error) {
                    Swal.hideLoading();
                    form.find("btn.sendbutton").removeAttr('disabled');
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.message,
                        allowOutsideClick: () => false
                    });
                }

            },
            error: function(xhr, status, error) {
                // Handle error
                // console.error(xhr.responseText);
            }
        });
    });



    // show leave details



    // Handle modal and editor content
    $('.modal-leave-details').click(function() {
        var url = $(this).data('url');
        $.ajax({
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            success: function(response) {
                $('#leaveDetailsModal').modal('show');

                var date = new Date(response.data.created_at);
                var month = ((date.getDate() > 8) ? (date.getDate() + 1) : ('0' + (date.getDate() + 1))) + '-' + ((date.getMonth() > 9) ? date.getMonth() : ('0' + date.getMonth())) + '-' + date.getFullYear();
                if (response.success) {
                    $('#leave_code').html(response.data.leave_code)
                    $('#employee_code').html(response.data.emp_code)
                    $('#employee_name').html(response.data.employee.emp_name)
                    $('#cc_email').html(response.data.cc)
                    $('#reason_of_absence').html(response.data.reason_for_absence)
                    $('#leave_start_date').html(response.data.absence_dates)
                    $('#no_of_days').html(response.data.total_days)
                    $('#employee_comment').html(response.data.comment)
                    $('#status').html(response.data.status)
                    $('#apply_date').html(month)

                } else if (response.error) {
                    Swal.hideLoading();
                    form.find("btn.sendbutton").removeAttr('disabled');
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.message,
                        allowOutsideClick: () => false
                    });
                }

            },
            error: function(xhr, status, error) {
                // Handle error
                // console.error(xhr.responseText);
            }
        });

    });



    // leave approve disapprove

    // Initialize CKEditor 5
    editor4 = ClassicEditor
        .create(document.querySelector('#replyLeave'))
        .then(newEditor => {
            editor4 = newEditor; // Save instance for later use
        })
        .catch(error => {
            console.error(error);
        });


    // Handle modal and editor content
    $('.modal-leave-approve').click(function() {

        var id = $(this).data('bs-whatever');
        $('#LeaveApproveDisapproveModal').modal('show');

        $("form.leave-approve").submit(function(e) {
            e.preventDefault(); // Prevent form submission
            var form = $(this);
            form.find("btn.sendbutton").attr('disabled', 'disabled');
            Swal.fire({
                title: "Sending birthday wishing mail...",
                didOpen: () => {
                    Swal.showLoading();
                },
                allowOutsideClick: () => !Swal.isLoading()
            });
            $.ajax({
                type: "POST",
                url: SITE_URL + "/hr/anniversary-wishes-mail",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Close modal after successful send.
                        $('#MarriageMailModal').modal('hide');
                        Swal.hideLoading();
                        Swal.fire({
                                title: "Congratulations!",
                                text: response.message,
                                icon: "success",
                                allowOutsideClick: () => false
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                    } else if (response.error) {
                        Swal.hideLoading();
                        form.find("btn.sendbutton").removeAttr('disabled');
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: response.message,
                            allowOutsideClick: () => false
                        });
                    }

                },
                error: function(xhr, status, error) {
                    // Handle error
                    // console.error(xhr.responseText);
                }
            });
        });
    });
});