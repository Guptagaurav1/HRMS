@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="panel-header ">
    <h2 class="px-2 mt-2">Form 16</h2>
</div>
<div class="dashboard-breadcrumb mb-25">

    <div class="d-flex gap-2 justify-content-between align-items-center">
        <div class="d-flex gap-2">
            <input type="radio" class="tab-links active " id="html" name="fav_language" value="HTML" data-tab="1">
            <label for="html">Single Entry</label><br>
            <input type="radio" class="tab-links " id="html1" name="fav_language" value="HTML" data-tab="2">
            <label for="html">Bulk Entry</label><br>
        </div>
        <div>
            <a href="{{route('form16')}}"><button class="btn btn-sm btn-primary ml-5"> Form 16 List <i class="fa-solid fa-list"></i></button></a>
        </div>
    </div>
    
</div>
<div class="row" id="tab-1">
    <form action="{{route('create-form16')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-white">Form 16 Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Employee PAN No<span class="text-danger">**</span></label>
                            <select id="emp_pan" class=" selectpicker form-select" name="emp_pan" value>
                                <option value="">Select Employee</option>
                                @foreach($empDetail as $key => $value)
                                <option value="{{$value->emp_id}}">{{$value->emp_pan}}</option>
                                @endforeach
                                @error('emp_pan')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Employee Code </label>
                            <input type="hidden" name="pan_no" id="pan_no">
                            <input type="text" class="form-control form-control-sm" readonly name="emp_code" id="emp_code">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Employee Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" readonly name="emp_name" id="emp_name">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Work Order<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" readonly name="wo_number" id="wo_number">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Financial Year <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="financial_year">
                            @error('financial_year')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="formFileSm" class="form-label">Attachment</label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file" name="file">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary"> Submit <i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </form>
</div>
<div class="row" id="tab-2" style="display: none">
    <form action="{{route('upload-form16')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-white">Bulk Upload Form 16</h5>
                    <div class="btn-box">
                        <a href="{{route('employee-list')}}" class="btn btn-sm btn-primary"><i
                                class="fa-solid fa-download"></i> Download CSV Format</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-8 col-sm-6">
                            <label for="formFileSm" class="form-label">Select Zip File<span class="text-danger">
                                    *</span></label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file" name="zip_data" accept=".zip" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary"> <i class="fa-solid fa-upload"></i> Upload CSV</button>
        </div>
    </form>
</div>

@endsection

@section('script')

<script src={{asset('assets/js/tab-changes.js')}}></script>
<script>
    $(document).ready(function() {
    //   $('#pan').parent().css('max-width','184px');

    $('#emp_pan').change(function(e) {
      var emp_id = document.getElementById("emp_pan").value;
      
      $.ajax({
        url: '{{ route("emp-data", ":id") }}'.replace(':id', emp_id),
        type: 'GET',
        success: function(response) {
                let emp_code =response.data.emp_code;
                let emp_work_order =response.data.emp_work_order;
                let emp_name =response.data.emp_name;
                let pan_no =response.data.emp_pan;

                $('#pan_no').val(pan_no);
                $('#emp_code').val(emp_code);
                $('#wo_number').val(emp_work_order);
                $('#emp_name').val(emp_name);
            },
            error: function(xhr, status, error) {
                console.log("Error:", error);
            }
      });
    });
  });
</script>
 @endsection
 