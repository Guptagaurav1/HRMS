$('#organisation').on('change', function() {
    var selectedValue = $(this).val();
    if (selectedValue) {
        $.ajax({
            // url: 'organisation-workOrder/' + selectedValue, // Route URL with parameter
            url: SITE_URL+'/hr/organisation-workOrder/' + selectedValue, // Route URL with parameter
            type: 'GET',
            success: function(response) {
                let dropdown = $("#workOrder");
                dropdown.empty();
                dropdown.append('<option value="">Select Work-Order</option>');
                let workOrders = response.data;
                // Loop through response and append to dropdown
                $.each(workOrders, function(key, workOrder) {
                    dropdown.append('<option value="' + workOrder.wo_number + '">' + workOrder.wo_number + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.log("Error:", error);
            }
        });
    } 
});
$('#workOrder').on('change', function() {
    var selectedValue = $(this).val();
    if (selectedValue) {
        $.ajax({
            // url: 'workOrder-details/' + selectedValue, // Route URL with parameter
            url:  SITE_URL+'/hr/workOrder-details/' + selectedValue, // Route URL with parameter
            type: 'GET',
            success: function(response) {
              
                let wo_number =response.data.wo_number;
                let project_number =response.data.project.project_number;
                let wo_resources =response.data.wo_no_of_resources;
                let wo_date_of_issue =response.data.wo_date_of_issue;
                let wo_start_date =response.data.wo_start_date;
                let wo_end_date =response.data.wo_end_date;
                $('#work_order').val(wo_number);
                $('#project_no').val(project_number);
                $('#wo_resources').val(wo_resources);
                $('#start_date').val(wo_start_date);
                $('#end_date').val(wo_end_date);
                $('#date_of_issue').val(wo_date_of_issue);
                
            },
            error: function(xhr, status, error) {
                console.log("Error:", error);
            }
        });
    } 
});
// project and organisation onchange get datails in add work-order end here