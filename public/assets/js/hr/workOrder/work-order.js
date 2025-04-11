// projects based on selected organisation
function projectsByOrganisation(organisationId) {
    if (organisationId) {
        $.ajax({
            url: SITE_URL +"/hr/project/organisation-project/"+ organisationId,
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

                // Prefill project if there is an existing details
                let project_na = "{{ old('project_name',$project->id ?? NULL, $project_name??NULL) }}";
                if (project_na) {
                    dropdown.val(project_na);
                }
            },
            error: function(xhr, status, error) {
                console.log("Error:", error);
            }
        });
    }
}

// project details based on selected project
function projectDetails(projectId) {
    if (projectId) {
        $.ajax({
            // url: 'project/project-details/' + projectId, // Route URL with parameter
            url: SITE_URL +"/hr/project/project-details/"+ projectId,
            type: 'GET',
            success: function(response) {
                let project_number = response.data.project_number;
                let empanelment_reference = response.data.empanelment_reference;   
                
                $('#project_no').val(project_number);
                $('#empanelment_reference').val(empanelment_reference);
            },
            error: function(xhr, status, error) {
                console.log("Error:", error);
            }
        });
    }
}

$('#organisation').on('change', function() {
    var selectedValue = $(this).val();
   
    if (!selectedValue) {
        // If no organization is selected, reset the project 
        $('#project_name').empty().append('<option value="">Select Project</option>');
        $('#project_name').val('');
        showError("project_name", "Please select project number.");

    } else {
        // Load the projects based on the selected organization
        projectsByOrganisation(selectedValue);  
    }
});

$('#project_name').on('change', function() {
    var selectedProjectId = $(this).val();
    if (!selectedProjectId) {
        // Reset project number and empanelment reference if no project is selected
        $('#project_no').val('');
        $('#empanelment_reference').val('');
        
    } else {
        // Load project details based on the selected project
        projectDetails(selectedProjectId);  
    }
});

function showError(fieldId, message) {
    $("#" + fieldId + "_error").text(message).show();
}

function hideError(fieldId) {
    $("#" + fieldId + "_error").hide();
}
// check work order duplicate or not






