@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

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
                              <img src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg" alt="admin">
                           </div>
                           <button class="image-change"><i class="fa-light fa-camera"></i></button>
                        </div>
                        <div class="part-txt">
                           <h4 class="admin-name fs-4">Gaurav</h4>
                           <h4 class=" fs-4 mt-2">Front End Developer</h4>

                        </div>
                     </div>
                     <div class="bottom">
                        <ul class="mt-1">
                           <li class="text-dark fs-6" ><span class="text-dark">Employee Code:</span>Gaurav</li>
                           <li class="text-dark fs-6"><span>Mobile No:</span>+(1) 987 65433</li>
                           <li class="text-dark fs-6"><span>E-Mail ID:</span>example@mail.com</li>
                           <li class="text-dark fs-6"><span>Address:</span>California, United States</li>
                           <li class="text-dark fs-6"><span>Joining Date:</span>24 Nov 2022</li>
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
                       <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                           id="allEmployeeTable">
                           <tbody>
                               <tr>
                                   <td class="bold">Reporting Name:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Reporting Designation:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Reporting Email:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Gender:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Category:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Work Order No:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Job Place:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Department:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Functional Role:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Date of Joining:</td>
                                   <td>NA</td>
                               </tr>
                               
                               <tr>
                                   <td class="bold">CTC:</td>
                                   <td>NA</td>
                               </tr>
                               
                           </tbody>
                       </table>
                   </div>
                   <div class="col-sm-6 col-xs-12 px-2">
                       <h4 class="panel-header">Personal Details</h4>
                       <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                           id="allEmployeeTable">
                           <tbody>
                               <tr>
                                   <td class="bold">Permanent Address:</td>
                                   <td class="attributes-column">PSSPL/DEL/2021-22/0172,PSSPL/DEL/2021-22/0172,PSSPL/DEL/2021-22/0172</td>
                                
                               </tr>
                               <tr>
                                   <td class="bold">Correspondence Address:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Date of birth:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Personal Contact no:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Alternate Contact no:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Personal Email Id:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Alternate Email Id:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Father Name:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Father Contact No:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Blood Group :</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Marital Status :</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                 <td class="bold">Husband / Wife Name :</td>
                                 <td>NA</td>
                             </tr>
                             <tr>
                              <td class="bold">No of Childrens :</td>
                              <td>NA</td>
                          </tr>
                               
                              
                               <tr>
                                   <td class="bold">Working Status :</td>
                                   <td><span class="badge text-bg-primary">Active</span></td>
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
                       <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                           id="allEmployeeTable">
                           <tbody>

                               <tr>
                                   <td class="bold">10th Passing Year:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Percentage/Grade:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Board Name</td>
                                   <td>NA</td>
                               </tr>

                           </tbody>
                       </table>
                   </div>
                   <div class="col-sm-6 col-xs-12">

                       <div class="card-header px-2 py-1">
                           12th Qualification
                       </div>
                       <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                           id="allEmployeeTable">
                           <tbody>

                               <tr>
                                   <td class="bold">12th Passing Year:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Percentage/Grade:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Board Name</td>
                                   <td>NA</td>
                               </tr>

                           </tbody>
                       </table>
                   </div>
                   <div class="col-sm-6 col-xs-12">

                       <div class="card-header px-2 py-1">
                           Graduation
                       </div>
                       <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                           id="allEmployeeTable">
                           <tbody>

                               <tr>
                                   <td class="bold">Graduation Passing Year/pursuing</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Percentage/Grade:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Mode Of Graduation</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Degree Name</td>
                                   <td>NA</td>
                               </tr>

                           </tbody>
                       </table>
                   </div>
                   <div class="col-sm-6 col-xs-12">

                       <div class="card-header px-2 py-1">
                           Post Graduation
                       </div>
                       <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                           id="allEmployeeTable">
                           <tbody>

                               <tr>
                                   <td class="bold">Post Graduation Passing Year/pursuing</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Percentage/Grade:</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Mode Of Post Graduation</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Degree Name</td>
                                   <td>NA</td>
                               </tr>

                           </tbody>
                       </table>
                   </div>
                  
               </div>

               <div class="row">
                   <div class="col-sm-6 col-xs-12">
                       <h4 class="panel-header">Bank Details</h4>
                       <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                           id="allEmployeeTable">
                           <tbody>
                               <tr>
                                   <td class="bold">Bank Name :</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Branch Name :</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">IFSC Code :</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Account No :</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Aadhar No :</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Pan No :</td>
                                   <td>NA</td>
                               </tr>
                           </tbody>
                       </table>
                   </div>  
                   <div class="col-sm-6 col-xs-12">
                       <h4 class="panel-header">Other Details</h4>
                       <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                           id="allEmployeeTable">
                           <tbody>
                               <tr>
                                   <td class="bold">PF UIN No :</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">ESI No :</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Passport No. :</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Departments Recommendation :</td>
                                   <td>NA</td>
                               </tr>
                               <tr>
                                   <td class="bold">Working Status:</td>
                                   <td><span class="badge text-bg-success">NA</span></td>
                               </tr>
                           </tbody>
                       </table>
                   </div>  
                   <div class="col-md-12">
                     <h4 class="panel-header">Additional Certificate</h4>
                     <div class="table-responsive after-add-more" id="add-field">
                         <table class="table table-bordered table-hover digi-dataTable table-striped" id="allEmployeeTable">
                             <thead id="table-head">
                                 <tr>
                                     <th class="text-center">Diploma/Course/Certificate Name</th>
                                     <th class="text-center">Duration (in days)</th>
                                     <th class="text-center">Marks/Percentage/Grade</th>
                                     <th class="text-center">Action</th>
                                 </tr>
                             </thead>
                             <tbody id="table-body">
                                 <tr>
                                     <td class="text-center">
                                         <input type="text" class="form-control form-control-sm">
                                     </td>
                                     <td class="text-center">
                                         <input type="number" class="form-control form-control-sm">
                                     </td>
                                     <td class="text-center">
                                         <input type="text" class="form-control form-control-sm">
                                     </td>
                                     <td class="text-center">
                                       <button class="btn btn-sm btn-primary">Save</button>
                                       <button class="btn btn-sm btn-primary add-more-btn">Add More</button>
                                         
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
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
    <a href="{{route("employee-modify-profile-request")}}">  <button class="btn btn-sm btn-primary">Request For Modification</button></a>

   </div>
</div>



@endsection

@section('script')
<script src="{{asset('assets/js/employeeUsersDetails.js')}}"></script>
@endsection

