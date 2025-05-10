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
    $("#organisation, #project_name, #wo_number").on("change", function () {
        console.log('click outside');
        validateTab(currentTab);
    });

    var jqxhr = "";
    // Function to validate the form
    let isValid = true;
    function validateTab(currentTab) {
        if(currentTab === 0){
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
            
           
        }else if(currentTab == 1){
            // Validate workorder Number
            if ($("#wo_number").val() === "") {
                showError("wo_number", "Please add work-order number.");
                isValid = false;
            }

            $('#wo_number').on('input',function(){
                var wo_number = $(this).val();
                
                if(wo_number){
                    if (jqxhr) {
                        jqxhr.abort();
                    }

                    jqxhr =  $.ajax({
                        url :SITE_URL +"/hr/get-exist-wo",
                        type:'post',
                        data : {
                            '_token' : $("meta[name=csrf-token]").attr('content'),
                            'wo_number' : wo_number
                        },
                        success : function(response){

                            // alert(ex_wo_number);
                            if (response.data && response.data.wo_number !== "") {
                                showError("wo_number", "The Work Order has already been taken.");
                                isValid = false;
                                console.log(isValid);
                            }
                            else if(!response.data){
                                console.log('response not come');
                                    showError("wo_number", "");
                                    isValid = true;
                            } 
                        },
                        error: function(xhr, status, error) {
                            isValid = false;
                            console.log("Error:", error);
                        }
                    });

                }else {
                    isValid = false;
                    showError("wo_number", "Please add work-order number.");
                }
            });
        }

            if (isValid) {
                $(".next-btn").prop("disabled", false);  // Enable next button if valid
                console.log('valid');
            } else {
                console.log('invalid');
                $(".next-btn").prop("disabled", true);  // Disable next button if invalid
            }
        
    }
    // validateTab(currentTab);

});
// add work-order tab change with validation code end here

