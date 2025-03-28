$(document).ready(function () {
    $('.for_char').on('input', function() {
        const enteredVal = $(this).val();
        var result = $(this).attr('name'); 
        let phoneregex = /^\d{10}$/; 
        let charregex = /^[a-zA-Z\s]+$/;  
        let emailregex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; 
        let errormessage = 'Entered value is incorrect'; 

        if (phoneregex.test(enteredVal)) {
            errormessage = "Phone number is correct";
        }
        else if ((result === "firstname" || result === "lastname") && charregex.test(enteredVal)) {
            errormessage = "The entered value is correct";
        }
        else if (emailregex.test(enteredVal)) {
            errormessage = "The entered value is correct";
        }

        $('.' + result).html(errormessage);
    });
}); 
