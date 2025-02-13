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
        Schema::create('rec_previous_companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rec_id')->nullable();
            $table->foreign('rec_id')->references('id')->on('recruitment_forms');
            $table->string('company_name')->nullable();
            $table->string('technologies_worked_in')->nullable();
            $table->string('projects_worked_in')->nullable();
            $table->string('designation')->nullable();
            $table->string('salary_ctc')->nullable();
            $table->string('take_home_salary')->nullable();
            $table->string('last_3months_sal_slip_doc')->nullable();
            $table->string('3months_bank_stat_doc')->nullable();
            $table->string('doc_type')->nullable();
            $table->string('doc_file')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
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
        Schema::dropIfExists('rec_previous_companies');
    }
};
