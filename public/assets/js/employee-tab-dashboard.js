$(document).ready(function () {
    $('.tab-item').click(function () {
        var target = $(this).data('id');
       
        $('.tab-item').removeClass('active');
        $(this).addClass('active');

        $('.tab-content-section').removeClass('active');
        $('#' + target).addClass('active');
    });
});