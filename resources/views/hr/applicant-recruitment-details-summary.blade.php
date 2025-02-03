@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

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
                        <div class="col-md-6">
                            <div class="card">
                                <form id="msform">

                                    <ul id="progressbar">
                                        <li class="active text-dark" id="account">CV Shortlisted<br>Intial Stage</li>
                                        <li id="personal"><span class="text-dark">Interview Conducted <br> Stage
                                                1</span></li>
                                        <li id="payment"><span class="text-dark">Interview Conducted <br> Stage 2
                                            </span></li>
                                        <li id="confirm"><span class="text-dark">Confirmation Offer Letter Sent
                                                <br>Stage 3</span></li>
                                        <li id="confirm"><span class="text-dark">joining Formalities<br>Stage 4</span>
                                        </li>
                                        <li id="confirm" class="employee-code"><span class="text-dark">Employee Code
                                                Generation <br>Final Stage</span></li>
                                    </ul>

                                    <br>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="">
                                                <h3 class="panel-header">
                                                    CV Shortlisted
                                                </h3>
                                                <div class="col-md-12" class="parent-id">
                                                    <img src="{{'assets/vendor/images/shortlisted.png'}}" alt="img"
                                                        id="shortlisted" />
                                                    <div class="ratio ratio-1x1 h-auto border">
                                                        <img src="{{'assets/vendor/images/shortlisted.png'}}"
                                                            alt="img" />

                                                        <iframe src="{{ asset('assets/resume/resume.pdf') }}"
                                                            title="Resume" frameborder="0" allowfullscreen
                                                            style="width:100%" ; height="700px">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next" />


                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="panel-header">
                                                        Inerview Conducted
                                                    </h3>

                                                </div>


                                                <div class="col-md-12">
                                                    <p class="text-danger fs-5 px-2">Note : Remarks For the First Round
                                                        Interview</p>
                                                </div>
                                            </div>

                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next" />
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="Previous" />

                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="panel-header">
                                                        Inerview Conducted
                                                    </h3>

                                                </div>


                                                <div class="col-md-12">
                                                    <p class="text-danger fs-5 ml-2">Note : Remarks For the Second Round
                                                        Interview</p>
                                                </div>
                                            </div>

                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next" />
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="Previous" />
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="panel-header">
                                                        Confirmation Offer Letter
                                                    </h3>
                                                </div>


                                                <div class="col-md-12" id="confirmationofferHide">
                                                    <h6 class="px-2 text-danger text-center">Mansee Muhare has been
                                                        selected for Telecaller Cum Counselor position</h6>
                                                    <div class="col-md-12">
                                                        <p class="text-center text-danger">Preview</p>
                                                        <p class="px-2 text-center">Dear Mansee Muhare,

                                                            Congratulations on the day!!!
                                                            <br><br>


                                                            We are pleased to inform you that you have been selected for
                                                            the
                                                            profile of Telecaller Cum Counselor with our organisation
                                                            i.e.
                                                            Prakhar Software Solutions Pvt. Ltd.<br><br>



                                                            You are therefore requested to report at Prakhar Software
                                                            Solutions Pvt. Ltd. located in New Delhi on

                                                            for the document verification &amp; induction and training
                                                            on
                                                            the services offered by the Client Organisation.<br><br>



                                                            We have also enclosed the required documents for joining
                                                            along
                                                            with our corporate profile. You are requested to share your
                                                            educational documents in response to this mail (and copy to
                                                            info@prakharsoftwares.com) and upon verification of the
                                                            documents, the offer letter would be issued. <br><br>
                                                            For any query feel free to mail us at
                                                            info@prakharsoftwares.com
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-md-12" id="confirmationOfferLetter">
                                                    <iframe src="{{ asset('assets/resume/resume.pdf') }}" title="Resume"
                                                        frameborder="0" allowfullscreen style="width:100%" ;
                                                        height="700px">
                                                    </iframe>
                                                </div>
                                            </div>

                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next" />
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="Previous" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="panel-header">joining Formalties</h2>
                                                </div>
                                                <div class="col-md-12">
                                                    <iframe src="{{ asset('assets/resume/resume.pdf') }}" title="Resume"
                                                        frameborder="0" allowfullscreen style="width:100%" ;
                                                        height="700px">
                                                    </iframe>
                                                </div>

                                            </div>


                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next" />
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="Previous" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="panel-header">Employee Code Final Stage</h3>
                                                </div>

                                            </div>


                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Submit" />
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="Previous" />


                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel border border-dark shadow-lg text-center" id="card">
                                <div class="panel-header">
                                    <h4 class="mt-2 px-2">Preview Summary</h4>
                                </div>

                                <div class="card-body table-responsive">
                                    <table
                                        class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                        id="allEmployeeTable">
                                        <tbody>
                                            <tr>
                                                <td class="bold applicant-tr">Position</td>
                                                <td>Developer</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Name</td>
                                                <td>NA</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">DOB</td>
                                                <td>NA</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Education</td>
                                                <td>IT</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Experience</td>
                                                <td>NA</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Skill</td>
                                                <td>NA</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Loaction</td>
                                                <td>NA</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Email</td>
                                                <td>NA</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Phone</td>
                                                <td>0-2 Years</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Salary</td>
                                                <td class="text-wrap">
                                                    NA

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder text-center text-dark fs-4" colspan="2">Enter new
                                                    Details if Any ?</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Update Email</td>
                                                <td>
                                                    <input type="email" class="form-control" placeholder="Update Email">
                                                    <button class="btn btn-sm btn-primary mt-2">Update Mail <i
                                                            class="fa-solid fa-envelope"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Preview Offer Letter</td>
                                                <td><button class="btn btn-sm btn-primary mt-2"
                                                        id="previewOffer">Preview Offer Letter <i
                                                            class="fa-solid fa-file"></i>
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Update Salary</td>
                                                <td> <input type="number" class="form-control"
                                                        placeholder="Update Salary">
                                                    <button class="btn btn-sm btn-primary mt-2">Update Salary <i
                                                            class="fa-solid fa-money-bill"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Update Date Of Joining</td>
                                                <td>
                                                    <input type="date" class="form-control">
                                                    <button class="btn btn-sm btn-primary mt-2">Update Date Of Joining
                                                        <i class="fa-solid fa-money-bill"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="bold">Update Loaction</td>
                                                <td>
                                                    <input type="date" class="form-control">
                                                    <button class="btn btn-sm btn-primary mt-2">Update Loaction <i
                                                            class="fa-solid fa-location-dot"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="bold">Update Scope Of Work</td>
                                                <td>
                                                    <textarea class="form-control" id="exampleTextarea"
                                                        placeholder="Update Scope Of Work"></textarea>
                                                    <button class="btn btn-sm btn-primary mt-2">Update Scope Of Work <i
                                                            class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="bold">Send Offer Letter Again</td>
                                                <td>

                                                    <button class="btn btn-sm btn-primary mt-2">Send Offer Letter Again
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="bold">Document Verification</td>
                                                <td>
                                                    <input type="text" class="form-control bg-success text-white"
                                                        placeholder="Document Verification" hidden>
                                                        <a href="{{route("verify-documents")}}">
                                                    <button class="btn btn-sm btn-primary mt-2">Check <i
                                                            class="fa-solid fa-check"></i>
                                                    </button>
                                                        </a>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="bold text-center bg-white">
                                                    Reason For Backout
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="exampleTextarea"
                                                        placeholder="Reason For Backout"></textarea>
                                                    <button class="btn btn-sm btn-primary mt-2">Reason For Backout <i
                                                            class="fa-solid fa-backward-step"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="2" class="text-center">OR</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">Employee Code</td>

                                                <td class="text-center"> <input type="text" class="form-control"
                                                        placeholder="Employee Code"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-center">
                                                    <button class="btn btn-sm btn-primary mt-2">Joined <i
                                                            class="fa-solid fa-handshake"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-center text-danger">
                                                    Note : Please verify the document first!!
                                                </td>
                                            </tr>
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
<script src={{asset('assets/js/applicantform.js')}}></script>

@endsection