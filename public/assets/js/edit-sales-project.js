$(document).ready(function () {

    // Add More Attachment
    $(".add-more-attachment").click(function () {
        let newRow = `
            <div class="row g-3 attachment-remove">
                <div class="col-lg-4 col-md-4">
                    <select class="form-select" name="file_type[]">
                        <option value="">Not Specify</option>
                        <option value="Project Requisition Form">Project Requisition Form</option>
                        <option value="Order Number">Order Number</option>
                        <option value="Proposal">Proposal</option>
                        <option value="Calculation">Calculation</option>
                        <option value="As Per Instruction">As Per Instruction</option>
                        <option value="Others">Others</option>
                        <option value="PI(Proforma Invoice)">PI(Proforma Invoice)</option>
                        <option value="Amendment PI(Proforma Invoice)">Amendment PI(Proforma Invoice)</option>
                    </select>
                </div>

                <div class="col-lg-4 col-md-4">
                    <input class="form-control" type="file" name="file_name[]" accept=".pdf">
                    <span class="fileerror text-danger"></span>
                </div>

                <div class="col-lg-4 col-md-4">
                    <button type="button" class="btn btn-sm btn-danger remove-client">Remove</button>
                </div>
            </div>
        `;

        $('.append_add-more-items').append(newRow);
    });

    // Remove Attachment
    $(document).on('click', '.remove-client', function () {
        $(this).closest('.attachment-remove').remove();
    });


    // Validate file sizes.
    $(document).on('change', "input[type=file]", function (event) {
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

    // On select of project category.
    $("select[name=category_id]").change(function (){
        if ($("select[name=category_id] option:selected").text().trim() == "Manpower") {
            $('input[name=no_of_requirement]').removeAttr("disabled");
          } else {
            $('input[name=no_of_requirement]').attr("disabled", "disabled");
          }
    });

    // Form submit.
    $("form.edit-project").submit(function () {
        $(this).find("button[type=submit]").attr('disabled', 'disabled');
        Swal.fire({
            title: "Wait..!",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
    });

    
    // Remove stored attachments.
    $(".remove-button").click(function (){
        var attachmentId = $(this).data('id');
        var element = $(this).closest('div.attachments');
        element.find('input[type=hidden]').val(attachmentId);
        element.addClass('d-none');
    })
    
});
