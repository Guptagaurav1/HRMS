// workOrder edit tabs code start here
$(document).ready(function () {
    $('.tab-btn').click(function () {

        var tabId = $(this).attr('id');

        console.log(` ${tabId}`)
        var contentId = '#content' + tabId.replace('tab', '');

        console.log(`${contentId}`)

        $('.tab-btn').removeClass('active');
        $('.tab-content').removeClass('active');

        $(this).addClass('active');
        $(contentId).addClass('active');
    });

});
// workOrder edit tabs code end here