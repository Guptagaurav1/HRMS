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
        Schema::create('contacted_by_call_logs', function (Blueprint $table) {
            $table->id();
            $table->string('job_position');
            $table->string('client_name');
            $table->string('name');
            $table->string('email');
            $table->string('phone_no');
            $table->string('experience')->nullable();
            $table->string('curr_ctc')->nullable();
            $table->string('exp_ctc')->nullable();
            $table->string('notice_period')->nullable();
            $table->string('qualification')->nullable();
            $table->string('location')->nullable();
            $table->string('resume')->nullable();
            $table->string('rec_email')->nullable();
            $table->string('rec_type')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('contacted_by_call_logs');
    }
};
