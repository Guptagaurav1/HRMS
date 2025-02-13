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
        Schema::create('rec_personal_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rec_id')->nullable();
            $table->foreign('rec_id')->references('id')->on('recruitment_forms');
            $table->string('emp_code')->nullable();
            $table->enum('gender', ['male','female','others'])->nullable();
            $table->string('preferred_location')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_mobile')->nullable();
            $table->enum('marital_status', ['married','unmarried'])->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('date_of_marriage')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('pf_no')->nullable();
            $table->string('photograph')->nullable();
            $table->string('signature')->nullable();
            $table->string('language_known')->nullable();
            $table->string('aadhar_card_no')->nullable();
            $table->string('aadhar_card_doc')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('passport_doc')->nullable();
            $table->enum('category', ['general','obc','sc','st'])->nullable();
            $table->string('category_doc')->nullable();
            $table->string('police_verification_id')->nullable();
            $table->string('police_verification_doc')->nullable();
            $table->string('nearest_police_station')->nullable();
            $table->enum('status', ['active','deactive'])->nullable();
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
        Schema::dropIfExists('rec_personal_details');
    }
};
