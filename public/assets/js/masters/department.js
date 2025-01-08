$('.delete-department').click(function(){
   var id = $(this).data('id');

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
        window.location.href = SITE_URL+'/hr/departments/delete/'+ id;
        }
    });
})
  

