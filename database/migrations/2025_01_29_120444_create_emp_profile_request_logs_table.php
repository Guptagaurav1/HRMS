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
        Schema::create('emp_profile_request_logs', function (Blueprint $table) {
            $table->id();
            $table->string('req_id')->nullable();
            $table->string('emp_code');
            $table->string('description');
            $table->string('file')->nullable();  
            $table->unsignedBigInteger('changed_column');
            $table->foreign('changed_column')->references('id')->on('emp_changed_columns_reqs');
            $table->string('assigned_to')->nullable();
            $table->enum('status', ['open','completed','dropped'])->default('open')->nullable();  
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
        Schema::dropIfExists('emp_profile_request_logs');
    }
};
