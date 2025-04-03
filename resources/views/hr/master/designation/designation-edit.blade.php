@extends('layouts.master', ['title' => 'Edit Designation'])
@section('contents')
<div class="row">
    <form action="{{ route('designations.update', $designation->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h2 class="mt-2">Update Designation</h2> 
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
</div>
@endsection
