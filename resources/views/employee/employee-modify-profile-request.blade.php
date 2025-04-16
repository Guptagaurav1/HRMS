@extends('layouts.master')

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Employee Details Updation Request</h2>
            </div>
            <div class="row px-3 mb-3">
                <div class="col-md-12 d-flex justify-content-end ml-5">
                    <button class="btn btn-sm btn-primary mt-3" id="add-more-btn">Add More</button>
                </div>
            </div>
            <div class="table-responsive" id="add-field">
                <table class="table table-bordered table-hover table-striped" id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">S.No.</th>
                            <th class="text-center">Query Type</th>
                            <th class="text-center">Particular Field</th>
                            <th class="text-center">Title with short Description</th>
                            <th class="text-center">Attach Document <br><span class="text-danger">(Only Pdf
                                    Accatable)</span></th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <tr class="dynamic-row">
                            <td class="text-center">1</td>
                            <td class="text-center">
                                <select class="form-select">
                                    <option selected>Select Option</option>
                                    <option>Select 1</option>
                                    <option>Select 2</option>
                                    <option>Select 3</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select class="form-select">
                                    <option selected>Select Option</option>
                                    <option>Select 1</option>
                                    <option>Select 2</option>
                                    <option>Select 3</option>
                                </select>
                            </td>
                            <td><textarea class="form-control"
                                    placeholder="Enter Title with short Description"></textarea></td>
                            <td class="text-center">
                                <input class="form-control form-control-sm" type="file">
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary reset-btn">Reset</button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-sm btn-primary">Send Request</button>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/modify-profile-request.js')}}"></script>

@endsection