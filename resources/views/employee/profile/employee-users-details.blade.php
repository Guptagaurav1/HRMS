@extends('layouts.master', ['title' => 'My Profile'])
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Employee Details</h3>
                </div>

                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="profile-sidebar">

                                <div class="top">
                                    <div class="image-wrap">
                                        <div class="part-img rounded-circle overflow-hidden">
                                            @if (!empty($details->getPersonalDetail) && $details->getPersonalDetail->emp_photo)
                                                <img src="{{ asset('recruitment/candidate_documents/passport_size_photo/' . $details->getPersonalDetail->emp_photo) }}"
                                                    alt="{{ $details->emp_name }}" class="rounded-circle img-fluid">
                                            @else
                                                <img src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg"
                                                    alt="admin">
                                            @endif
                                        </div>
                                        <button class="image-change" data-bs-toggle="modal" data-bs-target="#uploadImage"><i
                                                class="fa-light fa-camera"></i></button>
                                    </div>
                                    <div class="part-txt">
                                        <h4 class="admin-name fs-4">{{ $details->emp_name }}</h4>
                                        <h4 class=" fs-4 mt-2">{{ $details->emp_designation }}</h4>

                                    </div>
                                </div>
                                <div class="bottom">
                                    <ul class="mt-1">
                                        <li class="text-dark fs-6"><span class="text-dark">Employee
                                                Code:</span>{{ $details->emp_designation }}</li>
                                        <li class="text-dark fs-6"><span>Mobile No:</span>{{ $details->emp_phone_first }}
                                        </li>
                                        <li class="text-dark fs-6"><span>E-Mail ID:</span>{{ $details->emp_email_first }}
                                        </li>
                                        <li class="text-dark fs-6">
                                            <span>Address:</span>{{ !empty($details->getAddressDetail) ? $details->getAddressDetail->emp_permanent_address : '' }}
                                        </li>
                                        <li class="text-dark fs-6"><span>Joining
                                                Date:</span>{{ date('jS F, Y', strtotime($details->emp_doj)) }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="table-responsive">
                        <div class="row px-2">
                            <div class="col-sm-6 col-xs-12">
                                <h4 class="panel-header">Employee Details</h4>
                                <table
                                    class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                    id="allEmployeeTable">
                                    <tbody>
                                        <tr>
                                            <td class="bold">Reporting Name:</td>
                                            <td>{{ $manager->first_name . ' ' . $manager->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Reporting Designation:</td>
                                            <td class="text-capitalize">{{ get_role_name($manager->role_id) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Reporting Email:</td>
                                            <td>{{ $details->reporting_email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Gender:</td>
                                            <td>{{ !empty($details->getPersonalDetail) ? $details->getPersonalDetail->emp_gender : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Category:</td>
                                            <td class="text-capitalize">
                                                {{ !empty($details->getPersonalDetail) ? $details->getPersonalDetail->emp_category : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Work Order No:</td>
                                            <td class="text-capitalize">{{ $details->emp_work_order }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Job Place:</td>
                                            <td>{{ $details->emp_place_of_posting }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Department:</td>
                                            <td>{{ $details->department }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Functional Role:</td>
                                            <td>{{ $details->emp_functional_role }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Date of Joining:</td>
                                            <td>{{ date('jS F, Y', strtotime($details->emp_doj)) }}</td>
                                        </tr>

                                        <tr>
                                            <td class="bold">CTC:</td>
                                            <td>{{ !empty($details->getBankDetail) ? Illuminate\Support\Number::currency($details->getBankDetail->emp_salary, in: 'INR') : '' }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6 col-xs-12 px-2">
                                <h4 class="panel-header">Personal Details</h4>
                                <table
                                    class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                    id="allEmployeeTable">
                                    <tbody>
                                        <tr>
                                            <td class="bold">Permanent Address:</td>
                                            <td class="attributes-column">
                                                {{ !empty($details->getAddressDetail) ? $details->getAddressDetail->emp_permanent_address : '' }}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="bold">Correspondence Address:</td>
                                            <td>{{ !empty($details->getAddressDetail) ? $details->getAddressDetail->emp_local_address : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Date of birth:</td>
                                            <td>{{ !empty($details->getPersonalDetail) ? date('jS F,Y', strtotime($details->getPersonalDetail->emp_dob)) : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Personal Contact no:</td>
                                            <td>{{ $details->emp_phone_first }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Alternate Contact no:</td>
                                            <td>{{ $details->emp_phone_second }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Personal Email Id:</td>
                                            <td>{{ $details->emp_email_first }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Alternate Email Id:</td>
                                            <td>{{ $details->emp_email_second }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Father Name:</td>
                                            <td>{{ !empty($details->getPersonalDetail) ? $details->getPersonalDetail->emp_father_name : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Father Contact No:</td>
                                            <td>{{ !empty($details->getPersonalDetail) ? $details->getPersonalDetail->emp_father_mobile : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Blood Group :</td>
                                            <td>{{ !empty($details->getPersonalDetail) ? $details->getPersonalDetail->emp_blood_group : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Marital Status :</td>
                                            <td>{{ !empty($details->getPersonalDetail) ? $details->getPersonalDetail->emp_marital_status : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Husband / Wife Name :</td>
                                            <td>{{ !empty($details->getPersonalDetail) ? $details->getPersonalDetail->emp_husband_wife_name : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">No of Childrens :</td>
                                            <td>{{ !empty($details->getPersonalDetail) ? $details->getPersonalDetail->emp_children : '' }}
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="bold">Working Status :</td>
                                            <td><span
                                                    class="badge text-bg-primary text-capitalize">{{ $details->emp_current_working_status }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="row px-2">
                            <h4 class="panel-header">Education Qualification</h4>
                            <div class="col-sm-6 col-xs-12">

                                <div class="card-header px-2 py-1">
                                    10th Qualification
                                </div>
                                <table
                                    class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                    id="allEmployeeTable">
                                    <tbody>

                                        <tr>
                                            <td class="bold">10th Passing Year:</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_tenth_year : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Percentage/Grade:</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_tenth_percentage : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Board Name</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_tenth_board_name : '' }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6 col-xs-12">

                                <div class="card-header px-2 py-1">
                                    12th Qualification
                                </div>
                                <table
                                    class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                    id="allEmployeeTable">
                                    <tbody>

                                        <tr>
                                            <td class="bold">12th Passing Year:</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_tenth_year : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Percentage/Grade:</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_twelve_percentage : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Board Name</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_twelve_board_name : '' }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6 col-xs-12">

                                <div class="card-header px-2 py-1">
                                    Graduation
                                </div>
                                <table
                                    class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                    id="allEmployeeTable">
                                    <tbody>

                                        <tr>
                                            <td class="bold">Graduation Passing Year/pursuing</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_graduation_year : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Percentage/Grade:</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_graduation_percentage : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Mode Of Graduation</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_graduation_mode : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Degree Name</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_gradqualification : '' }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6 col-xs-12">

                                <div class="card-header px-2 py-1">
                                    Post Graduation
                                </div>
                                <table
                                    class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                    id="allEmployeeTable">
                                    <tbody>

                                        <tr>
                                            <td class="bold">Post Graduation Passing Year/pursuing</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_postgraduation_year : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Percentage/Grade:</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_postgraduation_percentage : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Mode Of Post Graduation</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_postgraduation_mode : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Degree Name</td>
                                            <td>{{ !empty($details->education) ? $details->education->emp_postgradqualification : '' }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <h4 class="panel-header">Bank Details</h4>
                                <table
                                    class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                    id="allEmployeeTable">
                                    <tbody>
                                        <tr>
                                            <td class="bold">Bank Name :</td>
                                            <td>{{ !empty($details->getBankDetail) && $details->getBankDetail->getBankData ? $details->getBankDetail->getBankData->name_of_bank : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Branch Name :</td>
                                            <td>{{ !empty($details->getBankDetail) && $details->getBankDetail->getBankData ? $details->getBankDetail->emp_branch : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">IFSC Code :</td>
                                            <td>{{ !empty($details->getBankDetail) ? $details->getBankDetail->emp_ifsc : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Account No :</td>
                                            <td>{{ !empty($details->getBankDetail) ? $details->getBankDetail->emp_account_no : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Aadhar No :</td>
                                            <td>{{ !empty($details->getIdProofDetail) ? $details->getIdProofDetail->emp_aadhaar_no : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Pan No :</td>
                                            <td>{{ !empty($details->getBankDetail) ? $details->getBankDetail->emp_pan : '' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <h4 class="panel-header">Other Details</h4>
                                <table
                                    class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                    id="allEmployeeTable">
                                    <tbody>
                                        <tr>
                                            <td class="bold">PF UAN No :</td>
                                            <td>{{ !empty($details->getBankDetail) ? $details->getBankDetail->emp_pf_no : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">ESI No :</td>
                                            <td>{{ !empty($details->getBankDetail) ? $details->getBankDetail->emp_esi_no : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Passport No. :</td>
                                            <td>{{ !empty($details->getIdProofDetail) ? $details->getIdProofDetail->emp_passport_no : '' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="bold">Working Status:</td>
                                            <td><span
                                                    class="badge text-bg-success text-capitalize">{{ $details->emp_current_working_status }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <h4 class="panel-header">Additional Certificate</h4>
                                <div class="table-responsive after-add-more" id="add-field">
                                    <form method="post" class="form-add-certificate">
                                        @csrf
                                        <table class="table table-bordered table-hover digi-dataTable table-striped"
                                            id="allEmployeeTable">
                                            <thead id="table-head">
                                                <tr>
                                                    <th class="text-center">Diploma/Course/Certificate Name</th>
                                                    <th class="text-center">Duration (in days)</th>
                                                    <th class="text-center">Marks/Percentage/Grade</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-body">
                                                @forelse($details->getCertificateDetail as $certificate)
                                                    <tr>
                                                        <td class="text-center">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="certificate_name[]" maxlength="50"
                                                                value="{{ $certificate->certificate_name }}" required>
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="duration[]" min="0"
                                                                value="{{ $certificate->duration }}" required>
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="grade[]" value="{{ $certificate->grade }}"
                                                                required>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button"
                                                                class="btn btn-sm btn-primary add-more-btn">Add
                                                                More</button>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="text-center">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="certificate_name[]" maxlength="50" required>
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="duration[]" min="0" required>
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="grade[]" required>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button"
                                                                class="btn btn-sm btn-primary add-more-btn">Add
                                                                More</button>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary m-2 submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex justify-content-end">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="text-end">
            <a href="{{ route('profile.modify-profile-request') }}"> <button class="btn btn-sm btn-primary">Request For
                    Modification</button></a>

        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="uploadImage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="uploadImageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-light">Update Image</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form img-upload">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="image" class="form-label">Upload Image <span
                                        class="fw-lighter text-small">(only .jpg and png file types are allowed)</span>
                                </label>
                                <input type="file" class="form-control" name="emp_photo" accept=".jpg,.png,.jpeg"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/employeeUsersDetails.js') }}"></script>
@endsection
