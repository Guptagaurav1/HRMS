$(document).ready(function() {
 
    // Show or hide the password field.
    $('.eye').click(function() {
        var element = $(this);
        element.toggleClass('fa-eye fa-eye-slash');
        var passwordField = element.closest('.input-group').find("input.password");
        if (passwordField.attr('type') === 'password') {
            passwordField.attr('type', 'text');
        } else {
            passwordField.attr('type', 'password');
        }
    });

    // Disable submit the form.
    $("form.reset-form").submit(function () {
        $(this).find('button[type="submit"]').attr('disabled', 'disabled');
        Swal.fire({
            title: "updating...",
            didOpen: () => {
              Swal.showLoading();
            },
            allowOutsideClick: false
        });
    });

});