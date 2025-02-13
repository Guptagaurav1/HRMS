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
        Schema::create('send_mail_log', function (Blueprint $table) {
            $table->id();
            $table->text('uni_id');
            $table->string('receiver_name')->nullable();
            $table->string('receiver_email')->nullable();
            $table->unsignedBigInteger('job_position');
            $table->foreign('job_position')->references('id')->on('position_requests')->onDelete('NO ACTION');
            $table->string('department')->nullable();
            $table->string('sender_email');
            $table->longText('message')->nullable();
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
        Schema::dropIfExists('send_mail_log');
    }
};
