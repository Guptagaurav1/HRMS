$(document).ready(function () {
    $(document).on('input', '.for_char', function () {
        var enteredVal = $(this).val();
        var result = $(this).attr('name');
        var phoneregex = /^\d{10}$/;
        var charregex = /^[a-zA-Z\s]+$/;
        var emailregex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        let bankregex = /^\d{9,18}$/;
        let ifscregex = /^[A-Za-z]{4}\d{7}$/;
        let panregex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
        let esiregex = /^([0-9]{2})[\–\-]([0-9]{2})[\–\-]([0-9]{6})[\–\-]([0-9]{3})[\–\-]([0-9]{4})$/;
      

        if (charregex.test(enteredVal) && result != 'phone' && result != 'email' && result != 'contact' && result != 'emp_account_no' && result!=="phone_no" && result != 'emp_ifsc' && result != 'emp_pan' && result != "emp_esi_no" && result !=="emp_email_first" && result!=='billing_email_id' && result!=="jobseeker_email" && result!=='remark' && result!=='update_email' && result!=='mobile' && result!=='bank_email' ) {
            errormessage = "";
            color = 'green';
        }

        else if (phoneregex.test(enteredVal) && result != 'email' && result != 'emp_account_no' && result != 'emp_ifsc' && result != 'emp_pan') {
            errormessage = "";
            color = 'green';
        }

        else if (emailregex.test(enteredVal)) {
            errormessage = "";
            color = 'green';
        }

        else if (result == 'emp_account_no' && enteredVal.match(bankregex) && result != 'phone' && result != 'emp_ifsc' && result != 'emp_pan') {
            errormessage = "";
            color = 'green';
            
        }

        else if (result == 'emp_ifsc' && enteredVal.match(ifscregex) && result !== 'emp_pan') {
            errormessage = "";
            color = 'green';
        }

        else if (result == 'emp_pan' && enteredVal.match(panregex)) {
            errormessage = "";
            color = 'green';
        }

        

        else if (result == 'emp_esi_no' && enteredVal.match(esiregex)) {
            errormessage = "";
            color = 'green';
        }

       
        

        else {
            var errormessage = 'Entered value is incorrect';
            var color = 'red';

        }

        // if (result.includes("[") && result.includes("]")) {
        //     console.log("inside if condition");
        //     result = result.replace("[", "");
        //     result = result.replace("]", "");
        //     console.log(result)
        // }
        // console.log(result, 'outside if result second');




        // if (result == 'emp_esi_no') {
        //     $('.' + result).html(errormessage).css('color', color);

        // }
        
        // else  {
        //     $(this).closest('.col-md-6').find('.' + result).html(errormessage).css('color', color);

        // }

        $('.' + result).html(errormessage).css('color', color);


        


    });
});




