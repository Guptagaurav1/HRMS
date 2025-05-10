$(document).ready(function() {

    // Add More Attachment
    $(".add-more-client").click(function() {
        let newRow = `
            <div class="row g-3 attachment-remove">
                <div class="col-lg-4 col-md-4">
                    <input type="text" id="attach_typ" name="attach_typ[]" class="form-control" placeholder="Enter Attachment Type" >
                </div>
                

                <div class="col-lg-4 col-md-4">
                    <input class="form-control" type="file" name="attach_file[]" accept=".pdf">
                    <span class="fileerror text-danger"></span>
                </div>

                <div class="col-lg-4 col-md-4">
                    <button type="button" class="btn btn-sm btn-danger remove-lead-att">Remove</button>
                </div>
            </div>
        `;

        $('.append_add-more-items').append(newRow);
    });

    // Remove Attachment
    $(document).on('click', '.remove-lead-att', function() {
        $(this).closest('.attachment-remove').remove();
    });


    // SPOC ROW Add more button
    $(".add-more-spoc").click(function() {
        let SPOCRow = `
             <div class="row g-3 fadeup-spoc">
                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Name</label>
                                <input type="text" class="form-control form-control-sm " name="name[]"
                                    placeholder="Enter Name">

                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Email</label>
                                <input type="text" class="form-control form-control-sm " name="email[]"
                                    placeholder="Enter Email">
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Contact</label>
                                <input type="text" class="form-control form-control-sm " name="contact[]"
                                    placeholder="Enter Contact">
                            </div>

                            <div class="col-lg-6 col-md-6 mt-3">
                                <label class="form-label" class="text-dark">Remarks</label>
                                <textarea class="form-control" id="exampleTextarea"
                                    placeholder="Enter Remarks" name="sp_remarks[]"></textarea>
                            </div>
                            <div class="col-lg-2 col-md-2 mt-3">
                                <label class="form-label" class="text-dark">Set As Default</label>
                                 <input class="form-check-input" type="checkbox" id="inlineFormCheck" name="set_as_def[]" />
                            </div>
                            <div class="col-lg-4 col-md-4 mt-3">
                                <label class="form-label" class="text-dark">Action</label>

                                <button type="button" class="btn btn-sm btn-danger remove-spoc" id="">Remove SPOC</button>
                            </div>
        `;

        $('.append_add-more-spoc').append(SPOCRow);
    });

    // Remove Attachment
    $(document).on('click', '.remove-spoc', function() {
        $(this).closest('.fadeup-spoc').remove();
    });

    // Get Cities.
    $("select[name=company_state]").change(function() {
        $.ajax({
            url: SITE_URL + '/hr/recruitment/cities',
            type: 'post',
            dataType: 'json',
            data: {
                '_token': $("meta[name=csrf-token]").attr('content'),
                'stateid': $(this).val()
            },
            success: function(response) {
                if (response.success) {
                    var html = '<option value="" selected>Select City</option>';
                    $.each(response.cities, function(index, value) {
                        html += '<option value="' + value.id + '">' + value.city_name + '</option>';
                    });
                    $('select[name=company_city]').html(html);
                } else {
                    var html = '<option value="" selected>Select City</option>';
                    $('select[name=company_city]').html(html);
                }
            }
        });
    });

    // Validate file sizes.
    $(document).on('change', "input[type=file]", function(event) {
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
        } else {
            $(this).closest('div').find('.fileerror').text('');
        }
    });

    // Form submit.
    $("form.add-client").submit(function() {
        $(this).find("button[type=submit]").attr('disabled', 'disabled');
        Swal.fire({
            title: "Wait..!",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
    });

    var clients = [];
    var departments = [];

    $(window).on('load', function() {

        // Get Clients and departments
        $.ajax({
            url: SITE_URL + '/sales/clients/get-clients',
            type: 'post',
            dataType: 'json',
            data: {
                '_token': $("meta[name=csrf-token]").attr('content')
            },
            success: function(response) {
                if (response.success) {
                    clients = response.clients;
                    departments = response.departments;
                }
            }
        });

    });
    // Auto suggestion for Client Name


    $('.search').on('input', function() {
        const inputVal = $(this).val().toLowerCase();
        const filtered = clients.filter(item => item.toLowerCase().includes(inputVal));
        if (inputVal && filtered.length) {
            $('.suggestions').empty().show();
            filtered.forEach(item => {
                $('.suggestions').append(`<div class="suggestion-item" id="suggestion-item-design">${item}</div>`);
            });
        } else {
            $('.suggestions').hide();
        }
    });

    $(document).on('click', '.suggestion-item', function() {
        $('.search').val($(this).text());
        $('.suggestions').hide();
    });

    $(document).click(function(e) {
        if (!$(e.target).closest('.search, .suggestions').length) {
            $('.suggestions').hide();
        }
    });

    // Department Name
    $('.department-search').on('input', function() {
        const departmentval = $(this).val().toLowerCase();
        const departmentFiltered = departments.filter(item => item.toLowerCase().includes(departmentval))

        if (departmentval && departmentFiltered.length) {
            $('.department-suggestions').empty().show();
            departmentFiltered.forEach(item => {
                $('.department-suggestions').append(`<div class="department-suggestion-item" id="suggestion-item-design">${item}</div>`);
            });

        } else {
            $('.department-suggestions').hide();
        }


    })

    $(document).on('click', '.department-suggestion-item', function() {
        $('.department-search').val($(this).text());
        $('.department-suggestions').hide();
    });

    $(document).click(function(e) {
        if (!$(e.target).closest('.department-search, .department-suggestions').length) {
            $('.department-suggestions').hide();
        }
    });


    // Remove attachment.
    $(".remove-button").click(function() {
        var attachmentId = $(this).data('id');
        var element = $(this).closest('div.attachments');
        element.find('input[type=hidden]').val(attachmentId);
        element.addClass('d-none');
    })

});