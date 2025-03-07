@extends('layouts.master', ['title' => 'Work Anniversary Template'])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <style>
        .birthday {
            width: 600px;
            margin: auto;
            height: 104vh !important;

        }

        .bg-img {
            width: 600px;
            position: absolute;
        }

        .user-pic {
            position: relative;
            width: 250px;
            height: 160px;
            top: 130px;
            left: 180px;
            background-color: white;
            border: 3px solid white;
            box-shadow: 2px 2px 5px grey;
        }

        .user-pic2 {
            position: relative;
            top: 143px;
            left: 60px;
            font-size: 143%;
            font-family: Antonio;
            font-weight: bold;
        }


        .user-pic1 {
            width: 100%;
            height: 160px;
        }

        .birthday-text {
            position: relative;
            width: 320px;
            top: 160px;
            left: 140px;
            color: #8d3200;
            text-align: center;
            font-family: arial;
            font-weight: bold;
        }

        .birthday-1 {
            width: 280px;

        }

        .user-name {
            color: #8d3200;
            font-size: 1.8em;
            font-weight: bold;

        }

        .user-name2 {
            color: #8d3200;
            font-size: 1.8em;
            font-weight: bold;
            margin-block-start: 0.83em;
        }

        .user-designation {
            font-size: 18px;
            font-weight: 300;
        }

        .year-anniversary {
            top: 193px;
            position: relative;
            left: 230px;
            font-family: Freehand521 BT, regular;
            color: #8d3200;
        }

        .happy {
            top: 150px;
            position: relative;
            text-align: center;
            font-family: Freehand521 BT, regular;
            color: #8d3200;
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .year {
            top: 130px;
            position: relative;
            text-align: center;
            font-family: arial, regular;
            color: #E8A600;
            font-size: 100px;
            padding: 0px;
            font-weight: bold;
        }

        .st {
            font-size: 36px;
            margin-left: -3px;

        }

        .work-anni {
            top: 113px;
            position: relative;
            text-align: center;
            font-family: Freehand521 BT, regular;
            color: #8d3200;
            font-weight: bold;
        }
    </style>
@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Work Anniversary Template Preview of ({{ $employee->emp_code }})</h2>
                </div>
                <div class="col-md-12 text-end py-3 px-2">
                    <button class="btn btn-sm btn-primary" id="btnSave">Download This Image <i
                            class="fa-solid fa-download"></i></button>
                    <a href="{{ route('events.work-anniversary-list') }}" class="btn btn-sm btn-primary">Back</a>
                </div>
                <div id="specific">
                    @if ($employee->photograph)
                        <div class="birthday">
                            <div class="bg-img"><img src="{{ asset('events/work-anniversary/work_anniversary_bg.jpg') }}"
                                    width="100%"> </div>
                            <div class="user-pic"><img
                                    src="{{ asset('recruitment/candidate_documents/passport_size_photo') . '/' . $employee->photograph }}"
                                    class="user-pic1">
                            </div>
                            <div class="birthday-text">
                                <h2 class="user-name">{{ $employee->emp_name }} <br> <span
                                        class="user-designation text-capitalize">{{ $employee->emp_designation }}</span>
                                </h2>
                            </div>
                            <h3 class="year-anniversary">Happy {{ $nth }} Work</h3>
                        </div>
                    @else
                        <div class="birthday">
                            <div class="bg-img"><img
                                    src="{{ asset('events/work-anniversary/work_anniversary_bg_without.jpg') }}"
                                    width="100%"> </div>
                            <div class="user-pic2">ON COMPLETING YOUR {{ $nth }} YEAR AT WORK</div>
                            <div class="birthday-text">
                                <h2 class="user-name2">{{ $employee->emp_name }} <br> <span
                                        class="user-designation">{{ $employee->emp_designation }}</span></h2>
                            </div>
                            <h1 class="happy">Happy</h1>
                            <h1 class="year">{{ $nth }}</h1>
                            <h1 class="work-anni">Work Anniversary</h1>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/canvas2image.js') }}"></script>
    <script src="{{ asset('assets/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('assets/js/hr/birthday-template.js') }}"></script>
@endsection
