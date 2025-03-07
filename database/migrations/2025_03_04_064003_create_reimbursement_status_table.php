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
        Schema::create('reimbursement_status', function (Blueprint $table) {
            $table->id();
            $table->string('rem_id');
            $table->foreign('rem_id')->references('rem_id')->on('reimbursements');
            $table->string('emp_id')->nullable();
            $table->enum('verified_by', ['1','2','3'])->nullable();
            $table->enum('verified_status', ['approved','disapproved','pending'])->nullable();
            $table->string('verified_time')->nullable();
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
        Schema::dropIfExists('reimbursement_status');
    }
};
