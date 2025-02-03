@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Skill</h3>
            </div>
            <div class="row">
                @if($message = Session::get('success'))
                <div class="col-md-12">
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                         <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                         {{ $message }}
                        </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                @if($message = Session::get('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            {{$message}}
                        </div>
                     
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

              

            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="text-end px-2">
                        <a href="{{ route('skills.create') }}"><button type="button" class="btn btn-sm btn-primary">Add
                                Department</button></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Skills</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($skills as $skill1)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ ucwords($skill1->skill) }}
                                </td>

                                <td>
                                    <a  href="{{ route('skills.edit',['skill' => $skill1->id ]) }}"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>

                                    <a  class="delete-skill" data-id="{{ $skill1->id }}"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
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
{{--
<script src={{asset('assets/js/select2-init.js')}}></script> --}}

<script src={{asset('assets/js/masters/skill.js')}}></script>

@endsection