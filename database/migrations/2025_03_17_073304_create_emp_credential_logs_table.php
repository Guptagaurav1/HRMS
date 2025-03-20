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
        Schema::create('emp_credential_logs', function (Blueprint $table) {
            $table->id();
            $table->string('emp_code');
            $table->foreign('emp_code')->references('emp_code')->on('emp_details');
            $table->string('emp_name')->nullable();
            $table->string('emp_work_order')->nullable();
            $table->string('emp_email')->nullable();
            $table->string('emp_password')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('emp_credential_logs');
    }
};
