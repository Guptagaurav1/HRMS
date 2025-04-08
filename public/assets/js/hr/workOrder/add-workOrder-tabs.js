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

