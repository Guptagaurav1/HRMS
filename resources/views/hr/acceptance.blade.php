<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link href="{{ asset('assets/css/sweetalert2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
   
    <title>Recruitment Form</title>
</head>

<body class="light-theme">
    <div class="row"  style="background-color:#83C0C1; height: 100vh;">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <form class="h-auto px-3 px-md-5 shadow-lg rounded-3 bg-white p-4 mt-1"  id="form_design">
                <div class="row d-flex gap-3 gap-md-5">
                    <h4 class="border-bottom text-dark fw-bold">Acceptance Form</h4>
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="form-group d-flex justify-content-between">
                            <label for="name">Name</label>
                            <span>Gaurav Gupta</span>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <label for="contact">Contact No</label>
                            <span>Gaurav Gupta</span>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <label for="joining-date">Expected Joining Date</label>
                            <span>NA</span>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <label for="designation">Designation</label>
                            <span>NA</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group d-flex justify-content-between">
                            <label for="email">Email</label>
                            <span>Gaurav.Gupta@prakhrar.com</span>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <label for="applied-for">Applied For</label>
                            <span>Head</span>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <label for="salary">Salary as per Offer letter</label>
                            <span>Head</span>
                        </div>
                    </div>
                </div>
    
                <div class="col-xxl-3 col-lg-6 col-sm-6 d-flex gap-2">
                <input class="form-check-input" type="checkbox" ><label class="text-primary"> Terms & Condiitions</label>
                </div>
               
    
                
                <div class="text-center mt-4">
                    <a href="#">
                        <button class="btn btn-sm btn-primary btn-interactive">
                            Accept The Offer <i class="fa-solid fa-check"></i>
                        </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
    {{-- Script --}}

    <script src="{{ asset('assets/vendor/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/master.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    <script src={{ asset('assets/js/personal-details.js') }}></script>

</body>

</html>


