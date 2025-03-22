@extends('layouts.master', ['title' => 'Skill Add'])

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
                <h2 class="mt-2">Create Skill</h2>
                <div class="text-end">
                <a href="{{ route('skills.index') }}">
                    <div class="back-button-box">
                        <button type="button" class="btn btn-back">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                    </div>
                </a>
            </div> 
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
                <form method="post" action="{{route('skills.save')}}" class="row g-3">

                    <div class="col-md-12 d-flex justify-content-start mx-3">
                        @csrf
                        <div class="col-md-6">
                            <input type="text" name="skill" class="form-control" placeholder="Enter Skill">
                            @error('skill')
                                <small class="text-danger">{{$message}}</small>
                            @enderror 
                        </div>
                    </div>
                </div>
                <div class="text-end px-3 py-2">
                    <button type="submit" class="btn btn-primary">Submit <i class="fa-solid fa-arrow-right"></i></button>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection
@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>
@endsection





