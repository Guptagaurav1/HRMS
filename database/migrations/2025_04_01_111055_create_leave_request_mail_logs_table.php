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
        Schema::create('leave_request_mail_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leave_request_id');
            $table->foreign('leave_request_id')->references('id')->on('leave_requests');
            $table->string('to_email');
            $table->text('cc')->nullable();
            $table->string('from_email');
            $table->text('subject');
            $table->text('message');
            $table->enum('status', ['Wait','Approved','Disapproved','Reapproved','Redisapproved','Modified'])->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_request_mail_logs');
    }
};
