$(document).ready(function () {

    // Validate file sizes.
    $("input[type=file]").change(function (event) {
        var file = event.target.files[0];
        if (file.size > 1048576) {
            $(this).closest('div').find('.fileerror').text('Invalid file size');
            $(this).val(null);
            Swal.fire({
                icon: "error",
                title: "File too large!",
                text: "Please upload a file less than 1MB.",
                allowOutsideClick: false
            });
        }
        else {
            $(this).closest('div').find('.fileerror').text('');
        }
    });

    // Form validation.

    var saveEmpDetails = false;
    function sendFormData(formData, page, callback = '') {
        $.ajax({
            url: SITE_URL + '/hr/employee/' + page,
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (response) {
                if (response.success) {
                    saveEmpDetails = true;
                    if (callback) callback(saveEmpDetails);
                }
                else if (response.error) {
                    saveEmpDetails = false;
                    if (callback) callback(saveEmpDetails);
                }
            },
            error: function (xhr) {
                console.log("Error in " + key, xhr.responseText);
            }
        });

        return saveEmpDetails;
    }

    function final_submit(element) {
        // First save emp details form, if it save successfully then save other forms.
        sendFormData(new FormData($("form.emp_details")[0]), "add_emp_details", function (result) {
            if (!result) {
                Swal.hideLoading();
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                    allowOutsideClick: () => !Swal.isLoading()
                })
                    .then((result) => {
                        if (result.isConfirmed) {
                            element.find('btn-primary').attr('disabled', 'disabled');
                        }
                    });
                return false;
            }
            else {
                sendFormData(new FormData($("form.personal_details")[0]), "add_personal_details");
                sendFormData(new FormData($("form.address_details")[0]), "add_address_details");
                sendFormData(new FormData($("form.bank_details")[0]), "add_bank_details");
                sendFormData(new FormData($("form.education_details")[0]), "add_education_details");
                sendFormData(new FormData($("form.id_proofs")[0]), "add_id_details");
                sendFormData(new FormData($("form.experience_details")[0]), "add_experience_details");
                Swal.hideLoading();
                Swal.fire({
                    title: "Congratulations!",
                    text: "Form Submit Successfully.!",
                    icon: "success",
                    allowOutsideClick: () => !Swal.isLoading()
                })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = SITE_URL + '/hr/employee/list';
                        }
                    });
            }
        });

    }

    // Next Button.
    function next(element) {
        var currentTab = element.closest('.tab-content');
        var nextTab = currentTab.next('.tab-content');
        if (nextTab.length > 0) {
            var empcode = currentTab.find("input[name=emp_code]").val();
            nextTab.find('input[name=emp_code]').val(empcode);
            currentTab.removeClass('active').hide();
            nextTab.addClass('active').show();
            var currentTabId = currentTab.attr('id').replace('content', 'tab');
            var nextTabId = nextTab.attr('id').replace('content', 'tab');

            // Remove 'active' class from all tabs and add it to the next tab
            $('.tab-btn').removeClass('active');
            $('#' + nextTabId).addClass('active');

            // Show the Previous Button
            $('#' + nextTabId).prev('.tab-content').find('.btn-secondary').show();
        }
        else {
            element.find('btn-primary').attr('disabled', 'disabled');
            Swal.fire({
                title: "wait...",
                didOpen: () => {
                    Swal.showLoading();
                },
                allowOutsideClick: () => !Swal.isLoading()
            });
            final_submit(element);
        }
    }

    $("#same-as").click(function () {
        if ($(this).is(':checked')) {
            $("#local_address").val($("#permanent_address").val());
        }
        else {
            $("#local_address").val("");
        }
    });

    // $("button.btn-primary").click(function () {
    //     next($(this));
    // });

    $("form").submit(function (event) {
        var element = $(this);
        if (!element.hasClass("bulk-upload") && !element.hasClass("add-department") && !element.hasClass("add-designation")) {
            event.preventDefault();
            next(element);
        }
    });

    // Previous Button Logic
    $(".btn-secondary").click(function () {
        var currentTab = $(this).closest('.tab-content'); // Get the current tab content
        var prevTab = currentTab.prev('.tab-content'); // Get the previous tab content

        // Check if there's a previous tab
        if (prevTab.length > 0) {

            currentTab.removeClass('active').hide();


            prevTab.addClass('active').show();


            var currentTabId = currentTab.attr('id').replace('content', 'tab');
            var prevTabId = prevTab.attr('id').replace('content', 'tab');


            $('.tab-btn').removeClass('active');
            $('#' + prevTabId).addClass('active');


            $('#' + prevTabId).next('.tab-content').find('.btn-secondary').show();
        }
    });


    $("#single-entry").click(function () {
        $("#tab-1").show();
        $("#tab-2").hide();

    })

    $("#html1").click(function () {
        $("#tab-2").show();
        $("#tab-1").hide();

    });

    // Add multi select
    $('.modal-select').select2({
        dropdownParent: $('#departmentModal')
    });

    function get_departments() {
        $.ajax({
            url: SITE_URL + '/hr/departments/get-departments',
            type: 'post',
            dataType: 'json',
            data: {
                '_token': $("meta[name=csrf-token]").attr('content'),
            },
            success: function (response) {
                if (response.success) {
                    var html = '';
                    $.each(response.departments, function (index, value) {
                        html += '<option value="' + value.department + '">' + value.department + '</option>';
                    });
                    $('select[name=department]').html(html);
                } else {
                    console.log('Failed to get departments');
                }
            }
        });
    }

    function get_designations() {
        $.ajax({
            url: SITE_URL + '/hr/designations/get-designations',
            type: 'post',
            dataType: 'json',
            data: {
                '_token': $("meta[name=csrf-token]").attr('content'),
            },
            success: function (response) {
                if (response.success) {
                    var html = '<option value="">Select Designation</option>';
                    $.each(response.designations, function (index, value) {
                        html += '<option value="' + value.name + '">' + value.name + '</option>';
                    });
                    $('select[name=emp_designation]').html(html);
                } else {
                    console.log('Failed to get departments');
                }
            }
        });
    }

    // Add department.
    $("form.add-department").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: SITE_URL + '/hr/departments/create-new',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: "Success",
                        text: response.message,
                        icon: "success",
                        allowOutsideClick: () => !Swal.isLoading()
                    });
                    $("#departmentModal").modal('hide');
                    get_departments();
                    $("form.add-department")[0].reset();
                } else if (response.error) {
                    Swal.fire({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                        allowOutsideClick: () => !Swal.isLoading()
                    });
                }
            }
        });
    });

    // Get Reporting managers on change of department.
    $("select[name=department]").change(function () {
        $.ajax({
            url: SITE_URL + '/hr/employee/get-reporting-managers',
            type: 'post',
            dataType: 'json',
            data: {
                '_token': $("meta[name=csrf-token]").attr('content'),
                'department': $(this).val()
            },
            success: function (response) {
                if (response.success) {
                    var html = '<option value="" selected>Not Specify</option>';
                    html += '<option value="' + response.reporting_manager + '">' + response.reporting_manager + '</option>';
                    $('select[name=reporting_email]').html(html);
                } else {
                    var html = '<option value="" selected>Not Specify</option>';
                    $('select[name=reporting_email]').html(html);
                }
            }
        });
    });

    // Add Department.
    $("form.add-designation").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: SITE_URL + '/hr/designations/create-new',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: "Success",
                        text: response.message,
                        icon: "success",
                        allowOutsideClick: () => !Swal.isLoading()
                    });
                    $("#designationModal").modal('hide');
                    get_designations();
                    $("form.add-designation")[0].reset();
                } else if (response.error) {
                    Swal.fire({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                        allowOutsideClick: () => !Swal.isLoading()
                    });
                }
            }
        });
    });

    // Show preview Table.
    $("button.show_preview").click(function () {
        var csvfile = $("input[name=csv]");
        Swal.fire({
            title: "Loading...",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });

        if (csvfile) {
            var token = $("meta[name=csrf-token]").attr('content');
            var fd = new FormData();
            fd.append('csv', csvfile[0].files[0]);
            fd.append('_token', token);
            $.ajax({
                url: SITE_URL + '/hr/employee/preview-csv',
                type: 'post',
                data: fd,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (response) {
                    swal.close();
                    if (response.success) {
                        var html = '';
                        var validfile = true;
                        var errorTitle = "Invalid File Content";
                        var errorText = "Please fix errors and try again";
                        if (response.data.length > 0) {
                            $.each(response.data, function (index, value) {
                                if (value.status_color == 'danger') {
                                    validfile = false;
                                }
                                html += '<tr class="table-' + value.status_color + '">';
                                html += '<td>' + value.emp_work_order + '</td>';
                                html += '<td>' + value.emp_code + '</td>';
                                html += '<td>' + value.emp_name + '</td>';
                                html += '<td>' + value.emp_gender + '</td>';
                                html += '<td>' + value.emp_category + '</td>';
                                html += '<td>' + value.emp_dob + '</td>';
                                html += '<td>' + value.emp_doj + '</td>';
                                html += '<td>' + value.emp_phone_first + '</td>';
                                html += '<td class="text-start">' + value.emp_email_first + '</td>';
                                html += '<td class="text-start">' + value.reporting_email + '</td>';
                                html += '<td>' + value.status + '</td>';
                                html += '</tr>';
                            });
                        }
                        else {
                            validfile = false;
                            errorTitle = "Invalid File Content";
                            errorText = "No Record Found";
                            html += '<tr><td colspan="11" class="text-center text-danger">No Record Found</td></tr>';
                        }
                        if (!validfile) {
                            Swal.fire({
                                icon: "error",
                                title: errorTitle,
                                text: errorText,
                                allowOutsideClick: () => false
                            });
                        }
                        else {
                            $("button.csv-submit").removeClass("d-none");
                        }
                        $("div.preview-table tbody").html(html);
                        $("div.preview-table").removeClass('d-none');
                    } else if (response.error) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: response.message,
                            allowOutsideClick: () => false
                        });
                    }
                }
            });
        }
        else {
            // If file not upload then show error.
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "File not found!",
                allowOutsideClick: () => false
            });
        }
    });

    // Reset preview table.
    function reset_preview() {
        $("div.preview-table").addClass('d-none');
        $("button.csv-submit").addClass("d-none");
    }
    // Reset CSV data.
    $("form.bulk-upload").bind('reset', function () {
        reset_preview();
    });

    // Disable submit on change of file upload.
    $("input[name=csv]").change(function () {
        reset_preview();
    });

    // Show preview of images.
    $(".photo").change(function (e) {
        var file = e.target.files[0];
        if (file && file.size < 1048576) {
            imgURL = URL.createObjectURL(file);
            $(this).closest(".photodiv").find('.preview_photo').removeClass('d-none').attr("src", imgURL);
        }
        else {
            $(this).closest(".photodiv").find('.preview_photo').addClass('d-none').removeAttr("src");
        }

    });

    function showQualification(qualification) {
        var count = 0;
        if (qualification == '10th') {
            count = 1;
        }
        else if (qualification == '12th') {
            count = 2;
        }
        else if (qualification == 'Diploma') {
            count = 3;
        }
        else if (qualification == 'Bachelor') {
            count = 4;
        }
        else if (qualification == 'Master') {
            count = 5;
        }
        else if (qualification == 'PhD') {
            count = 6;
        }

        $(".education-card").each(function (index) {
            if (qualification && index < count) {
                $(this).removeClass('d-none');
            }
            else {
                $(this).addClass('d-none');
            }
        });
    }
    // Show qualification on basis of highest qualification
    $("select[name=emp_highest_qualification]").change(function () {
        var qualification = $(this).val();
        showQualification(qualification);
    });

    // Show qualification on load.
    showQualification($("select[name=emp_highest_qualification]").val());

    var empCodeRequest;
    // Check availability of employee code.
    
    $("input[name=emp_code]").keyup(function () {
        var element = $(this);
        var code = element.val();

        // Abort previous request if still running
        if (empCodeRequest) {
            empCodeRequest.abort();
        }

        if (code) {
            empCodeRequest = $.ajax({
                url: SITE_URL + '/hr/employee/validate-emp-code',
                type: 'post',
                dataType: 'json',
                data: {
                    'code': code,
                    '_token': $("meta[name=csrf-token]").attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        if (response.available) {
                            element.closest('div').find('span.code_status').removeClass('text-success').addClass('text-danger').text('Already Exists');
                        }
                        else {
                            element.closest('div').find('span.code_status').removeClass('text-danger').addClass('text-success').text('');
                        }
                    }
                    else if (response.error) {
                        element.closest('div').find('span.code_status').addClass('text-danger').text(response.message);
                    }
                }
            });
        }
        else {
            element.closest('div').removeClass('text-success text-danger').find('span.code_status').text('');
        }
    });

    // Check availability of email.
    $("input[name=emp_email_first]").keyup(function () {
        var element = $(this);
        var email = element.val();

        // Abort previous request if still running
        if (empCodeRequest) {
            empCodeRequest.abort();
        }

        if (email) {
            empCodeRequest = $.ajax({
                url: SITE_URL + '/hr/employee/validate-emp-email',
                type: 'post',
                dataType: 'json',
                data: {
                    'email': email,
                    '_token': $("meta[name=csrf-token]").attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        if (response.available) {
                            element.closest('div').find('span.emp_email').removeClass('text-success').addClass('text-danger').text('Already Exists');
                        }
                        else {
                            element.closest('div').find('span.emp_email').removeClass('text-danger').addClass('text-success').text('');
                        }
                    }
                    else if (response.error) {
                        element.closest('div').find('span.emp_email').addClass('text-danger').text(response.message);
                    }
                }
            });
        }
        else {
            element.closest('div').removeClass('text-success text-danger').find('span.emp_email').text('');
        }
    });
});