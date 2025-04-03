@extends('layouts.master', ['title' => 'Add Functional Role'])

@section('contents')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header heading-stripe">
                    <h3 class="mt-2 text-center">Add Functional Role</h3>
                </div>

                <div class="panel-body mt-4">
                    <form class="row g-3" method="POST" action="{{ route('store-functional-role') }}">
                        @csrf
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="role" value="{{ old('role') }}"
                                placeholder="Enter Functional Role" required>
                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ route('functional-role') }}">
                                <button type="button" class="btn btn-sm btn-secondary">Cancel</button>
                            </a>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
