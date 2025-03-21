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
        Schema::create('emp_id_proofs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rec_id')->nullable()->comment('Recruitment Form Id');
            $table->foreign('rec_id')->references('id')->on('recruitment_forms');
            $table->string('emp_code')->nullable();
            $table->foreign('emp_code')->references('emp_code')->on('emp_details');
            $table->string('emp_aadhaar_no')->nullable();
            $table->string('aadhar_card_doc')->nullable();
            $table->string('emp_passport_no')->nullable();
            $table->string('passport_file')->nullable();
            $table->string('nearest_police_station')->nullable();
            $table->string('police_verification_id')->nullable();
            $table->string('police_verification_file')->nullable();
            $table->string('category_doc')->nullable();
            $table->string('pan_card_doc')->nullable();
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
        Schema::dropIfExists('emp_id_proofs');
    }
};
