function printmydoc(){
    $(".printarea").print();
}

$("#sendMail").click(function () {
    var token = $("meta[name=csrf-token]").attr('content');
    var salarySlipId = $("#slip-id").val();
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, send it!"
    }).then((result) => {
            Swal.fire({
            title: "Sending...",
            text: "Please wait while the mail is being sent.",
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
      if (result.isConfirmed) {
        $(this).attr('disabled', 'disabled');
        $.ajax({
            url: SITE_URL+'/hr/salary-slip/send-mail/'+salarySlipId,
            method : 'post',
            dataType : 'json',
            data : {
                '_token' : token
            },
            success: function (res){
                if (res.success) {
                    Swal.hideLoading();
                    Swal.fire({
                      title: "Mail Sent!",
                      text: "Your salary slip has been sent successfully.",
                      icon: "success"
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    })
                }
                else {
                     Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: "Something went wrong!",
                    });
                }
               
            }
        })
        
      }
    });
})