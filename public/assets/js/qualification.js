$(document).ready(function () {
	$("button.delete").click(function() {
		$(this).attr('disabled', 'disabled');
		var qualificationId = $(this).attr('data-id');
		var token = $("meta[name=csrf-token]").attr('content');
		if (qualificationId && token) {

		Swal.fire({
			  title: "Are you sure?",
			  text: "You won't be able to revert this!",
			  icon: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#3085d6",
			  cancelButtonColor: "#d33",
			  confirmButtonText: "Yes, delete it!"
			}).then((result) => {
			  if (result.isConfirmed) {
			   $.ajax({
				url : SITE_URL+'/hr/qualification/delete/'+qualificationId,
				type : 'post',
				dataType : 'json',
				data : {
					'_token' : token
				},
				success : function(res){
					if (res.success) {
						Swal.fire({
						  title: "Congratulations!",
						  text: res.message,
						  icon: "success"
						}).then((result) => {
							  if (result.isConfirmed) {
							    location.reload();
							  }
							});

					}
					else if(res.error){
						$(this).attr('disabled', '');

						Swal.fire({
						  icon: "error",
						  title: "Oops...",
						  text: res.message,
						})
						.then((result) => {
							if (result.isConfirmed) {
							  location.reload();
							}
						});
					}
				}
			})
			  }
			});

			
		}
	})
})