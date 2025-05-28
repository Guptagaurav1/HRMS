$(function () {
  $('.multiDatePicker').multiDatesPicker({
    dateFormat: "yy-mm-dd",
    onSelect: function (dateText) {
      // console.log("Selected Dates:", $(this).multiDatesPicker('getDates'));
    }
  });
  $('.halfDayDate').multiDatesPicker({
    dateFormat: "yy-mm-dd",
    onSelect: function (dateText) {
      // console.log("Selected Dates:", $(this).multiDatesPicker('getDates'));
    }
  });

  $('.date-picker').datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'MM yy',
    maxDate: new Date(),
    onClose: function (dateText, inst) {
      // $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
    }

  });

  // Send leave regularization mail.

  $(".send_mail").click(function () {
    var dates = $(this).closest(".group").find(".multiDatePicker").val();
    var halfDayDates = $(this).closest(".group").find(".halfDayDate").val();
    var emp_id = $(this).closest(".group").find(".emp_id").val();
    var month = $(this).closest(".group").find(".current_month").val();
    var button = $(this);
    if (dates && emp_id && month) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Send Mail!"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "Sending..",
            didOpen: () => {
              Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
          });

          button.attr('disabled', 'disabled');
          $.ajax({
            url: SITE_URL + '/hr/leave/send_regularization',
            method: 'post',
            dateType: 'json',
            data: {
              '_token': $("meta[name=csrf-token]").attr('content'),
              'emp_id': emp_id,
              'month': month,
              'absent_dates': dates,
              'half_day_dates': halfDayDates
            },
            success: function (res) {
              if (res.success) {
                Swal.hideLoading();
                Swal.fire({
                  title: "Congratulations!",
                  text: res.message,
                  icon: "success"
                })
                  .then((result) => {
                    if (result.isConfirmed) {
                      window.location.reload();
                    }
                  });
              }
              else if (res.error) {
                Swal.hideLoading();
                button.removeAttr('disabled');
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: res.message,
                });
              }
            }
          })
        }
      });
    }
    else {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Please select date",
      });
    }
  })
});