$(document).ready(function () {
    $('.tab-links').click(function () {
        let tabId = $(this).attr('data-tab');
        console.log(tabId);
        $(this).addClass('active').siblings('.tab-links').removeClass('active');
        $('#tab-' + tabId).show().siblings('.row').hide();
    });

    // Send job mail individually.
    $("form.single_form").submit(function(e) {
        e.preventDefault();
        Swal.fire({
          title: "Sending..",
          didOpen: () => {
            Swal.showLoading();
          },
          allowOutsideClick: () => !Swal.isLoading()
        });

        $.ajax({
            url : SITE_URL+'/hr/recruitment/send-jd',
            method : 'post',
            dataType : 'json',
            data :  $(this).serialize(),
            success : function(res){
                Swal.hideLoading();
                if (res.success) {
                    Swal.fire({
                      title: "Congratulations!",
                      text: res.message,
                      icon: "success"
                    })
                    .then((result) => {
                      /* Read more about isConfirmed, isDenied below */
                      if (result.isConfirmed) {
                        window.location.reload();
                      }
                    });
                }
                else if(res.error) {
                    Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: res.message,
                      footer: '<a href="#">Why do I have this issue?</a>'
                    });
                }
            }
        });
    });

    // Send JD mail in bulk.
     $("form.bulk_form").submit(function(e) {
        e.preventDefault();
        Swal.fire({
          title: "Sending..",
          didOpen: () => {
            Swal.showLoading();
          },
          allowOutsideClick: () => false
        });

        var formData = new FormData($(this)[0]);
        $.ajax({
            url : SITE_URL+'/hr/recruitment/send-bulk-jd',
            method : 'post',
            dataType : 'json',
            data :  formData,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success : function(res){
                Swal.hideLoading();
                if (res.success) {
                    Swal.fire({
                      title: "Congratulations!",
                      text: res.message,
                      icon: "success",
                      confirmButtonText: 'Ok'
                    })
                    .then((result) => {
                      /* Read more about isConfirmed, isDenied below */
                      if (result.isConfirmed) {
                        window.location.reload();
                      }
                    });
                }
                else if(res.error) {
                    Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: res.message,
                    });
                }
            }
        });
    });


});