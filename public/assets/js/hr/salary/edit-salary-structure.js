$(document).ready(function() {
   
    $('#emp_id').change(function(e) {
    var emp_id = document.getElementById("emp_id").value;
    
    $.ajax({
        // url: '{{ route("emp-data", ":id") }}'.replace(':id', emp_id),
        url :SITE_URL +"/hr/invoice-billling/emp-data/"+ emp_id,
        type: 'GET',
        success: function(response) {
                let emp_code =response.data.emp_code;
                let emp_name =response.data.emp_name;
                let emp_doj =response.data.emp_doj;
                let emp_designation =response.data.emp_designation;
                let emp_salary =response.data.emp_salary;

            
                $('#sal_emp_name').val(emp_name);
                $('#sal_emp_code').val(emp_code);
                $('#sal_emp_doj').val(emp_doj);
                $('#sal_emp_designation').val(emp_designation);
                $('#sal_emp_ctc').val(emp_salary);
            },
            error: function(xhr, status, error) {
                console.log("Error:", error);
            }
    });
    });
});



function cal_gross() {   
    
        //calculate gross
    var basic = parseInt(document.getElementById('sal_basic').value); 

    var hra = parseInt(document.getElementById('sal_hra').value);
    var da = parseInt(document.getElementById('sal_da').value);
    var medical = parseInt(document.getElementById('medical_allowance').value);
    var conveyence = parseInt(document.getElementById('sal_conveyance').value);
    var telephone = parseInt(document.getElementById('sal_telephone').value);
    var uniform = parseInt(document.getElementById('sal_uniform').value);
    var school_fee = parseInt(document.getElementById('sal_school_fee').value);
    var car = parseInt(document.getElementById('sal_car_allow').value);
    var grade_pay = parseInt(document.getElementById('sal_grade_pay').value);
    var special_allowance = parseInt(document.getElementById('sal_special_allowance').value);
    //end
    if(!hra){
    hra = 0;
    }
    if(!da){
    da = 0;
    }
    if(!medical){
    medical = 0;
    }
    if(!conveyence){
    conveyence = 0;
    }
    if(!telephone){
    telephone = 0;
    }
    if(!uniform){
    uniform = 0;
    }
    if(!school_fee){
    school_fee = 0;
    }
    if(!car){
    car = 0;
    }
    if(!grade_pay){
    grade_pay = 0;
    }
    if(!special_allowance){
    special_allowance = 0;
    }

    //calculate Employer Contribution
    var pf_employer = parseInt(document.getElementById('sal_pf_employer').value);
    var esic_employer = parseInt(document.getElementById('sal_esi_employer').value);
    var lwf_employer = parseInt(document.getElementById('sal_lwf_employer').value);

    if(document.getElementById("opt_pf").value=="yes"){
    
    var employee_pf = basic / 100 * 12;
    employee_pf = Math.ceil(employee_pf);
    var employer_pf = basic / 100 * 13;
    employer_pf = employer_pf = Math.round(employer_pf);
    var special_case_pf = document.getElementById('exception_pf');

    if (employee_pf > 1800) {
        document.getElementById("sal_pf").value = 1800;
    } else {
        document.getElementById("sal_pf").value = employee_pf;
    }

    if (employer_pf > 1950) {
        document.getElementById("sal_pf_employer").value = 1950;
    } else {
        document.getElementById("sal_pf_employer").value = employer_pf;
    }
    if(special_case_pf.checked == true){
        document.getElementById("sal_pf_employer").value = employer_pf;
        document.getElementById("sal_pf").value = employee_pf;
    }
    }
    
    if(!pf_employer){
    pf_employer = 0;
    }
    // if(!esic_employer){
    esic_employer = 0;
    // }
    if(!lwf_employer){
    lwf_employer = 0;
    }

    var employer_contribution = pf_employer + esic_employer + lwf_employer;
    
    //calculate gross
    var gross = basic + hra + da + medical + conveyence + telephone + uniform + school_fee + car + grade_pay + special_allowance;
    document.getElementById("sal_gross").value = gross;
    
    //end

    //Employee Contribution
    var pf_employee = parseInt(document.getElementById('sal_pf').value);
    var esic_employee = parseInt(document.getElementById('sal_esi').value);
    var lwf_employee = parseInt(document.getElementById('sal_lwf').value);
    var sal_tax = parseInt(document.getElementById('sal_prof_tax').value)
    if(!pf_employee){
    pf_employee = 0;
    }
    if(!esic_employee){
    esic_employee = 0;
    }
    if(!lwf_employee){
    lwf_employee = 0;
    }
    if(!sal_tax){
    sal_tax = 0;
    }
    var emp_contri = pf_employee+esic_employee+lwf_employee+sal_tax;
    
    // console.log(emp_contri);
    
    if(document.getElementById("opt_esi").value=="yes"){
    var esic_employer_amount = gross / 100 * 3.25;
    // console.log("Employer esi="+esic_employer_amount);
    esic_employer_amount = Math.round(esic_employer_amount);
    var esic_employee_amount = gross / 100 * 0.75;
    // console.log("Employee esi="+esic_employee_amount);
    // console.log("gross="+gross+" esi="+esic_employee_amount);
    esic_employee_amount = Math.round(esic_employee_amount);
    var special_case_esi = document.getElementById('exception_esi');

    if(gross>21000){
        document.getElementById("sal_esi_employer").value = 0;
        document.getElementById("sal_esi").value = 0;
    }
    else{
        document.getElementById("sal_esi_employer").value = esic_employer_amount;
        document.getElementById("sal_esi").value = esic_employee_amount;
    }
    
    if(special_case_esi.checked == true){
        document.getElementById("sal_esi_employer").value = esic_employer_amount;
        document.getElementById("sal_esi").value = esic_employee_amount;
    }

    var emp_pf = parseInt(document.getElementById("sal_pf_employer").value);
    document.getElementById("sal_gross").value = gross-esic_employer_amount-emp_pf;
    net_salary = gross-esic_employer_amount-emp_pf-emp_contri;
    document.getElementById("sal_net").value = net_salary;
    }
    else{
    //Calculate Net Salary
        
    net_salary = gross;
    document.getElementById("sal_net").value = net_salary;
    }

    var medical_ins = parseInt(document.getElementById('medical_ins').value);
    var accident_ins = parseInt(document.getElementById('accident_ins').value);
    var tds_deduction = parseInt(document.getElementById('tds_deduction').value);
    if(!tds_deduction){
    tds_deduction = 0;
    }
    var sal_emp_ctc = parseInt(document.getElementById('sal_emp_ctc').value);
    if(document.getElementById("opt_pf").value=="no"){
    document.getElementById("sal_gross").value = sal_emp_ctc - parseInt(document.getElementById("sal_esi_employer").value);
    var new_gross = parseInt(document.getElementById('sal_gross').value);
    var emp_pf = parseInt(document.getElementById('sal_pf').value);
    var emp_esi = parseInt(document.getElementById("sal_esi").value);

    document.getElementById("sal_net").value =  new_gross - emp_contri - tds_deduction - medical_ins - accident_ins;
    }
    else{
    document.getElementById("sal_gross").value = sal_emp_ctc - parseInt(document.getElementById('sal_pf_employer').value) - parseInt(document.getElementById("sal_esi_employer").value);
    var new_gross = parseInt(document.getElementById('sal_gross').value);
    var emp_pf = parseInt(document.getElementById('sal_pf').value);
    var emp_esi = parseInt(document.getElementById("sal_esi").value);
    
    document.getElementById("sal_net").value =  new_gross - emp_contri - tds_deduction - medical_ins - accident_ins;
    }
    //calculate Employer Contribution
    var pf_employer = parseInt(document.getElementById('sal_pf_employer').value);
    var esic_employer = parseInt(document.getElementById('sal_esi_employer').value);
    var lwf_employer = parseInt(document.getElementById('sal_lwf_employer').value);
    var medical_insurance_ctc = parseInt(document.getElementById('medical_insurance_ctc').value);
    var accident_insurance_ctc = parseInt(document.getElementById('accident_insurance_ctc').value);
    if(!medical_insurance_ctc){
    medical_insurance_ctc = 0;
    }
    if(!accident_insurance_ctc){
    accident_insurance_ctc = 0;
    } 
    var employer_contribution = pf_employer + esic_employer + lwf_employer;
    document.getElementById("sal_gross").value = gross;
    var emp_pf = parseInt(document.getElementById('sal_pf').value);
    var emp_esi = parseInt(document.getElementById("sal_esi").value);
    emp_contri = emp_pf + emp_esi + lwf_employee + sal_tax;
    document.getElementById("sal_net").value = gross - emp_contri - tds_deduction - medical_ins - accident_ins;
    
    document.getElementById("new_ctc").value =  parseInt(document.getElementById('sal_emp_ctc').value) - accident_insurance_ctc - medical_insurance_ctc; 
}


//   Employee for pf
document.getElementById("opt_pf").onchange = function() {

    if (this.value == 'no' || this.value == '') {
    document.getElementById("sal_pf_employer").value = 0;
    document.getElementById("sal_pf").value = 0;
    document.getElementById("pf_no_field").style.display="none";
    cal_gross();
    }
    if (this.value == 'yes') {
    document.getElementById("pf_no_field").style.display="block";
    cal_gross();

    }
};

// employee esi 
document.getElementById("opt_esi").onchange = function() {

    if (this.value == 'no' || this.value == '') {
    document.getElementById("sal_esi_employer").value = 0;
    document.getElementById("sal_esi").value = 0;
    document.getElementById("esi_no_field").style.display="none";
    cal_gross();
    }
    if (this.value == 'yes') {
    document.getElementById("esi_no_field").style.display="block";
    cal_gross();
    }
};