@extends('layouts.master', ['title' => 'Position Report Log'])

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection
@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header  heading-stripe">
                    <h3 class="mt-2 text-center">{{$request->position_title}} Position Report Log</h3>
                </div>
                <div class="col-md-12">
                    <div class="row my-2 mx-2">
                        <div class="col-md-6">
                        <form class="row g-3">
                            <div class="col-auto">
                                <input type="search" class="form-control" placeholder="Search" required>
                            </div>
                            <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('show-assign-work-log', ['id' => $request->id])}}" class="btn btn-primary mb-3"> Reset</a>
                            </div>
                        </form>
                        </div>
                            <div class="col-md-6 text-end">
                                <a href="{{route('recruitment-report')}}" class="btn btn-primary float-right">Back</a>
                            </div>
                    </div>                  
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                </div>
                <div class="table-responsive mt-3 ">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">S.No.</th>
                                <th class="rid-column text-center">Candidate Name</th>
                                <th class="text-center">Candidate Email</th>
                                <th class="attributes-column">JD Details</th>
                                <th class="text-center">Recruiter Email</th>
                                <th class="text-center">Expected Joining Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">View Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                            <tr>
                                <td class="srno-column">{{$loop->iteration}}</td>
                                <td class="rid-column text-center">{{$contact->receiver_name}}</td>
                                <td class="text-center">{{$contact->receiver_email}}</td>
                                <td class="attributes-column">Preview JD</td>
                                <td class="text-center">{{$contact->sender_email}}</td>
                                <td class="text-center">Not Yet Decided</td>
                                <td class="text-center">Not Applied</td>
                                <td class="text-center"><button class="btn btn-primary">View Details</button></td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-danger text-center" colspan="8">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 d-flex justify-content-center my-3">
                    {{$contacts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

