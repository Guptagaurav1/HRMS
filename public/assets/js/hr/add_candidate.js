$(document).ready(function() {
    $("form.add_candidate").submit(function(e) {
        $(this).find(".submit-btn").attr("disabled", "disabled");
    });
});