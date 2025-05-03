@extends('layouts.master', ['title' => 'Reimbursement List'])
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Reimbursement List</h3>
                <div>
                    <ul class="breadcrumb">
                        <li> 
                            @if (auth()->user()->role->role_name == "hr")
                                <a href="{{ route('hr_dashboard') }}">Dashboard</a>
                            @elseif(auth()->user()->role->role_name == "hr_operations")
                                <a href="{{ route('hr_operations_dashboard') }}">Dashboard</a>
                            @elseif(auth()->user()->role->role_name == "sales_manager")
                                <a href="{{ route('sales.manager_dashboard') }}">Dashboard</a>
                            @else
                            @endif
                        </li>
                        <li>Reimbursement List</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3 mt-2">
                    <div class="col-auto">
                        <input type="text" class="form-control" name="search" placeholder="Search" value="{{$search}}" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="col-auto">
                        <a href="{{route('reimbursement.list')}}" class="btn btn-primary mb-3"> Reset </a>
                    </div>
                </form>
            </div>
                 {{-- Show Messages --}}

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
                @if (session()->has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            {{ session()->get('message') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                @if (session()->has('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            {{ session()->get('message') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">Reimbursement ID</th>
                            <th class="text-center">Employee ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Total Amount</th>
                            <th class="text-center">Advance Amount</th>
                            <th class="text-center">Requested On</th>
                            <th class="text-center">Verified By</th>
                            <th class="text-center">Verified Status</th>
                            <th class="text-center">Actions</th>
                            <th class="text-center">Response</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reimbursments as $reimbursment)
                            @php
                                $verifiedby = '';
                                $color = '';
                                $status = '';
                                if ($reimbursment->get_status ) {
                                    $reimberstatus = $reimbursment->get_status()->orderByDesc('id')->first();
                                    if ($reimberstatus->verified_by == '1') {
                                        $verifiedby = 'EMPLOYEE';  
                                    }
                                    elseif ($reimberstatus->verified_by == '2') {
                                        $verifiedby = 'ADMIN';  
                                    }
                                    elseif ($reimberstatus->verified_by == '3') {
                                        $verifiedby = 'HR/ACCOUNTS';  
                                    }

                                    if ($reimberstatus->verified_status == 'approved') {
                                        $color = 'success';
                                        $status = 'Approved';
                                    }
                                    elseif ($reimberstatus->verified_status == 'disapproved') {
                                        $color = 'danger';
                                        $status = 'Disapproved';
                                    }
                                    elseif ($reimberstatus->verified_status == 'pending') {
                                        $color = 'warning';
                                        $status = 'Pending';
                                    }
                                }   
                            @endphp
                        <tr>
                            <td class="text-nowrap text-center">{{$reimbursment->rem_id}}</td>
                            <td class="text-nowrap text-center">{{$reimbursment->emp_id}}</td>
                            <td class="text-nowrap text-center">{{$reimbursment->name}}</td>
                            <td class="text-nowrap text-center">{{Illuminate\Support\Number::currency($reimbursment->total_amount, 'inr')}}</td>
                            <td class="text-nowrap text-center">{{Illuminate\Support\Number::currency($reimbursment->advance_amount, 'inr')}}</td>
                            <td class="text-nowrap text-center">{{date('jS F,Y', strtotime($reimbursment->created_at))}}</td>
                            <td class="text-nowrap text-center">
                                <span class="badge alert-success">{{$verifiedby}}</span>
                            </td>
                            <td class="text-nowrap text-center">
                                <span class="badge alert-{{$color}}">{{$status}}</span>
                            </td>
                            <td class="text-nowrap text-center">
                                @if(auth()->user()->hasPermission('reimbursement.view-reciept'))
                                    <a href="{{route('reimbursement.view-reciept', ['id' => $reimbursment->id])}}">
                                        <button class="btn btn-sm btn-primary">View Receipt <i
                                                class="fa-solid fa-file"></i></button>
                                    </a>
                                @endif
                                @if(auth()->user()->hasPermission('reimbursement.view-more-attachment'))
                                <a href="{{route('reimbursement.view-more-attachment', ['id' => $reimbursment->id])}}">
                                    <button class="btn btn-sm btn-primary">View More <i
                                            class="fa-solid fa-eye"></i></button>
                                </a>
                                @endif
                            </td>
                            <td class="text-danger">
                                @if(auth()->guard('employee')->check() && $reimberstatus->verified_by < 3)
                                <span class='red'><strong>Request is Under Process<strong></span>
                                @elseif(auth()->check() && $reimberstatus->verified_by == '2')
                                <button id="response-btn" type="button" data-bs-toggle="modal" data-bs-target="#responseModal" data-bs-whatever="{{$reimbursment->rem_id}}" class="btn btn-primary btn-xs response-btn">Response</button>
                                @elseif(auth()->check() && $reimberstatus->verified_by > 2)
                                <span class='text-danger'><strong>You Have Already Take Action On It<strong></span>
                                @endif
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-danger text-center" colspan="10">No Record Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="table-bottom-control"></div>
            </div>

            {{-- Pagination --}}
            <div class="col-md-12 d-flex justify-content-center my-2">
                {{$reimbursments->links()}}
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Modal --}}
@section('modal')
<div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-light" id="responseModalLabel">Reimbursement Response</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form response-form">
          @csrf
          <div class="d-none">
              <input type="hidden" name="rem_id">
              <input type="hidden" name="response">
          </div>
        <div class="modal-body">
            <div class="mb-3">
              <label for="remark" class="col-form-label">Remarks</label>
              <textarea class="form-control" name="remark" placeholder="Enter your remarks here (if any)" required></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" name="approved" class="btn btn-success submit">Approve</button>
                <button type="submit" name="disapproved" class="btn btn-danger submit">Disapprove</button>
              </div>
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>
<script src="{{asset('assets/js/hr/reimbursement_list.js')}}"></script>
@endsection