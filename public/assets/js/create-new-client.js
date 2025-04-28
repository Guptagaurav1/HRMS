$(document).ready(function () {

    // Add More Attachment
    $(".add-more-client").click(function(){
        let newRow = `
            <div class="row g-3 attachment-remove">
                <div class="col-lg-4 col-md-4">
                    <label class="form-label text-dark">Attachment Type</label>
                    <select class="form-select">
                        <option value="">Not Specify</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Others</option>
                    </select>
                </div>

                <div class="col-lg-4 col-md-4">
                    <label for="formFile" class="form-label text-dark">Attachment File</label>
                    <input class="form-control" type="file">
                </div>

                <div class="col-lg-4 col-md-4">
                    <label class="form-label text-dark">Action</label>
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


    // SPOC ROW Add more button



    $("#add-more-spoc").click(function(){
        let SPOCRow = `
             <div class="row g-3 fadeup-spoc">
                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Name</label>
                                <input type="text" class="form-control form-control-sm " name="Name"
                                    placeholder="Enter Name">

                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Email</label>
                                <input type="text" class="form-control form-control-sm " name="email"
                                    placeholder="Enter Email">
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Contact</label>
                                <input type="text" class="form-control form-control-sm " name="Contact"
                                    placeholder="Enter Contact">
                            </div>

                            <div class="col-lg-6 col-md-6 mt-3">
                                <label class="form-label" class="text-dark">Remarks</label>
                                <textarea class="form-control" id="exampleTextarea"
                                    placeholder="Enter Remarks"></textarea>
                            </div>
                            <div class="col-lg-2 col-md-2 mt-3">
                                <label class="form-label" class="text-dark">Set As Default</label>
                                <input class="form-check-input" type="checkbox" id="inlineFormCheck" />
                            </div>
                            <div class="col-lg-4 col-md-4 mt-3">
                                <label class="form-label" class="text-dark">Action</label>

                                <button type="button" class="btn btn-sm btn-danger remove-spoc" id="">Remove SPOC</button>
                            </div>
        `;

        $('.append_add-more-spoc').append(SPOCRow );
    });

    // Remove Attachment
    $(document).on('click', '.remove-spoc', function () {
        $(this).closest('.fadeup-spoc').remove();
    });


});
