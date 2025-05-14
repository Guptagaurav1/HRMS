$('.delete-salary').click(function () {
    var id = $(this).data('id');
    $(this).attr('disabled', 'disabled');
    Swal.fire({
        title: "Are you sure?",
        text: "You want to delete This record!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Confirm"
    }).then((result) => {
        if (result.isConfirmed) {
            //  window.location.href = SITE_URL+'/hr/salary/delete/'+ id;
            $.ajax({
                url: SITE_URL + '/hr/salary/delete/' + id,
                dataType: 'json',
                type: 'GET',
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Congratulations!",
                            text: response.message,
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });

                    }
                    else if (response.error) {
                        $(this).attr('disabled', '');

                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: response.message,
                        })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                    }
                }
            });
        }
    });
})
