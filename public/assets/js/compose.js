$(document).ready(function () {

    // Show editor.
    let editor;
    ClassicEditor.create(document.querySelector('#body'))
        .then(newEditor => {
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });

    // Save content to local storage.
    $('form.compose-email').submit(function (e) {
        e.preventDefault();
        var formdata = new FormData(this);
        $(this).find("button[type=submit]").attr("disabled", "disabled");
        Swal.fire({
            title: "sending...",
            didOpen: () => {
              Swal.showLoading();
            },
            allowOutsideClick: false
        });

        $.ajax({
            url: SITE_URL + "/user/helpdesk/send-email",
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.hideLoading();
                if (response.success) {
                    Swal.fire({
                        title: "Congratulations!",
                        text: response.message,
                        icon: "success",
                        allowOutsideClick: () => false
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                          window.location.href = 'mail-logs';
                        }
                    });
                }
                else if(response.error) {
                    $(this).find("button.submit").removeAttr('disabled');
                    Swal.hideLoading();
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.message,
                        allowOutsideClick: () => false
                    });
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
});