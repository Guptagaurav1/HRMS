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
        Schema::create('salary', function (Blueprint $table) {
            $table->id();
            $table->integer('sl_emp_id');
            $table->string('sl_emp_code')->nullable();
            $table->date('sa_emp_doj')->nullable();
            $table->string('sal_emp_name')->nullable();
            $table->string('sal_emp_designation')->nullable();
            $table->integer('sal_ctc')->nullable();
            $table->integer('sal_gross')->nullable();
            $table->integer('taxable_salary')->nullable();
            $table->integer('tds_tax_amount')->nullable();
            $table->integer('tax_credit')->nullable();
            $table->integer('e_cess')->nullable();
            $table->integer('sal_net')->nullable();
            $table->integer('sal_basic')->nullable();
            
            $table->string('sal_hra')->nullable();
            $table->integer('sal_da')->nullable();
            $table->string('sal_conveyance')->nullable();
            $table->integer('medical_allowance')->nullable();
            $table->string('sal_telephone')->nullable();

            $table->integer('sal_uniform')->nullable();
            $table->integer('sal_school_fee')->nullable();
            $table->integer('sal_car_allow')->nullable();
            $table->integer('sal_grade_pay')->nullable();
            $table->integer('sal_special_allowance')->nullable();

            $table->string('sal_pf_employer')->nullable();
            $table->string('sal_pf_employee')->nullable();

            $table->enum('pf_exception',['yes','no'])->default('no');
            $table->enum('esi_exception',['yes','no'])->default('no');

            $table->string('sal_esi_employer')->nullable();
            $table->string('sal_esi_employee')->nullable();

            $table->integer('sal_lwf_employee')->nullable();
            $table->integer('sal_lwf_employer')->nullable();
            $table->integer('medical_insurance')->nullable();
            $table->integer('accident_insurance')->nullable();

            $table->integer('medical_insurance_ctc')->default(0);
            $table->integer('accident_insurance_ctc')->default(0);
            
            $table->integer('tds_deduction')->nullable();
            $table->integer('pf_wages')->nullable();
            $table->integer('sal_tax')->nullable();
            $table->string('sal_remark')->nullable();
            $table->dateTime('sal_add_date')->nullable()->useCurrent();
            $table->string('sal_entry_by')->nullable();
    
            $table->enum('source', ['normal upload', 'bulk upload'])->default('normal upload');

            $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary');
    }
};
