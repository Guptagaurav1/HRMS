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



// add work-order tab change with validation code start here

$(document).ready(function () {

    let currentTab = 0;
    function showTabContent(index) {

        $(".tab-content").removeClass("active");

        $(".tab-btn").removeClass("active");
        $(".tab-content").eq(index).addClass("active");
        $(".tab-btn").eq(index).addClass("active");
        validateTab(currentTab)
    }

    $(".next-btn").click(function () {
        if (currentTab < $(".tab-btn").length - 1) {
            currentTab++;
            showTabContent(currentTab);
        }
    });

    $(".prev-btn").click(function () {
        if (currentTab > 0) {
            currentTab--;
            showTabContent(currentTab);
        }
    });
    showTabContent(currentTab);   

    function showError(fieldId, message) {
        $("#" + fieldId + "_error").text(message).show();
    }

    function hideError(fieldId) {
        $("#" + fieldId + "_error").hide();
    }

    // Event listener for change event on select fields
    $("#organisation, #project_name,#wo_number").on("change", function () {
        validateTab(currentTab);
    });

    // Function to validate the form
    function validateTab(currentTab) {
        let isValid = true;
        if(currentTab === 0){
            // Validate Organisation
            if ($("#organisation").val() === "") {
                showError("organisation", "Please select an organisation.");
                isValid = false;
            } else {
                hideError("organisation");
            }

            // Validate Project Name
            if ($("#project_name").val() === "") {
                showError("project_name", "Please select a project.");
                isValid = false;
            } else {
                hideError("project_name");
            }
        }else if(currentTab === 1){
            // Validate workorder Number
            if ($("#wo_number").val() === "") {
                showError("wo_number", "Please add work-order number.");
                isValid = false;
            } else {
                hideError("wo_number");
            }
        }
            if (isValid) {
                $(".next-btn").prop("disabled", false);  // Enable next button if valid
            } else {
                $(".next-btn").prop("disabled", true);  // Disable next button if invalid
            }
        
    }
    validateTab(currentTab);

});
// add work-order tab change with validation code end here


// workOrder edit tabs code start here
$(document).ready(function () {
    $('.tab-btn').click(function () {

        var tabId = $(this).attr('id');

        console.log(` ${tabId}`)
        var contentId = '#content' + tabId.replace('tab', '');

        console.log(`${contentId}`)

        $('.tab-btn').removeClass('active');
        $('.tab-content').removeClass('active');

        $(this).addClass('active');
        $(contentId).addClass('active');
    });

});
// workOrder edit tabs code end here


