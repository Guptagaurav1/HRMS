$(document).ready(function () {
	$("#filladdress").on("click", function() {
      if (this.checked) {
        $("#c_address").val($("#p_address").val());

      } else {
        $("#c_address").val('');
      }
    });

    $("#p_address").focusout(function () {
    	if ($("#filladdress").is(":checked")) {
    		$("#c_address").val($("#p_address").val());
    	}
    });

     // Candidate join form.
    $("form.verify_document").submit(function (e){
        e.preventDefault();
        var form = $(this);
        form.find(".click_verified").attr('disabled', 'disabled');
        Swal.fire({
            title: "wait...",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        $.ajax({
            url : SITE_URL+'/hr/recruitment/check-documents',
            method : 'post',
            dataType : 'json',
            data : form.serialize(),
            success : function(res){
                if (res.success) {
                    Swal.hideLoading();
                    Swal.fire({
                      title: "Congratulations!",
                      text: res.message,
                      icon: "success",
                      allowOutsideClick: () => false
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                          window.location.href = $(".recruitment-form-link").attr('href');
                        }
                    });
                }
                else if(res.error){
                    Swal.hideLoading();
                    $(".click_verified").removeAttr('disabled');
                    Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: res.message,
                    });
                }
            }
        })
        
    });
})