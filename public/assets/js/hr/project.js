$(document).ready(function(){ 
    function dtable(){
        
        $('#project-table').DataTable({ 
        
                "bDestroy":true,   
                dom: 'Bfrtip',
                dom: 'lBfrtip',
            
                processing: true,
                serverSide: true,
                searching: true,
                
                lengthMenu: [
                            [ 10,50,100,150,200,250,500,1000, -1],
                            [ '10 rows', '50 rows','100 rows','150 rows','200 rows', '250 rows','500 rows','1000 rows','Show All rows']
                            ],
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print','colvis'],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                "order": [],
                ajax: SITE_URL+'/hr/project/projectlist',
                    columns: [  
                    { data: 's_no',orderable:true,visible:true, searchable:true },
                    
                    { data: 'organization',orderable:true,visible:true },
                    
                    { data: 'project_name',orderable:true,visible:true },
                    { data: 'project_number',orderable:true,visible:true },
                    { data: 'empanelment_reference',orderable:true,visible:true },
                    { data: 'action',orderable:true,visible:true },
                        
                
                    ]  
        });
                
    }
    dtable();

});

 // project and organisation onchange get datails in add work-order 
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