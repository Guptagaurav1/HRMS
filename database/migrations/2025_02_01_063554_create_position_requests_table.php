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
        Schema::create('position_requests', function (Blueprint $table) {
            $table->id();
            $table->string('req_id');
            $table->string('unique_id')->nullable();
            $table->string('recruitment_type')->nullable();
            $table->enum('employment_type', ['Permenant','Contractual']);
            $table->string('position_title')->nullable();
            $table->string('client_name')->nullable();
            $table->unsignedBigInteger('department')->nullable();
            $table->foreign('department')->references('id')->on('departments');
            $table->string('functional_role')->nullable();
            $table->string('position_duration')->nullable();
            $table->unsignedBigInteger('state')->nullable();
            $table->foreign('state')->references('id')->on('states');
            $table->unsignedBigInteger('city')->nullable();
            $table->foreign('city')->references('id')->on('cities');
            $table->date('date_notified')->nullable();
            $table->integer('no_of_requirements');
            $table->integer('no_of_completed_requirements')->default(0);
            $table->string('jd_permission')->default('1');
            $table->string('requirement_status')->nullable();
            $table->longText('job_description')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('education')->nullable();
            $table->string('experience')->nullable();
            $table->string('skill_sets')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('attachment')->nullable();
            $table->integer('status')->default(1);
            $table->string('position_type')->nullable();
            $table->string('employee_type')->nullable();
            $table->integer('hiring_budget')->nullable();
            $table->string('budget_status')->nullable();
            $table->string('assigned_executive')->nullable();
            $table->string('read_status')->nullable();
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
        Schema::dropIfExists('position_requests');
    }
};
