$(document).ready(function () {

    // Show editor dialog.
    let editor;
    ClassicEditor.create(document.querySelector('#content'))
        .then(newEditor => {
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });

    // Response to the complaint.
    const responseModal = document.getElementById('responseModal');
    if (responseModal) {
        responseModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const complaintId = button.getAttribute('data-bs-whatever');
            $("form.response-form").find("input[name='complaint_id']").val(complaintId);
        })
    }

    // Submit response.
    $("form.response-form").submit(function (event) {
        event.preventDefault();
        const form = $(this);
        if (!$("#content").val()) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "please give description"
            });
            return false;
        }
        else {
            Swal.fire({
                title: "Loading...",
                didOpen: () => {
                  Swal.showLoading();
                },
                allowOutsideClick: () => !Swal.isLoading()
            });

            const formdata = form.serialize();
            $.ajax({
                url: SITE_URL + "/hr/posh/complaint-response",
                type: 'POST',
                dataType: 'json',
                data: formdata,
                success: function (response) {
                    Swal.hideLoading();
                    if (response.success) {
                        // Close the modal and display success message
                        Swal.fire({
                            title: "Congratulations!",
                            text: response.message,
                            icon: "success"
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    } else if (response.error) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: response.message,
                        });
                    }
                }
            });
        }
    });


    // Show complaint details on click of view button.
    const poshModal = document.getElementById('poshDetailsModal');
    if (poshModal) {
        poshModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const poshId = button.getAttribute('data-bs-whatever');

            // Initiate an Ajax request here
            $.ajax({
                url: SITE_URL + '/hr/posh/view-complaint',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: poshId,
                    '_token': $("meta[name=csrf-token]").attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        poshModal.querySelector('span.emp_code').textContent = response.complaint.employee.emp_code;
                        poshModal.querySelector('span.emp_name').textContent = response.complaint.employee.emp_name;
                        poshModal.querySelector('span.subject').textContent = response.complaint.subject;
                        poshModal.querySelector('span.message').textContent = response.complaint.description;
                        poshModal.querySelector('span.revert').innerHTML = response.complaint.revert;
                        poshModal.querySelector('span.complaint-date').textContent = new Date(response.complaint.created_at).toLocaleDateString();
                    }
                }
            });

        })
    }
});