@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>

@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>organisation</h5>
                </div>
                
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                        <label class="form-label">Organisation List</label>
                        <select id="inputState" class="form-select">
                            <option selected>Select Organisation</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                        </select>
                        </label>
                        </div>
                        <div class="col-md-6">
                            <a href="{{'qualification'}}"><button class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">Add Organisation</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


