$(document).ready(function () {

  // Validate file sizes.
  $("input[type=file]").change(function (event) {
    var file = event.target.files[0];
    if (file.size > 1048576) {
      $(this).closest('div').find('.fileerror').text('Invalid file size');
      $(this).val(null);
      Swal.fire({
        icon: "error",
        title: "File too large!",
        text: "Please upload a file less than 1MB.",
        allowOutsideClick: false
      });
    }
    else {
      $(this).closest('div').find('.fileerror').text('');
    }
  });

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
            text: response.message,
            icon: 'success',
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



  $("input[name=emp_current_working_status]").change(function (e) {
    if (this.value == 'resign') {
      $(".resign").removeClass('d-none');
    } else {
      $(".resign").addClass('d-none');
    }
  });


  $("#same-as").click(function () {
    if ($(this).is(':checked')) {
      $("#local_address").val($("#permanent_address").val());
    }
    else {
      $("#local_address").val("");
    }
  });

  // Add multi select
  $('.modal-select').select2({
    dropdownParent: $('#departmentModal')
  });

  function get_departments() {
    $.ajax({
      url: SITE_URL + '/hr/departments/get-departments',
      type: 'post',
      dataType: 'json',
      data: {
        '_token': $("meta[name=csrf-token]").attr('content'),
      },
      success: function (response) {
        if (response.success) {
          var html = '';
          $.each(response.departments, function (index, value) {
            html += '<option value="' + value.department + '">' + value.department + '</option>';
          });
          $('select[name=department]').html(html);
        } else {
          console.log('Failed to get departments');
        }
      }
    });
  }

  function get_designations() {
    $.ajax({
      url: SITE_URL + '/hr/designations/get-designations',
      type: 'post',
      dataType: 'json',
      data: {
        '_token': $("meta[name=csrf-token]").attr('content'),
      },
      success: function (response) {
        if (response.success) {
          var html = '<option value="">Select Designation</option>';
          $.each(response.designations, function (index, value) {
            html += '<option value="' + value.name + '">' + value.name + '</option>';
          });
          $('select[name=emp_designation]').html(html);
        } else {
          console.log('Failed to get departments');
        }
      }
    });
  }

  // Add department.
  $("form.add-department").submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: SITE_URL + '/hr/departments/create-new',
      type: 'POST',
      dataType: 'json',
      data: $(this).serialize(),
      success: function (response) {
        if (response.success) {
          Swal.fire({
            title: "Success",
            text: response.message,
            icon: "success",
            allowOutsideClick: () => !Swal.isLoading()
          });
          $("#departmentModal").modal('hide');
          get_departments();
          $("form.add-department")[0].reset();
        } else if (response.error) {
          Swal.fire({
            title: "Error",
            text: response.message,
            icon: "error",
            allowOutsideClick: () => !Swal.isLoading()
          });
        }
      }
    });
  });

  // Get Reporting managers on change of department.
  $("select[name=department]").change(function () {
    $.ajax({
      url: SITE_URL + '/hr/employee/get-reporting-managers',
      type: 'post',
      dataType: 'json',
      data: {
        '_token': $("meta[name=csrf-token]").attr('content'),
        'department': $(this).val()
      },
      success: function (response) {
        if (response.success) {
          var html = '<option value="" selected>Not Specify</option>';
          html += '<option value="' + response.reporting_manager + '">' + response.reporting_manager + '</option>';
          $('select[name=reporting_email]').html(html);
        } else {
          var html = '<option value="" selected>Not Specify</option>';
          $('select[name=reporting_email]').html(html);
        }
      }
    });
  });

  // Add Department.
  $("form.add-designation").submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: SITE_URL + '/hr/designations/create-new',
      type: 'POST',
      dataType: 'json',
      data: $(this).serialize(),
      success: function (response) {
        if (response.success) {
          Swal.fire({
            title: "Success",
            text: response.message,
            icon: "success",
            allowOutsideClick: () => !Swal.isLoading()
          });
          $("#designationModal").modal('hide');
          get_designations();
          $("form.add-designation")[0].reset();
        } else if (response.error) {
          Swal.fire({
            title: "Error",
            text: response.message,
            icon: "error",
            allowOutsideClick: () => !Swal.isLoading()
          });
        }
      }
    });
  });

  // Get Cities.
  $("select[name=state]").change(function () {
    $.ajax({
      url: SITE_URL + '/hr/recruitment/cities',
      type: 'post',
      dataType: 'json',
      data: {
        '_token': $("meta[name=csrf-token]").attr('content'),
        'stateid': $(this).val()
      },
      success: function (response) {
        if (response.success) {
          var html = '<option value="" selected>Select City</option>';
          $.each(response.cities, function (index, value) {
            html += '<option value="' + value.id + '">' + value.city_name + '</option>';
          });
          $('select[name=emp_city]').html(html);
        } else {
          var html = '<option value="" selected>Select City</option>';
          $('select[name=emp_city]').html(html);
        }
      }
    });
  });

  // Show preview of images.

  $(".photo").change(function (e) {
    var file = e.target.files[0];
    if (file && file.size < 1048576) {
      imgURL = URL.createObjectURL(file);
      $(this).closest(".photodiv").find('.preview_photo').attr("src", imgURL);
    }
    else {
      $(this).closest(".photodiv").find('.preview_photo').removeAttr("src");
    }

  });

  function showQualification(qualification) {
    var count = 0;
    if (qualification == '10th') {
      count = 1;
    }
    else if (qualification == '12th') {
      count = 2;
    }
    else if (qualification == 'Diploma') {
      count = 3;
    }
    else if (qualification == 'Bachelor') {
      count = 4;
    }
    else if (qualification == 'Master') {
      count = 5;
    }
    else if (qualification == 'PhD') {
      count = 6;
    }

    $(".education-card").each(function (index) {
      if (qualification && index < count) {
        $(this).removeClass('d-none');
      }
      else {
        $(this).addClass('d-none');
      }
    });
  }
  // Show qualification on basis of highest qualification
  $("select[name=emp_highest_qualification]").change(function () {
    var qualification = $(this).val();
    showQualification(qualification);
  });

  // Show qualification on load.
  showQualification($("select[name=emp_highest_qualification]").val());
});