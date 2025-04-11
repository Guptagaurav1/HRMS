@extends('layouts.master', ['title' => 'Compose Mail'])


@section('contents')
<div class="container-fluid">
    <div class="row align-items-center justify-content-center ">
        <div class="col-lg-8 col-md-10">
            <div class="card">
                <div class="panel-header py-3 px-2 d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Compose Email</h5>
                    <div>
                        <div class="d-flex justify-content-end px-2">
                            <a href="{{route('email-list')}}"> <button type="submit" class="btn btn-primary ">Email List <i
                                        class="fa-solid fa-envelope"></i></button></a>
                        </div>
                    </div>
                   
                </div>
                
                <div class="card-body">
                    <form class="form compose-email">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <label for="recipient" class="form-label">From</label>
                                <input type="text" class="form-control"  name="from"
                                    placeholder="Enter sender email" value="{{$email}}" readonly>
                                @error('from')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="to" class="form-label">To</label>
                                <input type="text" class="form-control"  name="to"
                                    placeholder="Enter comma seperated recipient email" value="{{old('to')}}" required>
                                @error('to')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="cc" class="form-label">CC</label>
                                <input type="text" class="form-control" name="cc" placeholder="Enter comma seperated emails" value="{{old('cc')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" name="subject"
                                    placeholder="Enter email subject" value="{{old('subject')}}" required>
                                @error('subject')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="body" class="form-label">Message / Query</label>
                                <textarea class="form-control" name="body" rows="6" id="body"
                                    placeholder="Write your message here">{{old('body')}}</textarea>
                                @error('body')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="attachments" class="form-label">Attachments <span class="fw-lighter text-small text-danger">(only pdf and doc file are allowed)</span></label>
                                <input type="file" class="form-control" name="attachment" accept=".pdf, .docx, .doc">
                                @error('attachment')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                </div>

                <div class="d-flex justify-content-end pb-3 px-3">
                    <button type="submit" class="btn btn-primary ">Send <i class="fa-solid fa-paper-plane"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/js/compose.js')}}"></script>
@endsection