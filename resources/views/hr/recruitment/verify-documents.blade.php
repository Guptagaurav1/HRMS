@extends('layouts.master', ['title' => 'Verify Documents'])
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')

<div class="dashboard-breadcrumb mb-25">
    <h2>Verifying Documents</h2>
    <h5>Current Status : <span class="text-danger">{{format_contact_status($details->finally)}}</span>
    </h5>

</div>
<div class="row" id="tab-1">
    <div class="col-md-12 text-end">
        <a href="{{route('applicant-recruitment-details-summary', ['rec_id' => $details->id, 'position' => $details->pos_req_id])}}" class="btn btn-primary recruitment-form-link">Recruitment Form</a>
    </div>
<form class="form verify_document">
    @csrf
    <div class="d-none">
        <input type="hidden" name="recruitment" value="{{$details->id}}">
    </div>
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5 class="text-dark text-white">Candidate Details</h5>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label" class="text-dark">Employee Code </label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Employee Code" value="{{$details->emp_code}}" disabled>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label" class="text-dark">Candidate Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Candidate Name" value="{{$details->firstname.' '.$details->lastname}}" name="candidate_name" required>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label" class="text-dark ">Gender <span class="text-danger">*</span></label>
                        <select id="" class="form-control form-control-sm" name="gender" required>
                            <option value=""> Select Gender</option>
                            <option value="Male" {{$details->getPersonalDetail->emp_gender == 'Male' ? 'selected' : ''}}>Male</option>
                            <option value="Female" {{$details->getPersonalDetail->emp_gender == 'Female' ? 'selected' : ''}}>Female</option>
                            <option value="Other" {{$details->getPersonalDetail->emp_gender == 'Other' ? 'selected' : ''}}>Other</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="form-control form-control-sm" name="category" required="" fdprocessedid="fbbzqq">
                          <option value="Not Specified">Not Specified</option>
                          <option value="general" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_category == 'general' ? 'selected' : ''}}>General</option>
                          <option value="obc" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_category == 'obc' ? 'selected' : ''}}>OBC</option>
                          <option value="sc" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_category == 'sc' ? 'selected' : ''}}>SC/ST</option>
                          <option value="st" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_category == 'st' ? 'selected' : ''}}>PH</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="inputDate" class="form-label">Date of Birth <span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control" value="{{$details->dob}}" name="dob" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Date Of Joining <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" value="{{$details->doj}}" name="doj" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Preferred Job Location <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Preferred Loaction" value="{{$details->getPersonalDetail ?$details->getPersonalDetail->preferred_location : ''}}" name="preferred_location" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Highest Qualification <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" value="{{$details->education}}"
                            placeholder="Enter Highest Qualification" name="highest_qualification" required>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Salary / CTC(Per Month)</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter CTC" value="{{$details->salary}}" name="ctc">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Total Experience <span class="fw-light"> (In Years) </span><span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Experience" value="{{$details->experience}}" name="experience" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Contact(Personal) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Contact Number" value="{{$details->phone}}" name="contact_personal" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Email(Personal)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Email" value="{{$details->email}}" name="email_personal" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Guardian Name(Parents/Others) <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Guardian Name" value="{{$details->getPersonalDetail ? $details->getPersonalDetail->emp_father_name : ''}}" name="guardian_name" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label text-wrap">Guardian(Parents/Others) Contact No.<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm"
                            placeholder="Enter Guardian Contact Number" value="{{$details->getPersonalDetail ? $details->getPersonalDetail->emp_father_mobile : ''}}" name="guardian_contact" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Blood Group <span class="text-danger">*</span></label>
                        <select name="blood_group" class="form-control form-control-sm" required>
                            <option value="Not Specified" selected="" disabled="">Not Specified</option>
                            <option value="a+" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_blood_group == 'a+' ? 'selected' : ''}}>A+</option>
                            <option value="a-" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_blood_group == 'a-' ? 'selected' : ''}}>A-</option>
                            <option value="b+" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_blood_group == 'b+' ? 'selected' : ''}}>B+</option>
                            <option value="b-" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_blood_group == 'b-' ? 'selected' : ''}}>B-</option>
                            <option value="o+" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_blood_group == 'o+' ? 'selected' : ''}}>O+</option>
                            <option value="o-" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_blood_group == 'o-' ? 'selected' : ''}}>O-</option>
                            <option value="ab+" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_blood_group == 'ab+' ? 'selected' : ''}}>AB+</option>
                            <option value="ab-" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_blood_group == 'ab-' ? 'selected' : ''}}>AB-</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Martial Status<span class="text-danger">*</span></label>
                        <select name="martial_status" class="form-control form-select" required="">
                          <option value="Not Specified" selected="" disabled="">Not Specified</option>
                          <option value="single" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_marital_status == 'single' ? 'selected' : ''}}>Single</option>
                          <option value="married" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_marital_status == 'married' ? 'selected' : ''}}>Married</option>
                          <option value="widowed" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_marital_status == 'widowed' ? 'selected' : ''}}>Widowed</option>
                          <option value="divorced" {{$details->getPersonalDetail && $details->getPersonalDetail->emp_marital_status == 'divorced' ? 'selected' : ''}}>Divorced / Seperated</option>
                        </select>
                    </div>


                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Spouse Name </label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Spouse Name" value="{{$details->getPersonalDetail->emp_husband_wife_name}}">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Language Known <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="language_known" value="{{$details->getPersonalDetail->language_known}}" required>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Skills<span class="text-danger">*</span></label>
                        <select class="form-select form-control js-example-basic-multiple" name="skills[]" multiple="multiple" required>
                            <option value="">Select Some Skills</option>
                            @foreach($skills as $skill)
                            <option value="{{$skill->skill}}" {{in_array($skill->skill, explode(',', $details->skill)) ? 'selected' : ''}}>{{$skill->skill}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Passport Size Photo<span class="text-danger">*</span></label>
                            <div class="">
                            <img src="{{asset('recruitment/candidate_documents/passport_size_photo/'.$details->getPersonalDetail->emp_photo.'')}}" alt="no-photo-found"  class="img-fluid rounded preview" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">E-Signature<span class="text-danger">*</span></label>
                            <img src="{{asset('recruitment/candidate_documents/sign/'.$details->getPersonalDetail->emp_signature.'')}}" alt="signature-not-found" class="img-fluid preview rounded" />
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="formFileSm" class="form-label">Candidate Resume <span class="text-danger">*</span></label>        
                            <a class="btn btn-sm btn-primary mt-5" href="{{asset('recruitment/candidate_documents/employee_resume/'.$details->resume.'')}}" target='_blank'> View <i
                                    class="fa-solid fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5 class="text-dark text-white">Communication Details</h5>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="p_address" class="form-label">Permanent Address <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" id="p_address"
                            placeholder="Enter Complete Address With State and City" name="p_address" required>{{$details->getAddressDetail->emp_permanent_address}}</textarea>
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="c_address" class="form-label">Correspondence Address <span class="text-danger">*</span><input class="form-check-input" type="checkbox" id="filladdress" ></span>Same as permanent</label>
                        <textarea class="form-control" id="c_address" placeholder="Enter Complete Address With State and City" name="c_address" required>{{$details->getAddressDetail->emp_local_address}}</textarea>
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label class="form-label">Nearest Police Station<span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Police Station" value="{{$details->getIdProofDetail->nearest_police_station}}" name="nearest_police_station" required>
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="formFile" class="form-label">Police Verification Id</label>
                        <input type="text" class="form-control form-control-sm"
                            placeholder="Enter Police Verification ID" value="{{$details->getIdProofDetail->police_verification_id}}" name="police_verification_id" />
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Address Proof<span class="text-danger">*</span></label>
                        @if($details->getIdProofDetail && $details->getIdProofDetail->permanent_add_doc)
                        <a href="{{asset('recruitment/candidate_documents/permanent_address_proof').'/'.$details->getIdProofDetail->permanent_add_doc}}" class="btn btn-primary" download>View <i
                            class="fa-solid fa-download"></i></a>
                            @else
                            <span class="text-danger">Not Uploaded</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5 class="text-dark text-white">Banking Account Details</h5>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Bank Name <span class="text-danger">*</span></label>
                        <select class="form-select form-control" name="bank_name" required>
                            <option value="">Select Bank Name</option>
                            @foreach($banks as $bank)
                            <option value="{{$bank->id}}" {{$details->getBankDetail->bank_id == $bank->id ? 'selected' : ''}}>{{$bank->name_of_bank}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Bank Branch Name <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control form-control-sm" placeholder="Enter Branch Name" value="{{$details->getBankDetail->emp_branch}}" name="branch_name" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Bank Account Number <span class="text-danger">*</span></label>
                        <input type="number" class="form-control form-control-sm"
                            placeholder="Enter Bank Account Number" value="{{$details->getBankDetail->emp_account_no}}" name="bank_account" required>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">IFSC Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter IFSC Code" value="{{$details->getBankDetail->emp_ifsc}}" name="bank_ifsc" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Aadhar Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Aadhar Number" value="{{$details->getIdProofDetail->emp_aadhaar_no}}" name="aadhar_no" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">PAN Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter PAN Number" value="{{$details->getBankDetail->emp_pan}}" name="pan_no" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Bank Document<span class="text-danger">*</span></label>
                        @if($details->getIdProofDetail && $details->getIdProofDetail->bank_doc)
                        <a href="{{asset('recruitment/candidate_documents/bank_account').'/'.$details->getIdProofDetail->bank_doc}}" class="btn btn-primary" download>View <i
                            class="fa-solid fa-download"></i></a>
                            @else
                            <span class="text-danger">Not Uploaded</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5 class="text-dark text-white">Educational Qualification</h5>
            </div>

            <div class="card mb-20">
                <div class="card-header">
                    10th Qualification
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">10th Passing Year <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter 10th Passing Year" min="0" value="{{$details->getEducationDetail['emp_tenth_year']}}" name="tenth_year" required>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Percentage/Grade</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Percentage" value="{{$details->getEducationDetail['emp_tenth_percentage']}}" name="tenth_percentage" >
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Board Name</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Board Name" value="{{$details->getEducationDetail['emp_tenth_board_name']}}">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Document</label>
                            @if($details->getEducationDetail && $details->getEducationDetail->emp_tenth_doc)
                           <a href="{{asset('recruitment/candidate_documents/10th').'/'.$details->getEducationDetail->emp_tenth_doc}}" class="btn btn-primary">View <i class="fa-solid fa-download"></i></a>
                           @else
                           <span class="text-danger">Not Uploaded</span>
                           @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="card mb-20">
                <div class="card-header">
                    12th Qualification
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">12th Passing Year </label>
                            <input type="text" class="form-control form-control-sm"
                                placeholder="Enter 12th Passing Year" value="{{$details->getEducationDetail['emp_twelve_year']}}" name="twelth_year" >
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Percentage/Grade</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Percentage" value="{{$details->getEducationDetail['emp_twelve_percentage']}}" name="twelth_percentage" >
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Board Name</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Board Name" value="{{$details->getEducationDetail['emp_twelve_board_name']}}" name="twelth_board" >

                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Document</label>
                            @if($details->getEducationDetail && $details->getEducationDetail->emp_twelve_doc)
                            <a href="{{asset('recruitment/candidate_documents/12th').'/'.$details->getEducationDetail->emp_twelve_doc}}" class="btn btn-primary">View <i class="fa-solid fa-download"></i></a>
                            @else
                            <span class="text-danger">Not Uploaded</span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="card mb-20">
                <div class="card-header">
                    Graduation
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Passing Year/Persuing </label>
                            <input type="number" class="form-control form-control-sm"
                                placeholder="Passing Year / Pursuing" value="{{$details->getEducationDetail->emp_graduation_year}}" name="grad_year" >
                        </div>
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Percentage/Grade</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Percentage/Grade" value="{{$details->getEducationDetail->emp_graduation_percentage}}" >
                        </div>
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Mode Of Graduation</label>
                            <select class="form-control form-select" name="graduation_mode">
                              <option value="Not Specified">Not Specified</option>
                              <option value="regular" {{$details->getEducationDetail->emp_graduation_mode == 'regular' ? 'selected' : ''}}>Regular</option>
                              <option value="distance" {{$details->getEducationDetail->emp_graduation_mode == 'distance' ? 'selected' : ''}}>Distance</option>
                              <option value="correspondence" {{$details->getEducationDetail->emp_graduation_mode == 'correspondence' ? 'selected' : ''}}>Correspondence</option>
                            </select>

                        </div>
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Degree Name</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Degree Name" value="{{$details->getEducationDetail->emp_gradqualification}}">

                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Document</label>
                            @if($details->getEducationDetail && $details->getEducationDetail->grad_doc)
                            <a href="{{asset('recruitment/candidate_documents/graduation').'/'.$details->getEducationDetail->grad_doc}}" class="btn btn-primary">View <i class="fa-solid fa-download"></i></a>
                            @else
                            <span class="text-danger">Not Uploaded</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-20">
                <div class="card-header">
                    Post Graduation
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Passing Year/Persuing </label>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter Passing Year" value="{{$details->getEducationDetail->emp_postgraduation_year}}" name="post_grad_year" >
                        </div>
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Percentage/Grade</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Percentage" value="{{$details->getEducationDetail->emp_postgraduation_percentage}}">
                        </div>
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Mode Of Post Graduation</label>
                            <select class="form-select form-control" name="postgraduation_mode">
                              <option value="Not Specified">Not Specified</option>
                              <option value="regular" {{$details->getEducationDetail->emp_postgraduation_mode == 'regular' ? 'selected' : ''}}>Regular</option>
                              <option value="distance" {{$details->getEducationDetail->emp_postgraduation_mode == 'distance' ? 'selected' : ''}}>Distance</option>
                              <option value="correspondence" {{$details->getEducationDetail->emp_postgraduation_mode == 'correspondence' ? 'selected' : ''}}>Correspondence</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Degree Name</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Degree Name" value="{{$details->getEducationDetail->emp_postgradqualification}}">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Document</label>
                            @if($details->getEducationDetail && $details->getEducationDetail->post_grad_doc)
                            <a href="{{asset('recruitment/candidate_documents/post_graduation').'/'.$details->getEducationDetail->post_grad_doc}}" class="btn btn-primary">View <i class="fa-solid fa-download"></i></a>
                            @else
                            <span class="text-danger">Not Uploaded</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-dark text-white">Current Company Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Company Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Company Name" value="{{$details->getCompanyDetail->company_name}}" name="company_name" required>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Designation <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Designation" value="{{$details->getCompanyDetail->designation}}" name="designation" required>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Technologies You Have Worked In <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm"
                                placeholder="Enter Technologies You Have Worked In" value="{{$details->getCompanyDetail->technologies_worked_in}}" name="technology_work" required>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="formFile" class="form-label">Projects You Have Worked In <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm"
                                placeholder="Enter Differnt Project You Have Worked In" value="{{$details->getCompanyDetail->projects_worked_in}}" name="projects_worked_in" required>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Salary in CTC <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter Salary CTC" value="{{$details->getCompanyDetail->salary_ctc}}" name="salary_ctc" required>
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">

                            <label class="form-label">Take Home Salary <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="Enter Take Home Salary" value="{{$details->getCompanyDetail->take_home_salary}}" name="take_home_salary" required>
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Start Date </label>
                            <input type="date" class="form-control form-control-sm" value="{{$details->getCompanyDetail->start_date}}"><br>
                            <p>Last 3months Salary Slip Document 
                                @if($details->getCompanyDetail->last_3months_sal_slip_doc)
                                <a href="{{asset('recruitment/candidate_documents/sal_slip/'.$details->getCompanyDetail->last_3months_sal_slip_doc.'')}}" target="_blank"><i class="fa-solid fa-download"></i></a>
                                @else
                                <p class="text-danger">Not Uploaded</p>
                                @endif
                            </p>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">End Date </label>
                            <input type="date" class="form-control form-control-sm" placeholder="Enter Salary CTC" value="{{$details->getCompanyDetail->end_date}}"><br>
                            <p>Last 3months Bank Statement Document
                                @if($details->getCompanyDetail['3months_bank_stat_doc'])
                                <a href="{{asset('recruitment/candidate_documents/sal_slip/'.$details->getCompanyDetail['3months_bank_stat_doc'].'')}}" target="_blank"><i class="fa-solid fa-download"></i></a>
                                @else
                                <p class="text-danger">Not Uploaded</p>
                                @endif
                                </p>
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">

                            <label class="form-label">Releiving/Exp/Appraisal Letter </label>
                            <input type="text" class="form-control" placeholder="Enter Take Home Salary" value="{{$details->getCompanyDetail->take_home_salary}}">
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-dark text-white">Relationship and Nominee Details </h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-sm-12 col-md-12">
                            <div class="table-responsive mt-3 ">
                                <table
                                    class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                    id="allEmployeeTable">
                                    <thead>
                                        <tr>
                                            <th class="srno-column">S.No.</th>
                                            <th class="rid-column">Family Members</th>
                                            <th>Relationship with member</th>
                                            <th class="attributes-column">Aadhar Card No.</th>
                                            <th>DOB</th>
                                            <th>Aadhar Document</th>
                                            <th>Stay With Member</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($details->getNomineeDetail as $nominee)
                                        <tr class="border">
                                            <td>1</td>
                                            <td>{{$nominee->family_member_name}}</td>
                                            <td>{{$nominee->relation_with_mem}}</td>
                                            <td>{{$nominee->aadhar_card_no}}</td>
                                            <td>{{$nominee->dob}}</td>
                                            <td ><a href="{{asset('recruitment/candidate_documents/family_relation_doc/'.$nominee->aadhar_card_doc.'')}}" class="btn btn-primary text-light text-decoration-none" target='_blank'>Aadhar Card</a></td>
                                            <td col>{{$nominee->stay_with_mem}}</td>
                                        </tr>
                                         <tr class="border">
                                            <td colspan="2">Nominee</th>
                                            <td colspan="2"><input type="text" class="form-control" value="{{$nominee->nominee}}"></td>
                                            <td colspan="1">Dispensary Near you</th>
                                            <td colspan="2"><input type="text" class="form-control" value="{{$nominee->dispensary_near_you}}"></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-dark text-white">Other Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">

                            <label class="form-label">Enter PF UAN No </label>
                            <input type="text" class="form-control" placeholder="Enter PF" value="{{$details->getBankDetail->emp_pf_no}}">

                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">ESI No</label>
                            <input type="text" class="form-control" placeholder="Enter ESI No" value="{{$details->getBankDetail->emp_esi_no}}">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">

                            <label class="form-label">Passport No </label>
                            <input type="text" class="form-control" placeholder="Enter Passport" value="{{$details->getIdProofDetail->emp_passport_no}}">

                        </div>
                    </div>
                    <p class="text-danger">Note : Click Verified button only if all required documents are valid.</p>
                    <p class="text-danger">Note : All Fields marks with ** are mandatory to submit the details.</p>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end mt-3">
            @if($details->finally == "docs_checked" || $details->finally == "joining-formalities-completed" || $details->finally == "joined")
            <button type="button" class="btn btn-sm btn-primary" disabled> Already Checked</button>
            @else
            <button type="submit" class="btn btn-sm btn-primary click_verified"> Click Verified <i class="fa-solid fa-arrow-right"></i></button>
            @endif
        </div>
    </div>
</form>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('assets/js/hr/verify_document.js')}}"></script>
@endsection