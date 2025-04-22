$(document).ready(function () {
    
    function saveDetails(page, btnclass, data) {
        $("." + btnclass).attr('disabled', 'disabled');
        Swal.fire({
            title: "Wait..!",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        $.ajax({
            url: '/guest/' + page,
            type: 'POST',
            dataType: "json",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
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
                }
                else if (response.error) {
                    Swal.hideLoading();
                    $("." + btnclass).removeAttr('disabled');
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
    // On Submit Personal Detail Form.
    $("form.personal_detail").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        saveDetails('store-personal-details', 'user_submit', formData);
    });

    // On Submit Address Detail Form.
    $("form.address_detail").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        saveDetails('store-address-details', 'user_submit', formData);
    });

    $("#sameas").click(function () {
        if ($(this).is(":checked")) {
            $("#correspondence").val($("#permanent").val());
        }
        else {
            $("#correspondence").val("");
        }
    });

    // On Submit Bank Detail Form.
    $("form.bank_detail").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        saveDetails('store-bank-details', 'user_submit', formData);
    });

    // On Submit Education Detail Form.
    $("form.education_detail").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        saveDetails('store-education-details', 'user_submit', formData);
    });

    // On Submit Company Detail Form.
    $("form.company_detail").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        saveDetails('store-company-details', 'user_submit', formData);
    });

    // On Submit ESI Details.
    $("form.esi_detail").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        if (formData.get('has_esi') && formData.get('previous_esi_no') === '') {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "ESI number is required!",
                allowOutsideClick: () => false
            });
            return '';
        }
        else {
            saveDetails('store-esi-details', 'user_submit', formData);
        }
    });

    // On Submit nominee Form.
    $("form.nominee_form").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        saveDetails('store-nominee-details', 'user_submit', formData);
    });

    // Show category file on change of category.
    $("select.category").change(function (e) {
        var category = $(this).val();
        if (category == 'general') {
            $("input[name=category_doc]").addClass('d-none');
        }
        else {
            $("input[name=category_doc]").removeClass('d-none');
        }
    });
    // $("#save_next").click(function () {

    //     $(".address_details").hide();

    //     $(".bank_details").show();

    // });

    // $("#bank_details_save_btn").click(function(){
    //     $(".bank_details").hide();
    //     $(".education_details").show();

    // })

    $('#tweleth_checkbox').click(function () {
        if ($(this).is(':checked')) {
            $("#twelthe_showing").show();
        } else {
            $("#twelthe_showing").hide();

        }
    });



    $('#graduation_ceckbox').click(function () {
        if ($(this).is(':checked')) {
            $("#graduation_showing").show();
        } else {
            $("#graduation_showing").hide();

        }
    });

    $('#postgraduation_checkbox').click(function () {
        if ($(this).is(':checked')) {
            $("#postgraduation_showing").show();
        } else {
            $("#postgraduation_showing").hide();

        }
    });




    // $("#save_next_education").click(function(){
    //     $(".education_details").hide();
    //     $(".company_details").show();

    // })



    // $("#company_details_save_btn").click(function(){
    //     $(".company_details").hide();
    //     $(".ESI_details").show();
    // })


    $("#ESI_ceckbox").click(function () {
        if ($(this).is(':checked')) {
            $(".ESI_Input-field").show();
        } else {
            $(".ESI_Input-field").hide();
        }
    })


    // $("#ESI_save_btn").click(function(){
    //     $(".ESI_details").hide();
    //     $(".relation_nominee").show();


    // })


    // Add More items

    $("#add-more-btn-recr").click(function () {
        let newFamilyMember = `
            <div class="row px-3 family-member-section border-top p-3 mt-3">
                <div class="col-md-6">
                    <label class="form-label">Family Member Name <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="family_member_name[]" class="form-control bg-white for_char" placeholder="Enter Name" required>
                    <span class="family_member_name"></span>
                </div>
                <div class="col-md-6 nearClass" >
                    <label class="form-label">Relationship with Member <span class="text-danger fw-bold">*</span></label>
                    <select name="relation_with_mem[]" class="form-control bg-white" required>
                        <option value="" selected="" disabled="">Select</option>
                        <option value="father">Father</option>
                        <option value="mother">Mother</option>
                        <option value="brother">Brother</option>
                        <option value="sister">Sister</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Aadhar Card Number <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="aadhar_card_no[]" class="form-control bg-white" maxlength="12"  placeholder="Enter Aadhar Number" required>
                    <span class=""></span>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Date of Birth <span class="text-danger fw-bold">*</span></label>
                    <input type="date" name="dob[]" class="form-control bg-white" required>
                    <span class=""></span>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Upload Aadhar Document <span class="text-danger fw-bold">*</span></label>
                    <input type="file"  class="form-control bg-white" name="aadhar_card_doc[]" accept=".pdf" required>
                    <span class=""></span>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Stay with Member? <span class="text-danger fw-bold">*</span></label>
                    <select name="stay_with_mem[]" class="form-control bg-white" required>
                        <option value="" selected="" disabled="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-12 text-end">
                    <button type="button" class="btn btn-danger mt-3 remove-family-member">Remove <i class="fa-solid fa-user-minus"></i></button>
                </div>
            </div>
        `;
        
        $("#family-member-container").append(newFamilyMember); 
      
    });
    


    $(document).on("click", ".remove-family-member", function () {
        $(this).closest(".family-member-section").remove();
    });

    // let itemCount = 1;
    // $('#add_more-items').click(function () {
    //     itemCount++;
    //     $('#table_body-row:last').after
    //         (`
    //      <tr>
    //                 <td class="srno-column">${itemCount}</td>
    //                 <td class="rid-column"> <input type="text" name="family_member_name[]" class="form-control" required>
    //                 </td>
    //                 <td> <select name="relation_with_mem[]" class="form-control" required>
    //                     <option value="" selected="" disabled="">Select</option>
    //                     <option value="father">Father</option>
    //                     <option value="mother">Mother</option>
    //                     <option value="brother">Brother</option>
    //                     <option value="sister">Sister</option>
    //                 </select></td>
    //                 <td class="attributes-column"><input type="text" name="aadhar_card_no[]" class="form-control" maxlength="12" required></td>
    //                 <td><input type="date" name="dob[]" class="form-control" required></td>
    //                 <td>
    //                     <input type="file"  class="form-control" name="aadhar_card_doc[]" accept=".pdf" required>
    //                 </td>
    //                 <td> <select name="stay_with_mem[]" class="form-control" required>
    //                     <option value="" selected="" disabled="">Select</option>
    //                     <option value="yes">Yes</option>
    //                     <option value="no">No</option>
    //                 </select></td>
    //                 <td>
    //                     <button type="button" class="btn btn-primary remove-btn" >Remove <i class="fa-solid fa-trash"></i></i></button>
    //                     <button type="button" class="btn btn-primary">Reset <i class="fa-solid fa-rotate"></i></button>
    //                 </td>
    //             </tr>`
    //         );
    // });



    // $(document).on('click', '.remove-btn', function () {
    //     $(this).closest('tr').remove();
    // });

    // Show preview image.
    $(".photo").change(function (e) {
        imgURL = URL.createObjectURL(e.target.files[0]);
        $(this).closest(".col-md-6").find('.preview_photo').removeClass('d-none').attr("src", imgURL);
    });

     // Get Cities.
     $("select[name=state]").change(function (){
        $.ajax({
            url : '/guest/cities',
            type : 'post',
            dataType : 'json',
            data : {
                '_token' : $("meta[name=csrf-token]").attr('content'),
               'stateid' : $(this).val()
            },
            success : function(response) {
                if(response.success) {
                    var html = '<option value="" selected>Select City</option>';
                    $.each(response.cities, function(index, value) {
                        html += '<option value="' + value.id + '">' + value.city_name + '</option>';
                    });
                    $('select[name=emp_city]').html(html);
                } else {
                    var html = '<option value="" selected>Select City</option>';
                    $('select[name=emp_city]').html(html);
                }
            }
        });
    });
});




