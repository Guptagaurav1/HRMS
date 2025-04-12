@extends('layouts.master', ['title' => 'Export Complete Salary Sheet'])
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
    <div class="fluid-container border">
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h2 class="mt-2">Generate Complete Salary Sheet</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li> @if (auth()->user()->role->role_name="hr")
                                    <a href="{{route('hr_dashboard')}}">Dashboard</a>
                                    @endif
                                </li>
                                <li>Report Logs</li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <form action="{{route('download-salary-sheet')}}" method="post">
                            @csrf
                            <div class="col-md-12 text-center my-2">
                                <label>Select Month and Year :</label><br>
                                <input name="month-salary" class="date-picker" id="month-salary" placeholder="mm-yyyy" required/>
                                <button type="button" class="btn btn-primary check">Check</button>
                            </div>

                            <div class="col-md-12 text-center p-4 d-none checksalary">
                                <span class="text-danger checkerror"></span>
                            </div>
                            <div class="col-md-12 text-center p-4 d-none downloadSheet">
                                <h5 class="fs-5>Selected Month">Selected Month : <span class="selected-month"></span></h5>

                                <button type="submit" class="btn btn-primary download-salary">Download Complete Salary
                                    Sheet <i class="fa-solid fa-download"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/hr/export-salary-sheet.js') }}"></script>
@endsection
