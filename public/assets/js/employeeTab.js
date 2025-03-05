$(document).ready(function() {
  
    $('.tab-btn').click(function() {
      var tabId = $(this).attr('id'); 
      var contentId = '#content' + tabId.replace('tab', ''); 
  
      
      $('.tab-btn').removeClass('active');
      $('.tab-content').removeClass('active');
  
     
      $(this).addClass('active');
      $(contentId).addClass('active');
    });
  
    $("#html").click(function(){
      $("#tab-1").show();
      $("#tab-2").hide();
    })
  
    $("#html1").click(function(){
      $("#tab-2").show();
      $("#tab-1").hide();
  
    })
  
  
  
  
  
  
  
  
  
    
  });