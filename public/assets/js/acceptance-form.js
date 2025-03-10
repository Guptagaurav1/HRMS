$(document).ready(function() {
    $("form#form_design").submit(function(){
        $(this).find(".acceptform").attr("disabled", "disabled");
    });

    $(".accept").click(function(){
        $("form#form_design").find("input[name=terms_and_condition]").attr("checked", "checked");
        $("form#form_design").find("input[name=terms_and_condition]").removeAttr("disabled");
    });
});