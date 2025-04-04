@extends('layouts.master', ['title' => 'Applicant Detail Summary'])


@section('contents')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header heading-stripe">
                    <h3 class="mt-2 text-center">Applicant</h3>
                </div>
                <div class="">
                    <div class="row px-2">
                      <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                        <symbol id="check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                      </svg>
                      @if(session()->has('error'))
                      <div class="col-md-12">
                      <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                      <div>
                          {{session()->get('message')}}
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      </div>
                      @endif
                        <div class="col-md-6">
                            <div class="card">
                                <form id="msform">

                                    <ul id="progressbar">
                                        <li class="text-dark {{$data->finally == 'first-rejected' ? 'reject' : ''}} {{!empty($data->stage1) && $data->stage1 == 'yes' ? 'active' : ''}}" id="account">{{$data->finally == 'first-rejected' ? 'Rejected' : 'CV Shortlisted'}}<br>Intial Stage</li>

                                        <li id="personal" class="{{$data->stage2 == 'yes' || $data->stage2 == 'skip' ? 'active' : ''}} {{$data->finally == 'first-rejected' || $data->finally == 'second-rejected' ? 'reject' : ''}}"><span class="text-dark">{{$data->finally == 'first-rejected' || $data->finally == 'second-rejected' ? 'Rejected' : 'Interview Conducted'}} <br> Stage
                                                1</span></li>

                                        <li id="payment" class="{{$data->stage3 == 'yes' || $data->stage3 == 'skip' ? 'active' : ''}} {{$data->finally == 'first-rejected' || $data->finally == 'second-rejected'|| $data->finally == 'third-rejected' ? 'reject' : ''}}"><span class="text-dark">{{$data->finally == 'first-rejected' || $data->finally == 'second-rejected' || $data->finally == 'third-rejected' ? 'Rejected' : 'Interview Conducted'}} <br> Stage 2
                                            </span></li>

                                        <li id="confirm" class="{{$data->stage4 == 'yes' ? 'active' : ''}} {{$data->finally == 'first-rejected' || $data->finally == 'second-rejected' || $data->finally == 'third-rejected' ? 'reject' : ''}}"><span class="text-dark">{{$data->finally == 'first-rejected' || $data->finally == 'second-rejected' || $data->finally == 'third-rejected' ? 'Rejected' : 'Confirmation Offer Letter Sent'}}
                                                <br>Stage 3</span></li>

                                        <li id="confirm" class="{{$data->finally == 'joining-formalities-completed' || $data->finally == 'joined' ? 'active' : ''}} {{$data->finally == 'first-rejected' || $data->finally == 'second-rejected' || $data->finally == 'third-rejected' ? 'reject' : ''}}"><span class="text-dark">{{$data->finally == 'first-rejected' || $data->finally == 'second-rejected' || $data->finally == 'third-rejected' ? 'Rejected' : 'Joining Formalities'}}<br>Stage 4</span>
                                        </li>

                                        <li id="confirm" class="employee-code {{$data->finally == 'joined' ? 'active' : ''}} {{$data->finally == 'first-rejected' || $data->finally == 'second-rejected' || $data->finally == 'third-rejected' ? 'reject' : ''}}"><span class="text-dark">{{$data->finally == 'first-rejected' || $data->finally == 'second-rejected' || $data->finally == 'third-rejected' ? 'Rejected' : 'Employee Code Generation'}} <br>Final Stage</span></li>
                                    </ul>

                                    <br>

                                    @if(empty($data->stage1) || !empty($data->stage1))
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="">
                                                <h3 class="panel-header">
                                                    CV Shortlisted
                                                </h3>
                                                <div class="col-md-12" class="parent-id">
                                                    @if($data->finally == 'first-rejected' || $data->finally == 'second-rejected' || $data->finally == 'third-rejected')
                                                    <img src="{{asset('recruitment/images/rejected.png')}}" alt="img" id="shortlisted" />
                                                    @elseif($data->stage1 == 'yes')
                                                    <img class="upper_image" src="{{asset('assets/vendor/images/shortlisted.png')}}" alt="img" id="shortlisted" />
                                                    @endif  
                                                    <div class="ratio ratio-1x1 h-auto border">
                                                        {{-- <img  src="{{asset('assets/vendor/images/shortlisted.png')}}" alt="img" /> --}}
                                                        <iframe class="iframe_resume" src="{{ $data->resume ? asset('recruitment/candidate_documents/employee_resume/'.$data->resume.'') : '' }}"
                                                            title="Resume" frameborder="0" allowfullscreen
                                                            style="width:100%" ; height="700px">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(!empty($data->stage2))
                                        <input type="button" name="next" class="next action-button" value="Next" />
                                        @endif
                                    </fieldset>
                                    @endif

                                    @if(!empty($data->stage2))
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="panel-header">
                                                        Interview Conducted
                                                    </h3>

                                                </div>


                                                <div class="col-md-12">
                                                    <p class="text-danger fs-5 px-2">Remarks for First Round Interview</p>
                                                    <p>{{$data->remarks_first_round}}</p>
                                                </div>
                                            </div>

                                        </div>

                                        @if(!empty($data->stage3))
                                         <input type="button" name="next" class="next action-button" value="Next" />
                                        @endif
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                    @endif

                                    @if(!empty($data->stage3))
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="panel-header">
                                                        Interview Conducted
                                                    </h3>

                                                </div>

                                                <div class="col-md-12">
                                                    <p class="text-danger fs-5 ml-2">Remarks for Second Round Interview</p>
                                                    <p>{{$data->remarks_second_round}}</p>
                                                </div>
                                            </div>

                                        </div>
                                        @if(!empty($data->stage4))
                                        <input type="button" name="next" class="next action-button" value="Next" />
                                        @endif 
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                    @endif

                                    @if(!empty($data->stage4))
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="panel-header">
                                                        Confirmation Offer Letter
                                                    </h3>
                                                </div>
                                                <div class="col-md-12" class="d-none prev_confirm" id="confirmationofferHide">
                                                    <h6 class="px-2 text-danger text-center">{{$data->firstname.' '.$data->lastname}} has been
                                                        selected for {{$data->job_position}} position</h6>
                                                    <div class="col-md-12">
                                                        <p class="text-center text-danger">Preview</p>
                                                            <p class="px-2 text-center">
                                            Dear {{$data->firstname.' '.$data->lastname}},

                                        Congratulations on the day!!!</br></br>

                                        We are pleased to inform you that you have been selected for the profile of {{$data->job_position}} with our organisation i.e. Prakhar Software Solutions Pvt. Ltd.</br></br>

                                        You are therefore requested to report at Prakhar Software Solutions Pvt. Ltd. located in New Delhi on <span id="dateoj">{{date('jS F, Y', strtotime($data->doj))}}</span> for the document verification & induction and training on the services offered by the Client Organisation.</br></br>

                                        We have also enclosed the required documents for joining along with our corporate profile. You are requested to share your educational documents in response to this mail (and copy to info@prakharsoftwares.com) and upon verification of the documents, the offer letter would be issued. </br></br>

                                        For any query feel free to email us at info@prakharsoftwares.com
                                      </p>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-md-12" id="confirmationOfferLetter">
                                                    <iframe src="jd" title="Resume"
                                                        frameborder="0" allowfullscreen style="width:100%" ;
                                                        height="700px">
                                                    </iframe>
                                                </div> -->
                                            </div>

                                        </div>
                                        @if($data->finally == 'joining-formalities-completed')
                                        <input type="button" name="next" class="next action-button" value="Next" />
                                        @endif
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                    @endif

                                    @if($data->finally == 'joining-formalities-completed')
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="panel-header">Joining Formalties</h2>
                                                </div>
                                                <div class="col-md-12">
                                                    <iframe src="{{ asset('resume/'.$data->resume.'') }}" title="Resume"
                                                        frameborder="0" allowfullscreen style="width:100%" ;
                                                        height="700px">
                                                    </iframe>
                                                </div>
                                            </div>
                                        </div>
                                        @if($data->finally == 'joined')
                                        <input type="button" name="next" class="next action-button" value="Next" />
                                        @endif
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                    @endif

                                    @if($data->finally == 'joined')
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="panel-header">Employee Code Final Stage</h3>
                                                </div>
                                                 <div class="col-md-12">
                                                    <iframe src="{{ asset('resume/'.$data->resume.'') }}" title="Resume"
                                                        frameborder="0" allowfullscreen style="width:100%" ;
                                                        height="700px">
                                                    </iframe>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Submit" />
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />   
                                    </fieldset>
                                   @endif
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel border border-dark shadow-lg text-center" id="card">
                                <div class="panel-header">
                                    <h4 class="mt-2 px-2">Preview Summary</h4>
                                </div>

                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                                        <tbody>
                                            <tr>
                                                <td class="bold applicant-tr">Position</td>
                                                <td>{{$data->job_position}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Name</td>
                                                <td>{{$data->firstname." ".$data->lastname}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">DOB</td>
                                                <td>{{$data->dob}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Education</td>
                                                <td>{{$data->education}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Experience</td>
                                                <td>{{$data->experience." Yr"}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Skill</td>
                                                <td>{{$data->skill}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Location</td>
                                                <td>{{$data->location}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Email</td>
                                                <td>{{$data->email}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Phone</td>
                                                <td>{{$data->phone}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Salary</td>
                                                <td class="text-wrap">
                                                    {{$data->salary}}

                                                </td>
                                            </tr>
                                            @if($data->finally == 'joined')
                                             <tr>
                                                <td class="bold">Employee Code Generated</td>
                                                <td class="text-wrap">
                                                    {{$data->emp_code}}

                                                </td>
                                            </tr>
                                            @endif
                                          <!--   <tr>
                                                <td class="fw-bolder text-center text-dark fs-4" colspan="2">
                                                    Enter new
                                                    Details if Any ?</td>
                                            </tr> -->
                                            @if($data->finally != 'joined')
                                            <!-- Initially Stage -->
                                            @if(empty($data->finally))
                                                    <form class="form shortlist_first">
                                                        @csrf
                                                        <div class="d-none">
                                                            <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                            <input type="hidden" name="first_shortlist" value="">
                                                        </div>
                                                        <tr>
                                                            <td class="bold">Remarks For Mail <span class='text-danger'>*</span></td>
                                                            <td><input class="form-control for_char" type="text" name="remark" required/>
                                                            <span class="remark"></span>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                        <td class="bold">Action</td>
                                                        <td>
                                                        <input type="submit" name="shortlist" class="btn btn-sm btn-success mt-2 mail_btn first_stage shortlist_btn" value="shortlist">
                                                        <input type="submit" name="reject" class="btn btn-sm btn-danger mt-2 mail_btn first_stage shortlist_btn" value="reject">
                                                        </td>
                                                        </tr>
                                                    </form>
                                            @endif

                                            <!-- Send Interview Details Form -->
                                            @if($data->stage1 == 'yes' && empty($data->stage2) && $data->finally != 'send_interview_details')
                                            <form class="form interview_details">
                                                @csrf
                                                <div class="d-none">
                                                <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                </div>
                                                <tr>
                                                    <td class="bold">Interview Details</td>
                                                    <td><textarea class="form-control" name="interview_details" required></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td class="bold">Action</td>
                                                    <td>
                                                        <button type="submit" name="stage2" class="btn btn-sm btn-primary mt-2 mail_btn first_stage">Send Interview Details
                                                        </button>
                                                    </form>
                                                    </td>
                                                </tr>
                                            </form>
                                            @endif

                                            <!-- First Stage Completion Form -->
                                             @if($data->stage1 == 'yes' && empty($data->stage2) && $data->finally == 'send_interview_details')
                                            <form class="form remark_first">
                                                 @csrf
                                                <div class="d-none">
                                                    <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                    <input type="hidden" name="first_submit" value="">
                                                </div>
                                                <tr>
                                                    <td class="bold">Remarks For First Round:</td>
                                                      <td>
                                                        <input class="form-control" type="text" name="remarks_first_round" required>
                                                      </td>
                                                </tr>
                                                <tr>
                                                    <td class="bold">Action</td>
                                                    <td>
                                                        <input type="submit" name="selected" value="Select" class="btn btn-sm btn-primary mt-2 first_stage first_submit" >
                                                        <input type="submit" name="rejected" class="btn btn-sm btn-danger mt-2 first_stage first_submit" value="Reject">
                                                        <input type="submit" name="skip" class="btn btn-sm btn-warning mt-2 first_stage first_submit text-light" value="Skip">
                                                    </td>
                                                </tr>
                                            </form>
                                            @endif

                                            <!-- Second Stage Form -->
                                            @if(($data->stage2 == 'yes' || $data->stage2 == 'skip') && empty($data->stage3))
                                            <form class="form remark_second">
                                                 @csrf
                                                <div class="d-none">
                                                    <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                    <input type="hidden" name="second_submit" value="">
                                                </div>
                                                <tr>
                                                    <td class="bold">Remarks For Second Round:</td>
                                                      <td>
                                                        <input class="form-control" type="text" name="remarks_second_round" required>
                                                      </td>
                                                </tr>
                                                <tr>
                                                    <td class="bold">Action</td>
                                                    <td>
                                                        <input type="submit" name="selected" value="Select" class="btn btn-sm btn-primary mt-2 second_stage second_submit" >
                                                        <input type="submit" name="rejected" class="btn btn-sm btn-danger mt-2 second_stage second_submit" value="Reject">
                                                        <input type="submit" name="skip" class="btn btn-sm btn-warning mt-2 second_stage second_submit" value="Skip">
                                                    </td>
                                                </tr>
                                            </form>
                                            @endif

                                             <!-- Third Stage Form -->
                                            @if(($data->stage3 == 'yes' || $data->stage3 == 'skip' ) && empty($data->stage4))
                                            <form class="form third_stage">
                                                 @csrf
                                                <div class="d-none">
                                                    <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                </div>
                                                <tr>
                                                    <td class="bold">Date Of Joining:</td>
                                                      <td>
                                                        <input class="form-control" type="date" name="doj" required>
                                                      </td>
                                                </tr>
                                                <tr>
                                                    <td class="bold">Action</td>
                                                    <td>
                                                        <button type="submit" class="btn btn-sm btn-primary mt-2 third_stage" onclick="">Send Confirmation</button>
                                                    </td>
                                                </tr>
                                            </form>
                                            @endif

                                            @if($data->stage4 == 'yes' && $data->finally != 'joining-formalities-completed')
                                               <!-- Preview Offer Letter -->
                                            <tr>
                                                <td class="bold">Preview Offer Letter</td>
                                                <td>
                                                    <form class="form preview_offer_letter">
                                                       @csrf
                                                       <div class="d-none">
                                                           <input type="hidden" name="recruitment" value="{{$data->id}}" required>
                                                       </div>
                                                        <button type="submit" class="btn btn-sm btn-primary mt-2 previewletter"
                                                        >Preview Offer Letter <i
                                                            class="fa-solid fa-file"></i>
                                                        </button>
                                                    </form>
                                                    </td>
                                            </tr>
                                            @endif
                                            <!-- Fourth Stage Form -->
                                            @if($data->stage4 == 'yes' && $data->finally != 'backout' && $data->finally != 'joining-formalities-completed')
                                            <!-- Update Email Form -->
                                            <tr>
                                                <td class="bold">Update Email <span class="text-danger">*</span></td>
                                                <td>
                                                <form class="form email_form">
                                                    @csrf
                                                    <div class="d-none">
                                                        <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                    </div>
                                                    <input type="email" class="form-control for_char" name="update_email" placeholder="Update Email" required>
                                                    <span class="update_email"></span>
                                                    <button type="submit" class="btn btn-sm btn-primary mt-2 mail_btn">Update Mail <i class="fa-solid fa-envelope"></i>
                                                    </button>
                                                </form>
                                                </td>
                                            </tr>

                                            <!-- Update Salary -->
                                            <tr>
                                                <td class="bold">Update Salary</td>
                                                <td>
                                                    <form class="form salary_form">
                                                        @csrf
                                                        <div class="d-none">
                                                            <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                        </div>
                                                        <input type="number" class="form-control" name="update_salary" 
                                                        placeholder="Update Salary" min="0" required>
                                                        <button type="submit" class="btn btn-sm btn-primary mt-2 salary_btn">Update Salary <i class="fa-solid fa-money-bill"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Update Date of Joining -->
                                            <tr>
                                                <td class="bold">Update Date Of Joining</td>
                                                <td>
                                                    <form class="form doj_form">
                                                        @csrf
                                                        <div class="d-none">
                                                            <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                        </div>
                                                        <input type="date" class="form-control" name="update_doj" required>
                                                        <button type="submit" class="btn btn-sm btn-primary mt-2 doj_btn">Update Date Of Joining
                                                            <i class="fa-solid fa-money-bill"></i>
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>

                                            <!-- Update Location -->
                                            <tr>
                                                <td class="bold">Update Location</td>
                                                <td>
                                                    <form class="form location_form">
                                                        @csrf
                                                        <div class="d-none">
                                                            <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                        </div>
                                                        <input type="text" class="form-control" name="update_location" maxlength="50" required>
                                                        <button type="submit" class="btn btn-sm btn-primary mt-2 btn_location">Update Location <i class="fa-solid fa-location-dot"></i>  
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>

                                            @if($data->employment_type == 'Contractual')
                                                <!-- Update Scope of work -->
                                            <tr>
                                                <td class="bold">Update Scope Of Work</td>
                                                <td>
                                                    <form class="form work_scope">
                                                        @csrf
                                                        <div class="d-none">
                                                            <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                        </div>
                                                        <textarea class="form-control" name="update_scope_work"
                                                            placeholder="Update Scope Of Work" required></textarea>
                                                        <button type="submit" class="btn btn-sm btn-primary mt-2">Update Scope Of Work <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                            @endif

                                            @if(empty($data->stage5))
                                             <!-- Send Offer Letter Button -->
                                            <tr>
                                                <td class="bold">Send Offer Letter</td>
                                                <td>
                                                    @if($data->rec_form_status == 'relationship_stage')
                                                    <form class="form send_offer_letter">
                                                        @csrf
                                                        <div class="d-none">
                                                            <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                        </div>
                                                        <button type="submit" class="btn btn-sm btn-primary mt-2 fourth_stage">Send Offer Letter<i class="fa-solid fa-check"></i>
                                                        </button>
                                                    </form>
                                                    @else
                                                    <span class="text-danger">Recruitment Form not submitted yet</span>
                                                    @endif
                                                
                                                </td>

                                            </tr>
                                            @elseif(!empty($data->stage5) && $data->rec_form_status == 'relationship_stage')
                                                <tr>
                                                <td class="bold">Send Offer Letter</td>
                                                <td>
                                                    <form class="form send_offer_letter">
                                                        @csrf
                                                        <div class="d-none">
                                                            <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                        </div>
                                                        <button type="submit" class="btn btn-sm btn-primary mt-2 fourth_stage">Send Offer Letter Again
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                    </form>
                                                
                                                </td>

                                            </tr>
                                            @endif

                                            @endif
                                            
                                            @if($data->stage5 == 'yes' && $data->finally != 'joining-formalities-completed')
                                                 <!-- Document Verification Check -->
                                            <tr>
                                                <td class="bold">Document Verification</td>
                                                <td>
                                                    @if($data->rec_form_status == 'relationship_stage')
                                                    <div class="d-flex">
                                                    <a href="{{route('verify-documents', ['id' => $data->id, 'position' => $data->pos_req_id])}}">
                                                    <button class="btn btn-sm btn-primary mt-2">Check <i
                                                            class="fa-solid fa-check"></i>
                                                    </button>
                                                        </a>
                                                    @if($data->finally == 'docs_checked')
                                                        <form class="form verify_document mx-2">
                                                        @csrf
                                                        <div class="d-none">
                                                            <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                        </div>
                                                        <button type="submit" class="btn btn-sm btn-primary mt-2 verify_doc">Verify Documents</button>
                                                    </form>
                                                    @endif
                                                </div>
                                                @else
                                                    <span class="text-danger">Recruitment Form not submitted yet.</span>
                                                @endif
                                                </td>

                                            </tr>

                                            <!-- Reason For Backout Section -->
                                            <tr>
                                                <td class="bold text-center bg-white">
                                                    Reason For Backout
                                                </td>
                                                <td>
                                                  <form class="form backout_form">
                                                     @csrf
                                                    <div class="d-none">
                                                      <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                    </div>
                                                    <textarea class="form-control" name="backout_reason"
                                                        placeholder="Reason For Backout" {{$data->finally == 'backout' ? 'disabled' : ''}} required>{{$data->remarks_for_backout}}</textarea>

                                                    @if($data->finally != 'backout')
                                                        <button type="submit" class="btn btn-sm btn-primary mt-2 backout-btn">Reason For Backout <i class="fa-solid fa-backward-step"></i>
                                                    </button>
                                                    @endif
                                                    </form>
                                                </td>
                                            </tr>

                                            @if($data->finally != 'backout')
                                            <!-- Employee Code Section -->
                                            <form class="form candidate_join">
                                                @csrf
                                                <div class="d-none">
                                                    <input type="hidden" name="recruitment" value="{{$data->id}}">
                                                </div>
                                            <tr>
                                                <td colspan="2" class="text-center">OR</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">Employee Code</td>

                                                <td class="text-center"> <input type="text" class="form-control"
                                                        placeholder="Employee Code" name="emp_code" required></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-center">
                                                    <button type="submit" class="btn btn-sm btn-primary mt-2 joined_btn">Join <i class="fa-solid fa-handshake"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </form>
                                            <tr>
                                                <td colspan="2" class="text-center text-danger">
                                                    Note : Please verify the document first!!
                                                </td>
                                            </tr>
                                            <!-- End Employee Code Section -->
                                            @endif
                                            @endif
                                            @endif

                                            @if($data->finally == 'joining-formalities-completed')
                                                <tr>
                                                    <td class="bold">Employee Code</td>
                                                    <td>
                                                    @if(auth()->user()->hasPermission('employee.add-employee'))
                                                        <a href="{{route('employee.add-employee', ['recruitment_id' => $data->id])}}" class="btn btn-sm btn-primary mt-2 text-light text-decoration-none">Generate
                                                        </a>
                                                    @endif
                                                    
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/js/applicantform.js')}}"></script>
<script src="{{asset('assets/js/commonValidation.js')}}"></script>


@endsection