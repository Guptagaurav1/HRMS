@extends('layouts.master')



@section('contents')
<div class="fluid-container border">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Go TO Attendance</h2>
                </div>
                <div class="row d-flex  justify-content-between mt-1" id="">
                    <div class="col-md-12 px-3 workcenter ">
                        <label>Work Order Number :</label>
                        <p class="work-order-No">
                            Add/Update Attendance For Work Order<br>
                            <span>Work order: BECIL/ND/DRDO/MAN/2425/1323_Extension</span>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-12 py-2 mt-3 text-center">
                    <p class="work-order-No">
                        Generate Salary Sheet for Work order :<br>
                        <span class="fs-bold fs-4">BECIL/ND/DRDO/MAN/2425/1323_Extension</span>
                    </p>
                </div>
                <div class="col-md-12 text-center">
                    <label>Select Month and Year :</label><br>
                    <input type="text" name="birthday" value="10/24/1984" />
                    <button type="submit" class="btn btn-primary">Check</button>
                </div>
               
                <div class="col-md-12 text-center p-4">
                  
                        <h5 class="fs-5>Selected Month">Selected Month : <span class="">Not Selected</span></h5>
    
                    <button type="submit" class="btn btn-primary">Download Salary Sheet <i class="fa-solid fa-download"></i></button>
                    <button type="submit" class="btn btn-primary">Download Salary Bank Sheet <i class="fa-solid fa-download"></i></button>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>

@endsection