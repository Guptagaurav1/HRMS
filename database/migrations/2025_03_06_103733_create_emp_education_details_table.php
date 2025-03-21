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
        Schema::create('emp_education_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rec_id')->nullable()->comment('Recruitment Form Id');
            $table->foreign('rec_id')->references('id')->on('recruitment_forms');
            $table->string('emp_code')->nullable();
            $table->foreign('emp_code')->references('emp_code')->on('emp_details');
            $table->string('emp_highest_qualification')->nullable();
            $table->string('emp_postgradqualification')->nullable();
            $table->string('emp_gradqualification')->nullable();
            $table->string('emp_tenth_year')->nullable();
            $table->string('emp_tenth_board_name')->nullable();
            $table->string('emp_tenth_percentage')->nullable();
            $table->string('emp_tenth_doc')->nullable();
            $table->string('emp_twelve_year')->nullable();
            $table->string('emp_twelve_board_name')->nullable();
            $table->string('emp_twelve_percentage')->nullable();
            $table->string('emp_twelve_doc')->nullable();
            $table->string('emp_graduation_year')->nullable();
            $table->string('emp_graduation_in')->nullable();
            $table->string('emp_graduation_percentage')->nullable();
            $table->string('emp_graduation_mode')->nullable();
            $table->string('grad_doc')->nullable();
            $table->string('emp_postgraduation_year')->nullable();
            $table->string('emp_postgraduation_in')->nullable();
            $table->string('emp_postgraduation_percentage')->nullable();
            $table->string('emp_postgraduation_mode')->nullable();
            $table->string('post_grad_doc')->nullable();
            $table->string('emp_certification')->nullable();
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
        Schema::dropIfExists('emp_education_details');
    }
};
