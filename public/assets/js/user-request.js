$(document).ready(function() {
    $('#inputState').change(function() {
        const selectedOption = $(this).val();
        $('.job-description-column, .position-status-column, .offer-letter-column').hide()
        if (selectedOption === 'job_description') {
            $('.job-description-column').show(); 
        } else if (selectedOption === 'recruitment_position_status') {
            $('.position-status-column').show(); 
        } else if (selectedOption === 'offer_letter') {
            $('.offer-letter-column').show(); 
        }
    });
});