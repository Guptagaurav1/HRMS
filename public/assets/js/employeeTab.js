$(document).ready(function () {

  $('.tab-btn').click(function () {
    var tabId = $(this).attr('id');
    var contentId = '#content' + tabId.replace('tab', '');


    $('.tab-btn').removeClass('active');
    $('.tab-content').removeClass('active');


    $(this).addClass('active');
    $(contentId).addClass('active');
  });

  $("#html").click(function () {
    $("#tab-1").show();
    $("#tab-2").hide();
  })

  $("#html1").click(function () {
    $("#tab-2").show();
    $("#tab-1").hide();

  })

  //  Show resigning field.

  function sendFormData(formData, page) {
    $("button[type=submit]").attr("disabled", "disabled");
    Swal.fire({
      title: "Updating!",
      didOpen: () => {
        Swal.showLoading();
      },
      allowOutsideClick: () => !Swal.isLoading()
    });

    $.ajax({
      url: SITE_URL + '/hr/employee/' + page,
      type: 'POST',
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
      success: function (response) {
        Swal.hideLoading();
        if (response.success) {
          Swal.fire({
            title: 'Congratulations',
            text : response.message,
            icon:'success',
            confirmButtonText: 'Okay',
            allowOutsideClick: () => !Swal.isLoading()
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          });
        }
        else if (response.error) {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: response.message,
          })
          .then((result) => {
            if (result.isConfirmed) {
              $("button[type=submit]").removeAttr("disabled");
            }
          });
        }
      },
      error: function (xhr) {
        console.log("Error in " + key, xhr.responseText);
      }
    });
  }

  // Update Employee Details
  $("form.emp_details").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    sendFormData(formData, 'update-emp-details');
  });

  // Update Personal Details
  $("form.personal_details").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    sendFormData(formData, 'add_personal_details');
  });

  // Update Address Details
  $("form.address_details").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    sendFormData(formData, 'add_address_details');
  });

  // Update Bank Details
  $("form.bank_details").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    sendFormData(formData, 'add_bank_details');
  });

  // Update Education Details
  $("form.education_details").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    sendFormData(formData, 'add_education_details');
  });

  // Update Experience Details
  $("form.experience_details").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    sendFormData(formData, 'add_experience_details');
  });

  // Update Id Proof Details
  $("form.id_proofs").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    sendFormData(formData, 'add_id_details');
  });



  $("select[name=emp_current_working_status]").change(function (e) {
    if (this.value == 'resign') {
      console.log(this.value);
      $(".resign").removeClass('d-none');
    } else {
      $(".resign").addClass('d-none');
    }
  });

    
  $("#same-as").click(function() {
    if ($(this).is(':checked')) {
        $("#local_address").val($("#permanent_address").val());
    }
    else {
        $("#local_address").val("");
    }
  });

});