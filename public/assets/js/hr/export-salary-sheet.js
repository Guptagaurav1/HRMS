$(document).ready(function() {
    // Validate salary generated or not.
    $(".check").click(function() {
        var month = $("#month-salary").val();
        if (!month){
            $(".downloadSheet").addClass('d-none');
            $(".checksalary").addClass('d-none');
            Swal.fire({
                title: "Oops!",
                text: "Please select a month!",
                icon: "error",
                confirmButtonText: "OK",
                allowOutsideClick: false
            });
            return false;
        }
        else {
            $.ajax({
                url : SITE_URL+'/hr/work-order/check-salary',
                type : 'post',
                dataType : 'json',
                data : {
                    month : month,
                    '_token' : $("meta[name=csrf-token]").attr('content')
                },
                success : function (response){
                    if (response.success) {  // If salary generated show download button else not
                        $(".checksalary").addClass('d-none');
                        $("span.checkerror").text('');

                        $(".downloadSheet").removeClass('d-none');
                        $("span.selected-month").text(month);
                    }
                    else if(response.error){
                        $(".checksalary").removeClass('d-none');
                        $("span.checkerror").text(response.message);
                    }
                }
            });
        }
    });

    // Hide the download on change of month.
    $("#month-salary").change(function() {
        var previous = $("span.selected-month").text();
        if (previous != $(this).val()) {
            $(".downloadSheet").addClass('d-none');
            $(".checksalary").addClass('d-none');
        }
    });

    // Download Salary SLip.
    // $("button.download-salary").click(function () {
    //     var month = $("#month-salary").val();
    //     if (!month){
    //         $(".downloadSheet").addClass('d-none');
    //         $(".checksalary").addClass('d-none');
    //         Swal.fire({
    //             title: "Oops!",
    //             text: "Please select a month!",
    //             icon: "error",
    //             confirmButtonText: "OK",
    //             allowOutsideClick: false
    //         });
    //         return false;
    //     }
    //     else {
    //         $.ajax({
    //             url : SITE_URL+'/hr/work-order/download-salary-sheet',
    //             type : 'post',
    //             dataType : 'json',
    //             data : {
    //                 month : month,
    //                 '_token' : $("meta[name=csrf-token]").attr('content'),
    //                 'type' : 'download'
    //             },

    //         });
    //     }
    // });
});