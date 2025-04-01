$('[name="check[]"]').change(function() {
    var submitButton = $('#btn-attendance');
    if ($(this).is(':checked')) {
        var checked = $(this).parent().parent();
        submitButton.prop('disabled', false);
      //  console.log(checked.children().eq(0).attr('name'));
      checked.children().eq(2).attr('name', 'sal_emp_email_check[]');
      checked.children().eq(3).attr('name', 'sa_emp_doj_check[]');
      checked.children().eq(4).attr('name', 'sa_emp_dor_check[]');
      checked.children().eq(5).attr('name', 'sal_emp_name_check[]');
      checked.children().eq(6).attr('name', 'sal_emp_designation_check[]');
      checked.children().eq(7).attr('name', 'sal_ctc_check[]');
      checked.children().eq(8).attr('name', 'sal_gross_check[]');
      checked.children().eq(9).attr('name', 'sal_net_check[]');
      checked.children().eq(10).attr('name', 'sal_basic_check[]');
      checked.children().eq(11).attr('name', 'sal_hra_check[]');
      checked.children().eq(12).attr('name', 'sal_da_check[]');
      checked.children().eq(13).attr('name', 'sal_conveyance_check[]');
      checked.children().eq(14).attr('name', 'medical_allowance_check[]');
      checked.children().eq(15).attr('name', 'sal_grade_pay_check[]');
      checked.children().eq(16).attr('name', 'sal_special_allowance_check[]');
      checked.children().eq(17).attr('name', 'sal_pf_employee_check[]');
      checked.children().eq(18).attr('name', 'sal_esi_employee_check[]');
      checked.children().eq(19).attr('name', 'sal_tax_check[]');
      checked.children().eq(20).attr('name', 'emp_designation_check[]');
      checked.children().eq(21).attr('name', 'emp_pan_check[]');
      checked.children().eq(22).attr('name', 'emp_aadhaar_no_check[]');
      checked.children().eq(23).attr('name', 'emp_account_no_check[]');
      checked.children().eq(24).attr('name', 'emp_bank_check[]');
      checked.children().eq(25).attr('name', 'emp_pf_no_check[]');
      checked.children().eq(26).attr('name', 'emp_esi_no_check[]');
      checked.children().eq(27).attr('name', 'emp_code_check[]');
      checked.children().eq(28).attr('name', 'tds_deduction_check[]');
      checked.children().eq(32).children().attr('name', 'at_appr_leave_check[]');
      checked.children().eq(33).children().attr('name', 'lwp_leave_check[]');
      checked.children().eq(40).children().attr('name', 'remarks_check[]');
      checked.children().eq(41).children().attr('name', 'advance_check[]');
      checked.children().eq(42).children().attr('name', 'recovery_check[]');
      checked.children().eq(43).children().attr('name', 'overtime_rate_check[]');
      checked.children().eq(44).children().attr('name', 'total_working_hrs_check[]');
      checked.children().eq(45).attr('name', 'emp_medical_insurance_check[]');
      checked.children().eq(46).attr('name', 'emp_accidental_insurance_check[]');
      checked.children().eq(47).attr('name', 'emp_pf_wages_check[]');
      checked.children().eq(48).attr('name', 'emp_esi_wages_check[]');
      checked.children().eq(49).attr('name', 'medical_insurance_ctc_check[]');
      checked.children().eq(50).attr('name', 'accident_insurance_ctc_check[]');
      $('#total_checked').html(parseInt($('#total_checked').html()) + 1);
    } else {
      var checked = $(this).parent().parent();
      submitButton.prop('disabled', true);
      checked.children().eq(2).attr('name', 'sal_emp_email');
      checked.children().eq(3).attr('name', 'sa_emp_doj');
      checked.children().eq(4).attr('name', 'sa_emp_dor');
      checked.children().eq(5).attr('name', 'sal_emp_name');
      checked.children().eq(6).attr('name', 'sal_emp_designation');
      checked.children().eq(7).attr('name', 'sal_ctc');
      checked.children().eq(8).attr('name', 'sal_gross');
      checked.children().eq(9).attr('name', 'sal_net');
      checked.children().eq(10).attr('name', 'sal_basic');
      checked.children().eq(11).attr('name', 'sal_hra');
      checked.children().eq(12).attr('name', 'sal_da');
      checked.children().eq(13).attr('name', 'sal_conveyance');
      checked.children().eq(14).attr('name', 'medical_allowance');
      checked.children().eq(15).attr('name', 'sal_grade_pay');
      checked.children().eq(16).attr('name', 'sal_special_allowance');
      checked.children().eq(17).attr('name', 'sal_pf_employee');
      checked.children().eq(18).attr('name', 'sal_esi_employee');
      checked.children().eq(19).attr('name', 'sal_tax');
      checked.children().eq(20).attr('name', 'emp_designation');
      checked.children().eq(21).attr('name', 'emp_pan');
      checked.children().eq(22).attr('name', 'emp_aadhaar_no');
      checked.children().eq(23).attr('name', 'emp_account_no');
      checked.children().eq(24).attr('name', 'emp_bank');
      checked.children().eq(25).attr('name', 'emp_pf_no');
      checked.children().eq(26).attr('name', 'emp_esi_no');
      checked.children().eq(27).attr('name', 'emp_code');
      checked.children().eq(28).attr('name', 'tds_deduction');
      checked.children().eq(32).children().attr('name', 'at_appr_leave');
      checked.children().eq(33).children().attr('name', 'lwp_leave');
      checked.children().eq(40).children().attr('name', 'remarks');
      checked.children().eq(41).children().attr('name', 'advance');
      checked.children().eq(42).children().attr('name', 'recovery');
      checked.children().eq(43).children().attr('name', 'overtime_rate');
      checked.children().eq(44).children().attr('name', 'total_working_hrs');
      checked.children().eq(45).attr('name', 'emp_medical_insurance');
      checked.children().eq(46).attr('name', 'emp_accidental_insurance');
      checked.children().eq(47).attr('name', 'emp_pf_wages');
      checked.children().eq(48).attr('name', 'emp_esi_wages');
      checked.children().eq(49).attr('name', 'medical_insurance_ctc');
      checked.children().eq(50).attr('name', 'accident_insurance_ctc');
      $('#total_checked').html(parseInt($('#total_checked').html()) - 1);
    }
  });

  $("#all").click(function() {
    var submitButton = $('#btn-attendance');
    $('input:checkbox').not(this).prop('checked', this.checked);
    if ($(this).is(':checked')) {
       submitButton.prop('disabled', false);
      $('input[name="sal_emp_email"]').attr('name', 'sal_emp_email_check[]');
      $('input[name="sa_emp_doj"]').attr('name', 'sa_emp_doj_check[]');
      $('input[name="sa_emp_dor"]').attr('name', 'sa_emp_dor_check[]');
      $('input[name="sal_emp_name"]').attr('name', 'sal_emp_name_check[]');
      $('input[name="sal_emp_designation"]').attr('name', 'sal_emp_designation_check[]');
      $('input[name="sal_ctc"]').attr('name', 'sal_ctc_check[]');
      $('input[name="sal_gross"]').attr('name', 'sal_gross_check[]');
      $('input[name="sal_net"]').attr('name', 'sal_net_check[]');
      $('input[name="sal_basic"]').attr('name', 'sal_basic_check[]');
      $('input[name="sal_hra"]').attr('name', 'sal_hra_check[]');
      $('input[name="sal_da"]').attr('name', 'sal_da_check[]');
      $('input[name="sal_conveyance"]').attr('name', 'sal_conveyance_check[]');
      $('input[name="medical_allowance"]').attr('name', 'medical_allowance_check[]');
      $('input[name="sal_grade_pay"]').attr('name', 'sal_grade_pay_check[]');
      $('input[name="sal_special_allowance"]').attr('name', 'sal_special_allowance_check[]');
      $('input[name="sal_pf_employee"]').attr('name', 'sal_pf_employee_check[]');
      $('input[name="sal_esi_employee"]').attr('name', 'sal_esi_employee_check[]');
      $('input[name="sal_tax"]').attr('name', 'sal_tax_check[]');
      $('input[name="emp_designation"]').attr('name', 'emp_designation_check[]');
      $('input[name="emp_pan"]').attr('name', 'emp_pan_check[]');
      $('input[name="emp_aadhaar_no"]').attr('name', 'emp_aadhaar_no_check[]');
      $('input[name="emp_account_no"]').attr('name', 'emp_account_no_check[]');
      $('input[name="emp_bank"]').attr('name', 'emp_bank_check[]');
      $('input[name="emp_pf_no"]').attr('name', 'emp_pf_no_check[]');
      $('input[name="emp_esi_no"]').attr('name', 'emp_esi_no_check[]');
      $('input[name="emp_code"]').attr('name', 'emp_code_check[]');
      $('input[name="tds_deduction"]').attr('name', 'tds_deduction_check[]');
      $('input[name="at_appr_leave"]').attr('name', 'at_appr_leave_check[]');
      $('input[name="lwp_leave"]').attr('name', 'lwp_leave_check[]');

      
      $('input[name="remarks"]').attr('name', 'remarks_check[]');
      $('input[name="advance"]').attr('name', 'advance_check[]');
      $('input[name="recovery"]').attr('name', 'recovery_check[]');
      $('input[name="overtime_rate"]').attr('name', 'overtime_rate_check[]');
      $('input[name="total_working_hrs"]').attr('name', 'total_working_hrs_check[]');

      $('input[name="emp_medical_insurance"]').attr('name', 'emp_medical_insurance_check[]');
      $('input[name="emp_accidental_insurance"]').attr('name', 'emp_accidental_insurance_check[]');
      $('input[name="emp_pf_wages"]').attr('name', 'emp_pf_wages_check[]');
      $('input[name="emp_esi_wages"]').attr('name', 'emp_esi_wages_check[]');
      $('input[name="medical_insurance_ctc"]').attr('name', 'medical_insurance_ctc_check[]');
      $('input[name="accident_insurance_ctc"]').attr('name', 'accident_insurance_ctc_check[]');

      var checkboxes = $('input:checkbox').not(this).prop('checked', this.checked).length;
      if (checkboxes != 0) {
        $('#total_checked').html(checkboxes);
      }
    } else {
        submitButton.prop('disabled', true);
      $('input[name="sal_emp_email"]').attr('name', 'sal_emp_email');
      $('input[name="sa_emp_doj_check[]"]').attr('name', 'sa_emp_doj');
      $('input[name="sa_emp_dor_check[]"]').attr('name', 'sa_emp_dor');
      $('input[name="sal_emp_name_check[]"]').attr('name', 'sal_emp_name');
      $('input[name="sal_emp_designation_check[]"]').attr('name', 'sal_emp_designation');
      $('input[name="sal_ctc_check[]"]').attr('name', 'sal_ctc');
      $('input[name="sal_gross_check[]"]').attr('name', 'sal_gross');
      $('input[name="sal_net_check[]"]').attr('name', 'sal_net');
      $('input[name="sal_basic_check[]"]').attr('name', 'sal_basic');
      $('input[name="sal_hra_check[]"]').attr('name', 'sal_hra');
      $('input[name="sal_da_check[]"]').attr('name', 'sal_da');
      $('input[name="sal_conveyance_check[]"]').attr('name', 'sal_conveyance');
      $('input[name="medical_allowance_check[]"]').attr('name', 'medical_allowance');
      $('input[name="sal_grade_pay_check[]"]').attr('name', 'sal_grade_pay');
      $('input[name="sal_special_allowance_check[]"]').attr('name', 'sal_special_allowance');
      $('input[name="sal_pf_employee_check[]"]').attr('name', 'sal_pf_employee');
      $('input[name="sal_esi_employee_check[]"]').attr('name', 'sal_esi_employee');
      $('input[name="sal_tax_check[]"]').attr('name', 'sal_tax');
      $('input[name="emp_designation_check[]"]').attr('name', 'emp_designation');
      $('input[name="emp_pan_check[]"]').attr('name', 'emp_pan');
      $('input[name="emp_aadhaar_no_check[]"]').attr('name', 'emp_aadhaar_no');
      $('input[name="emp_account_no_check[]"]').attr('name', 'emp_account_no');
      $('input[name="emp_bank_check[]"]').attr('name', 'emp_bank');
      $('input[name="emp_pf_no_check[]"]').attr('name', 'emp_pf_no');
      $('input[name="emp_esi_no_check[]"]').attr('name', 'emp_esi_no');
      $('input[name="emp_code_check[]"]').attr('name', 'emp_code');
      $('input[name="tds_deduction_check[]"]').attr('name', 'tds_deduction');
      $('input[name="at_appr_leave_check[]"]').attr('name', 'at_appr_leave');
      $('input[name="lwp_leave_check[]"]').attr('name', 'lwp_leave');

      
      $('input[name="remarks_check[]"]').attr('name', 'remarks');
      $('input[name="advance_check[]"]').attr('name', 'advance');
      $('input[name="recovery_check[]"]').attr('name', 'recovery');
      $('input[name="overtime_rate_check[]"]').attr('name', 'overtime_rate');
      $('input[name="total_working_hrs_check[]"]').attr('name', 'total_working_hrs');
      
      $('input[name="emp_medical_insurance_check[]"]').attr('name', 'emp_medical_insurance');
      $('input[name="emp_accidental_insurance_check[]"]').attr('name', 'emp_accidental_insurance');
      $('input[name="emp_pf_wages_check[]"]').attr('name', 'emp_pf_wages');
      $('input[name="emp_esi_wages_check[]"]').attr('name', 'emp_esi_wages');
      $('input[name="medical_insurance_ctc_check[]"]').attr('name', 'medical_insurance_ctc');
      $('input[name="accident_insurance_ctc_check[]"]').attr('name', 'accident_insurance_ctc');
      $('#total_checked').html("0");
    }

  });