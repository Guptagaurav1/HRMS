$(document).ready(function() {

    // Submit the form.
    $('form.recruitment_form').submit(function(event) {
        event.preventDefault();
        Swal.fire({
            title: "Wait..!",
            didOpen: () => {
              Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        $.ajax({
            url : '/guest/submit-details',
            type : 'POST',
            dataType : 'json',
            cache: false,
            contentType: false,
            processData: false,
            data : new FormData(this),
            success : function(response) {
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
                } else if(response.error) {
                    Swal.hideLoading();
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.message,
                        allowOutsideClick: () => false
                    });
                }
            }
        });
    });
});