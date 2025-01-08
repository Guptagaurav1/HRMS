@extends('layouts.master',['title' => 'Add Department'])
@section('style')
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" /> --}}
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" /> --}}
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel mb-4">
            <div class="panel-header">
                <h5>Department</h5>
            </div>
            <div class="row px-3 mt-2">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                @else
                    <div class="alert alert-error alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                @endif
                

                <div class="col-md-6">
                    <form method="post" action="{{ route('departments.save') }}">
                        @csrf
                    <label class="form-label">Department<span style="color: red">*</span></label>
                    <input type="text" name="department"  value="" placeholder="Enter department name" class="form-control">
                    @error('department')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Skills</label>
                    <select id="inputState" name="skill[]" class="js-example-basic-multiple" name="states[]" multiple="multiple">
                        <option value="">Select Skill</option>
                        @foreach ($skills as $skill)
                            <option value="{{$skill->id}}">{{ ucwords($skill->skill) }}</option> 
                        @endforeach
                    </select>

                    @error('skill')
                        <small class="text-danger">{{$message}}</small>
                     @enderror
                </div>
                <div class="col-md-12 mb-4 text-end">
                    <button type="submit" class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">Submit</button>
                </form>
                </div>
            </div>
           
        </div>
    </div>
</div>


@endsection
@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>


@endsection
