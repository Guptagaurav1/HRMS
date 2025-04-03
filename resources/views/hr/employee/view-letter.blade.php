@extends('layouts.master', ['title' => 'Employee Sent Documents'])
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="text-white mt-2">View Letter</h3>
            </div>
            <div class="col-md-12">
                <div class="row  d-flex my-2 mx-3">
                    <div class="col-md-6">
                        <form class="row">
                            <div class="col-auto">
                                <input type="search" class="form-control" name="search" placeholder="Search" value="{{$search}}" required>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('employee.view-letter', ['id' => $id])}}" class="btn btn-primary mb-3"> Reset</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{route('employee.employee-list')}}" class="btn btn-primary">Back</a>
                    </div>
                </div>

            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">Emp Id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Designation</th>
                            <th class="text-center">Document Type</th>
                            {{-- <th>Salary</th> --}}
                            <th class="text-center">Sended On</th>
                            <th class="text-center">Document</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($documents as $document)
                            @php
                                $docurl = '';

                                if ($document->doc_type == 'Appointment') {
                                    $docurl = asset('recruitment/candidate_documents/appointment_letter').'/'.$document->document;
                                } 
                                elseif ($document->doc_type == 'Releiving') {
                                    $docurl = asset('recruitment/candidate_documents/relieving_letter').'/'.$document->document;
                                }
                                elseif ($document->doc_type == 'Extension') {
                                    $docurl = asset('recruitment/candidate_documents/extension_letter').'/'.$document->document;
                                } 
                                else {
                                    $docurl = '';
                                } 
                            @endphp
                        <tr>
                            <td class="text-center">{{$document->emp_code}}</td>
                            <td class="text-center">{{$document->emp_name}}</td>
                            <td class="text-center">{{$document->emp_designation}}</td>
                            <td class="text-center">{{$document->doc_type}}</td>
                            <td class="text-center">{{date('jS F, Y', strtotime($document->created_at))}}</td>
                            <td class="text-center">
                                @if($docurl)
                                <a href="{{$docurl}}"><button class="btn btn-sm btn-primary">View Document  <i class="fa-solid fa-eye"></i></button></a> 
                                @else
                                <span class="text-danger">Document Not Found</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-danger text-center" colspan="7">No Record Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>

            {{-- Show Pagination --}}
            <div class="col-md-12 d-flex justify-content-start">
                {{$documents->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
