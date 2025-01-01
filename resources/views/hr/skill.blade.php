@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5>Skill</h5>
            </div>
            <div class="row my-4">
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Enter Skill" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Add Skills</button>
                        </div>
                    </form>
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Department</th>
                                <th>Skills</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($skills as $skill)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$skill->department}}</td>
                                <td>{{$skill->skill}}</td>
                                <td>
                                    <a href="{{'view-letter'}}"><button class="btn btn-sm btn-primary">Delete</button></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-danger text-center" colspan="4">No Record Found</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="col-md-12 d-flex justify-content-center my-4">
                        {{$skills->links() }}
                    </div>
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