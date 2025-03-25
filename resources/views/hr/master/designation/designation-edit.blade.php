@extends('layouts.master', ['title' => 'Edit Designation'])
@section('style')
{{--
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" /> --}}
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')

<div class="row">
    <form action="{{ route('designations.update', $designation->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h2 class="mt-2">Update Designation</h2> 
                        <div class="text-start">
                            <a href="{{ route('designations.index') }}">
                                <div class="back-button-box">
                                    <button type="button" class="btn btn-back">
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
    
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-xxl-6 col-lg-6 col-sm-6">
                                <label for="company_id" class="form-label">Designation Name <span class="text-danger"> **
                                    </span></label>
                                <input type="text" name="name" value="{{ $designation->name }}"
                                    class="form-control form-control-sm" name="{{ old('name') }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
    
                    </div>
    
                </div>
            </div>
    
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-primary">Submit <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>


@endsection