@extends('layouts.master', ['title' => 'Update Profile Request'])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
    <div class="row">
        <form action="{{ route('profile.submit-profile-request') }}" class="form request-form" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h2 class="mt-2">Employee Details Updation Request</h2>
                    </div>
                    {{-- Show Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger m-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Show Server Errors --}}
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



                    <div class="row px-3 mb-3">
                        <div class="col-md-12 d-flex justify-content-end ml-5 change">
                            <a href="#"><button type="button" class="btn btn-sm btn-primary mt-3 "
                                    id="add-more-btn">Add More</button></a>
                        </div>
                        @if (session()->has('success'))
                            <div class="col-md-12">
                                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                                    role="alert">
                                    <svg class="bi flex-shrink-0 me-2" fill="#fff" width="24" height="24" role="img"
                                        aria-label="Success:">
                                        <use xlink:href="#check-circle-fill" />
                                    </svg>
                                    <div>
                                        {{ session()->get('message') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="col-md-12">
                                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show"
                                    role="alert">
                                    <svg class="bi flex-shrink-0 me-2" fill="#b02a37" width="24" height="24" role="img"
                                        aria-label="Danger:">
                                        <use xlink:href="#exclamation-triangle-fill" />
                                    </svg>
                                    <div>
                                        {{ session()->get('message') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="table-responsive after-add-more" id="add-field">
                        <table class="table table-bordered table-hover digi-dataTable table-striped" id="allEmployeeTable">
                            <thead id="table-head">
                                <tr>
                                    <th class="text-center">S.No.</th>
                                    <th class="text-center">Query Type</th>
                                    <th class="text-center">Particular Field</th>
                                    <th class="text-center">Title with short Description</th>
                                    <th class="text-center">Attach Document <span class="text-sm">(max size :
                                            1mb)</span><br><span class="text-danger">(Only Pdf Accatable)</span> </th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <tr>
                                    <td class="text-center">
                                        1
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <select class="form-select" name="assigned_to[]" required>
                                            <option value="hr@prakharsoftwares.com">Profile Update Query
                                                (hr@prakharsoftwares.com)</option>
                                        </select>

                                    </td>
                                    <td class="text-center"> <select class="form-select fields" name="changed_column[]"
                                            required>
                                            <option value="" selected>Select Option</option>
                                            @foreach ($columns as $column)
                                                <option value="{{ $column->id }}">{{ $column->name }}</option>
                                            @endforeach
                                        </select>

                                    </td>
                                    <td class="attributes-column">
                                        <textarea class="form-control" name="description[]" placeholder="Enter Title with short Description" required></textarea>

                                    </td>
                                    <td class="text-center"> <input class="form-control form-control-sm" type="file"
                                            name="file[]" accept="application/pdf" required>

                                    </td>
                                    <td class="text-center">
                                        -
                                        {{-- <button type="reset" class="btn btn-sm btn-primary">Reset</button> --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end my-2">
                <button type="submit" class="btn btn-sm btn-primary"> Send Request</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/modify-profile-request.js') }}"></script>
@endsection
