@extends('layouts.guest.master', ['title' => 'Acceptance Form'])
@section('content')
    <div class="row" style="background-color:#034d48;height:100vh;position: fixed; width: 100%;">
        <div class="col-md-12 " style="padding-left: 20.5%; padding-right: 20.5%;">
            <div class="d-flex border bg-white py-2 px-2 shadow-lg rounded-3 bg-white p-0 ">
                <div>
                    <img src="{{ asset('assets/images/PrakharLimited-logo.png') }}" alt="logo left" style="width: 15%;">
                </div>
                <div>
                    <img src="{{ asset('assets/images/11years.png') }}" alt="logo right" style="width: 60%;" />
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                <symbol id="check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" viewBox="0 0 16 16">
                    <path
                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <form action="{{ route('guest.offer_accepted') }}" class="h-auto px-3 px-md-5 shadow-lg rounded-3 bg-white p-0"
                id="form_design" method="POST">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="rec_id" value="{{ $id }}">
                </div>
                <div class="row d-flex gap-3 gap-md- my-2">
                    <h4 class="border-bottom text-dark">Acceptance Form</h4>
                    @if (session()->has('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show justify-content-between"
                                role="alert">
                                <div class="d-flex">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                        aria-label="Success:">
                                        <use xlink:href="#check-circle-fill" />
                                    </svg>
                                    <div>
                                        {{ session()->get('message') }}
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="col-md-12">
                            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show justify-content-between"
                                role="alert">
                                <div class="d-flex">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                        aria-label="Danger:">
                                        <use xlink:href="#exclamation-triangle-fill" />
                                    </svg>
                                    <div>
                                        {{ session()->get('message') }}
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="form-group d-flex justify-content-between">
                            <label for="name">Name</label>
                            <span>{{ $details->firstname . ' ' . $details->lastname }}</span>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <label for="contact">Contact No</label>
                            <span>{{ $details->phone }}</span>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <label for="joining-date">Expected Joining Date</label>
                            <span>{{ $details->doj }}</span>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <label for="designation">Designation</label>
                            <span>{{ $details->pos_req_id ? $details->getPositionDetail->position_title : '' }}</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group d-flex justify-content-between">
                            <label for="email">Email</label>
                            <span>{{ $details->email }}</span>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <label for="applied-for">Applied For</label>
                            <span>{{ $details->job_position }}</span>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <label for="salary">Salary as per Offer letter</label>
                            <span>{{ $details->salary }}</span>
                        </div>
                    </div>
                </div>

                @if ($details->finally == 'offer-letter-sent')
                    <div class="col-xxl-3 col-lg-12 col-sm-6 d-flex gap-2">
                        <div>
                        <input class="form-check-input bg-primary pe-none" type="checkbox" name="terms_and_condition" disabled required><br>
                        @error('terms_and_condition')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div>
                        <button type="button" style="border: none; background: none; text-decoration: underline;" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="fw-bold"> Terms &
                            Condiitions</button>
                            
                        </div>
                        {{-- <label class="text-primary"> Terms & Condiitions</label> --}}
                      
                    </div>
                    <div class="text-center mt-4">
                        <a href="#">
                            <button type="submit" class="btn btn-sm btn-primary btn-interactive acceptform">
                                Accept The Offer <i class="fa-solid fa-check"></i>
                            </button>
                        </a>
                    </div>
                @else
                    <div class="text-center mt-4">
                        <a onclick="frames['frame'].print()" class="btn btn-sm btn-primary btn-interactive">
                            Print <i class="fa fa-print"></i></a>
                    </div>
                @endif
            </form>
        </div>
        <div class="text-center text-white border-top mt-5 p-2">
            <p class="">© 2025 All Rights Reserved. Prakhar softwares Solution Ltd.</p>
        </div>
    </div>
    <iframe src="{{ route('guest.print_hr_form', ['id' => $id]) }}" class="d-none" name="frame"></iframe>
@endsection

@section('modal')
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true"
        style="background-color: rgba(0,0,0, 0.8); width: 100%;">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #83C0C1;;">
                    <h5 class="modal-title text-white" id="staticBackdropLabel">TERMS AND CONDITIONS</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body" style="height: 100vh;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="termsAndConditions fadeIn">
                                    <div class="serviceLeadingSection">
                                        <h4><span class="sn blue">1.</span><span class="st blue">Acceptance of Offer</span></h4>
                                        <div class="serviceInfoContainer">
                                            
                                            <p class="serviceDetails">The candidate must confirm acceptance of the offer in writing (via email or signed offer letter) within 24 hours of receiving.
                                            </p>
                                            <div class="secionLine lineColorBlue"></div>
                                        </div>
                                        <div class="serviceInfoContainer">
                                            <p class="serviceDetails">Failure to confirm within the given time frame may result in the withdrawal of the offer.</p>
                                            <div class="secionLine lineColorBlue"></div>
                                        </div>
                                    </div>

                                    <div class="serviceLeadingSection">
                                        <h4><span class="sn orange">2.</span><span class="st orange">Joining Date & Onboarding</span>
                                        </h4>
                                        <div class="serviceInfoContainer">
                                            <p class="serviceDetails">The candidate must report to the assigned workplace on the specified joining date.</p>
                                            <div class="secionLine lineColorOrange"></div>
                                        </div>
                                        <div class="serviceInfoContainer">
                                            <p class="serviceDetails">Any request for a change in the joining date must be communicated in advance and is subject to company approval.</p>
                                            <div class="secionLine lineColorOrange"></div>
                                        </div>
                                    </div>
                                    <div class="serviceLeadingSection">
                                        <h4><span class="sn lightGreen">3.</span><span class="st lightGreen">Probation Period</span></h4>
                                        
                                        <div class="serviceInfoContainer">
                                            
                                            <p class="serviceDetails">The candidate will undergo a probation period of 06 months during which performance and conduct will be assessed.</p>
                                            <div class="secionLine lineColorGreen"></div>
                                        </div>
                                        <div class="serviceInfoContainer">
                                            
                                            <p class="serviceDetails">Employment confirmation will be subject to satisfactory performance during this period.</p>
                                            <div class="secionLine lineColorGreen"></div>
                                        </div>
                                       
                                    </div>
                                    <div class="serviceLeadingSection">
                                        <h4><span class="sn purple">4.</span><span class="st purple">Workplace Policies & Code of Conduct</span>
                                        </h4>
                                        
                                        <div class="serviceInfoContainer">
                                            
                                            <p class="serviceDetails">The candidate agrees to adhere to all company policies, including dress code, professional conduct, and ethical guidelines.</p>
                                            <div class="secionLine lineColorPurple"></div>
                                        </div>
                                        <div class="serviceInfoContainer">
                                            
                                            <p class="serviceDetails">Any violation of company policies may lead to disciplinary action or termination.</p>
                                            <div class="secionLine lineColorPurple"></div>
                                        </div>
                                       
                                    </div>

                                    <div class="serviceLeadingSection">
                                        <h4><span class="sn red">5.</span><span class="st red">Notice Period & Termination</span>
                                        </h4>
                                        
                                        <div class="serviceInfoContainer">
                                            
                                            <p class="serviceDetails">In case of resignation, the employee must serve the notice period as mentioned in the offer letter.</p>
                                            <div class="secionLine lineColorRed"></div>
                                        </div>
                                        <div class="serviceInfoContainer">
                                            
                                            <p class="serviceDetails">The company reserves the right to terminate employment with due notice as per company policies.</p>
                                            <div class="secionLine lineColorRed"></div>
                                        </div>
                                       
                                    </div>

                                    <div class="serviceLeadingSection">
                                        <h4><span class="sn brown">6.</span><span class="st brown">Non-Compete & Conflict of Interest</span>
                                        </h4>
                                        
                                        <div class="serviceInfoContainer">
                                            
                                            <p class="serviceDetails">The employee must not engage in any employment, business, or activity that conflicts with the company’s interests.</p>
                                            <div class="secionLine lineColorBrown"></div>
                                        </div>
                                        <div class="serviceInfoContainer">
                                            
                                            <p class="serviceDetails">Any breach may result in legal consequences.</p>
                                            <div class="secionLine lineColorBrown"></div>
                                        </div>
                                       
                                    </div>

                                    <div class="serviceLeadingSection">
                                        <h4><span class="sn pink">7.</span><span class="st pink">Amendments & Modifications</span>
                                        </h4>
                                        
                                        <div class="serviceInfoContainer">
                                            
                                            <p class="serviceDetails">The company reserves the right to amend policies and terms of employment from time to time.</p>
                                            <div class="secionLine lineColorPink"></div>
                                        </div>
                                        <div class="serviceInfoContainer">
                                            
                                            <p class="serviceDetails">The employee will be informed about any changes in due course.</p>
                                            <div class="secionLine lineColorPink"></div>
                                        </div>
                                       
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary accept" data-bs-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/acceptance-form.js') }}"></script>
@endsection
