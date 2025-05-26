$(document).ready(function() {
    $('[name="at_appr_leave"],[name="leave"]').bind('keyup', function(){
      // updateWorkingDays();
      var outer_ele = $(this).parent().parent();
      var appr_leave = parseInt(outer_ele.children().eq(4).children().val());
      var lwd = parseInt(outer_ele.children().eq(5).children().val());
      var no_of_work_days = outer_ele.children().eq(6).children().val();
      month_date = $('.month_year').val().split('-');
      month = new Date(Date.parse(month_date[0].replace(/ .*/,'') +" 1, 2022")).getMonth()+1;
      year = month_date[1];
      total_days = new Date(year, month, 0).getDate();

      if(isNaN(appr_leave)){
        appr_leave = 0;
      }
      outer_ele.children().eq(6).children().val(total_days-(lwd)+(appr_leave));

    });

  });

  $('[name="check[]"]').change(function() {
    var submitButton = $('#btn-attendance');
   
    if ($(this).is(':checked')) {
        var checked = $(this).parent().parent();
        submitButton.prop('disabled', false);
      checked.children().eq(0).attr('name', checked.children().eq(0).attr('name') + '_check[]');
      checked.children().eq(4).children().attr('name', checked.children().eq(4).children().attr('name') + '_check[]');
      checked.children().eq(5).children().attr('name', checked.children().eq(5).children().attr('name') + '_check[]');
      
      checked.children().eq(11).children().attr('name', checked.children().eq(11).children().attr('name') + '_check[]');
      checked.children().eq(12).attr('name', checked.children().eq(12).attr('name') + '_check[]');
      checked.children().eq(13).attr('name', checked.children().eq(13).attr('name') + '_check[]');
      checked.children().eq(14).attr('name', checked.children().eq(14).attr('name') + '_check[]');
    //   checked.children().eq(16).children().attr('name', checked.children().eq(16).children().attr('name') + '_check[]');
      checked.children().eq(17).children().attr('name', checked.children().eq(17).children().attr('name') + '_check[]');
      checked.children().eq(18).children().attr('name', checked.children().eq(18).children().attr('name') + '_check[]');
      checked.children().eq(19).children().attr('name', checked.children().eq(19).children().attr('name') + '_check[]');
      checked.children().eq(20).children().attr('name', checked.children().eq(20).children().attr('name') + '_check[]');
      checked.children().eq(21).children().attr('name', checked.children().eq(21).children().attr('name') + '_check[]');
    
    } else {
      var checked = $(this).parent().parent();
      submitButton.prop('disabled', true);
      checked.children().eq(0).attr('name', 'emp_code');
      checked.children().eq(4).children().attr('name', 'at_appr_leave');
      checked.children().eq(5).children().attr('name', 'leave');
      checked.children().eq(11).children().attr('name', 'dor');
      checked.children().eq(12).attr('name', 'emp_designation');
      checked.children().eq(13).attr('name', 'emp_vendor_rate');
      checked.children().eq(14).attr('name', 'emp_ctc');

      checked.children().eq(17).children().attr('name', 'remarks');
      checked.children().eq(18).children().attr('name', 'advance');
      checked.children().eq(19).children().attr('name', 'recovery');
      checked.children().eq(20).children().attr('name', 'overtime_rate');
      checked.children().eq(21).children().attr('name', 'total_working_hrs');
      // console.log(checked.children().eq(0).attr('name'));
     
    }
  });

  $("#all").click(function() {
    $('input:checkbox').not(this).prop('checked', this.checked);
    var submitButton = $('#btn-attendance');
    if ($(this).is(':checked')) {
        submitButton.prop('disabled', false);
      $('[id="emp_code"]').attr('name', 'emp_code_check[]');
      $('[id="at_appr_leave"]').attr('name', 'at_appr_leave_check[]');
      $('[id="leave"]').attr('name', 'leave_check[]');
      $('[id="dor"]').attr('name', 'dor_check[]');
      $('[id="emp_designation"]').attr('name', 'emp_designation_check[]');
      $('[id="emp_vendor_rate"]').attr('name', 'emp_vendor_rate_check[]');
      $('[id="emp_ctc"]').attr('name', 'emp_ctc_check[]');
      $('[id="remarks"]').attr('name', 'remarks_check[]');
      $('[id="advance"]').attr('name', 'advance_check[]');
      $('[id="recovery"]').attr('name', 'recovery_check[]');
      $('[id="overtime_rate"]').attr('name', 'overtime_rate_check[]');
      $('[id="total_working_hrs"]').attr('name', 'total_working_hrs_check[]');
    } else {
        submitButton.prop('disabled', true);
      $('[id="emp_code"]').attr('name', 'emp_code');
      $('[id="at_appr_leave"]').attr('name', 'at_appr_leave');
      $('[id="leave"]').attr('name', 'leave');
      $('[id="dor"]').attr('name', 'dor');
      $('[id="emp_designation"]').attr('name', 'emp_designation');
      $('[id="emp_vendor_rate"]').attr('name', 'emp_vendor_rate');
      $('[id="emp_ctc"]').attr('name', 'emp_ctc');
      $('[id="remarks"]').attr('name', 'remarks');
      $('[id="advance"]').attr('name', 'advance');
      $('[id="recovery"]').attr('name', 'recovery');
      $('[id="overtime_rate"]').attr('name', 'overtime_rate');
      $('[id="total_working_hrs"]').attr('name', 'total_working_hrs');
    }
    // $('input:checkbox').not(this).attr('checked','checked');
  });
