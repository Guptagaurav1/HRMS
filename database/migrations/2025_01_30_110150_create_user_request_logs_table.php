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
        Schema::create('user_request_logs', function (Blueprint $table) {
            $table->id();
            $table->string('req_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('NO ACTION');
            $table->string('query_type')->nullable();
            $table->string('description')->nullable();
            $table->string('job_position')->nullable();
            $table->enum('status', ['open','completed','dropped'])->nullable();  
            $table->string('ref_table_name')->nullable();
            $table->string('ref_table_id')->nullable();
            $table->string('status_changed_to')->nullable();
            $table->string('change_offer_letter')->nullable();
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
        Schema::dropIfExists('user_request_logs');
    }
};
