$(document).ready(function () {

    // Delete Vendor.
    $("button.delete").click(function () {
        var vendorId = $(this).data("id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: SITE_URL + "/vms/clients/delete",
                    type: "post",
                    dataType: "json",
                    data: {
                        id: vendorId,
                        _token: $("meta[name=csrf-token]").attr('content')
                    },
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                title: "Deleted!",
                                text: response.message,
                                icon: "success",
                                allowOutsideClick: false,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        }
                        else if(response.error){
                            Swal.fire({
                                title: "Error!",
                                text: response.message,
                                icon: "error",
                                allowOutsideClick: false,
                            });
                        }
                    }
                });

            }
        });
    });
});