<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('emp_salary_slip')) {
        Schema::create('emp_salary_slip', function (Blueprint $table) {
            $table->id('emp_salary_id');
            $table->string('work_order')->nullable();
            $table->string('sal_emp_code')->nullable();
            $table->string('wo_attendance_at_emp')->nullable();
            $table->string('sal_emp_name')->nullable();
            $table->string('sal_emp_email')->nullable();
            $table->string('sal_month')->nullable();
            $table->string('sal_pf_number')->nullable();
            $table->string('sal_working_days')->nullable();
            $table->string('sal_esi_number')->nullable();
            $table->string('sal_aadhar_no')->nullable();
            $table->string('sal_pan_no')->nullable();
            $table->string('sal_bank_name')->nullable();
            $table->string('sal_designation')->nullable();
            $table->string('sal_account_no')->nullable();
            $table->string('sal_uan_no')->nullable();
            $table->string('emp_sal_ctc')->nullable();
            $table->string('sal_basic')->nullable();
            $table->string('sal_hra')->nullable();
            $table->string('sal_conveyance')->nullable();
            $table->string('sal_medical_allowance')->nullable();
            $table->string('sal_special_allowance')->nullable();
            $table->string('sal_gross')->nullable();
            $table->string('sal_net')->nullable();
            $table->string('sal_pf_employee')->nullable();
            $table->string('sal_esi_employee')->nullable();
            $table->string('sal_recovery')->nullable();
            $table->string('sal_pf_wages')->nullable();
            $table->string('sal_esi_wages')->nullable();
            $table->string('sal_advance')->nullable();
            $table->string('sal_medical_insurance')->nullable();
            $table->string('sal_accident_insurance')->nullable();
            $table->string('tds_deduction')->nullable();
            $table->string('sal_tax')->nullable();
            $table->string('sal_medical_insurance_ctc')->nullable();
            $table->string('sal_accident_insurance_ctc')->nullable();
            $table->string('sal_group_medical')->nullable();
            $table->string('sal_total_deduction')->nullable();
            $table->string('sal_doj')->nullable();
            $table->string('total_overtime_allowance')->nullable();
            $table->string('sal_remarks')->nullable();
            $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
            $table->string('user_id')->nullable();
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->dateTime('time')->useCurrent();
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_salary_slip');
    }
};
