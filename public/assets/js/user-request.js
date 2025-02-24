$(document).ready(function() {
    const token = $("meta[name=csrf-token]").attr('content');
    $('#inputState').change(function() {
        const selectedOption = $(this).val();
        $('.job-description-column, .position-status-column, .offer-letter-column, .both-status-column').hide();
        if (selectedOption === 'Job Description') {
            $('.job-description-column').show(); 
        } else if (selectedOption === 'Recruitment Position Status') {
            $('.position-status-column').show(); 
        } else if (selectedOption === 'Offer Letter') {
            $('.offer-letter-column').show(); 
        }

        if (selectedOption == 'Recruitment Position Status' || selectedOption === 'Offer Letter') {
            $('.both-status-column').show(); 
        }
    });

    $(".positions").change(function () {
        var position = $(this).val();
        $.ajax({
            url : SITE_URL+'/hr/recruitment/get-position-candidates',
            method : 'post',
            dataType : 'json',
            data : {
                '_token' : token,
                'position_id' : position
            },
            success : function(res){
                var options = '<option>Select Candidate</option>';
                if (res.success) {
                    $.each(res.data, function(index, value) {
                        options += '<option value="'+value.id+'">'+value.firstname+'/'+value.email+'</option>';
                    })
                    $(".candidate_list").html(options);
                }
            }

        });
    });

    $("form.requestform").submit(function (e) {
        $(this).find("button.sendrequest").attr('disabled', 'disabled');
    })
});