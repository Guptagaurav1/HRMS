@extends('layouts.master')
@section('contents')
<form action="{{ route('designations.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Create Designation</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Profile Details</a></li>
                            <li>Italy</li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-6 col-lg-6 col-sm-6">
                            <label for="company_id" class="form-label">Designation Name <span class="text-danger"> **
                                </span></label>
                            <input type="text" name="name" class="form-control form-control-sm" name="{{ old('name') }}"
                                placeholder="Enter a Designation" required>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="col-12 d-flex justify-content-end gap-3">
            <div>
                <a href="{{route('designations.index')}}"><button type="button" class="btn btn-sm btn-secondary">Cancel
                    </button></a>
            </div>
            <div>
                <button type="submit" class="btn btn-sm btn-primary">Submit </button>

            </div>

        </div>
    </div>
</form>

@endsection