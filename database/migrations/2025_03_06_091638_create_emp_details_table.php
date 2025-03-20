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
        Schema::create('emp_details', function (Blueprint $table) {
            $table->id();
            $table->string('emp_code')->unique();
            $table->string('emp_password');
            $table->string('reporting_email')->nullable();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('emp_name');
            $table->string('emp_phone_first');
            $table->string('emp_phone_second')->nullable();
            $table->string('emp_email_first');
            $table->string('emp_email_second')->nullable();
            $table->string('department')->nullable();
            $table->date('emp_doj')->nullable();
            $table->string('emp_designation')->nullable();
            $table->string('emp_dor')->nullable();
            $table->string('emp_work_order')->nullable();
            $table->string('emp_place_of_posting')->nullable();
            $table->text('emp_remark')->nullable();
            $table->string('emp_functional_role')->nullable();
            $table->string('user_type')->default('Employee');
            $table->string('emp_current_working_status')->nullable();
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
        Schema::dropIfExists('emp_details');
    }
};
