
@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection
@section('contents')
    <div class="">
        <h2>Generate Employee</h2>
        <h5>Create Employee details</h5>

        
    </div>
    <div class="dashboard-breadcrumb mb-25">
        
        <div class="d-flex gap-2 justify-items-center align-items-center">
            <input type="radio" class="tab-links active" id="html" name="fav_language" value="HTML" data-tab="1">
            <label for="html">Single Entry</label><br>
            <input type="radio" class="tab-links" id="html1" name="fav_language" value="HTML" data-tab="2">
            <label for="html">Bulk Entry</label><br>
        </div>
    </div>

    <div class="panel" id="tab-1">

        <div class="employee-tab">
            <ul class="d-flex align-items-center justify-content-between  flex-wrap">
              <li>
                <button type="button" class="tab-btn active" id="tab1">Employee Details</button>
              </li>
              <li>
                <button type="button" class="tab-btn" id="tab2">Communication Details</button>
              </li>
              <li>
                <button type="button" class="tab-btn" id="tab3">Bank Details</button>
              </li>
              <li>
                <button type="button" class="tab-btn" id="tab4">Educational Details</button>
              </li>
              <li>
                <button type="button" class="tab-btn" id="tab5">Others Details</button>
              </li>
            </ul>
        </div>
          
        
          <div class="tab-content active" id="content1">
            <div class="row g-3">
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label" class="text-dark">Work Order Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Work Order Number">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label" class="text-dark">Employee Code <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Employee Code">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label" class="text-dark">Employee Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Employee Name">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label" class="text-dark">Gender <span class="text-danger">*</span></label>
                    <select id="inputState" class="form-select">
                        <option value=""> Select Gender</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Others</option>
                    </select>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Category  <span class="text-danger">*</span></label>
                    <select id="inputState" class="form-select">
                        <option value="">Select Category</option>
                        <option value="0">Shift 1</option>
                        <option value="1">Shift 2</option>
                        <option value="2">Shift 3</option>
                    </select>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label for="inputDate" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="inputDate">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Date Of Joining <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="inputDate">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Posting Place </label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter your Place">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Highest Qualification <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Highest Qualification">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Designation <span class="text-danger">*</span></label>
                    <select id="inputState" class="form-select">
                        <option value="">Select Designation</option>
                        <option value="0">Shift 1</option>
                        <option value="1">Shift 2</option>
                        <option value="2">Shift 3</option>
                    </select>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Department <span class="text-danger">*</span></label>
                    <select id="inputState" class="form-select">
                        <option value="">Select Department</option>
                        <option value="0">Shift 1</option>
                        <option value="1">Shift 2</option>
                        <option value="2">Shift 3</option>
                    </select>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Vendor Rate (Rs)</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Vendor Rate">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Salary / CTC(Per Month)</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter CTC">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Total Experience <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Experience">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Contact(Personal) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Contact Number">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Email(Personal)<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Email">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Contact (Office) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Office Contact Number">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Email (Office) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Office Email">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Guardian Name(Parents/Others) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Guardian Name">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Guardian(Parents/Others) Contact No.<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Guardian Contact Number">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Blood Group <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Martial Status<span class="text-danger">*</span></label>
                    <select id="inputState" class="form-select">
                        <option value="">Select Martial Status</option>
                        <option value="0">Shift 1</option>
                        <option value="1">Shift 2</option>
                        <option value="2">Shift 3</option>
                    </select>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Date Of Marriage <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="inputDate">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">No Of Children <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Spouse Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Functional Role<span class="text-danger">*</span></label>
                        <select id="inputState" class="form-select">
                            <option value="">Select Functional Role</option>
                            <option value="0">Shift 1</option>
                            <option value="1">Shift 2</option>
                            <option value="2">Shift 3</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Select Some Skills<span class="text-danger">*</span></label>
                        <select id="inputState" class="form-select">
                            <option value="">Select Some Skills</option>
                            <option value="0">Shift 1</option>
                            <option value="1">Shift 2</option>
                            <option value="2">Shift 3</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="formFileSm" class="form-label">Upload Resume</label>
                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                    </div>
                </div>
               
                
                

            </div>
          </div>
          <div class="tab-content" id="content2">
            <div class="row g-3">
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label for="exampleTextarea" class="form-label">Permanent Address</label>
                    <textarea class="form-control" id="exampleTextarea" placeholder="Enter Permanent Address"></textarea>
                </div>
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label for="exampleTextarea" class="form-label">Correspondence Address <span><input class="form-check-input" type="checkbox" id="inlineFormCheck"></span>Same as permanent</label>
                    <textarea class="form-control" id="exampleTextarea" placeholder="Enter Correspondence Address"></textarea>
                </div>
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label class="form-label">Police Verification Id <span style="color: red">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Police Verification ID">
                </div>
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label for="formFile" class="form-label">Police Verification Attachment</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
            </div>
          </div>
          <div class="tab-content" id="content3">
            <div class="row g-3">
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Bank Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Bank Name">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Bank Branch Name <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control form-control-sm" placeholder="Enter Branch Name">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Bank Account Number <span class="text-danger">*</span></label>
                    <input type="number" class="form-control form-control-sm" placeholder="Enter Bank Account Number">
                </div>
                
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">IFSC Code <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter IFSC Code">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Aadhar Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Aadhar Number">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">PAN Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter PAN Number">
                </div>
                
            </div>
          </div>
          <div class="tab-content" id="content4">
            <div class="row g-3">
                
                
                <div class="card mb-20">
                    <div class="card-header">
                        10th Qualification
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">10th Passing Year <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Percentage/Grade</label>
                                <input type="number" class="form-control form-control-sm">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Board Name</label>
                                <input type="number" class="form-control form-control-sm">
                                
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="card mb-20">
                    <div class="card-header">
                        12th Qualification
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">12th Passing Year <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Percentage/Grade</label>
                                <input type="number" class="form-control form-control-sm">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Board Name</label>
                                <input type="number" class="form-control form-control-sm">
                                
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="card mb-20">
                    <div class="card-header">
                        Graduation
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Passing Year/Persuing <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Percentage/Grade</label>
                                <input type="number" class="form-control form-control-sm">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Mode Of Graduation</label>
                                <input type="number" class="form-control form-control-sm">
                                
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Degree Name</label>
                                <input type="number" class="form-control form-control-sm" placeholder="Enter Degree Name">
                                
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Degree In (Stream Name)</label>
                                <input type="number" class="form-control form-control-sm" placeholder="Enter Degree Stream">
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="card mb-20">
                    <div class="card-header">
                        Post Graduation
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Passing Year/Persuing <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Passing Year">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Percentage/Grade</label>
                                <input type="number" class="form-control form-control-sm" placeholder="Enter Percentage">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Mode Of Graduation</label>
                                <input type="number" class="form-control form-control-sm" placeholder="Enter Mode of Graduation">
                                
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Degree Name</label>
                                <input type="number" class="form-control form-control-sm" placeholder="Enter Degree Name">
                                
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Degree In (Stream Name)</label>
                                <input type="number" class="form-control form-control-sm" placeholder="Enter Degree Stream"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="tab-content" id="content5">
            <div class="row g-3">
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label class="form-label">PF UAN No</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter PF UAN Number">
                </div>
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label class="form-label">ESI No</label>
                    <input type="tel" class="form-control form-control-sm" placeholder="Enter ESI Number">
                </div>
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label class="form-label">Passport No</label>
                    <input type="tel" class="form-control form-control-sm" placeholder="Enter Passport Number">
                </div>
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label for="formFile" class="form-label">Upload Passport Document</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label class="form-label">Current Working Status</label>
                    <select id="inputState" class="form-select">
                        <option value="">Select Status</option>
                        <option value="0">Active</option>
                        <option value="1">Deactive</option>
                    </select>
                </div>
               
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                  
                    <label class="form-label">Date Of Resigning</label>
                        <input type="date" class="form-control" id="inputDate">
                    

                   
                </div>
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label for="exampleTextarea" class="form-label">Remarks</label>
                        <textarea class="form-control" id="exampleTextarea" placeholder="Enter Remarks"></textarea>

                    
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <label class="form-label">Reporting Email</label>
                        <select id="inputState" class="form-select">
                            <option selected>Not Specify</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                        </select>
                        
                    </div>

                </div>
               
                
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-sm btn-primary"> Submit <i class="fa-solid fa-arrow-right"></i></button>
            </div>

          </div>
        
        
    </div>


    

        <div class="panel" id="tab-2" style="display: none">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h5 class="text-dark text-white">Bulk Upload Employee</h5>
                        <div class="btn-box">
                            <a href="{{route('employee-list')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-download"></i> Download CSV Format</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-8 col-sm-6">
                                <label for="formFileSm" class="form-label">Select CSV File<span class="text-danger"> *</span></label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end px-2">
                <button class="btn btn-sm btn-primary mb-2"> <i class="fa-solid fa-upload"></i> Upload CSV</button>
            </div>
       </div> 
    



@endsection


@section('script')
<script src="{{asset('assets/js/employeeTab.js')}}"></script>

@endsection

    









  
    
    


