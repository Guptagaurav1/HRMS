@extends('layouts.master')


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
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <label for="recipient" class="form-label">From</label>
                                <input type="text" class="form-control" id="from" name="from"
                                    placeholder="Enter sender email">
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="to" class="form-label">To</label>
                                <input type="text" class="form-control" id="to" name="to"
                                    placeholder="Enter recipient email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="cc" class="form-label">CC</label>
                                <input type="text" class="form-control" id="cc" name="cc" placeholder="Enter CC email">
                            </div>
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Enter email subject">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="body" class="form-label">Message / Query</label>
                                <textarea class="form-control" id="body" name="body" rows="6"
                                    placeholder="Write your message here"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="attachments" class="form-label">Attachments</label>
                                <input type="file" class="form-control" id="attachments">
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