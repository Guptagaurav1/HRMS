$(document).ready(function() {
    // Change placeholder.
    $("#roles").change(function() {
        var selectedRole = $(this).val();
        if(selectedRole == "employee"){
            $("input[name=email]").removeAttr("placeholder");
            $("input[name=email]").attr("placeholder", 'Enter Employee Code');
        }
        else{
            $("input[name=email]").removeAttr("placeholder");
            $("input[name=email]").attr("placeholder", 'Enter Email Id');  
        }
    });

     // Disable submit the form.
     $("form.send-reset-link").submit(function () {
        $(this).find('button[type="submit"]').attr('disabled', 'disabled');
        Swal.fire({
            title: "sending...",
            didOpen: () => {
              Swal.showLoading();
            },
            allowOutsideClick: false
        });
    });
});