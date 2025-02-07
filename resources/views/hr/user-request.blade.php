@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Recruiter Request to Admin</h2>
            </div>

            <div class="row px-3 mb-3">
                <div class="col-md-12 d-flex justify-content-end ml-5 change">
                    <a href="{{route('user-request-list')}}"><button class="btn btn-sm btn-primary mt-3 " id="add-more-btn">Request List  <i class="fa-solid fa-list"></i></button></a>
                </div>
            </div>
           
            <div class="table-responsive after-add-more" id="add-field">
                <table class="table table-bordered table-hover digi-dataTable table-striped" id="allEmployeeTable">
                    <thead id="table-head">
                        <tr>
                            <th class="text-center">S.No.</th>
                            <th class="text-center">Query Type</th>
                            <th class="text-center">Job Position</th>
                            <th class="text-center">Short Description</th>
                           {{-- Recruitment position status --}}
                            <th class="text-center position-status-column">Candidate List</th>
                            <th class="text-center position-status-column" >Candidate Current Status</th>
                            <th class="text-center position-status-column">Candidate Status Changed To</th>
                            <!-- Predefined columns for Offer Letter -->
                            <th class="text-center offer-letter-column" >Candidate List</th>
                            <th class="text-center offer-letter-column" >Candidate Current Status</th>
                            <th class="text-center offer-letter-column">Change</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">
                                <select id="inputState" class="form-select form-control">
                                    
                                    <option value="job_description">Job Description</option>
                                    <option value="recruitment_position_status">Recruitment Position Status</option>
                                    <option value="offer_letter">Offer Letter</option>
                                </select>
                            </td>
                            <td>
                                <select id="inputState" class="form-select form-control">
                                    <option>Select Option</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                            </td>
                            <td class="attributes-column">
                                <textarea class="form-control" id="exampleTextarea" placeholder="Enter Title with short Description"></textarea>
                            </td>
                           
                            <td class="position-status-column">
                                <select id="inputState" class="form-select form-control">
                                    <option>Select Option</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                            </td>
                            <td class="position-status-column">
                                <input type="text" class="form-control" placeholder="Enter Status"></textarea>
                            </td>
                            <td class="position-status-column">
                                <select id="inputState" class="form-select form-control">
                                    <option>Select Option</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                            </td>
                            <td class="offer-letter-column">
                                <select id="inputState" class="form-select form-control">
                                    <option>Select Option</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                            </td>
                            <td class="offer-letter-column" >
                                <input type="text" class="form-control" placeholder="Enter Current Status"></textarea>
                            </td>
                            <td class="offer-letter-column">
                                <select id="inputState" class="form-select form-control">
                                    <option>Select Option</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
       
    </div>
    <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-sm btn-primary"> Send Request <i class="fa-solid fa-paper-plane"></i></button>
    </div>
</div>
@endsection



@section('script')

<script src="{{asset('assets/js/user-request.js')}}"></script>
@endsection

