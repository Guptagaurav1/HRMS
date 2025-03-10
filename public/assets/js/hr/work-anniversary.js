const anniversaryMailModal = document.getElementById('anniversaryMailModal')
if (anniversaryMailModal) {
  anniversaryMailModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const email = button.getAttribute('data-bs-whatever');
    // Update the modal's content.
    const modalBodyInput = anniversaryMailModal.querySelector('.modal-body input');

    // modalBodyInput.value = email;
    modalBodyInput.value = 'vikas.verma@prakharsoftwares.com';
  })
}

$(document).ready(function() {
    // After submit send mail form.
    $("form.send-greeting").submit(function (e) {
        e.preventDefault(); // Prevent form submission
        var form = $(this);
        form.find("btn.sendbutton").attr('disabled', 'disabled');
        Swal.fire({
            title: "Sending...",
            didOpen: () => {
              Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        $.ajax({
            type: "POST",
            url: SITE_URL +"/hr/events/send-anniversary-mail",
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Close modal after successful send.
                    $('#birthdayMailModal').modal('hide');
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
                    form.find("btn.sendbutton").removeAttr('disabled');
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.message,
                        allowOutsideClick: () => false
                    });
                }
              
            },
            error: function (xhr, status, error) {
                // Handle error
                // console.error(xhr.responseText);
            }
        });
    });
});