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
        Schema::create('wo_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('wo_number')->nullable();
            $table->string('at_emp');
            $table->integer('emp_id')->nullable();
            $table->string('emp_code')->nullable();
            $table->string('attendance_month')->nullable();
            $table->string('approve_leave')->nullable();
            $table->string('lwp_leave')->nullable();
            $table->string('recovery')->nullable();
            $table->string('advance')->nullable();
            $table->string('overtime_rate')->nullable();
            $table->string('total_working_hrs')->nullable();
            $table->string('emp_vendor_rate')->nullable();
            $table->string('designation')->nullable();
            $table->string('ctc')->nullable();
            $table->string('remarks')->nullable();
            $table->enum('attendance_status',['completed', 'pending']);
            $table->integer('user_id')->nullable();
            $table->enum('source', ['normal upload', 'bulk upload'])->default('normal upload');

            $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
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
        Schema::dropIfExists('wo_attendances');
    }
};
