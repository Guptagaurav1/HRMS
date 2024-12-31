$(document).ready(function () {
    $('.tab-links').click(function () {
        let tabId = $(this).attr('data-tab');
        $(this).addClass('active').siblings('.tab-links').removeClass('active');
        $('#tab-' + tabId).show().siblings('.row').hide();
    });
});