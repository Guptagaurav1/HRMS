$(document).ready(function () {
    $("#addmorebtn").click(function () {
        let newField = $(".addMore").clone();
        $(".addMore").append(newField); 
    });

    $(document).on("click", ".delete-btn", function() {
        $(this).closest(".addMore").remove();
    });
   
});
