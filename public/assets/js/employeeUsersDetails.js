$(document).ready(function () {
    let counter = 1;

    // Add More Row
    $(document).on('click', '.add-more-btn', function () {
        const newRow = `
            <tr>
                <td class="text-center"><input type="text" class="form-control form-control-sm" name="certificate_name[]" required></td>
                <td class="text-center"><input type="number" class="form-control form-control-sm" name="duration[]" required></td>
                <td class="text-center"><input type="text" class="form-control form-control-sm" name="grade[]" required></td>
                <td class="text-center">
                <button type="button" class="btn btn-sm btn-primary add-more-btn"> Add More</button>
                <button type="button" class="btn btn-sm btn-danger remove-btn">Delete</button>
                </td>
            </tr>
        `;
        $('#table-body').append(newRow);
    });

    $(document).on('click', '.remove-btn', function () {
        $(this).closest('tr').remove();
    });

    // Submit Form.
    $("form.form-add-certificate").submit(function(e){
        e.preventDefault();
        $(this).find("button.submit").attr('disabled', 'disabled');
        Swal.fire({
            title: "Wait..!",
            didOpen: () => {
              Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });

        let formData = new FormData(this);

        $.ajax({
            url: SITE_URL+'/employee/profile/add-certificate',
            type: 'POST',
            dataType : 'json',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
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
            error: function(error) {
                console.log(error);
            }
        });
    });

    // Upload the image.
    $("form.img-upload").submit(function(event) {
        event.preventDefault();
        $(this).find("button.submit").attr('disabled', 'disabled');
        Swal.fire({
            title: "Updating...",
            didOpen: () => {
              Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        let formData = new FormData(this);
        $.ajax({
            url: SITE_URL+'/employee/profile/update-image',
            type: 'POST',
            dataType : 'json',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
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
                          window.location.reload();
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
            }
        });
    });
});
