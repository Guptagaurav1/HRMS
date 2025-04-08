$(document).ready(function () {
    // Submit add holiday form.
    $("form.add-holiday").submit(function (e) {
        e.preventDefault();
        $(this).find('button[type="submit"]').attr('disabled', 'disabled');
        Swal.fire({
            title: "Wait..!",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        $.ajax({
            url: SITE_URL + '/hr/holiday/store',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            success: function (response) {
                if (response.success) {
                    bootstrap.Modal.getInstance(document.getElementById("addHoliday")).hide();
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
                } else if (response.error) {
                    Swal.hideLoading();
                    $(this).find('button[type="submit"]').removeAttr('disabled');
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

    // Handle modal on click of edit button.
    const editHolidayModal = document.getElementById('editHoliday');
    if (editHolidayModal) {
        editHolidayModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget;
            const holidayId = button.getAttribute('data-bs-whatever');
            var national = '';
            var gazetted = '';
            // Get the holiday data from the holiday_id.
            $.ajax({
                url: SITE_URL + '/hr/holiday/edit',
                type: 'POST',
                dataType: 'json',
                data: {
                    holiday_id: holidayId,
                    '_token': $("meta[name=csrf-token]").attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        editHolidayModal.querySelector('form.update-holiday input[name=holiday_name]').value = response.data.holiday_name;
                        editHolidayModal.querySelector('form.update-holiday input[name=holiday_date]').value = response.data.holiday_date;
                        if (response.data.holiday_type == 'National Holiday') {
                            national = 'selected';
                        }
                        else if (response.data.holiday_type == 'Gazetted Holiday') {
                            gazetted = 'selected';
                        }
                        html = '<option value="">Select Type</option><option value="National Holiday" ' + national + '>National Holiday</option><option value="Gazetted Holiday" ' + gazetted + '>Gazetted Holiday</option>';


                        editHolidayModal.querySelector('form.update-holiday select[name=holiday_type]').innerHTML = html;
                    }
                }
            });

            // Update the modal's id.
            const modalBodyInput = editHolidayModal.querySelector('form.update-holiday input[name=holiday_id]');
            modalBodyInput.value = holidayId;
        })
    }

    function updateHoliday(page, data) {
        Swal.fire({
            title: "Wait..!",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });

        $.ajax({
            url: SITE_URL + '/hr/holiday/' + page,
            type: 'POST',
            dataType: 'json',
            data: data,
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
                                window.location.reload();
                            }
                        });
                } else if (response.error) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.message,
                        allowOutsideClick: () => false
                    });
                }
            }
        });
    }

    // Update holiday.
    $("form.update-holiday").submit(function (e) {
        e.preventDefault();
        const form = $(this);
        form.find('button[type="submit"]').attr('disabled', 'disabled');

        Swal.fire({
            title: "Wait..!",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        $.ajax({
            url: SITE_URL + '/hr/holiday/update',
            type: 'POST',
            dataType: 'json',
            data: form.serialize(),
            success: function (response) {
                if (response.success) {
                    bootstrap.Modal.getInstance(document.getElementById("editHoliday")).hide();
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
                } else if (response.error) {
                    Swal.hideLoading();
                    form.find('button[type="submit"]').removeAttr('disabled');
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

    // Deactive the holiday.
    $("button.deactive").click(function () {
        const holidayId = $(this).data('id');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, deactive it!",
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                var data = {
                    holiday_id: holidayId,
                    '_token': $("meta[name=csrf-token]").attr('content')
                };
                updateHoliday('deactive', data);
            }
        });
    });

    // Deactive the holiday.
    $("button.active").click(function () {
        const holidayId = $(this).data('id');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, active it!",
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                var data = {
                    holiday_id: holidayId,
                    '_token': $("meta[name=csrf-token]").attr('content')
                };
                updateHoliday('active', data);
            }
        });
    });
});