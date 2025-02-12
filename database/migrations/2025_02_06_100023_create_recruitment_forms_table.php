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
        Schema::create('recruitment_forms', function (Blueprint $table) {
            $table->id();
            $table->string('send_mail_id')->nullable();
            $table->unsignedBigInteger('pos_req_id')->nullable();
            $table->foreign('pos_req_id')->references('id')->on('position_requests');
            $table->string('department');
            $table->string('recruitment_type');
            $table->enum('employment_type', ['Permenant','Contractual'])->default('Permenant');
            $table->enum('gender', ['Male','Female','Other'])->nullable();
            $table->string('relative_name')->nullable();
            $table->string('relation')->nullable();
            $table->unsignedBigInteger('district')->nullable();
            $table->foreign('district')->references('id')->on('districts');
            $table->unsignedBigInteger('state')->nullable();
            $table->foreign('state')->references('id')->on('states');
            $table->string('pincode')->nullable();
            $table->mediumText('scope_of_work')->nullable();
            $table->text('candidate_address')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('job_position');
            $table->date('dob')->nullable();
            $table->string('location');
            $table->string('education');
            $table->string('experience');
            $table->string('skill');
            $table->string('email');
            $table->bigInteger('phone');
            $table->string('resume')->nullable();
            $table->string('status')->default('applied');
            $table->string('stage1')->nullable();
            $table->string('stage2')->nullable();
            $table->string('stage3')->nullable();
            $table->string('stage4')->nullable();
            $table->string('stage5')->nullable();
            $table->string('stage6')->nullable();
            $table->enum('finally', ['first-selected','send_interview_details','second-selected','third-selected','fourth-selected','offer-letter-sent','offer_accepted','backout','docs_checked','joining-formalities-completed','joined','first-skipped','second-skipped','third-skipped','finally-skipped','first-rejected','second-rejected','third-rejected','finally-rejected'])->nullable();
            $table->string('reference')->nullable();
            $table->string('reference_name')->nullable();
            $table->integer('salary')->nullable();
            $table->integer('fixed')->nullable();
            $table->integer('variable')->nullable();
            $table->string('emp_code')->nullable();
            $table->string('others')->nullable();
            $table->integer('read_status')->nullable();
            $table->string('remarks_first_round')->nullable();
            $table->string('remarks_second_round')->nullable();
            $table->string('remarks_for_backout')->nullable();
            $table->text('offer_letter')->nullable();
            $table->date('doj')->nullable();
            $table->string('other_skills')->nullable();
            $table->string('rec_form_status')->nullable();
            $table->enum('recruitment_status', ['0','1'])->default('0')->nullable();
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
        Schema::dropIfExists('recruitment_forms');
    }
};
