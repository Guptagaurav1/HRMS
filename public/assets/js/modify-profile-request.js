$(document).ready(function() {
$("#add-more-btn").click(function(){
   
let tablefields=$('#add-field').html();

$("#table-head").hide()
$(".after-add-more").before(tablefields);



})
});