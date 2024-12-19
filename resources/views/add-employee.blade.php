
@extends('layouts.master')

<div class="main-content">
    <div class="dashboard-breadcrumb mb-25">
        <h2>Add Employee</h2>
        <div class="btn-box">
            <a href="{{route('employee-list')}}" class="btn btn-sm btn-primary">Employee List</a>
        </div>
    </div>
    <div class="dashboard-breadcrumb mb-25">
        
        <div class="d-flex gap-2 justify-items-center align-items-center">
            <input type="radio" id="html" name="fav_language" value="HTML">
            <label for="html">Single Entry</label><br>
            <input type="radio" id="html" name="fav_language" value="HTML">
            <label for="html">Bulk Entry</label><br>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>Employee Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Work Order Number <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Employee Code <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Employee Name <span style="color: red">*</span></label>
                            <input type="email" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Gender <span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value=""> Select Gender</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                                <option value="2">Others</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Category  <span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value="">Select Category</option>
                                <option value="0">Shift 1</option>
                                <option value="1">Shift 2</option>
                                <option value="2">Shift 3</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="inputDate" class="form-label">Date of Birth <span style="color: red">*</span></label>
                            <input type="date" class="form-control" id="inputDate">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Date Of Joining <span style="color: red">*</span></label>
                            <input type="date" class="form-control" id="inputDate">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Posting Place </label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Highest Qualification <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Designation <span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value="">Select Designation</option>
                                <option value="0">Shift 1</option>
                                <option value="1">Shift 2</option>
                                <option value="2">Shift 3</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Department <span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value="">Select Department</option>
                                <option value="0">Shift 1</option>
                                <option value="1">Shift 2</option>
                                <option value="2">Shift 3</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Vendor Rate (Rs)</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Salary / CTC(Per Month)</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Total Experience <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Contact(Personal) <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Email(Personal)<span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Contact (Office) <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Email (Office) <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Guardian Name(Parents/Others) <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Guardian(Parents/Others) Contact No.<span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Blood Group <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Martial Status<span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value="">Select Martial Status</option>
                                <option value="0">Shift 1</option>
                                <option value="1">Shift 2</option>
                                <option value="2">Shift 3</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Date Of Marriage <span style="color: red">*</span></label>
                            <input type="date" class="form-control" id="inputDate">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">No Of Children <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Spouse Name <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Functional Role<span style="color: red">*</span></label>
                                <select id="inputState" class="form-select">
                                    <option value="">Select Functional Role</option>
                                    <option value="0">Shift 1</option>
                                    <option value="1">Shift 2</option>
                                    <option value="2">Shift 3</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Select Some Skills<span style="color: red">*</span></label>
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
            </div>
        </div>
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>Communication Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label for="exampleTextarea" class="form-label">Permanent Address</label>
                            <textarea class="form-control" id="exampleTextarea"></textarea>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label for="exampleTextarea" class="form-label">Correspondence Address <span><input class="form-check-input" type="checkbox" id="inlineFormCheck"></span>Same as permanent</label>
                            <textarea class="form-control" id="exampleTextarea"></textarea>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Police Verification Id <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label for="formFile" class="form-label">Police Verification Attachment</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>Banking Account Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Bank Name <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Bank Branch Name <span style="color: red">*</span></label>
                            <input type="tel" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Bank Account Number <span style="color: red">*</span></label>
                            <input type="number" class="form-control form-control-sm">
                        </div>
                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">IFSC Code <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Aadhar Number <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">PAN Number <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>Educational Qualification</h5>
                </div>
                
                <div class="card mb-20">
                    <div class="card-header">
                        10th Qualification
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">10th Passing Year <span style="color: red">*</span></label>
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
                                <label class="form-label">12th Passing Year <span style="color: red">*</span></label>
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
                                <label class="form-label">Passing Year/Persuing <span style="color: red">*</span></label>
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
                                <input type="number" class="form-control form-control-sm">
                                
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Degree In (Stream Name)</label>
                                <input type="number" class="form-control form-control-sm">
                                
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
                                <label class="form-label">Passing Year/Persuing <span style="color: red">*</span></label>
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
                                <input type="number" class="form-control form-control-sm">
                                
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Degree In (Stream Name)</label>
                                <input type="number" class="form-control form-control-sm">
                                
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>Other Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">PF UAN No</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">ESI No</label>
                            <input type="tel" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Passport No</label>
                            <input type="tel" class="form-control form-control-sm">
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
                                <textarea class="form-control" id="exampleTextarea"></textarea>

                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
       
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>Reporting Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
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
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary">Submit</button>
        </div>
    </div>

    
</div>








  
    
    


