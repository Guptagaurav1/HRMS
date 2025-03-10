@extends('layouts.master', ['title' => 'Marriage Anniversary Template'])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <style>
        h1,
        h2,
        h3,
        h4 {
            margin: 0px;
            padding: 0px;
        }

        .birthday {
            width: 600px;
            margin: auto;
            height: 600px;
        }

        .bg-img {
            width: 600px;
            position: absolute;
        }

        .user-details {
            position: relative;
            top: 220px;
            left: 180px;
            color: #3f2e18;
            width: 500px;
        }

        .wishes {
            text-align: center;
            font-family: Courgette;
            font-style: normal;
            font-weight: 300;
            font-size: 28px;
        }

        .user-name {
            text-align: center;
            font-size: 24px;
            margin: 0px;
            font-family: Alpha54;
        }

        .quote {
            text-align: center;
            font-family: courgette;
            font-size: 24px;
            font-weight: 300;
            margin-top: 20px;
        }

        .congrates {
            text-align: center;
            font-family: courgette;
            font-size: 28px;
            margin-top: 15px;

        }
    </style>
@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">MARRIAGE ANNIVERSARY TEMPLATE PREVIEW OF {{ $employee->emp_code }}
                    </h2>
                </div>
                <div class="col-md-12 text-end py-3 px-2">
                    <button class="btn btn-sm btn-primary" id="btnSave">Download This Image <i
                        class="fa-solid fa-download"></i></button>
                <a href="{{route('events.marriage-anniversary-list')}}" class="btn btn-sm btn-primary">Back</a>
                </div>
                <div id="specific">
                        <div class="birthday">
                            <div class="bg-img"><img src="{{ asset('events/marriage/bg_ma.jpg') }}" width="100%"> </div>
                            <div class="user-details">
                                <h3 class="wishes">Marriage Anniversary</h3>
                                    <h4 class="user-name">Dear {{ $employee->emp_name }}</h4>
                                    <h4 class="quote">Best wishes to you both<br>on this momentous occasion.</h4>
                                <h4 class="congrates">Congratulation!</h4>
                            </div>	
                        </div>
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
