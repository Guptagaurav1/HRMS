// // project and organisation onchange get datails in edit work-order
$(document).ready(function() {
    $('#edit-organisation').on('change', function() {
        var selectedValue = $(this).val();
        if (selectedValue) {
            $.ajax({
                url: '{{ route("organisation-project", ":id") }}'.replace(':id', selectedValue),
                type: 'GET',
                success: function(response) {
                    let dropdown = $("#edit_project_name");
                    dropdown.empty();
                    dropdown.append('<option value="">Select a Project</option>');
                    let projects = response.data;
                    // Loop through response and append to dropdown
                    $.each(projects, function(key, project) {
                        dropdown.append('<option value="' + project.id + '">' + project.project_name + '</option>');
                    });

                    let project_name = "{{ old('project_name', $workOrder->project->id) }}";
                    if (project_name) {
                        dropdown.val(project_name);
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                }
            });
        } 
    });
    var initialOrgId = "{{ old('organisation', $workOrder->project->organizations->id) }}";
    if (initialOrgId) {
        $('#edit-organisation').val(initialOrgId).trigger('change');
    }
    $('#edit_project_name').on('change', function() {
        var selectedValue = $(this).val();
        if (selectedValue) {
            $.ajax({
                // url: 'project/project-details/' + selectedValue, // Route URL with parameter
                url: '{{ route("project-details", ":id") }}'.replace(':id', selectedValue),
                type: 'GET',
                success: function(response) {
                
                    let project_number =response.data.project_number;
                    // alert(project_name);
                    let empanelment_reference =response.data.empanelment_reference;
                    $('#project_no').val(project_number);
                    $('#empanelment_reference').val(empanelment_reference);

                    let project_no = "{{ old('project_no', $workOrder->project_number) }}";
                    if (project_no) {
                        $('#project_no').val(project_no);
                    }
                    let empanelment_ref = "{{ old('empanelment_reference', $workOrder->empanelment_reference) }}";
                    if (empanelment_ref) {
                        $('#empanelment_reference').val(empanelment_ref);
                    }
                    
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                }
            });
        } 
    });
    // project and organisation onchange get datails in edit work-order end here 



    // project and organisation onchange get datails in add work-order 
    $('#organisation').on('change', function() {
        var selectedValue = $(this).val();
        if (selectedValue) {
            $.ajax({
                url: 'project/organisation-project/' + selectedValue, // Route URL with parameter
                type: 'GET',
                success: function(response) {
                    let dropdown = $("#project_name");
                    dropdown.empty();
                    dropdown.append('<option value="">Select Project</option>');
                    let projects = response.data;
                    // Loop through response and append to dropdown
                    $.each(projects, function(key, project) {
                        dropdown.append('<option value="' + project.id + '">' + project.project_name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                }
            });
        } 
    });
    $('#project_name').on('change', function() {
        var selectedValue = $(this).val();
        if (selectedValue) {
            $.ajax({
                url: 'project/project-details/' + selectedValue, // Route URL with parameter
                type: 'GET',
                success: function(response) {
                  
                    let project_number =response.data.project_number;
                    let empanelment_reference =response.data.empanelment_reference;
                    $('#project_no').val(project_number);
                    $('#empanelment_reference').val(empanelment_reference);
                    
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                }
            });
        } 
    });
    // project and organisation onchange get datails in add work-order end here

    function dtable(){
        
        $('#workOrder_id').DataTable({ 
        
                "bDestroy":true,   
                dom: 'Bfrtip',
                dom: 'lBfrtip',
            
                processing: true,
                serverSide: true,
                searching: true,
                
                lengthMenu: [
                            [ 10,50,100,150,200,250,500,1000],
                            [ '10 rows', '50 rows','100 rows','150 rows','200 rows', '250 rows','500 rows','1000 rows']
                            ],
                // buttons: ['copy', 'csv', 'excel', 'pdf', 'print','colvis'],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                "order": [],
                // ajax:'{{route('get-work-order')}}',
                ajax: SITE_URL+'/hr/get-work-order',
                    columns: [  
                    { data: 'project.organizations.name',orderable:true,visible:true, searchable:true },
                    
                    { data: 'wo_number',orderable:true,visible:true },
                    { data: 'project.empanelment_reference',orderable:true,visible:true },
                    { data: 'wo_date_of_issue',orderable:true,visible:true },
                    { data: 'project.project_number',orderable:true,visible:true },
                    { data: 'project.project_name',orderable:true,visible:true },
                    { data: 'wo_project_coordinator',orderable:true,visible:true },
                    { data: 'wo_amount',orderable:true,visible:true },
                    { data: 'wo_details',orderable:true,visible:true },
                    { data: 'added_at',orderable:true,visible:true },
                    { data: 'attached_file',orderable:true,visible:true },
                    { data: 'action',orderable:true,visible:true },
                        
                
                    ]  
        });
                
    }
    dtable();

});
   

