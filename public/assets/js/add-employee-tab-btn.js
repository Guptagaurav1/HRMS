$(document).ready(function () {

       
    $(".btn-primary").click(function () {
        var currentTab = $(this).closest('.tab-content'); 
        var nextTab = currentTab.next('.tab-content'); 

        
        if (nextTab.length > 0) {
            
            currentTab.removeClass('active').hide();

            nextTab.addClass('active').show();

            
            var currentTabId = currentTab.attr('id').replace('content', 'tab'); 
            var nextTabId = nextTab.attr('id').replace('content', 'tab'); 

            // Remove 'active' class from all tabs and add it to the next tab
            $('.tab-btn').removeClass('active');
            $('#' + nextTabId).addClass('active');

            // Show the Previous Button
            $('#' + nextTabId).prev('.tab-content').find('.btn-secondary').show();
        }
    });

    // Previous Button Logic
    $(".btn-secondary").click(function () {
        var currentTab = $(this).closest('.tab-content'); // Get the current tab content
        var prevTab = currentTab.prev('.tab-content'); // Get the previous tab content

        // Check if there's a previous tab
        if (prevTab.length > 0) {
            
            currentTab.removeClass('active').hide();

            
            prevTab.addClass('active').show();

            
            var currentTabId = currentTab.attr('id').replace('content', 'tab'); 
            var prevTabId = prevTab.attr('id').replace('content', 'tab'); 

            
            $('.tab-btn').removeClass('active');
            $('#' + prevTabId).addClass('active');

            
            $('#' + prevTabId).next('.tab-content').find('.btn-secondary').show();
        }
    });


    $("#single-entry").click(function () {
        $("#tab-1").show();
        $("#tab-2").hide();
       
    })

    $("#html1").click(function () {
        $("#tab-2").show();
        $("#tab-1").hide();

    })
});