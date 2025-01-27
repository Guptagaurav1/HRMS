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
        if (!Schema::hasTable('leave_request')) {
             Schema::create('leave_request', function (Blueprint $table) {
            $table->id();
            $table->string('leave_code');
            $table->string('emp_code');
            $table->foreign('emp_code')->references('emp_code')->on('emp_details');
            $table->string('cc');
            $table->string('department_head_email');
            $table->string('reason_for_absence');
            $table->string('absence_dates');
            $table->string('absence_start_date');
            $table->string('absence_end_date');
            $table->string('total_days');
            $table->string('comment');
            $table->enum('status', ['Wait','Approved','Disapproved','Reapproved','Redisapproved','Modified'])->default('Wait');
            $table->string('approved_disapproved_by');
            $table->string('approved_disapproved_comment');
            $table->string('reapproved_redisapproved_by');
            $table->string('reapproved_redisapproved_comment');
            $table->dateTime('created_on')->useCurrent();
            $table->dateTime('updated_on')->useCurrentOnUpdate();
            $table->dateTime('deleted_on');
            
        });
        }
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_leave_request');
    }
};
