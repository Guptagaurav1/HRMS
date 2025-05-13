// add work-order tab change with validation code start here

$(document).ready(function () {

    let currentTab = 0;
    function showTabContent(index) {

        $(".tab-content").removeClass("active");

        $(".tab-btn").removeClass("active");
        $(".tab-content").eq(index).addClass("active");
        $(".tab-btn").eq(index).addClass("active");
        validateTab(currentTab);
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
    // showTabContent(currentTab);   

    function showError(fieldId, message) {
        $("#" + fieldId + "_error").text(message).show();
    }

    function hideError(fieldId) {
        $("#" + fieldId + "_error").hide();
    }

    // Event listener for change event on select fields
    $("#organisation, #project_name, #wo_number, #issue_date, #start_date, #end_date").on("change", function () {
        validateTab(currentTab);
    });

    var jqxhr = "";
    // Function to validate the form
    let isValid = true;
    function validateTab(currentTab) {
        if (currentTab === 0) {
            // Validate Organisation
            var organisation = $("#organisation").val();
            if (organisation === "" || organisation === null) {
                showError("organisation", "Please select an organisation.");
                isValid = false;
            } else {
                isValid = true;
                hideError("organisation");
            }

            // Validate Project Name
            var project = $("#project_name").val();
            if (project === "" || project === null) {
                showError("project_name", "Please select a project.");
                isValid = false;
            } else {
                hideError("project_name");
            }


        } else if (currentTab == 1) {
            // Validate workorder Number
            var wo_number = $("#wo_number").val();
            var issue_date = $("#issue_date").val();
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();

            if (wo_number && issue_date && start_date && end_date) {
                isValid = true;
            }

            if (!wo_number) {
                showError("wo_number", "Please add work-order number.");
                isValid = false;
            }
            else {
                hideError("wo_number");
            }

            // Validate issue date.
            if (!issue_date) {
                showError("issue_date", "Please add issue date.");
                isValid = false;
            }
            else {
                hideError("issue_date");
            }

            if (!start_date) {
                showError("start_date", "Please add start date.");
                isValid = false;
            }
            else {
                 if (issue_date) {
                    var startDateObj = new Date(start_date);
                    var issueDateObj = new Date(issue_date);

                    if (startDateObj < issueDateObj) {
                        showError("start_date", "Start date must be greater than or equal to issue date.");
                        isValid = false;
                    }
                    else {
                        hideError("start_date");
                    }
                }
            }

            if (!end_date) {
                showError("end_date", "Please add end date.");
                isValid = false;
            }
            else {
                if (start_date) {
                    var startDateObj = new Date(start_date);
                    var endDateObj = new Date(end_date);

                    if (endDateObj < startDateObj) {
                        showError("end_date", "End date must be greater than or equal to start date.");
                        isValid = false;
                    }
                    else {
                        hideError("end_date");
                    }
                }
            }

            $('#wo_number').on('input', function () {
                var wo_number = $(this).val();

                if (wo_number) {
                    if (jqxhr) {
                        jqxhr.abort();
                    }

                    jqxhr = $.ajax({
                        url: SITE_URL + "/hr/get-exist-wo",
                        type: 'post',
                        data: {
                            '_token': $("meta[name=csrf-token]").attr('content'),
                            'wo_number': wo_number
                        },
                        success: function (response) {

                            // alert(ex_wo_number);
                            if (response.data && response.data.wo_number !== "") {
                                showError("wo_number", "The Work Order has already been taken.");
                                isValid = false;
                            }
                            else if (!response.data) {
                                showError("wo_number", "");
                                isValid = true;
                            }
                        },
                        error: function (xhr, status, error) {
                            isValid = false;
                            console.log("Error:", error);
                        }
                    });

                } else {
                    isValid = false;
                    showError("wo_number", "Please add work-order number.");
                }
            });

        }

        if (isValid) {
            $(".next-btn").prop("disabled", false);  // Enable next button if valid
        } else {
            $(".next-btn").prop("disabled", true);  // Disable next button if invalid
        }

    }
    // validateTab(currentTab);

});
// add work-order tab change with validation code end here

