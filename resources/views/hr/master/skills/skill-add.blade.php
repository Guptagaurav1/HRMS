@extends('layouts.master', ['title' => 'Skill Add'])
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Create Skill</h2>
            </div>
            <div class="row my-4">
                <!-- @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @else
                <div class="alert alert-error alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @endif -->
                <form method="post" action="{{route('skills.save')}}" class="row g-3">
                    <div class="col-md-12 d-flex justify-content-start mx-3">
                        @csrf
                        <div class="col-md-6">
                        <label class="form-label">Skills<span class="text-danger">*</span></label>
                            <input type="text" name="skill" class="form-control" placeholder="Enter a  Skill" required>
                            @error('skill')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-3 p-2">
                        <div>
                            <a href="{{route('skills.index')}}"><button type="button" class="btn btn-sm btn-secondary">Cancel
                                </button></a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection