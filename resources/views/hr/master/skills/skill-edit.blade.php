@extends('layouts.master', ['title' => 'Skill Edit'])
@section('style')
{{--
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" /> --}}
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Update Skill</h2>

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
                <form method="post" action="{{route('skills.update', $skill->id)}}" class="row g-3">

                    <div class="col-md-12 d-flex justify-content-start mx-3">
                        @csrf
                        <div class="col-md-6">
                            <input type="text" name="skill" value="{{ $skill->skill }}" class="form-control"
                                placeholder="Enter Skill" required>
                            @error('skill')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="text-end p-2">
                <button type="submit" class="btn btn-primary mb-3">Submit <i
                        class="fa-solid fa-arrow-right"></i></button>
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