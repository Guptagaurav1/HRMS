$(document).ready(function () {
    $("#user_submit").click(function () {
        $(".form_handleing").hide();
        $("#details_form").hide();
        $(".address_details").show();
    });

    $("#save_next").click(function () {

        $(".address_details").hide();

        $(".bank_details").show();

    });

    $("#bank_details_save_btn").click(function(){
        $(".bank_details").hide();
        $(".education_details").show();

    })

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


 

    $("#save_next_education").click(function(){
        $(".education_details").hide();
        $(".company_details").show();

    })

 

    $("#company_details_save_btn").click(function(){
        $(".company_details").hide();
        $(".ESI_details").show();
        


    })


    $("#ESI_ceckbox").click(function(){
        if ($(this).is(':checked')) {
           
            $(".ESI_Input-field").show();
        } else {
            $(".ESI_Input-field").hide();

            

        }
    })


    $("#ESI_save_btn").click(function(){
        $(".ESI_details").hide();
        $(".relation_nominee").show();


    })


    // Add More items

    let itemCount = 1;
    $('#add_more-items').click(function(){
        itemCount++;
        $('#table_body-row:last').after
        
        (`
        

         <tr>
                    <td class="srno-column">${itemCount}</td>
                    <td class="rid-column"> <input type="text" name="location" class="form-control">
                    </td>
                    <td> <select name="sel_gen" id="sel_gen" class="form-control" required>
                        <option value="" selected="" disabled="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select></td>
                    <td class="attributes-column"><input type="text" name="location" class="form-control"></td>
                    <td><input type="date" name="location" class="form-control"></td>
                    <td>

                        <input type="file"  class="form-control">
                    </td>

                    <td> <select name="sel_gen" id="sel_gen" class="form-control" required>
                        <option value="" selected="" disabled="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select></td>
                   
                    <td>

                        <button type="button" class="btn btn-primary remove-btn" >Remove <i class="fa-solid fa-trash"></i></i></button>

                        <button type="button" class="btn btn-primary">Reset <i class="fa-solid fa-rotate"></i></button>
                        
                    </td>
                </tr>
        
        `

        
        );
        
    });


  
$(document).on('click', '.remove-btn', function() {
$(this).closest('tr').remove(); 
});

});




