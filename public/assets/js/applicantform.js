$(document).ready(function () {

    $("form.preview_offer_letter").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        $(".previewletter").attr('disabled', 'disabled');
        Swal.fire({
            title: "Loading...",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        $.ajax({
            url : SITE_URL+'/hr/recruitment/preview-offer-letter',
            method : 'post',
            dataType : 'json',
            data : form.serialize(),
            success : function(res){
                if (res.success) {
                    Swal.hideLoading();
                     Swal.fire({
                      icon: "success",
                      title: "Offer Letter",
                      text: 'Offer Letter Loaded Successfully',
                    });
                    $("img.upper_image").hide();
                    $(".iframe_resume").removeAttr('src');
                    $(".iframe_resume").attr('src', res.path);
                }
                else if(res.error){
                    $(".previewletter").removeAttr('disabled');
                    Swal.hideLoading();
                    Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: res.message,
                    });
                }
            }

        })
    });

    function changeStageRequest(form, btnclass, page){
        $("."+btnclass).attr('disabled', 'disabled');
        Swal.fire({
            title: "Sending...",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        $.ajax({
            url : SITE_URL+'/hr/recruitment/'+page,
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
                          window.location.reload();
                        }
                    });
                }
                else if(res.error){
                    Swal.hideLoading();
                    $("."+btnclass).removeAttr('disabled');
                    Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: res.message,
                    });
                }
            }
        })
    };

     // Candidate Verify Document.
    $("form.verify_document").submit(function (e){
        e.preventDefault();
        var form = $(this);
        changeStageRequest(form, 'verify_doc', 'complete-joining-formalities');
    });

    // Candidate Backout form.
    $("form.backout_form").submit(function (e){
        e.preventDefault();
        var form = $(this);
        changeStageRequest(form, 'backout-btn', 'backout');
    });

     // Candidate join form.
    $("form.candidate_join").submit(function (e){
        e.preventDefault();
        var form = $(this);
        changeStageRequest(form, 'joined_btn', 'joined');
    });

     // Send Offer Letter.
    $("form.send_offer_letter").submit(function (e){
        e.preventDefault();
        var form = $(this);
        form.find(".fourth_stage").attr('disabled', 'disabled');
        changeStageRequest(form, 'fourth_stage', 'send-offer-letter');
    });
     // Remark Send Confirm Third Round.
    $("form.third_stage").submit(function (e){
        e.preventDefault();
        var form = $(this);
        changeStageRequest(form, 'third_stage', 'store-third');
    });

    $("input[name=doj]").change(function () {
        var doj = $(this).val();
        if (doj) {
            var d = new Date(doj);
            var day = d.getDate();
            var month = d.getMonth() + 1;
            var year = d.getFullYear();
            if (day < 10) {
              day = "0" + day;
            }
            if (month < 10) {
              month = "0" + month;
            }
            var date = day + "/" + month + "/" + year;
            $(".cvpreview").addClass('d-none');
            $("#dateoj").text(date);
            $(".prev_confirm").removeClass('d-none');
        }
        else {
            $(".cvpreview").removeClass('d-none');
            $(".prev_confirm").addClass('d-none');
        }       
    });
    $(".second_submit").click(function () {
        var getval = $(this).val();
        $("input[name=second_submit]").val(getval);
    });

    // Remark Second Round.
    $("form.remark_second").submit(function (e){
        e.preventDefault();
        var form = $(this);
        changeStageRequest(form, 'second_stage', 'remark-second');
    });

    $(".first_submit").click(function () {
        var getval = $(this).val();
        $("input[name=first_submit]").val(getval);
    });
    // Remark First Round.
    $("form.remark_first").submit(function (e){
        e.preventDefault();
        var form = $(this);
        changeStageRequest(form, 'first_stage', 'remark-first');
    });

    // Sent Interview Details.
    $("form.interview_details").submit(function (e){
        e.preventDefault();
        var form = $(this);
        changeStageRequest(form, 'first_stage', 'send-interview-details');
    });

    $(".shortlist_btn").click(function () {
        var getval = $(this).val();
        $("input[name=first_shortlist]").val(getval);
    });

    // Short List first stage.
    $("form.shortlist_first").submit(function (e){
        e.preventDefault();
        var form = $(this);
        changeStageRequest(form, 'first_stage', 'shortlist-first');
    });

    // Reject first stage.
    // $("form.reject_first").submit(function (e){
    //     e.preventDefault();
    //     var form = $(this);
    //     changeStageRequest(form, 'first_stage', 'shortlist-first');

    //     form.find(".first_stage").attr('disabled', 'disabled');
    //     $.ajax({
    //         url : SITE_URL+'/hr/recruitment/shortlist-first',
    //         method : 'post',
    //         dataType : 'json',
    //         data : form.serialize(),
    //         success : function(res){
    //             if (res.success) {
    //                 Swal.fire({
    //                   title: "Congratulations!",
    //                   text: res.message,
    //                   icon: "success",
    //                   allowOutsideClick: () => false
    //                 })
    //                 .then((result) => {
    //                     if (result.isConfirmed) {
    //                       window.location.reload();
    //                     }
    //                 });
    //             }
    //             else if(res.error){
    //                 form.find(".first_stage").removeAttr('disabled');
    //                 Swal.fire({
    //                   icon: "error",
    //                   title: "Oops...",
    //                   text: res.message,
    //                 });
    //             }
    //         }
    //     })
    // });

    var current_fs, next_fs, previous_fs;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);

    $(".next").click(function () {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();


            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");


            next_fs.show();

            current_fs.animate({ opacity: 0 }, {
                step: function (now) {

                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({ 'opacity': opacity });
                },
                duration: 500
            });
            setProgressBar(++current);
    });

    $(".previous").click(function () {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();


            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");


            previous_fs.show();


            current_fs.animate({ opacity: 0 }, {
                step: function (now) {

                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({ 'opacity': opacity });
                },
                duration: 500
            });
            setProgressBar(--current);
    });

    function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
    }

    $(".submit").click(function () {
        return false;
    })

    $("#previewOffer").click(function () {
        $("#confirmationofferHide").hide();
        $("#confirmationOfferLetter").show();
    });

    // Update email of contact. 
    $("form.email_form").submit(function(e){
        e.preventDefault();
        var form = $(this);
        changeStageRequest(form, 'mail_btn', 'update-email');
    });

    // Update salary of contact.
    $("form.salary_form").submit(function(e){
        e.preventDefault();
        var form = $(this);
        changeStageRequest(form, 'salary_btn', 'update-salary');
    });

    // Update doj.
     $("form.doj_form").submit(function(e){
        e.preventDefault();
        var form = $(this);
        changeStageRequest(form, 'doj_btn', 'update-doj');
    });

    // Update location.
     $("form.location_form").submit(function(e){
        e.preventDefault();
        var form = $(this);
        changeStageRequest(form, 'btn_location', 'update-location');
    });

     // Update scope of work.
     $("form.work_scope").submit(function(e){
        e.preventDefault();
        var form = $(this);
        form.find(".btn_location").attr('disabled', 'disabled');
        changeStageRequest(form, 'btn_location', 'update-work-scope');
    });

});
