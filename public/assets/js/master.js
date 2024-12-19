$(document).ready(function () {
	 $(".data-logout").click(function (){
            Swal.fire({
                  title: "Are you sure?",
                  text: "You won't be able to revert this!",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Confirm"
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = SITE_URL+'/';
                  }
                });
        })
})