@extends('layouts.master')
@section('style')
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" /> --}}
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" /> --}}
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5>Department</h5>
            </div>
            <div class="row px-3 mt-2">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @else
                    <div class="alert alert-error alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                

                <div class="col-md-3">
                    <form method="post" action="{{route('departments.save')}}">
                        @csrf
                    <label class="form-label">Department<span style="color: red">*</span></label>
                    <input type="text" name="department" placeholder="Enter department name" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Skills</label>
                    <select id="inputState" name="skill[]" class="js-example-basic-multiple" name="states[]" multiple="multiple">
                        <option value="" selected>Select Skill</option>
                        @foreach ($skills as $skill)
                            <option value="{{$skill->id}}">{{ ucwords($skill->skill) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <a href="#"><button type="submit" class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">Add Department</button></a>
                </form>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($departments as $key => $value)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>{{ $value->department }}</td>
                            <td>
                                <a href="{{ route('departments.edit', ['department' => $value->id ]) }}"><button class="btn btn-sm btn-primary">Edit </button></a>
                                <a href="{{'view-letter'}}"><button class="btn btn-sm btn-primary">Delete</button></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                <span class="text-danger ">Record not found</span>
                            </td>

                        </tr>
                        @endforelse



                    </tbody>
                </table>
                <div class="table-bottom-control"></div>
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
