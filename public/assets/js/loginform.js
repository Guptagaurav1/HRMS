$(document).ready(function() {
    $(".eyeicon").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var inputfield = $(this).closest("form").find(".password");
        inputfield.attr("type", inputfield.attr("type") == "password" ? "text" : "password");
    });
});