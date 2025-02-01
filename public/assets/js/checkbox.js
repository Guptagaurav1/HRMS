$(function () {
    $("#tick").click(function () {
        if ($(this).is(":checked")) {
            $("#NICSI-case").css("display", "flex");
           
        } else {
            $("#NICSI-case").hide();
        }

    });
});