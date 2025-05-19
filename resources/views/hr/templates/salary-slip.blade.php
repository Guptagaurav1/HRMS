<div class="row">
    <div class="col-sm-12">
        <img src="{{public_path('assets/images/PrakharNEWLogo.png')}}" alt="PSSPL" style="height:50px; width:100px">
        <h1 class="mainTitle">Prakhar Software Solutions Ltd.</h1>
        <p>C - 11, LGF, Opp. State Bank of India, Malviya Nagar New Delhi - 110017</p>
        <span class="mainDescription"><u>Pay Slip</u></span>
    </div>
</div>

<div class="col-md-12 margin-top-30">
    <table width="100%" class="table table-condensed">
        <tr>
            <td><b>Employee Id</b></td>
            <td>{{$sal_emp_code}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Date Of Joining</b></td>
            <td>{{$sal_doj}}</td>
        </tr>
        <tr>
            <td><b>Employee Name</b></td>
            <td>{{$sal_emp_name}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Salary Month</b></td>
            <td>{{$sal_month}}</td>
        </tr>
        <tr>
            <td><b>UAN No.</b></td>
            <td>{{$sal_uan_no}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Days Worked</b></td>
            <td>{{$sal_working_days}}</td>
        </tr>
        <tr>
            <td><b>ESI Number</b></td>
            <td>{{$sal_esi_number}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Aadhaar No.</b></td>
            <td>{{$sal_aadhar_no}}</td>

        </tr>
        <tr>
            <td><b>PAN No.</b></td>
            <td>{{$sal_pan_no}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Bank Name</b></td>
            <td>{{$sal_bank_name}}</td>
        </tr>
        <tr>
            <td><b>Designation</b></td>
            <td>{{$sal_designation}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Account No.</b></td>
            <td>{{$sal_account_no}}</td>
        </tr>


    </table>
</div>
<hr>
<div class="col-md-12 margin-top-30 ">
    <table width="100%" class="table table-condensed">
        <tr>
            <td><b>Earning</b></td>
            <td><b>Amount</b></td>

            <td><b>Deduction</b></td>
            <td><b>Amount</b></td>
        </tr>
        <tr>
            <td>Basic Pay</td>
            <td>{{$sal_basic}}</td>

            <td>Provident Fund</td>
            <td>{{$sal_pf_employee}}</td>
        </tr>
        <tr>
            <td>HRA</td>
            <td>{{$sal_hra}}</td>

            <td>Employee State Insurance</td>
            <td>{{$sal_esi_employee}}</td>
        </tr>
        <tr>
            <td>Conveyance</td>
            <td>{{$sal_conveyance}}</td>
            <td>Medical Insurance</td>
            <td>{{$sal_medical_insurance}}</td>
        </tr>
        <tr>
            <td>Medical Allowance</td>
            <td>{{$sal_medical_allowance}}</td>
            <td>Accident Insurance</td>
            <td>{{$sal_accident_insurance}}</td>
        </tr>
        <tr>
            <td>Special Allowance</td>
            <td>{{$sal_special_allowance}}</td>
            <td>TDS</td>
            <td>{{$tds_deduction}}</td>
        </tr>


        <tr>
            <td>Extra Working Allowance</td>
            <td>{{$total_overtime_allowance}}</td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>Gross Salary (Rounded)</td>
            <td><strong>{{$sal_gross}}</strong></td>
            <td>Tax</td>
            <td>{{$sal_tax}}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Total Deduction (Rounded)</td>
            <td><strong>{{$sal_total_deduction}}</strong></td>

        </tr>
        <tr>
            <td>Net Salary (Rounded)</td>
            <td colspan="3"><strong>{{$sal_net}}</strong></td>

        </tr>
    </table>
</div>
<div class="col-md-12" style="margin-top:80px">
    <div class="pull-left">
        <p>Computer generated payslip, No signature required </p>
    </div>

</div>
