@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Employee Details Updation Request</h2>
            </div>
            <div class="row px-3 mb-3">
                <div class="col-md-12 d-flex justify-content-end ml-5 change">
                    <a href="#"><button class="btn btn-sm btn-primary mt-3 " id="add-more-btn">Add More</button></a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover digi-dataTable table-striped" id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">S.No.</th>
                            <th class="text-center">Query Type</th>
                            <th class="text-center">Particular Field</th>
                            <th class="text-center">Title with short Description</th>
                            <th class="text-center">Attach Document<br><span class="text-danger">(Only Pdf
                                    Accatable)</span></th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody  id="add-field" class="after-add-more">
                        <tr>
                            <td class="text-center">
                                1
                                </select>
                            </td>
                            <td class="text-center">
                                <select id="inputState" class="form-select">
                                    <option selected>Select Option</option>
                                    <option>Select 1</option>
                                    <option>Select 1</option>
                                    <option>Select 1</option>
                                </select>
                            </td>
                            <td class="text-center"> <select id="inputState" class="form-select">
                                    <option selected>Select Option</option>
                                    <option>Select 1</option>
                                    <option>Select 1</option>
                                    <option>Select 1</option>
                                </select></td>
                            <td class="attributes-column">
                                <textarea class="form-control" id="exampleTextarea"
                                    placeholder="Enter Title with short Description"></textarea>
                            </td>
                            <td class="text-center"> <input class="form-control form-control-sm" id="formFileSm"
                                    type="file"></td>
                            <td class="text-center">
                                <a href="{{'view-letter'}}">
                                    <button class="btn btn-sm btn-primary">Reset</button>
                                </a>
                                <a href="{{'view-letter'}}" id="remove-btn">
                                    <button class="btn btn-sm btn-primary " >Remove</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-sm btn-primary"> Send Request</button>
    </div>
</div>
@endsection

@section('script')

<script src="{{asset('assets/js/modify-profile-request.js')}}"></script>

@endsection