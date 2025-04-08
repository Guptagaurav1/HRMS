$(document).ready(function () {
    // Handle modal on click of edit button.
    const editLeaveModal = document.getElementById('editLeave');
    if (editLeaveModal) {
        editLeaveModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget;
            const leaveId = button.getAttribute('data-bs-whatever');
            // Get the holiday data from the leave_id.
            $.ajax({
                url: SITE_URL + '/hr/leave-policy/edit',
                type: 'POST',
                dataType: 'json',
                data: {
                    leave_id: leaveId,
                    '_token': $("meta[name=csrf-token]").attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        editLeaveModal.querySelector('form.update-leave input[name=period]').value = response.data.period;
                        editLeaveModal.querySelector('form.update-leave input[name=duration]').value = response.data.duration;
                        editLeaveModal.querySelector('form.update-leave input[name=leave_carry_forward]').value = response.data.leave_carry_forward;
                        editLeaveModal.querySelector('form.update-leave input[name=per_month_leave]').value = response.data.per_month_leave;
                        editLeaveModal.querySelector('form.update-leave input[name=paid_leave]').value = response.data.paid_leave;
                        editLeaveModal.querySelector('form.update-leave input[name=casual_leave]').value = response.data.casual_leave;
                    }
                }
            });

            // Update the modal's id.
            const modalBodyInput = editLeaveModal.querySelector('form.update-leave input[name=leave_id]');
            modalBodyInput.value = leaveId;
        })
    }

    function updateLeavePolicy(page, data) {
        Swal.fire({
            title: "Wait..!",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });

        $.ajax({
            url: SITE_URL + '/hr/leave-policy/' + page,
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

    // Update Leave Policy.
    $("form.update-leave").submit(function (e) {
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
            url: SITE_URL + '/hr/leave-policy/update',
            type: 'POST',
            dataType: 'json',
            data: form.serialize(),
            success: function (response) {
                if (response.success) {
                    bootstrap.Modal.getInstance(document.getElementById("editLeave")).hide();
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

    // Deactive the Leave policy.
    $("button.deactive").click(function () {
        const leaveId = $(this).data('id');
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
                    leave_id: leaveId,
                    '_token': $("meta[name=csrf-token]").attr('content')
                };
                updateLeavePolicy('deactive', data);
            }
        });
    });

    // Deactive the Leave policy.
    $("button.active").click(function () {
        const leaveId = $(this).data('id');
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
                    leave_id: leaveId,
                    '_token': $("meta[name=csrf-token]").attr('content')
                };
                updateLeavePolicy('active', data);
            }
        });
    });
});