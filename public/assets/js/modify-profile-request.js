$(document).ready(function() {
$("#add-more-btn").click(function(){
let tablefields=$('#add-field').html();
$(".after-add-more").after(tablefields);
$("#remove-btn").css("display", "block")
})
});