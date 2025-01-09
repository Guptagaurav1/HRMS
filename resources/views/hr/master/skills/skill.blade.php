@extends('layouts.master')

@section('style')
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" /> --}}
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5>Skill</h5>
            </div>
            <div class="row my-4">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @else
                <div class="alert alert-error alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <div class="col-md-12">
                    <div class="text-end">
                        <a href="{{ route('skills.create') }}"><button type="button" class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">Add Skill</button></a>
                    </div>
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
                            @forelse($departments as $department)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $department->department }}
                                </td>

                                <td>
                                    <?php
                                        $skill = $department->skills->pluck('skill')->toArray();
                                        $skills1 = implode(', ',$skill);
                                    ?>
                                        {{ $skills1 }}
                                </td>
                                <td>
                                    <a  href="{{ route('skills.edit',['skill' => $department->id ]) }}"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>

                                    <a  class="delete-skill" data-id="{{ $department->id }}"><button type="button" class="btn btn-sm btn-primary">Delete</button></a>
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
                        {{$departments->links() }}
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
{{-- <script src={{asset('assets/js/select2-init.js')}}></script> --}}

<script src={{asset('assets/js/masters/skill.js')}}></script>

@endsection
