@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Create Reimbursement</h3>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3 mt-2">
                    <div class="col-auto">
                        <input type="text" class="form-control" placeholder="Search" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Issue Date</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Document File</th>
                            <th class="text-center">Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-nowrap text-center">REM/0219/0012</td>
                            <td class="text-nowrap text-center">PSSPL/DEL/2021-22/0174</td>
                            <td class="text-nowrap text-center">Adya Pandey</td>
                            <td class="text-nowrap text-center">₹0.00</td>
                            <td class="text-nowrap text-center">₹5000.00</td>
                            
                            <td class="text-nowrap text-center">
                                <span class="badge alert-success">Pending</span>
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
                
            </div>


            <div class="panel-header mt-5">
                <h6 class="mt-2">Apply Reimbursement</h6>

                <div class="row px-3 mb-3">
                    <div class="col-md-12 d-flex justify-content-end ml-5 change">
                        <a href="#"><button class="btn btn-sm btn-primary mt-3 " id="add-more-btn">Add More</button></a>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive after-add-more" id="add-field">
                <table class="table table-bordered table-hover digi-dataTable table-striped" id="allEmployeeTable">
                    <thead id="table-head">
                        <tr >
                            <th class="text-center">S.No.</th>
                            <th class="text-center">Issue Date</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Attach Document<br><span class="text-danger">(Only Pdf
                                    Accatable)</span></th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                1
                                </select>
                            </td>
                            <td class="text-center">
                               
                                <input type="date" class="form-control" id="inputDate">
                            </td>
                            <td class="attributes-column">
                                <textarea class="form-control" id="exampleTextarea"
                                    placeholder="Enter Title with short Description"></textarea>
                            </td>
                            <td class="attributes-column">
                                <input type="number" class="form-control"  placeholder="Enter a Amount " required>
                            </td>
                            <td class="text-center"> <input class="form-control form-control-sm" id="formFileSm"
                                    type="file"></td>
                            <td class="text-center">
                                <a href="{{'view-letter'}}">
                                    <button class="btn btn-sm btn-primary">Save</button>
                                </a>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="panel-header mt-5">
                <h6 class="mt-2">Final Submit After Adding Invoice Details
                </h6></div>
            <div class="row mt-3 px-2">
                <div class="col-md-12">
                    <label for="exampleTextarea" class="form-label">Remarks</label>
                    <textarea class="form-control" id="exampleTextarea" placeholder="Enter Remarks"></textarea>
                </div>
            </div>
            <div class="row mt-2 px-2">
                <div class="col-md-6">
                    <label for="exampleTextarea" class="form-label">Advance Amount</label>

                    <input type="number" class="form-control" placeholder="Enter Advance Amount" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                   <p class="fs-6 text-danger px-1">(Please make sure you have submitted all details before final submit)</p>
                </div>
            </div>
                
        
        </div>
        <div class="d-flex justify-content-end  px-2">
            <button type="submit" class="btn btn-primary ">Final Submit</button>
        </div>
    </div>
    
</div>
@endsection

@section('script')

@endsection