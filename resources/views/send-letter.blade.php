
@extends('layouts.master')

<div class="main-content">
    <div class="dashboard-breadcrumb mb-25">
        <h2>Send Appointment Letter</h2>
        <div class="btn-box">
            <a href="{{'employee-list'}}" class="btn btn-sm btn-primary">Employee List</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>Current Status</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Employee Salary<span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Employee Designation<span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="inputDate" class="form-label">End date</label>
                                <input type="date" class="form-control" id="inputDate">
                        </div>
                        
                        </div>
                       
                        
                        

                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>New Changes</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Employee Salary <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Employee Designation <span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option selected>Office Assistant(Stage-2)</option>
                                <option>Select 1</option>
                                <option>Select 1</option>
                                <option>Select 1</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="inputDate" class="form-label">Start date</label>
                                <input type="date" class="form-control" id="inputDate">
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








  
    
    


