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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->string('leave_code')->nullable();
            $table->string('emp_code')->nullable();
            $table->foreign('emp_code')->references('emp_code')->on('emp_details');
            $table->text('cc')->nullable();
            $table->string('department_head_email')->nullable();
            $table->string('reason_for_absence')->nullable();
            $table->string('absence_dates')->nullable();
            $table->string('absence_start_date')->nullable();
            $table->string('absence_end_date')->nullable();
            $table->string('total_days')->nullable();
            $table->text('comment')->nullable();
            $table->enum('status', ['Wait','Approved','Disapproved','Reapproved','Redisapproved','Modified'])->nullable()->default('Wait');
            $table->unsignedBigInteger('approved_disapproved_by')->nullable();
            $table->foreign('approved_disapproved_by')->references('id')->on('emp_details');
            $table->text('approved_disapproved_comment')->nullable();
            $table->unsignedBigInteger('reapproved_redisapproved_by')->nullable();
            $table->foreign('reapproved_redisapproved_by')->references('id')->on('emp_details');
            $table->text('reapproved_redisapproved_comment')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
