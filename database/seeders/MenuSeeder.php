<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Course
            ['mid' => 'M-1', 'section' => 'Home', 'section_icon' => '', 'name' => 'Dashboard', 'page' => 'hr_dashboard', 'status' => '1', 'parent_id' => '1'],
            ['mid' => 'M-2', 'section' => 'Master', 'section_icon' => '', 'name' => 'Skill Listing', 'page' => 'skills.index', 'status' => '1', 'parent_id' => '2'],
            ['mid' => 'M-3', 'section' => 'Master', 'section_icon' => '', 'name' => 'Skill Create', 'page' => 'skills.create', 'status' => '1', 'parent_id' => '2'],
            ['mid' => 'M-4', 'section' => 'Master', 'section_icon' => '', 'name' => 'Skill Edit', 'page' => 'skills.edit', 'status' => '1', 'parent_id' => '2'],
            ['mid' => 'M-5', 'section' => 'Master', 'section_icon' => '', 'name' => 'Skill Delete', 'page' => 'skills.destroy', 'status' => '1', 'parent_id' => '2'],

            // Departments

            ['mid' => 'M-6', 'section' => 'Master', 'section_icon' => '', 'name' => 'Department List', 'page' => 'departments.index', 'status' => '1', 'parent_id' => '3'],
            ['mid' => 'M-7', 'section' => 'Master', 'section_icon' => '', 'name' => 'Department Create', 'page' => 'departments.create', 'status' => '1', 'parent_id' => '3'],
            ['mid' => 'M-8', 'section' => 'Master', 'section_icon' => '', 'name' => 'Department Edit', 'page' => 'departments.edit', 'status' => '1', 'parent_id' => '3'],
            ['mid' => 'M-9', 'section' => 'Master', 'section_icon' => '', 'name' => 'Department Delete', 'page' => 'departments.destroy', 'status' => '1', 'parent_id' => '3'],

            // Organizations

            ['mid' => 'M-10', 'section' => 'Master', 'section_icon' => '', 'name' => 'Organizations List', 'page' => 'organizations.index', 'status' => '1', 'parent_id' => '4'],
            ['mid' => 'M-11', 'section' => 'Master', 'section_icon' => '', 'name' => 'Organizations Create', 'page' => 'organizations.create', 'status' => '1', 'parent_id' => '4'],
            ['mid' => 'M-12', 'section' => 'Master', 'section_icon' => '', 'name' => 'Organizations Edit', 'page' => 'organizations.edit', 'status' => '1', 'parent_id' => '4'],
            ['mid' => 'M-13', 'section' => 'Master', 'section_icon' => '', 'name' => 'Organizations Delete', 'page' => 'organizations.destroy', 'status' => '1', 'parent_id' => '4'],

            // designations

            ['mid' => 'M-14', 'section' => 'Master', 'section_icon' => '', 'name' => 'Designations List', 'page' => 'designations.index', 'status' => '1', 'parent_id' => '5'],
            ['mid' => 'M-15', 'section' => 'Master', 'section_icon' => '', 'name' => 'Designations Create', 'page' => 'designations.create', 'status' => '1', 'parent_id' => '5'],
            ['mid' => 'M-16', 'section' => 'Master', 'section_icon' => '', 'name' => 'Designations Edit', 'page' => 'designations.edit', 'status' => '1', 'parent_id' => '5'],
            ['mid' => 'M-17', 'section' => 'Master', 'section_icon' => '', 'name' => 'Designations Delete', 'page' => 'designations.destroy', 'status' => '1', 'parent_id' => '5'],

            // me Team list

            ['mid' => 'M-18', 'section' => 'My Team', 'section_icon' => '', 'name' => 'My Team List', 'page' => 'my-team-list', 'status' => '1', 'parent_id' => '6'],

            // Leave

            ['mid' => 'M-19', 'section' => 'Leave', 'section_icon' => '', 'name' => 'Holiday List', 'page' => 'holiday-list', 'status' => '1', 'parent_id' => '7'],
            ['mid' => 'M-20', 'section' => 'Leave', 'section_icon' => '', 'name' => 'Applied Request List', 'page' => 'applied-request-list', 'status' => '1', 'parent_id' => '7'],
            ['mid' => 'M-21', 'section' => 'Leave', 'section_icon' => '', 'name' => 'Leave Regularization', 'page' => 'leave-regularization', 'status' => '1', 'parent_id' => '7'],
            ['mid' => 'M-22', 'section' => 'Leave', 'section_icon' => '', 'name' => 'Leave Request Reciept', 'page' => 'leave-request-reciept', 'status' => '1', 'parent_id' => '7'],
            ['mid' => 'M-23', 'section' => 'Leave', 'section_icon' => '', 'name' => 'Employee-details', 'page' => 'employee-details', 'status' => '1', 'parent_id' => '7'],

            // Recruitment

            ['mid' => 'M-24', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Position Request', 'page' => 'position-request', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-25', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Recruitment Report', 'page' => 'recruitment-report', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-26', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Preview Executive Description', 'page' => 'preview-executive-description', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-27', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Show Assign Work Log', 'page' => 'show-assign-work-log', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-28', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Preview Job Description', 'page' => 'preview-job-description', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-29', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Applicant Recruitment Details Summary', 'page' => 'applicant-recruitment-details-summary', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-30', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Verify Documents', 'page' => 'verify-documents', 'status' => '1', 'parent_id' => '8'],

            ['mid' => 'M-31', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'JD Request', 'page' => 'jd-request', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-32', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'User Request List', 'page' => 'user-request-list', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-33', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Add New Candidate', 'page' => 'addnew-candidate', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-34', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Recruitment List', 'page' => 'recruitment-list', 'status' => '1', 'parent_id' => '8'],

            ['mid' => 'M-35', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Recruitment Plan', 'page' => 'recruitment-plan', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-36', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Edit Position Request', 'page' => 'update_position_request', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-37', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Create Contact', 'page' => 'addcontact-form', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-38', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Call Logs List', 'page' => 'recruitment.call_logs', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-39', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Call Logs Edit', 'page' => 'recruitment.edit-call_log', 'status' => '1', 'parent_id' => '8'],
            ['mid' => 'M-40', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Offer Letter Shared List', 'page' => 'recruitment.offerlettershared-list', 'status' => '1', 'parent_id' => '8'],

            // Functional Role

            ['mid' => 'M-41', 'section' => 'Master', 'section_icon' => '', 'name' => 'Functional List', 'page' => 'functional-role', 'status' => '1', 'parent_id' => '9'],
            ['mid' => 'M-42', 'section' => 'Master', 'section_icon' => '', 'name' => 'Functional Add', 'page' => 'add-functional-role', 'status' => '1', 'parent_id' => '9'],
            ['mid' => 'M-43', 'section' => 'Master', 'section_icon' => '', 'name' => 'Functional Edit', 'page' => 'edit-functional-role', 'status' => '1', 'parent_id' => '9'],
            ['mid' => 'M-44', 'section' => 'Master', 'section_icon' => '', 'name' => 'Functional Delete', 'page' => 'destroy-functional-role', 'status' => '1', 'parent_id' => '9'],

            // Functional Role

            ['mid' => 'M-45', 'section' => 'Master', 'section_icon' => '', 'name' => 'Qualification List', 'page' => 'qualification', 'status' => '1', 'parent_id' => '10'],
            ['mid' => 'M-46', 'section' => 'Master', 'section_icon' => '', 'name' => 'Qualification Add', 'page' => 'add-qualification', 'status' => '1', 'parent_id' => '10'],
            ['mid' => 'M-47', 'section' => 'Master', 'section_icon' => '', 'name' => 'Qualification Edit', 'page' => 'edit-qualification', 'status' => '1', 'parent_id' => '10'],
            ['mid' => 'M-48', 'section' => 'Master', 'section_icon' => '', 'name' => 'Qualification Delete', 'page' => 'destroy-qualification', 'status' => '1', 'parent_id' => '10'],

            // Bank Details

            ['mid' => 'M-49', 'section' => 'Master', 'section_icon' => '', 'name' => 'Bank Details List', 'page' => 'bank-details', 'status' => '1', 'parent_id' => '11'],
            ['mid' => 'M-50', 'section' => 'Master', 'section_icon' => '', 'name' => 'Bank Details Add', 'page' => 'add-bank', 'status' => '1', 'parent_id' => '11'],

            // Work Order

            ['mid' => 'M-51', 'section' => 'Work Order', 'section_icon' => '', 'name' => 'Work Order List', 'page' => 'work-order-list', 'status' => '1', 'parent_id' => '12'],
            ['mid' => 'M-52', 'section' => 'Work Order', 'section_icon' => '', 'name' => 'Get Work Order', 'page' => 'get-work-order', 'status' => '1', 'parent_id' => '12'],
            ['mid' => 'M-53', 'section' => 'Work Order', 'section_icon' => '', 'name' => 'Work Order Add', 'page' => 'add-work-order', 'status' => '1', 'parent_id' => '12'],
            ['mid' => 'M-54', 'section' => 'Work Order', 'section_icon' => '', 'name' => 'Work Order Edit', 'page' => 'edit-work-order', 'status' => '1', 'parent_id' => '12'],
            ['mid' => 'M-55', 'section' => 'Work Order', 'section_icon' => '', 'name' => 'Work Order View', 'page' => 'view-work-order', 'status' => '1', 'parent_id' => '12'],
            ['mid' => 'M-56', 'section' => 'Work Order', 'section_icon' => '', 'name' => 'Work Order Organisation ', 'page' => 'organisation-workOrder', 'status' => '1', 'parent_id' => '12'],
            ['mid' => 'M-57', 'section' => 'Work Order', 'section_icon' => '', 'name' => 'Work Order Details ', 'page' => 'workOrder-details', 'status' => '1', 'parent_id' => '12'],

            // Help Desk

            ['mid' => 'M-58', 'section' => 'Help Desk', 'section_icon' => '', 'name' => 'Composer Mail', 'page' => 'compose-email', 'status' => '1', 'parent_id' => '13'],
            ['mid' => 'M-59', 'section' => 'Help Desk', 'section_icon' => '', 'name' => 'Mail Logs', 'page' => 'email-list', 'status' => '1', 'parent_id' => '13'],

            // Salary Slip

            ['mid' => 'M-60', 'section' => 'Salary Slip', 'section_icon' => '', 'name' => 'Salary Slip', 'page' => 'salary-slip', 'status' => '1', 'parent_id' => '14'],
            ['mid' => 'M-61', 'section' => 'Salary Slip', 'section_icon' => '', 'name' => 'Preview Salary Slip', 'page' => 'preview-salary-slip', 'status' => '1', 'parent_id' => '14'],
            ['mid' => 'M-62', 'section' => 'Salary Slip', 'section_icon' => '', 'name' => 'Employee Salary Retainer', 'page' => 'employee-details-salary-retainer', 'status' => '1', 'parent_id' => '14'],
            ['mid' => 'M-63', 'section' => 'Salary Slip', 'section_icon' => '', 'name' => 'Employee Salary Slip Edit', 'page' => 'salary-slip-edit', 'status' => '1', 'parent_id' => '14'],
            ['mid' => 'M-64', 'section' => 'Salary Slip', 'section_icon' => '', 'name' => 'Employee Salary Slip Print', 'page' => 'employee-code-retainer', 'status' => '1', 'parent_id' => '14'],

            //attendance

            ['mid' => 'M-65', 'section' => 'Attendance', 'section_icon' => '', 'name' => 'Work Order Attendance List', 'page' => 'go-to-attendance', 'status' => '1', 'parent_id' => '15'],
            ['mid' => 'M-66', 'section' => 'Attendance', 'section_icon' => '', 'name' => 'Work Order Salary Attendance ', 'page' => 'wo-sal-attendance', 'status' => '1', 'parent_id' => '15'],
            ['mid' => 'M-67', 'section' => 'Attendance', 'section_icon' => '', 'name' => 'Work Order Generate Salary ', 'page' => 'wo-generate-salary', 'status' => '1', 'parent_id' => '15'],

            //Project

            ['mid' => 'M-68', 'section' => 'Project', 'section_icon' => '', 'name' => 'Project List', 'page' => 'project-list', 'status' => '1', 'parent_id' => '16'],
            ['mid' => 'M-69', 'section' => 'Project', 'section_icon' => '', 'name' => 'Project Create', 'page' => 'add-project', 'status' => '1', 'parent_id' => '16'],
            ['mid' => 'M-70', 'section' => 'Project', 'section_icon' => '', 'name' => 'Project Edit', 'page' => 'edit-project', 'status' => '1', 'parent_id' => '16'],
            ['mid' => 'M-71', 'section' => 'Project', 'section_icon' => '', 'name' => 'Project Report', 'page' => 'project-report', 'status' => '1', 'parent_id' => '16'],
            ['mid' => 'M-72', 'section' => 'Project', 'section_icon' => '', 'name' => 'Work Order Project Report', 'page' => 'wo-project-report', 'status' => '1', 'parent_id' => '16'],
            ['mid' => 'M-73', 'section' => 'Project', 'section_icon' => '', 'name' => 'Organization Project', 'page' => 'organisation-project', 'status' => '1', 'parent_id' => '16'],
            ['mid' => 'M-74', 'section' => 'Project', 'section_icon' => '', 'name' => 'Organization Project Details', 'page' => 'project-details', 'status' => '1', 'parent_id' => '16'],

            //Logs

            ['mid' => 'M-75', 'section' => 'Logs', 'section_icon' => '', 'name' => 'Anniversary Wish Logs', 'page' => 'events.marriage-anniversary-list', 'status' => '1', 'parent_id' => '17'],
            ['mid' => 'M-76', 'section' => 'Logs', 'section_icon' => '', 'name' => 'Birthday Wish Log', 'page' => 'events.birthday-list', 'status' => '1', 'parent_id' => '17'],
            ['mid' => 'M-77', 'section' => 'Logs', 'section_icon' => '', 'name' => 'Work Anniversary Wish Log', 'page' => 'events.work-anniversary-list', 'status' => '1', 'parent_id' => '17'],

            //Logs

            ['mid' => 'M-78', 'section' => 'Response Log', 'section_icon' => '', 'name' => 'Employee Profile Response Log', 'page' => 'employee-profile-response-log', 'status' => '1', 'parent_id' => '18'],
            ['mid' => 'M-79', 'section' => 'Response Log', 'section_icon' => '', 'name' => 'Recruiter Response Log', 'page' => 'recruiter-response-log', 'status' => '1', 'parent_id' => '18'],

            //Invoice & Billing

            ['mid' => 'M-80', 'section' => 'Invoice & Billing', 'section_icon' => '', 'name' => 'Generate Invoice', 'page' => 'generate-invoice', 'status' => '1', 'parent_id' => '19'],
            ['mid' => 'M-81', 'section' => 'Invoice & Billing', 'section_icon' => '', 'name' => 'Invoice List', 'page' => 'invoice-list', 'status' => '1', 'parent_id' => '19'],
            ['mid' => 'M-82', 'section' => 'Invoice & Billing', 'section_icon' => '', 'name' => 'Tax Invoice', 'page' => 'tax-invoice', 'status' => '1', 'parent_id' => '19'],
            ['mid' => 'M-83', 'section' => 'Invoice & Billing', 'section_icon' => '', 'name' => 'Billing Structure List', 'page' => 'biling-structure-list', 'status' => '1', 'parent_id' => '19'],
            ['mid' => 'M-84', 'section' => 'Invoice & Billing', 'section_icon' => '', 'name' => 'Create Billing Structure', 'page' => 'add-biling-tructure', 'status' => '1', 'parent_id' => '19'],
            ['mid' => 'M-85', 'section' => 'Invoice & Billing', 'section_icon' => '', 'name' => 'Edit Billing Structure', 'page' => 'edit-billing-structure', 'status' => '1', 'parent_id' => '19'],
            ['mid' => 'M-86', 'section' => 'Invoice & Billing', 'section_icon' => '', 'name' => 'Form 16', 'page' => 'form16', 'status' => '1', 'parent_id' => '19'],
            ['mid' => 'M-87', 'section' => 'Invoice & Billing', 'section_icon' => '', 'name' => 'Create Form 16', 'page' => 'add-new-form16', 'status' => '1', 'parent_id' => '19'],


            // User & Role

            ['mid' => 'M-88', 'section' => 'User & Role', 'section_icon' => '', 'name' => 'Add User', 'page' => 'add-user', 'status' => '1', 'parent_id' => '20'],
            ['mid' => 'M-89', 'section' => 'User & Role', 'section_icon' => '', 'name' => 'Edit User', 'page' => 'edit-user', 'status' => '1', 'parent_id' => '20'],
            ['mid' => 'M-90', 'section' => 'User & Role', 'section_icon' => '', 'name' => 'Delete User', 'page' => 'delete', 'status' => '1', 'parent_id' => '20'],

            // Manage Role

            ['mid' => 'M-91', 'section' => 'User & Role', 'section_icon' => '', 'name' => 'Manage Role List', 'page' => 'manage-roles', 'status' => '1', 'parent_id' => '21'],
            ['mid' => 'M-92', 'section' => 'User & Role', 'section_icon' => '', 'name' => 'Add Role', 'page' => 'add-manage-role', 'status' => '1', 'parent_id' => '21'],
            ['mid' => 'M-93', 'section' => 'User & Role', 'section_icon' => '', 'name' => 'Edit Role', 'page' => 'edit-manage-role', 'status' => '1', 'parent_id' => '21'],
            ['mid' => 'M-94', 'section' => 'User & Role', 'section_icon' => '', 'name' => 'Delete Role', 'page' => 'delete-manage-role', 'status' => '1', 'parent_id' => '21'],

            // Reimbursement

            ['mid' => 'M-95', 'section' => 'Reimbursement', 'section_icon' => '', 'name' => 'Reimbursement List', 'page' => 'reimbursement.list', 'status' => '1', 'parent_id' => '22'],
            ['mid' => 'M-96', 'section' => 'Reimbursement', 'section_icon' => '', 'name' => 'Reimbursement View', 'page' => 'reimbursement.view-reciept', 'status' => '1', 'parent_id' => '22'],
            ['mid' => 'M-97', 'section' => 'Reimbursement', 'section_icon' => '', 'name' => 'Reimbursement View Attachment', 'page' => 'reimbursement.view-more-attachment', 'status' => '1', 'parent_id' => '22'],

            // Recruitment


            ['mid' => 'M-98', 'section' => 'Recruitment', 'section_icon' => '', 'name' => 'Recruitment Plan Summary', 'page' => 'recruitment-plan-page-summary', 'status' => '1', 'parent_id' => '8'],

            // employee

            ['mid' => 'M-100', 'section' => 'Employee', 'section_icon' => '', 'name' => 'Add Employee', 'page' => 'employee.add-employee', 'status' => '1', 'parent_id' => '23'],
            ['mid' => 'M-101', 'section' => 'Employee', 'section_icon' => '', 'name' => 'Employee List', 'page' => 'employee.employee-list', 'status' => '1', 'parent_id' => '23'],

            // attendacne
            ['mid' => 'M-102', 'section' => 'Attendance', 'section_icon' => '', 'name' => 'Attendance List', 'page' => 'attendance-list', 'status' => '1', 'parent_id' => '15'],

            ['mid' => 'M-103', 'section' => 'Attendance', 'section_icon' => '', 'name' => 'Upload Attendance ', 'page' => 'upload-attendance', 'status' => '1', 'parent_id' => '15'],

            // salary structure
            ['mid' => 'M-105', 'section' => 'Salary Structure', 'section_icon' => '', 'name' => 'Salary List', 'page' => 'salary-list', 'status' => '1', 'parent_id' => '24'],
            ['mid' => 'M-104', 'section' => 'Salary Structure', 'section_icon' => '', 'name' => 'Create Salary  ', 'page' => 'create-salary', 'status' => '1', 'parent_id' => '24'],

            ['mid' => 'M-106', 'section' => 'Salary Structure', 'section_icon' => '', 'name' => 'Edit Salary', 'page' => 'edit-salary', 'status' => '1', 'parent_id' => '24'],
            ['mid' => 'M-107', 'section' => 'Salary Structure', 'section_icon' => '', 'name' => 'Delete Salary', 'page' => 'delete-salary', 'status' => '1', 'parent_id' => '24'],

            // Profile
            ['mid' => 'M-108', 'section' => 'Profile', 'section_icon' => '', 'name' => 'Modify Profile Request', 'page' => 'profile.modify-profile-request', 'status' => '1', 'parent_id' => '25'],
            ['mid' => 'M-109', 'section' => 'Profile', 'section_icon' => '', 'name' => 'Profile Request Log', 'page' => 'profile.profile-detail-request-list', 'status' => '1', 'parent_id' => '25'],

            // Posh Structure

            ['mid' => 'M-110', 'section' => 'Posh', 'section_icon' => '', 'name' => 'Complaint List', 'page' => 'posh.complaint-list', 'status' => '1', 'parent_id' => '26'],

            // VMS Structure

            ['mid' => 'M-111', 'section' => 'VMS', 'section_icon' => '', 'name' => 'Vendors', 'page' => 'vendors.index', 'status' => '1', 'parent_id' => '27'],
            ['mid' => 'M-112', 'section' => 'VMS', 'section_icon' => '', 'name' => 'Add Vendor', 'page' => 'vendors.create', 'status' => '1', 'parent_id' => '27'],

            // Company Master

            ['mid' => 'M-113', 'section' => 'Master', 'section_icon' => '', 'name' => 'Company List', 'page' => 'company.list', 'status' => '1', 'parent_id' => '28'],
            ['mid' => 'M-114', 'section' => 'Master', 'section_icon' => '', 'name' => 'Add Company', 'page' => 'company.create', 'status' => '1', 'parent_id' => '28'],

            // organization 
            ['mid' => 'M115', 'section' => 'Master', 'section_icon' => '', 'name' => 'Organizations Details', 'page' => 'organizations.show', 'status' => '1', 'parent_id' => '4'],




        ];

        foreach ($data as $routeData) {
            $menu = new Menu;
            $exist = $menu->where('page', '=', $routeData['page'])->exists();
            if ($exist) {
                continue;
            } else {
                $menu = new Menu;
                $menu->mid = $routeData['mid'];
                $menu->section = $routeData['section'];
                $menu->section_icon = $routeData['section_icon'];
                $menu->name = $routeData['name'];
                $menu->page = $routeData['page'];
                $menu->status = $routeData['status'];
                $menu->parent_id = $routeData['parent_id'];
                $menu->save();
            }
        }
    }
}
