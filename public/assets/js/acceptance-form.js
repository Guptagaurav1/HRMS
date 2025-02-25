$(document).ready(function() {
    $("form#form_design").submit(function(){
        $(this).find(".acceptform").attr("disabled", "disabled");
    });
});