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
        Schema::create('emp_experience_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rec_id')->nullable()->comment('Recruitment Form Id');
            $table->foreign('rec_id')->references('id')->on('recruitment_forms');
            $table->string('emp_code')->nullable();
            $table->foreign('emp_code')->references('emp_code')->on('emp_details');
            $table->text('emp_skills')->nullable();
            $table->string('other_skills')->nullable();
            $table->string('resume_file')->nullable();
            $table->string('emp_experience')->nullable();
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
        Schema::dropIfExists('emp_experience_details');
    }
};
