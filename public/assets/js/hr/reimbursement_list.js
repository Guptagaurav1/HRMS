const responseModal = document.getElementById('responseModal');
if (responseModal) {
  responseModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget;
    const rem_id = button.getAttribute('data-bs-whatever');
   
    const remInput = responseModal.querySelector('.response-form input[name=rem_id]');

    remInput.value = rem_id;
  })
}

$(document).ready(function() {

    $(".submit").click(function() {
        var response = $(this).attr('name');
        $(this).closest('form').find('input[name=response]').val(response);
    });

    $('form.response-form').on('submit', function(event) {
        event.preventDefault();
        Swal.fire({
            title: "Wait..!",
            didOpen: () => {
              Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        const form = $(this);
        $.ajax({
            url: SITE_URL + '/hr/reimbursement/save-response',
            type: 'post',
            dataType: 'json',
            data: form.serialize(),
            success: function(response) {
                form.trigger('reset');
                $('#responseModal').modal('hide');
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