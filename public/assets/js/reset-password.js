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

    // Validate confirm password duplicacy.
    $("input[name=password_confirmation]").keyup(() => {
        var confirmPassword = $("input[name=password_confirmation]").val();
        var password = $("input[name=password]").val();
        if (confirmPassword != password) {
            $("span.confirm").text("Confirm Password do not match");
        } else {
            $("span.confirm").text("");
        }
    });

});