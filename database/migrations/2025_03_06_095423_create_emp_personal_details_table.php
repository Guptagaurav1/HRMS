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
        Schema::create('emp_personal_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rec_id')->nullable();
            $table->foreign('rec_id')->references('id')->on('recruitment_forms');
            $table->string('emp_code')->nullable();
            $table->foreign('emp_code')->references('emp_code')->on('emp_details');
            $table->date('emp_dob')->nullable();
            $table->enum('emp_gender', ['Male','Female','Other']);
            $table->enum('emp_category', ['general','obc','sc','st']);
            $table->string('emp_father_name')->nullable();
            $table->string('emp_father_mobile')->nullable();
            $table->string('emp_dom')->nullable();
            $table->string('emp_photo')->nullable();
            $table->string('emp_blood_group')->nullable();
            $table->string('emp_husband_wife_name')->nullable();
            $table->string('emp_marital_status')->nullable();
            $table->string('emp_children')->nullable();
            $table->string('emp_signature')->nullable();
            $table->string('language_known')->nullable();
            $table->string('preferred_location')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_personal_details');
    }
};
