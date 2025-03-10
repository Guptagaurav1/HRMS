@extends('layouts.master', ['title' => 'Template Preview'])
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <style>
        .birthday {
            width: 600px;
            height: 600px;
            margin: auto;
        }

        .bg-img {
            width: 600px;
            position: absolute;
        }

        .user-pic {
            position: relative;
            width: 212px;
            height: 230px;
            top: 150px;
            left: 67px;
            transform: rotate(-9deg);
            background-color: white;
        }

        .user-pic1 {
            width: 212px;
        }

        .birthday-text {
            position: relative;
            width: 320px;
            top: -100px;
            left: 320px;
            color: #5F039C;
            text-align: center;
        }

        .birthday-1 {
            width: 280px;

        }

        .user-name {
            color: #6C11D0;
        }

        .username{
		position: relative;
		top:220px;
		left: 280px;
		font-family: Nautilus Pompilius;
		font-style: normal;
		font-weight: 300;
		font-size: 24px;
		color: #ba0404;
		width: 300px;
		text-align: center;
	}
    </style>
@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">BIRTHDAY TEMPLATE PREVIEW OF {{ $employee->emp_code }}</h2>

                </div>
                <div class="col-md-12 text-end py-3 px-2">
                    <button class="btn btn-sm btn-primary" id="btnSave">Download This Image <i
                            class="fa-solid fa-download"></i></button>
                    <a href="{{route('events.birthday-list')}}" class="btn btn-sm btn-primary">Back</a>
                </div>
                <div id="specific">
                    @if ($employee->photograph)
                        <div class="birthday">
                            <div class="bg-img"><img src="{{ asset('events/birthday/bg.png') }}" width="100%"> </div>
                            <div class="user-pic"><img
                                    src="{{ asset('recruitment/candidate_documents/passport_size_photo') . '/' . $employee->photograph }}"
                                    class="user-pic1"></div>
                            <div class="birthday-text"><img
                                    src="{{ asset('events/birthday/vecteezy_birthday-text_1201729.png') }}"
                                    class="birthday-1">
                                <h4 class="user-name"><b>Dear<br> {{ $employee->emp_name }}</b></h4>
                            </div>
                        </div>
                    @else
                        <div class="birthday">
                            <div class="bg-img"><img src="{{ asset('events/birthday/bg_two.jpg') }}" width="100%"> </div>
                            <h2 class="username">Dear {{ $employee->emp_name }}</h2>
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
