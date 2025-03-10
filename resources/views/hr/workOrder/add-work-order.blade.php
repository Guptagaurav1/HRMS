@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header heading-stripe">
                    <h3 class="mt-2 text-center">Add Work Order</h3>
                </div>
                @if(auth()->user()->hasPermission('work-order-list'))
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{route('work-order-list')}}"><button class="btn btn-sm btn-primary mx-3 mt-3"> Work Order List</button></a>  
                    </div>
                @endif


                <form action="{{ route('store-work-order') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="tabset">
                        <!-- Tab 1 -->
                        <input type="radio" name="tabset" id="tab1" aria-controls="project-details" checked>
                        <label for="tab1">Project Details</label>
    
                        <!-- Tab 2 -->
                        <input type="radio" name="tabset" id="tab2" aria-controls="work-order-details">
                        <label for="tab2">Work Order Details</label>
    
                        <!-- Tab 3 -->
                        <input type="radio" name="tabset" id="tab3" aria-controls="contacts-details">
                        <label for="tab3">Contacts Details</label>
    
                        <!-- Tab 4 -->
                        <input type="radio" name="tabset" id="tab4" aria-controls="invoice-details">
                        <label for="tab4">Invoice Details</label>
    
                       
                       
                        
                        <div class="tab-panels px-2">
                          <section id="project-details" class="tab-panel">
                            <div class="panel-body">
                                <div class="row g-3">
                                    <div class="col-sm-12 col-md-4">
                                        <label class="form-label">Organisation <span class="text-danger">*</span></label>
                                        <select name="organisation"  id="organisation"  class="form-select form-control">
                                            <option value="">--Select Organisation--</option>
                                            @foreach($organization as $key => $organization_data)
                                                <option value="{{$organization_data->id}}" @if ($organization_data->name == old('organization')) selected @endif>
                                                {{ $organization_data->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('organisation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> Project Name <span class="text-danger">*</span></label>
                                        <select name="project_name" id="project_name" class="form-select form-control" value=""></select>
                                        @error('project_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                       
                                        <label class="form-label text-wrap"> Project Numbers </label>
                                        <input  id="project_no" readonly type="text" class="form-control form-control-sm" placeholder="Enter Project Number" value="">
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap">
                                                Empanelment Reference
                                            </label>
                                            <input  readonly id="empanelment_reference" type="text" class="form-control form-control-sm" placeholder="Empanelment Reference" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </section>
    
                          <section id="work-order-details" class="tab-panel">
                            <div class="panel-body">
                                <div class="row g-3">
                                    <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <label class="form-label">Work Order Number <span class="text-danger">*</span></label>
                                        <input name="work_order" type="text" class="form-control form-control-sm" placeholder="Enter Work Order No" value="{{ old('work_order') }}">
                                        @error('work_order')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Previous Work Order Number
                                        </label>
                                        <input name="prev_wo_no" type="text" class="form-control form-control-sm"  placeholder="Previous Work Order No In case of amendment" value="{{ old('prev_wo_no') }}">
                                    </div>
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap">
                                                Internal Reference
                                            </label>
                                            <input name="internal_reference"  id="internal_reference" type="text" class="form-control form-control-sm" placeholder="Internal Reference" value="{{ old('internal_reference') }}">
                                        </div>
                                        
                                       
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap">
                                                Concern Ministry
                                            </label>
                                            <input name="concern_ministry" id="concern_ministry" type="text" class="form-control form-control-sm" placeholder="Concern Ministry" value="{{ old('concern_ministry') }}">
                                        </div>
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap"> No.of Resource </label>
                                            <input name="no_of_resource" id="no_of_resource" type="text" class="form-control form-control-sm" placeholder="No.of Resource" value="{{ old('no_of_resource') }}">
                                        </div>
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap">
                                                Project Cordinator Name
                                            </label>
                                            <input name="coordinator_name" id="coordinator_name" type="text" class="form-control form-control-sm" placeholder="Project Cordinator Name" value="{{ old('coordinator_name') }}">
                                        </div>
                                      
        
                                    </div>
                                    <div class="row">
                                       
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap"> Amount</label>
                                            <input name="amount" id="amount" type="number" class="form-control form-control-sm" placeholder="Amount" value="{{ old('amount') }}">
                                        </div>
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap"> Date of Issue </label>
                                            <input name="issue_date" id="issue_date" type="date"class="form-control form-control-sm" value="{{ old('issue_date') }}">
                                        </div>
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap"> Project Duration (In months)
                                            </label>
                                            <input name="project_duration_month" id="project_duration_month" type="text" class="form-control form-control-sm" placeholder="Project Duration (In months)" value="{{ old('project_duration_month') }}">
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap"> Project Duration (In Days) </label>
                                            <input name="project_duration_days" id="project_duration_days" type="text" class="form-control form-control-sm"
                                                placeholder="Project Duration (In Days)" value="{{ old('project_duration_days') }}">
                                        </div>
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap"> Start Date</label>
                                            <input name="start_date" id="start_date" type="date" class="form-control form-control-sm" value="{{ old('start_date') }}">
                                        </div>
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap"> End Date </label>
                                            <input name="end_date" id="end_date" type="date" class="form-control form-control-sm" value="{{ old('end_date') }}">
                                        </div>
                                        
                                    </div>
        
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap"> Location </label>
                                            <input name="location" id="location" type="text" class="form-control form-control-sm" placeholder="Loaction" value="{{ old('location') }}">
                                        </div>
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap"> City</label>
                                            <input name="city" id="city" type="text" class="form-control form-control-sm" placeholder="City" value="{{ old('city') }}">
                                        </div>
                                        
                                    </div>
                                    
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 text-wrap">
                                                <label class="form-label text-wrap">Amendment Number</label>
                                                <input name="amendment_number" id="amendment_number" type="text" class="form-control form-control-sm" placeholder="Invoice Client Name" value="{{ old('amendment_number') }}">
                                            </div>
                                            <div class="col-sm-12 col-md-4 text-wrap">
                                                <label class="form-label text-wrap">Amendment date</label>
                                                <input name= "amendment_date" id="amendment_date"type="date" class="form-control form-control-sm" placeholder="Amendment date" value="{{ old('amendment_date') }}">
                                            </div>
                                            <div class="col-sm-12 col-md-4 text-wrap">
                                                <label class="form-label text-wrap">Previous Order No</label>
                                                <input name="prev_order_no" id="prev_order_no" type="text" class="form-control form-control-sm" placeholder="PIN Number" value="{{ old('prev_order_no') }}">
                                            </div>
                
                                        </div>

                                        
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 text-wrap">
                                                <label for="exampleTextarea" class="form-label">Address</label>
                                                <textarea name="remarks" class="form-control" id="remarks" placeholder="Enter Remarks if any?" value="{{ old('remarks') }}"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 text-wrap">
                                            Attachment
                                            <input name="attachment" id="attachment" class="form-control form-control-sm" id="formFileSm" type="file">
                                            @error('attachment')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    
        
                                </div>
                            </div>
                          </section>
    
                          <section id="contacts-details" class="tab-panel">
                            <div class="panel-body">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-sm btn-primary mx-3" id="addmorebtn">Add More</button>
                                </div>
                                <div class="addMore">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap">Person Name</label>
                                            <input name="c_person_name[]" id="c_person_name" type="text" class="form-control form-control-sm" placeholder="Person Name" value="">
                                        </div>
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap">Designation</label>
                                            <input name="c_designation[]" id="c_designation" type="text" class="form-control form-control-sm" placeholder="Designation" value="">
                                        </div>

                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap">Contact</label>
                                            <input name="c_contact[]" id="c_contact" type="number" class="form-control form-control-sm" placeholder="Contact" value="">
                                           
                                        </div>
                                        <div class="col-sm-12 col-md-4 text-wrap">
                                            <label class="form-label text-wrap">Email</label>
                                            <input name="c_email[]" id="c_email" type="email" class="form-control form-control-sm" placeholder="Email" value="">
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label for="exampleTextarea" class="form-label">Remarks</label>
                                            <textarea name="c_remarks[]" id="c_remarks" class="form-control" id="exampleTextarea"
                                                placeholder="Enter Remarks" value=""></textarea>

                                        </div>
                                        
                                    </div>
                                    
                                      

                                    
                                    <div class="row mt-3">
                                        <div class="col-sm-12 col-md-12 text-wrap">
                                            
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-primary mx-3 mt-3 delete-btn">Delete <i
                                                class="fa-solid fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                          </section>
    
                          <section id="invoice-details" class="tab-panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">Invoice Client Name</label>
                                        <input name="invoice_client_name" id="invoice_client_name" type="text" class="form-control form-control-sm" placeholder="Invoice Client Name" value="{{ old('invoice_client_name') }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">State</label>
                                        <select  class="form-select form-control" name="invoice_state">
                                            <option value=""> Select State</option>
                                            @foreach($state as $key => $value)
                                                <option value="{{$value->id}}">{{ $value->state }}</option>
                                            @endforeach
                                           
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">PIN Number</label>
                                        <input name="invoice_pin" id="invoice_pin" type="number" class="form-control form-control-sm" placeholder="PIN Number" value="{{ old('invoice_pin') }}">
                                    </div>
                                    <div class="col-sm-12 col-md-12 text-wrap">
                                        <label for="exampleTextarea" class="form-label">Address</label>
                                        <textarea name="invoice_address" id="invoice_address" class="form-control" id="exampleTextarea" placeholder="Enter Address" value="{{ old('invoice_address') }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm btn-primary"> Register Work Order <i class="fa-solid fa-arrow-right"></i></button>
                                </div>
                            </div>
                          </section>
    
                          
                        
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<!-- <script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>-->

<script src="{{asset('assets/vendor/js/addmore.js')}}"></script>
<script src="{{asset('assets/js/hr/work-order.js')}}"></script> 
@endsection
